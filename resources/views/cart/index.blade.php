@extends('layouts.app')
@section('title', 'Shopping Cart')

@section('styles')
<style>
    h1 { font-size:1.6rem; font-weight:800; color:#0d3e7a; margin-bottom:1.5rem; }
    .cart-layout { display:grid; grid-template-columns:1fr 320px; gap:1.5rem; align-items:start; }
    @media(max-width:768px){ .cart-layout { grid-template-columns:1fr; } }
    .cart-item { display:flex; align-items:center; gap:1rem; padding:1rem 1.25rem; border-bottom:1px solid #eee; }
    .cart-item:last-child { border-bottom:none; }
    .item-img { width:70px; height:70px; background:linear-gradient(135deg,#e3f2fd,#bbdefb); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:1.8rem; flex-shrink:0; overflow:hidden; }
    .item-img img { width:100%; height:100%; object-fit:cover; }
    .item-name  { font-weight:700; color:#0d3e7a; margin-bottom:0.2rem; }
    .item-price { font-size:0.88rem; color:#888; }
    .item-info  { flex:1; }
    .qty-form   { display:flex; align-items:center; gap:0.5rem; }
    .qty-input  { width:60px; padding:0.35rem 0.5rem; border:1.5px solid #dde; border-radius:6px; text-align:center; }
    .subtotal   { font-weight:800; color:#1565c0; min-width:100px; text-align:right; }
    .remove-btn { background:none; border:none; cursor:pointer; color:#c62828; font-size:1.2rem; padding:0.3rem; }
    .remove-btn:hover { opacity:0.7; }

    .summary-card { background:#fff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden; }
    .summary-header { background:linear-gradient(135deg,#0d3e7a,#1565c0); color:#fff; padding:1rem 1.25rem; font-weight:700; font-size:1rem; }
    .summary-body   { padding:1.25rem; }
    .summary-row    { display:flex; justify-content:space-between; margin-bottom:0.75rem; font-size:0.9rem; }
    .summary-total  { display:flex; justify-content:space-between; font-size:1.2rem; font-weight:800; color:#0d3e7a; border-top:2px solid #eee; padding-top:0.75rem; margin-top:0.75rem; }

    .empty-cart { text-align:center; padding:4rem; color:#888; }
    .empty-cart .icon { font-size:4rem; margin-bottom:1rem; }
</style>
@endsection

@section('content')
<h1>🛒 Shopping Cart</h1>

@if($items->isEmpty())
    <div class="empty-cart">
        <div class="icon">🛒</div>
        <p style="font-size:1.1rem;margin-bottom:1rem;">Your cart is empty.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Products</a>
    </div>
@else
<div class="cart-layout">
    <!-- Items -->
    <div class="card">
        <div class="card-header">Cart Items ({{ $items->count() }})</div>
        @foreach($items as $item)
        <div class="cart-item">
            <div class="item-img">
                @if($item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="">
                @else
                    📦
                @endif
            </div>
            <div class="item-info">
                <div class="item-name">{{ $item->product->name }}</div>
                <div class="item-price">KES {{ number_format($item->product->price) }} each</div>
                <form action="{{ route('cart.update', $item) }}" method="POST" class="qty-form" style="margin-top:0.5rem;">
                    @csrf @method('PATCH')
                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" class="qty-input">
                    <button type="submit" class="btn btn-sm" style="background:#e3f2fd;color:#1565c0;">Update</button>
                </form>
            </div>
            <div class="subtotal">KES {{ number_format($item->quantity * $item->product->price) }}</div>
            <form action="{{ route('cart.remove', $item) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="remove-btn" title="Remove">🗑</button>
            </form>
        </div>
        @endforeach

        <div style="padding:1rem 1.25rem;border-top:1px solid #eee;">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm" style="background:#ffebee;color:#c62828;">🗑 Clear Cart</button>
            </form>
        </div>
    </div>

    <!-- Summary -->
    <div class="summary-card">
        <div class="summary-header">Order Summary</div>
        <div class="summary-body">
            @foreach($items as $item)
            <div class="summary-row">
                <span>{{ Str::limit($item->product->name, 24) }} ×{{ $item->quantity }}</span>
                <span>KES {{ number_format($item->quantity * $item->product->price) }}</span>
            </div>
            @endforeach
            <div class="summary-total">
                <span>Total</span>
                <span>KES {{ number_format($total) }}</span>
            </div>
            <a href="{{ route('checkout.index') }}" class="btn btn-accent" style="width:100%;text-align:center;margin-top:1.2rem;font-size:1rem;padding:0.75rem;">Proceed to Checkout →</a>
            <a href="{{ route('products.index') }}" class="btn btn-outline" style="width:100%;text-align:center;margin-top:0.75rem;">Continue Shopping</a>
        </div>
    </div>
</div>
@endif
@endsection
