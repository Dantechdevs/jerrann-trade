<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', '📊 Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<!-- Stats -->
<div class="stat-grid">
    <div class="stat-card success">
        <div class="stat-value">KES <?php echo e(number_format($stats['total_revenue'])); ?></div>
        <div class="stat-label">Total Revenue</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?php echo e($stats['total_orders']); ?></div>
        <div class="stat-label">Total Orders</div>
    </div>
    <div class="stat-card accent">
        <div class="stat-value"><?php echo e($stats['pending_orders']); ?></div>
        <div class="stat-label">Pending Orders</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?php echo e($stats['total_customers']); ?></div>
        <div class="stat-label">Customers</div>
    </div>
    <div class="stat-card">
        <div class="stat-value"><?php echo e($stats['total_products']); ?></div>
        <div class="stat-label">Products</div>
    </div>
    <div class="stat-card accent">
        <div class="stat-value"><?php echo e($stats['pending_repairs']); ?></div>
        <div class="stat-label">Active Repairs</div>
    </div>
    <div class="stat-card danger">
        <div class="stat-value"><?php echo e($stats['out_of_stock']); ?></div>
        <div class="stat-label">Out of Stock</div>
    </div>
    <div class="stat-card" style="border-left-color:#e65100;">
        <div class="stat-value" style="color:#e65100;"><?php echo e($stats['low_stock']); ?></div>
        <div class="stat-label">Low Stock (≤5)</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:1.5rem;">

<!-- Recent Orders -->
<div class="card">
    <div class="card-header">
        Recent Orders
        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:#fff;">View All</a>
    </div>
    <table>
        <thead><tr><th>#</th><th>Customer</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $recent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(route('admin.orders.show', $order)); ?>" style="color:#1565c0;font-weight:600;">ORD-<?php echo e($order->id); ?></a></td>
                <td><?php echo e($order->user->name ?? '–'); ?></td>
                <td>KES <?php echo e(number_format($order->total_amount)); ?></td>
                <td><span class="badge badge-<?php echo e($order->status_badge); ?>"><?php echo e($order->status); ?></span></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!-- Recent Repairs -->
<div class="card">
    <div class="card-header">
        Recent Repairs
        <a href="<?php echo e(route('admin.repairs.index')); ?>" class="btn btn-sm" style="background:rgba(255,255,255,0.2);color:#fff;">View All</a>
    </div>
    <table>
        <thead><tr><th>#</th><th>Customer</th><th>Device</th><th>Status</th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $recent_repairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(route('admin.repairs.show', $repair)); ?>" style="color:#1565c0;font-weight:600;">#<?php echo e($repair->id); ?></a></td>
                <td><?php echo e($repair->user->name ?? '–'); ?></td>
                <td><?php echo e(ucfirst($repair->device_type)); ?> <?php echo e($repair->brand); ?></td>
                <td><span class="badge badge-<?php echo e($repair->status_badge); ?>"><?php echo e(str_replace('_',' ',$repair->status)); ?></span></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

</div>

<!-- Quick Actions -->
<div class="card">
    <div class="card-header">Quick Actions</div>
    <div class="card-body" style="display:flex;gap:1rem;flex-wrap:wrap;">
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">➕ Add Product</a>
        <a href="<?php echo e(route('admin.orders.index', ['status'=>'pending'])); ?>" class="btn btn-accent">📋 Pending Orders</a>
        <a href="<?php echo e(route('admin.repairs.index', ['status'=>'submitted'])); ?>" class="btn btn-success">🔧 New Repairs</a>
        <a href="<?php echo e(route('admin.customers.index')); ?>" class="btn btn-secondary">👥 View Customers</a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>