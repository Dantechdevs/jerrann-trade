<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders'      => Order::count(),
            'total_revenue'     => Order::where('payment_status', 'paid')->sum('total_amount'),
            'total_customers'   => User::where('role', 'customer')->count(),
            'total_products'    => Product::count(),
            'pending_orders'    => Order::where('status', 'pending')->count(),
            'pending_repairs'   => Repair::whereNotIn('status', ['completed', 'notified'])->count(),
            'low_stock'         => Product::where('stock', '<=', 5)->where('stock', '>', 0)->count(),
            'out_of_stock'      => Product::where('stock', 0)->count(),
        ];

        $recent_orders = Order::with('user')
            ->latest()
            ->limit(8)
            ->get();

        $recent_repairs = Repair::with('user')
            ->latest()
            ->limit(5)
            ->get();

        // Monthly revenue for the last 6 months
        $monthly_revenue = Order::where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subMonths(6))
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total_amount) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact(
            'stats', 'recent_orders', 'recent_repairs', 'monthly_revenue'
        ));
    }
}
