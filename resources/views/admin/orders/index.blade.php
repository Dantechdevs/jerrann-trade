@extends('layouts.admin')
@section('title', 'Orders')
@section('page-title', '🛒 Manage Orders')

@section('content')

<form method="GET" style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1.25rem;">
    <select name="status" class="form-control" style="width:170px;">
        <option value="">All Statuses</option>
        @foreach(['pending','confirmed','processing','shipped','delivered','cancelled'] as $s)
            <option value="{{ $s }}" {{ request('status')===$s?'selected':'' }}>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    <select name="payment_status" class="form-control" style="width:150px;">
        <option value="">Payment Status</option>
        <option value="unpaid"   {{ request('payment_status')==='unpaid'?'selected':'' }}>Unpaid</option>
        <option value="paid"     {{ request('payment_status')==='paid'?'selected':'' }}>Paid</option>
        <option value="refunded" {{ request('payment_status')==='refunded'?'selected':'' }}>Refunded</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary btn-sm">Reset</a>
</form>

<div class="card">
    <table>
        <thead>
            <tr><th>Order #</th><th>Customer</th><th>Total</th><th>Method</th><th>Payment</th><th>Status</th><th>Date</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td><strong>ORD-{{ $order->id }}</strong></td>
                <td>{{ $order->user->name ?? '–' }}</td>
                <td>KES {{ number_format($order->total_amount) }}</td>
                <td>{{ str_replace('_',' ', $order->payment_method) }}</td>
                <td><span class="badge {{ $order->payment_status==='paid'?'badge-success':'badge-warning' }}">{{ $order->payment_status }}</span></td>
                <td><span class="badge badge-{{ $order->status_badge }}">{{ $order->status }}</span></td>
                <td>{{ $order->created_at->format('d/m/y') }}</td>
                <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination">{{ $orders->links() }}</div>
@endsection
