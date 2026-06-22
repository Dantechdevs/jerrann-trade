<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> – Jerann Traders</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f0f4f8; color: #1a1a2e; display: flex; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }

        :root {
            --blue:      #1565c0;
            --blue-dark: #0d3e7a;
            --cyan:      #00acc1;
            --accent:    #f57c00;
            --sidebar-w: 240px;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            background: linear-gradient(180deg, var(--blue-dark) 0%, #1a237e 100%);
            color: #fff;
            min-height: 100vh;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.2);
            z-index: 100;
        }
        .sidebar-brand {
            display: flex; align-items: center; gap: 10px;
            padding: 1.2rem 1.2rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand img { height: 42px; width: 42px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3); }
        .sidebar-brand .brand-name { font-size: 0.95rem; font-weight: 700; line-height: 1.2; }
        .sidebar-brand .brand-role { font-size: 0.68rem; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 1px; }

        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .nav-section-title {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 0.75rem 1.2rem 0.3rem;
            font-weight: 600;
        }
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 0.65rem 1.2rem;
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }
        .nav-item:hover  { background: rgba(255,255,255,0.08); color: #fff; border-left-color: var(--cyan); }
        .nav-item.active { background: rgba(255,255,255,0.12); color: #fff; border-left-color: var(--cyan); }
        .nav-icon        { font-size: 1rem; width: 20px; text-align: center; }

        .sidebar-footer {
            padding: 1rem 1.2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.78rem;
            color: rgba(255,255,255,0.5);
        }

        /* Main content */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background: #fff;
            padding: 0.9rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 6px rgba(0,0,0,0.08);
            position: sticky; top: 0; z-index: 50;
        }
        .topbar-title { font-size: 1.15rem; font-weight: 700; color: var(--blue-dark); }
        .topbar-user  { font-size: 0.88rem; color: #555; }
        .topbar-user strong { color: var(--blue); }

        .page-body { padding: 2rem; }

        /* Utilities */
        .btn { display:inline-block; padding:0.5rem 1.1rem; border-radius:6px; font-weight:600; font-size:0.88rem; cursor:pointer; border:none; transition:all 0.2s; }
        .btn-primary  { background:var(--blue);   color:#fff; }
        .btn-primary:hover { background:var(--blue-dark); }
        .btn-accent   { background:var(--accent); color:#fff; }
        .btn-danger   { background:#c62828; color:#fff; }
        .btn-success  { background:#2e7d32; color:#fff; }
        .btn-secondary{ background:#eee; color:#333; }
        .btn-sm       { padding:0.3rem 0.75rem; font-size:0.8rem; }

        .card { background:#fff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.06); overflow:hidden; margin-bottom:1.5rem; }
        .card-header { background:linear-gradient(135deg, var(--blue-dark), var(--blue)); color:#fff; padding:0.9rem 1.4rem; font-size:1rem; font-weight:600; display:flex; align-items:center; justify-content:space-between; }
        .card-body   { padding:1.5rem; }

        .stat-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:1rem; margin-bottom:2rem; }
        .stat-card { background:#fff; border-radius:12px; padding:1.25rem 1.5rem; box-shadow:0 2px 8px rgba(0,0,0,0.06); border-left:4px solid var(--blue); }
        .stat-card .stat-value { font-size:1.8rem; font-weight:800; color:var(--blue-dark); }
        .stat-card .stat-label { font-size:0.8rem; color:#888; margin-top:0.25rem; text-transform:uppercase; letter-spacing:0.5px; }
        .stat-card.accent { border-left-color:var(--accent); }
        .stat-card.accent .stat-value { color:var(--accent); }
        .stat-card.success { border-left-color:#2e7d32; }
        .stat-card.success .stat-value { color:#2e7d32; }
        .stat-card.danger  { border-left-color:#c62828; }
        .stat-card.danger  .stat-value { color:#c62828; }

        table { width:100%; border-collapse:collapse; }
        th, td { padding:0.7rem 1rem; text-align:left; border-bottom:1px solid #eee; font-size:0.88rem; }
        th { background:#f5f7fa; font-weight:600; color:var(--blue-dark); }
        tr:hover td { background:#fafbff; }

        .badge { display:inline-block; padding:0.2rem 0.6rem; border-radius:20px; font-size:0.73rem; font-weight:600; text-transform:capitalize; }
        .badge-success   { background:#e8f5e9; color:#2e7d32; }
        .badge-danger    { background:#ffebee; color:#c62828; }
        .badge-warning   { background:#fff3e0; color:#e65100; }
        .badge-info      { background:#e3f2fd; color:#1565c0; }
        .badge-primary   { background:#e8eaf6; color:#283593; }
        .badge-secondary { background:#f5f5f5; color:#616161; }

        .alert { padding:0.8rem 1.1rem; border-radius:8px; margin-bottom:1rem; font-size:0.88rem; border-left:4px solid; }
        .alert-success { background:#e8f5e9; border-color:#2e7d32; color:#2e7d32; }
        .alert-error   { background:#ffebee; border-color:#c62828; color:#c62828; }

        .form-group { margin-bottom:1.1rem; }
        .form-group label { display:block; font-size:0.85rem; font-weight:600; color:#444; margin-bottom:0.35rem; }
        .form-control { width:100%; padding:0.55rem 0.85rem; border:1.5px solid #dde; border-radius:7px; font-size:0.9rem; transition:border 0.2s; }
        .form-control:focus { outline:none; border-color:var(--blue); }

        .pagination { display:flex; gap:0.5rem; flex-wrap:wrap; margin-top:1rem; }
        .pagination a, .pagination span { padding:0.35rem 0.75rem; border-radius:6px; font-size:0.85rem; border:1.5px solid #dde; color:var(--blue); }
        .pagination .active span { background:var(--blue); color:#fff; border-color:var(--blue); }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
        <div>
            <div class="brand-name">Jerann Traders</div>
            <div class="brand-role">Admin Panel</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-title">Overview</div>
        <a href="<?php echo e(route('admin.dashboard')); ?>"         class="nav-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <span class="nav-icon">📊</span> Dashboard
        </a>

        <div class="nav-section-title">Catalog</div>
        <a href="<?php echo e(route('admin.products.index')); ?>"    class="nav-item <?php echo e(request()->routeIs('admin.products*') ? 'active' : ''); ?>">
            <span class="nav-icon">📦</span> Products
        </a>

        <div class="nav-section-title">Commerce</div>
        <a href="<?php echo e(route('admin.orders.index')); ?>"      class="nav-item <?php echo e(request()->routeIs('admin.orders*') ? 'active' : ''); ?>">
            <span class="nav-icon">🛒</span> Orders
        </a>
        <a href="<?php echo e(route('admin.repairs.index')); ?>"     class="nav-item <?php echo e(request()->routeIs('admin.repairs*') ? 'active' : ''); ?>">
            <span class="nav-icon">🔧</span> Repairs
        </a>

        <div class="nav-section-title">Users</div>
        <a href="<?php echo e(route('admin.customers.index')); ?>"   class="nav-item <?php echo e(request()->routeIs('admin.customers*') ? 'active' : ''); ?>">
            <span class="nav-icon">👥</span> Customers
        </a>

        <div class="nav-section-title">Store</div>
        <a href="<?php echo e(route('home')); ?>"                    class="nav-item">
            <span class="nav-icon">🏪</span> View Store
        </a>
    </nav>

    <div class="sidebar-footer">
        Logged in as <strong><?php echo e(auth()->user()->name); ?></strong>
    </div>
</aside>

<!-- Main -->
<div class="main">
    <div class="topbar">
        <div class="topbar-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></div>
        <div class="topbar-user">
            Welcome, <strong><?php echo e(auth()->user()->name); ?></strong> &nbsp;|&nbsp;
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <button style="background:none;border:none;color:#c62828;font-weight:600;cursor:pointer;font-size:0.88rem;">Logout</button>
            </form>
        </div>
    </div>

    <div class="page-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success">✅ <?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-error">❌ <?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/layouts/admin.blade.php ENDPATH**/ ?>