@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', '📊 Dashboard')

@section('content')

<!-- Stats -->
<div class="stat-grid">
    <div class="stat-card success">
        <div class="stat-value">KES {{ number_format($stats['total_revenue']) }}</div>
        <div class="stat-label">Total Revenue</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $stats['total_orders'] }}</div>
        <div class="stat-label">Total Orders</div>
    </div>
    <div class="stat-card accent">
        <div class="stat-value">{{ $stats['pending_orders'] }}</div>
        <div class="stat-label">Pending Orders</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $stats['total_customers'] }}</div>
        <div class="stat-label">Customers</div>
    </div>
    <div class="stat-card">
        <div class="stat-value">{{ $stats['total_products'] }}</div>
        <div class="stat-label">Products</div>
    </div>
    <div class="stat-card accent">
        <div class="stat-value">{{ $stats['pending_repairs'] }}</div>
        <div class="stat-label">Active Repairs</div>
    </div>
    <div class="stat-card danger">
        <div class="stat-value">{{ $stats['out_of_stock'] }}</div>
        <div class="stat-label">Out of Stock</div>
    </div>
    <div class="stat-card" style="border-left-color:#e65100;">
        <div class="stat-value" style="color:#e65100;">{{ $stats['low_stock'] }}</div>
        <div class="stat-label">Low Stock (≤5)</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:1.5rem;">

<!-- Recent Orders -->
<div class="card">
    <div class="card-header">
        Recent Orders
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:#fff;">View All</a>
    </div>
    <table>
        <thead><tr><th>#</th><th>Customer</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($recent_orders as $order)
            <tr>
                <td><a href="{{ route('admin.orders.show', $order) }}" style="color:#1565c0;font-weight:600;">ORD-{{ $order->id }}</a></td>
                <td>{{ $order->user->name ?? '–' }}</td>
                <td>KES {{ number_format($order->total_amount) }}</td>
                <td><span class="badge badge-{{ $order->status_badge }}">{{ $order->status }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Recent Repairs -->
<div class="card">
    <div class="card-header">
        Recent Repairs
        <a href="{{ route('admin.repairs.index') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:#fff;">View All</a>
    </div>
    <table>
        <thead><tr><th>#</th><th>Customer</th><th>Device</th><th>Status</th></tr></thead>
        <tbody>
            @foreach($recent_repairs as $repair)
            <tr>
                <td><a href="{{ route('admin.repairs.show', $repair) }}" style="color:#1565c0;font-weight:600;">#{{ $repair->id }}</a></td>
                <td>{{ $repair->user->name ?? '–' }}</td>
                <td>{{ ucfirst($repair->device_type) }} {{ $repair->brand }}</td>
                <td><span class="badge badge-{{ $repair->status_badge }}">{{ str_replace('_',' ',$repair->status) }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">Quick Actions</div>
    <div class="card-body" style="display:flex;gap:1rem;flex-wrap:wrap;">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">➕ Add Product</a>
        <a href="{{ route('admin.orders.index', ['status'=>'pending']) }}" class="btn btn-accent">📋 Pending Orders</a>
        <a href="{{ route('admin.repairs.index', ['status'=>'submitted']) }}" class="btn btn-success">🔧 New Repairs</a>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">👥 View Customers</a>
    </div>
</div>

@endsection
