@extends('layouts.admin')
@section('title', 'Products')
@section('page-title', '📦 Manage Products')

@section('content')

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:1rem;">
    <form method="GET" style="display:flex;gap:0.75rem;flex-wrap:wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products…" class="form-control" style="width:220px;">
        <select name="category" class="form-control" style="width:160px;">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category')==$cat->id ? 'selected':'' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">Reset</a>
    </form>
    <a href="{{ route('admin.products.create') }}" class="btn btn-accent">➕ Add Product</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr><th>Image</th><th>Name</th><th>Brand</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                    @else
                        <span style="font-size:1.8rem;">{{ $product->category->icon ?? '📦' }}</span>
                    @endif
                </td>
                <td><strong>{{ $product->name }}</strong></td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->category->name }}</td>
                <td>KES {{ number_format($product->price) }}</td>
                <td>
                    @if($product->stock == 0)
                        <span class="badge badge-danger">Out</span>
                    @elseif($product->stock <= 5)
                        <span class="badge badge-warning">{{ $product->stock }}</span>
                    @else
                        <span class="badge badge-success">{{ $product->stock }}</span>
                    @endif
                </td>
                <td>
                    <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                        {{ $product->is_active ? 'Active' : 'Hidden' }}
                    </span>
                </td>
                <td style="display:flex;gap:0.4rem;">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">{{ $products->links() }}</div>
@endsection
