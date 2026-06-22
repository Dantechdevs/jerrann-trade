<?php $__env->startSection('title', 'Customers'); ?>
<?php $__env->startSection('page-title', '👥 Customers'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <table>
        <thead>
            <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Joined</th></tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($customer->id); ?></td>
                <td><strong><?php echo e($customer->name); ?></strong></td>
                <td><?php echo e($customer->email); ?></td>
                <td><?php echo e($customer->phone ?? '–'); ?></td>
                <td><?php echo e($customer->created_at->format('d M Y')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo e($customers->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>