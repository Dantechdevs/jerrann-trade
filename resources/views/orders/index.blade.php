@extends('layouts.app')
@section('title', 'My Orders')

@section('styles')
<style>
    h1 { font-size:1.6rem;font-weight:800;color:#0d3e7a;margin-bottom:1.5rem; }
    .empty-state { text-align:center;padding:4rem;color:#888; }
    .empty-state .icon { font-size:4rem;margin-bottom:1rem; }
    .pagination { display:flex;gap:0.4rem;flex-wrap:wrap;margin-top:1.5rem;justify-content:center; }
    .pagination a, .pagination span { padding:0.35rem 0.75rem;border-radius:6px;font-size:0.85rem;border:1.5px solid #dde;color:#1565c0; }
    .pagination .active span { background:#1565c0;color:#fff;border-color:#1565c0; }
</style>
@endsection

@section('content')
<h1>📋 My Orders</h1>

@if($orders->isEmpty())
    <div class="empty-state">
        <div class="icon">📦</div>
        <p style="font-size:1.1rem;margin-bottom:1rem;">You haven't placed any orders yet.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Start Shopping</a>
    </div>
@else
<div class="card">
    <div class="card-header">Order History</div>
    <table>
        <thead>
            <tr>
                <th>Order #</th>
                <th>Date</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td><strong>ORD-{{ $order->id }}</strong></td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>KES {{ number_format($order->total_amount) }}</td>
                <td>
                    <span class="badge {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">
                        {{ $order->payment_status }}
                    </span>
                </td>
                <td>
                    <span class="badge badge-{{ $order->status_badge }}">{{ $order->status }}</span>
                </td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-primary btn-sm">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination">{{ $orders->links() }}</div>
@endif
@endsection
