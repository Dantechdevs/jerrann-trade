<?php $__env->startSection('title', isset($product) ? 'Edit Product' : 'Add Product'); ?>
<?php $__env->startSection('page-title', isset($product) ? '✏️ Edit Product' : '➕ Add Product'); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width:700px;">
<div class="card">
    <div class="card-header"><?php echo e(isset($product) ? 'Edit: ' . $product->name : 'New Product'); ?></div>
    <div class="card-body">
        <form action="<?php echo e(isset($product) ? route('admin.products.update', $product) : route('admin.products.store')); ?>"
              method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($product)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Product Name *</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $product->name ?? '')); ?>" required>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" value="<?php echo e(old('brand', $product->brand ?? '')); ?>">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Category *</label>
                    <select name="category_id" class="form-control" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>" <?php echo e(old('category_id', $product->category_id ?? '') == $cat->id ? 'selected':''); ?>>
                                <?php echo e($cat->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price (KES) *</label>
                    <input type="number" name="price" class="form-control" value="<?php echo e(old('price', $product->price ?? '')); ?>" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label>Stock Quantity *</label>
                    <input type="number" name="stock" class="form-control" value="<?php echo e(old('stock', $product->stock ?? 0)); ?>" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <?php if(isset($product) && $product->image): ?>
                    <div style="margin-bottom:0.5rem;">
                        <img src="<?php echo e(asset($product->image)); ?>" style="height:80px;border-radius:6px;">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                <small style="color:#888;">Max 2MB · JPG, PNG, WebP</small>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:0.75rem;">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                    <?php echo e(old('is_active', $product->is_active ?? true) ? 'checked' : ''); ?>

                    style="width:18px;height:18px;accent-color:#1565c0;">
                <label for="is_active" style="margin:0;font-size:0.9rem;">Active (visible in store)</label>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-error">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div>❌ <?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(isset($product) ? '💾 Update Product' : '➕ Create Product'); ?>

                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>