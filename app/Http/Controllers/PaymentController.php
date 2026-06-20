<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\MpesaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * M-Pesa STK Push callback (called by Safaricom servers).
     * Route: POST /api/mpesa/callback  (no CSRF / auth)
     */
    public function mpesaCallback(Request $request, MpesaService $mpesa)
    {
        Log::info('M-Pesa callback received', $request->all());

        $data = $mpesa->processCallback($request->all());

        if ($data['result_code'] !== 0) {
            Log::warning('M-Pesa payment failed', $data);
            return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
        }

        // Find order by account reference (ORD-{id})
        $orderId = null;
        $ref     = $request->input('Body.stkCallback.AccountReference', '');
        if (preg_match('/ORD-(\d+)/', $ref, $m)) {
            $orderId = (int) $m[1];
        }

        if ($orderId) {
            $order = Order::find($orderId);

            if ($order) {
                $order->update(['payment_status' => 'paid', 'status' => 'confirmed']);

                Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'method'        => 'mpesa',
                        'amount'        => $data['amount'],
                        'status'        => 'completed',
                        'mpesa_receipt' => $data['mpesa_receipt'],
                        'mpesa_phone'   => $data['phone'],
                        'transaction_id'=> $data['mpesa_receipt'],
                    ]
                );

                Log::info("Order #{$order->id} marked as paid via M-Pesa.");
            }
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }
}
