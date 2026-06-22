<?php $__env->startSection('title', 'Repairs'); ?>
<?php $__env->startSection('page-title', '🔧 Manage Repairs'); ?>

<?php $__env->startSection('content'); ?>
<form method="GET" style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1.25rem;">
    <select name="status" class="form-control" style="width:190px;">
        <option value="">All Statuses</option>
        <?php $__currentLoopData = ['submitted','diagnosed','quoted','approved','in_progress','completed','notified']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($s); ?>" <?php echo e(request('status')===$s?'selected':''); ?>><?php echo e(ucfirst(str_replace('_',' ',$s))); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="<?php echo e(route('admin.repairs.index')); ?>" class="btn btn-secondary btn-sm">Reset</a>
</form>

<div class="card">
    <table>
        <thead>
            <tr><th>#</th><th>Customer</th><th>Device</th><th>Status</th><th>Est. Cost</th><th>Date</th><th>Action</th></tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $repairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><strong>#<?php echo e($repair->id); ?></strong></td>
                <td><?php echo e($repair->user->name ?? '–'); ?></td>
                <td><?php echo e(ucfirst($repair->device_type)); ?> <?php echo e($repair->brand); ?> <?php echo e($repair->model); ?></td>
                <td><span class="badge badge-<?php echo e($repair->status_badge); ?>"><?php echo e(str_replace('_',' ',$repair->status)); ?></span></td>
                <td><?php echo e($repair->estimated_cost ? 'KES '.number_format($repair->estimated_cost) : '–'); ?></td>
                <td><?php echo e($repair->created_at->format('d/m/y')); ?></td>
                <td><a href="<?php echo e(route('admin.repairs.show', $repair)); ?>" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo e($repairs->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/admin/repairs/index.blade.php ENDPATH**/ ?>