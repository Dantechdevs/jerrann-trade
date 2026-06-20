<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .auth-wrap { max-width:440px; margin:2rem auto; }
    h1 { font-size:1.6rem;font-weight:800;color:#0d3e7a;margin-bottom:0.4rem; }
    .sub { color:#888;font-size:0.9rem;margin-bottom:1.5rem; }
    .form-group { margin-bottom:1rem; }
    .form-group label { display:block;font-size:0.85rem;font-weight:600;color:#444;margin-bottom:0.35rem; }
    .form-control { width:100%;padding:0.65rem 0.9rem;border:1.5px solid #dde;border-radius:7px;font-size:0.9rem; }
    .form-control:focus { outline:none;border-color:#1565c0; }
    .error { font-size:0.8rem;color:#c62828;margin-top:0.25rem; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-wrap">
    <h1>Welcome back 👋</h1>
    <p class="sub">Sign in to your Jerann Traders account.</p>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" autofocus required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.1rem;">
                    <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.85rem;cursor:pointer;">
                        <input type="checkbox" name="remember" style="accent-color:#1565c0;"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;padding:0.75rem;font-size:1rem;">Login</button>
            </form>
            <p style="text-align:center;margin-top:1.25rem;font-size:0.88rem;color:#666;">
                Don't have an account? <a href="<?php echo e(route('register')); ?>" style="color:#1565c0;font-weight:600;">Register here</a>
            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/auth/login.blade.php ENDPATH**/ ?>