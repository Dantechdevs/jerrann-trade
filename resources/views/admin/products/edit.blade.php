@extends('layouts.admin')
@section('title', isset($product) ? 'Edit Product' : 'Add Product')
@section('page-title', isset($product) ? '✏️ Edit Product' : '➕ Add Product')

@section('content')
<div style="max-width:700px;">
<div class="card">
    <div class="card-header">{{ isset($product) ? 'Edit: ' . $product->name : 'New Product' }}</div>
    <div class="card-body">
        <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Product Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand ?? '') }}">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Category *</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected':'' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Price (KES) *</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label>Stock Quantity *</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? 0) }}" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                @if(isset($product) && $product->image)
                    <div style="margin-bottom:0.5rem;">
                        <img src="{{ asset($product->image) }}" style="height:80px;border-radius:6px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                <small style="color:#888;">Max 2MB · JPG, PNG, WebP</small>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:0.75rem;">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                    {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                    style="width:18px;height:18px;accent-color:#1565c0;">
                <label for="is_active" style="margin:0;font-size:0.9rem;">Active (visible in store)</label>
            </div>

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $e)<div>❌ {{ $e }}</div>@endforeach
                </div>
            @endif

            <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                <button type="submit" class="btn btn-primary">
                    {{ isset($product) ? '💾 Update Product' : '➕ Create Product' }}
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
