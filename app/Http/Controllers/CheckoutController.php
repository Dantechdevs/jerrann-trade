<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $items->sum(fn($i) => $i->quantity * $i->product->price);

        return view('checkout.index', compact('items', 'total'));
    }

    public function store(Request $request, MpesaService $mpesa)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'phone'            => 'required|string|max:20',
            'payment_method'   => 'required|in:mpesa,bank_transfer,cash_on_delivery',
        ]);

        $items = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $items->sum(fn($i) => $i->quantity * $i->product->price);

        DB::transaction(function () use ($request, $items, $total, $mpesa) {
            $order = Order::create([
                'user_id'          => auth()->id(),
                'total_amount'     => $total,
                'status'           => 'pending',
                'payment_method'   => $request->payment_method,
                'payment_status'   => 'unpaid',
                'shipping_address' => $request->shipping_address,
                'phone'            => $request->phone,
                'notes'            => $request->notes,
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'unit_price' => $item->product->price,
                    'subtotal'   => $item->quantity * $item->product->price,
                ]);

                // Decrement stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            CartItem::where('user_id', auth()->id())->delete();

            // Initiate M-Pesa STK Push
            if ($request->payment_method === 'mpesa') {
                try {
                    $mpesa->stkPush(
                        $request->phone,
                        (int) $total,
                        "ORD-{$order->id}",
                        'Jerann Traders Order'
                    );
                } catch (\Exception $e) {
                    // Log and continue — callback will confirm later
                }
            }

            session(['last_order_id' => $order->id]);
        });

        return redirect()->route('orders.show', session('last_order_id'))
            ->with('success', 'Order placed successfully!' .
                ($request->payment_method === 'mpesa' ? ' Check your phone for the M-Pesa prompt.' : ''));
    }
}
