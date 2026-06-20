<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('styles'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h1>📦 All Products</h1>
    <span style="color:#888;font-size:0.9rem;"><?php echo e($products->total()); ?> products found</span>
</div>

<!-- Filters -->
<form method="GET" action="<?php echo e(route('products.index')); ?>" class="filter-bar">
    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="🔍 Search products...">
    <select name="category">
        <option value="">All Categories</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($cat->slug); ?>" <?php echo e(request('category') === $cat->slug ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="number" name="min_price" value="<?php echo e(request('min_price')); ?>" placeholder="Min (KES)" style="width:120px;">
    <input type="number" name="max_price" value="<?php echo e(request('max_price')); ?>" placeholder="Max (KES)" style="width:120px;">
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-sm" style="background:#eee;color:#333;">Reset</a>
</form>

<!-- Grid -->
<?php if($products->isEmpty()): ?>
    <div class="empty-state">
        <div class="icon">😔</div>
        <p>No products found. Try adjusting your filters.</p>
    </div>
<?php else: ?>
<div class="products-grid">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card">
        <div class="product-img">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->name); ?>">
            <?php else: ?>
                <?php echo e($product->category->icon ?? '📦'); ?>

            <?php endif; ?>
        </div>
        <div class="product-info">
            <div class="product-name"><?php echo e($product->name); ?></div>
            <div class="product-brand"><?php echo e($product->brand); ?></div>
            <div class="product-price">KES <?php echo e(number_format($product->price)); ?></div>
            <div class="product-stock <?php echo e($product->stock === 0 ? 'out' : ''); ?>">
                <?php echo e($product->stock > 0 ? "In Stock ({$product->stock})" : 'Out of Stock'); ?>

            </div>
            <div class="product-actions">
                <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-primary btn-sm" style="flex:1;text-align:center;">View</a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($product->isInStock()): ?>
                    <form action="<?php echo e(route('cart.add')); ?>" method="POST" style="flex:1;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <button class="btn btn-accent btn-sm" style="width:100%;">🛒</button>
                    </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="pagination">
    <?php echo e($products->links()); ?>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/products/index.blade.php ENDPATH**/ ?>