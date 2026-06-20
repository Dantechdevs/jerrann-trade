@extends('layouts.admin')
@section('title', 'Order #' . $order->id)
@section('page-title', '🧾 Order #ORD-' . $order->id)

@section('content')
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:1.5rem;">
    <div class="card">
        <div class="card-header">Order Info</div>
        <div class="card-body" style="font-size:0.9rem;line-height:2;">
            <div><strong>Customer:</strong> {{ $order->user->name }} ({{ $order->user->email }})</div>
            <div><strong>Phone:</strong> {{ $order->phone }}</div>
            <div><strong>Address:</strong> {{ $order->shipping_address }}</div>
            <div><strong>Payment:</strong> {{ str_replace('_',' ',$order->payment_method) }}</div>
            <div><strong>Date:</strong> {{ $order->created_at->format('d M Y, g:i A') }}</div>
            @if($order->notes)<div><strong>Notes:</strong> {{ $order->notes }}</div>@endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">Update Status</div>
        <div class="card-body">
            <p style="font-size:0.88rem;color:#666;margin-bottom:1rem;">
                Current: <span class="badge badge-{{ $order->status_badge }}">{{ $order->status }}</span>
                &nbsp;|&nbsp; Payment: <span class="badge {{ $order->payment_status==='paid'?'badge-success':'badge-warning' }}">{{ $order->payment_status }}</span>
            </p>
            <form action="{{ route('admin.orders.status', $order) }}" method="POST" style="display:flex;gap:0.75rem;flex-wrap:wrap;">
                @csrf @method('PATCH')
                <select name="status" class="form-control" style="flex:1;">
                    @foreach(['pending','confirmed','processing','shipped','delivered','cancelled'] as $s)
                        <option value="{{ $s }}" {{ $order->status===$s?'selected':'' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">Items</div>
    <table>
        <thead><tr><th>Product</th><th>Unit Price</th><th>Qty</th><th>Subtotal</th></tr></thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name ?? '[Deleted]' }}</td>
                <td>KES {{ number_format($item->unit_price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>KES {{ number_format($item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align:right;padding:1rem;font-size:1.1rem;font-weight:800;color:#0d3e7a;">
        Total: KES {{ number_format($order->total_amount) }}
    </div>
</div>

<div style="margin-top:1rem;">
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">← Back to Orders</a>
</div>
@endsection
