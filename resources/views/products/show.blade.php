@extends('layouts.app')
@section('title', $product->name)

@section('styles')
<style>
    .product-detail { display:grid; grid-template-columns:1fr 1fr; gap:2.5rem; margin-bottom:3rem; }
    @media(max-width:768px){ .product-detail { grid-template-columns:1fr; } }
    .product-image-box { background:linear-gradient(135deg,#e3f2fd,#bbdefb); border-radius:14px; min-height:320px; display:flex; align-items:center; justify-content:center; font-size:5rem; overflow:hidden; }
    .product-image-box img { width:100%; height:100%; object-fit:contain; padding:1rem; }
    .product-meta h1 { font-size:1.6rem; font-weight:800; color:#0d3e7a; margin-bottom:0.5rem; }
    .meta-row { display:flex; align-items:center; gap:0.5rem; font-size:0.88rem; color:#666; margin-bottom:0.5rem; }
    .price-tag { font-size:2rem; font-weight:900; color:#1565c0; margin:1rem 0; }
    .stock-tag { padding:0.3rem 0.85rem; border-radius:20px; font-size:0.8rem; font-weight:600; display:inline-block; margin-bottom:1rem; }
    .in-stock  { background:#e8f5e9; color:#2e7d32; }
    .out-stock { background:#ffebee; color:#c62828; }
    .description-box { margin:1.2rem 0; color:#444; font-size:0.93rem; line-height:1.7; }
    .add-cart-form { display:flex; gap:0.75rem; align-items:center; flex-wrap:wrap; margin-top:1.2rem; }
    .qty-input { width:70px; padding:0.5rem; border:1.5px solid #dde; border-radius:7px; font-size:1rem; text-align:center; }

    .related-section { margin-top:3rem; }
    .section-title { font-size:1.3rem; font-weight:800; color:#0d3e7a; margin-bottom:1.2rem; }
    .related-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:1rem; }
    .related-card { background:#fff; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.07); overflow:hidden; transition:all 0.2s; }
    .related-card:hover { transform:translateY(-3px); }
    .related-img { height:120px; background:linear-gradient(135deg,#e3f2fd,#bbdefb); display:flex; align-items:center; justify-content:center; font-size:2.5rem; }
    .related-info { padding:0.75rem; }
    .related-name  { font-weight:600; font-size:0.82rem; color:#0d3e7a; margin-bottom:0.3rem; }
    .related-price { font-weight:800; color:#1565c0; font-size:0.9rem; }
</style>
@endsection

@section('content')
<p style="font-size:0.85rem;color:#888;margin-bottom:1.5rem;">
    <a href="{{ route('home') }}">Home</a> › <a href="{{ route('products.index') }}">Products</a> › {{ $product->name }}
</p>

<div class="product-detail">
    <div class="product-image-box">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        @else
            {{ $product->category->icon ?? '📦' }}
        @endif
    </div>

    <div class="product-meta">
        <h1>{{ $product->name }}</h1>
        <div class="meta-row">🏷️ <strong>Brand:</strong> {{ $product->brand ?? 'N/A' }}</div>
        <div class="meta-row">📂 <strong>Category:</strong> {{ $product->category->name }}</div>
        <div class="price-tag">KES {{ number_format($product->price) }}</div>

        @if($product->isInStock())
            <span class="stock-tag in-stock">✅ In Stock ({{ $product->stock }} available)</span>
        @else
            <span class="stock-tag out-stock">❌ Out of Stock</span>
        @endif

        <div class="description-box">
            {{ $product->description ?? 'No description available.' }}
        </div>

        @auth
            @if($product->isInStock())
            <form action="{{ route('cart.add') }}" method="POST" class="add-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="qty-input">
                <button class="btn btn-accent" style="font-size:1rem;padding:0.6rem 1.6rem;">🛒 Add to Cart</button>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="padding:0.6rem 1.4rem;">Buy Now</a>
            </form>
            @else
                <div class="alert alert-error" style="margin-top:1rem;">This product is currently out of stock.</div>
            @endif
        @else
            <p style="margin-top:1rem;color:#555;">
                <a href="{{ route('login') }}" style="color:#1565c0;font-weight:700;">Login</a> to add to cart.
            </p>
        @endauth
    </div>
</div>

@if($related->isNotEmpty())
<div class="related-section">
    <div class="section-title">Related Products</div>
    <div class="related-grid">
        @foreach($related as $r)
        <a href="{{ route('products.show', $r) }}" class="related-card">
            <div class="related-img">{{ $r->category->icon ?? '📦' }}</div>
            <div class="related-info">
                <div class="related-name">{{ $r->name }}</div>
                <div class="related-price">KES {{ number_format($r->price) }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif
@endsection
