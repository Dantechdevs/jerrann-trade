<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('page-title', '📦 Manage Products'); ?>

<?php $__env->startSection('content'); ?>

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:1rem;">
    <form method="GET" style="display:flex;gap:0.75rem;flex-wrap:wrap;">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search products…" class="form-control" style="width:220px;">
        <select name="category" class="form-control" style="width:160px;">
            <option value="">All Categories</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category')==$cat->id ? 'selected':''); ?>><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-accent">➕ Add Product</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr><th>Image</th><th>Name</th><th>Brand</th><th>Category</th><th>Price</th><th>Stock</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset($product->image)); ?>" style="width:48px;height:48px;object-fit:cover;border-radius:6px;">
                    <?php else: ?>
                        <span style="font-size:1.8rem;"><?php echo e($product->category->icon ?? '📦'); ?></span>
                    <?php endif; ?>
                </td>
                <td><strong><?php echo e($product->name); ?></strong></td>
                <td><?php echo e($product->brand); ?></td>
                <td><?php echo e($product->category->name); ?></td>
                <td>KES <?php echo e(number_format($product->price)); ?></td>
                <td>
                    <?php if($product->stock == 0): ?>
                        <span class="badge badge-danger">Out</span>
                    <?php elseif($product->stock <= 5): ?>
                        <span class="badge badge-warning"><?php echo e($product->stock); ?></span>
                    <?php else: ?>
                        <span class="badge badge-success"><?php echo e($product->stock); ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <span class="badge <?php echo e($product->is_active ? 'badge-success' : 'badge-danger'); ?>">
                        <?php echo e($product->is_active ? 'Active' : 'Hidden'); ?>

                    </span>
                </td>
                <td style="display:flex;gap:0.4rem;">
                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="btn btn-primary btn-sm">Edit</a>
                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('Delete this product?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="pagination"><?php echo e($products->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/admin/products/index.blade.php ENDPATH**/ ?>