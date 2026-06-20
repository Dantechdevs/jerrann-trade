@extends('layouts.app')
@section('title', 'Order #' . $order->id)

@section('styles')
<style>
    .order-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem; }
    .order-header h1 { font-size:1.5rem;font-weight:800;color:#0d3e7a; }
    .detail-grid { display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:1.5rem; }
    @media(max-width:640px){ .detail-grid { grid-template-columns:1fr; } }
    .detail-row { display:flex;gap:0.5rem;margin-bottom:0.6rem;font-size:0.9rem; }
    .detail-row .label { font-weight:600;color:#555;min-width:130px; }
    .total-row { display:flex;justify-content:flex-end;font-size:1.2rem;font-weight:800;color:#0d3e7a;padding:1rem 0 0;border-top:2px solid #eee; }
</style>
@endsection

@section('content')
<div class="order-header">
    <h1>🧾 Order #ORD-{{ $order->id }}</h1>
    <div style="display:flex;gap:0.75rem;align-items:center;flex-wrap:wrap;">
        <span class="badge badge-{{ $order->status_badge }}" style="font-size:0.85rem;padding:0.35rem 0.85rem;">{{ $order->status }}</span>
        @if(in_array($order->status, ['pending','confirmed']))
        <form action="{{ route('orders.cancel', $order) }}" method="POST" onsubmit="return confirm('Cancel this order?')">
            @csrf @method('PATCH')
            <button class="btn btn-danger btn-sm">Cancel Order</button>
        </form>
        @endif
    </div>
</div>

<div class="detail-grid">
    <div class="card">
        <div class="card-header">Order Details</div>
        <div class="card-body">
            <div class="detail-row"><span class="label">Date:</span> {{ $order->created_at->format('d M Y, g:i A') }}</div>
            <div class="detail-row"><span class="label">Payment:</span> {{ str_replace('_',' ', $order->payment_method) }}</div>
            <div class="detail-row"><span class="label">Pay Status:</span>
                <span class="badge {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">{{ $order->payment_status }}</span>
            </div>
            <div class="detail-row"><span class="label">Phone:</span> {{ $order->phone }}</div>
            <div class="detail-row"><span class="label">Address:</span> {{ $order->shipping_address }}</div>
            @if($order->notes)
            <div class="detail-row"><span class="label">Notes:</span> {{ $order->notes }}</div>
            @endif
        </div>
    </div>

    @if($order->payment)
    <div class="card">
        <div class="card-header">Payment Info</div>
        <div class="card-body">
            <div class="detail-row"><span class="label">Method:</span> {{ $order->payment->method }}</div>
            <div class="detail-row"><span class="label">Amount:</span> KES {{ number_format($order->payment->amount) }}</div>
            <div class="detail-row"><span class="label">Status:</span>
                <span class="badge {{ $order->payment->status === 'completed' ? 'badge-success' : 'badge-warning' }}">{{ $order->payment->status }}</span>
            </div>
            @if($order->payment->mpesa_receipt)
            <div class="detail-row"><span class="label">M-Pesa Ref:</span> {{ $order->payment->mpesa_receipt }}</div>
            @endif
        </div>
    </div>
    @endif
</div>

<!-- Items -->
<div class="card">
    <div class="card-header">Items Ordered</div>
    <table>
        <thead>
            <tr><th>Product</th><th>Unit Price</th><th>Qty</th><th>Subtotal</th></tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name ?? '[Deleted product]' }}</td>
                <td>KES {{ number_format($item->unit_price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>KES {{ number_format($item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total-row" style="padding:1rem 1rem 0.75rem;">
        Total: &nbsp;<strong>KES {{ number_format($order->total_amount) }}</strong>
    </div>
</div>

<div style="margin-top:1.5rem;">
    <a href="{{ route('orders.index') }}" class="btn btn-outline">← Back to Orders</a>
</div>
@endsection
