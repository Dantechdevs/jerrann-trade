@extends('layouts.app')
@section('title', 'Products')

@section('styles')
<style>
    .page-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; flex-wrap:wrap; gap:1rem; }
    .page-header h1 { font-size:1.6rem; font-weight:800; color:#0d3e7a; }

    .filter-bar {
        background:#fff;
        border-radius:10px;
        padding:1rem 1.25rem;
        box-shadow:0 2px 6px rgba(0,0,0,0.06);
        margin-bottom:1.5rem;
        display:flex;
        flex-wrap:wrap;
        gap:0.75rem;
        align-items:center;
    }
    .filter-bar input, .filter-bar select {
        padding:0.5rem 0.85rem;
        border:1.5px solid #dde;
        border-radius:7px;
        font-size:0.88rem;
    }
    .filter-bar input:focus, .filter-bar select:focus { outline:none; border-color:#1565c0; }

    .products-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(220px,1fr)); gap:1.25rem; }
    .product-card { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.07); overflow:hidden; transition:all 0.25s; display:flex; flex-direction:column; }
    .product-card:hover { transform:translateY(-4px); box-shadow:0 8px 24px rgba(21,101,192,0.12); }
    .product-img { height:160px; background:linear-gradient(135deg,#e3f2fd,#bbdefb); display:flex; align-items:center; justify-content:center; font-size:3rem; }
    .product-img img { width:100%; height:100%; object-fit:cover; }
    .product-info { padding:1rem; flex:1; display:flex; flex-direction:column; }
    .product-name  { font-weight:700; font-size:0.9rem; color:#0d3e7a; margin-bottom:0.3rem; }
    .product-brand { font-size:0.78rem; color:#888; margin-bottom:0.5rem; }
    .product-price { font-size:1.15rem; font-weight:800; color:#1565c0; margin-bottom:0.75rem; }
    .product-stock { font-size:0.75rem; color:#2e7d32; margin-bottom:0.5rem; }
    .product-stock.out { color:#c62828; }
    .product-actions { margin-top:auto; display:flex; gap:0.5rem; }

    .empty-state { text-align:center; padding:4rem 2rem; color:#888; }
    .empty-state .icon { font-size:4rem; margin-bottom:1rem; }

    .pagination { display:flex; gap:0.4rem; flex-wrap:wrap; margin-top:1.5rem; justify-content:center; }
    .pagination a, .pagination span { padding:0.35rem 0.75rem; border-radius:6px; font-size:0.85rem; border:1.5px solid #dde; color:#1565c0; }
    .pagination .active span { background:#1565c0; color:#fff; border-color:#1565c0; }
</style>
@endsection

@section('content')
<div class="page-header">
    <h1>📦 All Products</h1>
    <span style="color:#888;font-size:0.9rem;">{{ $products->total() }} products found</span>
</div>

<!-- Filters -->
<form method="GET" action="{{ route('products.index') }}" class="filter-bar">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Search products...">
    <select name="category">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
    </select>
    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min (KES)" style="width:120px;">
    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max (KES)" style="width:120px;">
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="{{ route('products.index') }}" class="btn btn-sm" style="background:#eee;color:#333;">Reset</a>
</form>

<!-- Grid -->
@if($products->isEmpty())
    <div class="empty-state">
        <div class="icon">😔</div>
        <p>No products found. Try adjusting your filters.</p>
    </div>
@else
<div class="products-grid">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-img">
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            @else
                {{ $product->category->icon ?? '📦' }}
            @endif
        </div>
        <div class="product-info">
            <div class="product-name">{{ $product->name }}</div>
            <div class="product-brand">{{ $product->brand }}</div>
            <div class="product-price">KES {{ number_format($product->price) }}</div>
            <div class="product-stock {{ $product->stock === 0 ? 'out' : '' }}">
                {{ $product->stock > 0 ? "In Stock ({$product->stock})" : 'Out of Stock' }}
            </div>
            <div class="product-actions">
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm" style="flex:1;text-align:center;">View</a>
                @auth
                    @if($product->isInStock())
                    <form action="{{ route('cart.add') }}" method="POST" style="flex:1;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-accent btn-sm" style="width:100%;">🛒</button>
                    </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination">
    {{ $products->links() }}
</div>
@endif
@endsection
