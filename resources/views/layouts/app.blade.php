<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Jerann Traders') – Printers, Laptops & Repair Services</title>

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* ── Reset & Base ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f7fa; color: #1a1a2e; min-height: 100vh; }
        a { text-decoration: none; color: inherit; }
        img { max-width: 100%; }

        /* ── Brand Colors ── */
        :root {
            --blue:       #1565c0;
            --blue-dark:  #0d3e7a;
            --blue-light: #1e88e5;
            --cyan:       #00acc1;
            --accent:     #f57c00;
            --white:      #ffffff;
            --gray-light: #f0f4f8;
            --gray:       #9e9e9e;
            --text:       #1a1a2e;
            --success:    #2e7d32;
            --danger:     #c62828;
            --warning:    #e65100;
        }

        /* ════════════════════════════════════
           LAYER 1: Top Bar
        ════════════════════════════════════ */
        .topbar {
            background: linear-gradient(135deg, #4a0080 0%, #7b1fa2 60%, #ab47bc 100%);
            color: rgba(255,255,255,0.85);
            font-size: 0.78rem;
            padding: 0 2rem;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.12);
        }
        .topbar-left {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .topbar-left a {
            color: rgba(255,255,255,0.82);
            transition: color 0.2s;
            padding: 0 1rem;
            border-right: 1px solid rgba(255,255,255,0.2);
            line-height: 36px;
            display: flex;
            align-items: center;
            gap: 5px;
            height: 100%;
        }
        .topbar-left a:first-child { padding-left: 0; }
        .topbar-left a:hover { color: #fff; }
        .topbar-location {
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,0.95);
            font-weight: 600;
            padding: 0 1rem;
            border-left: 1px solid rgba(255,255,255,0.2);
            height: 100%;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .topbar-right a {
            color: rgba(255,255,255,0.82);
            transition: color 0.2s;
            border-left: 1px solid rgba(255,255,255,0.2);
            padding: 0 0.9rem;
            line-height: 36px;
            font-size: 0.78rem;
            display: flex;
            align-items: center;
            gap: 5px;
            height: 100%;
        }
        .topbar-right a:hover { color: #fff; }
        .topbar-right .logout-btn {
            background: none;
            border: none;
            border-left: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.82);
            cursor: pointer;
            font-size: 0.78rem;
            padding: 0 0.9rem;
            height: 36px;
            transition: color 0.2s;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .topbar-right .logout-btn:hover { color: #fff; }
        .topbar-social {
            display: flex;
            align-items: center;
            border-left: 1px solid rgba(255,255,255,0.2);
            padding-left: 0.5rem;
            gap: 2px;
            height: 100%;
        }
        .topbar-social a {
            border: none !important;
            padding: 0 !important;
            width: 26px;
            height: 26px;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 4px;
            color: rgba(255,255,255,0.75);
            font-size: 0.78rem;
            transition: background 0.2s, color 0.2s;
        }
        .topbar-social a:hover {
            color: #fff;
            background: rgba(255,255,255,0.18);
        }

        /* ════════════════════════════════════
           LAYER 2: Main Navbar
        ════════════════════════════════════ */
        .navbar {
            background: #ffffff;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
            border-bottom: 1px solid #e8e8e8;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        .navbar-brand {
            display: flex; align-items: center; gap: 12px; color: var(--text); flex-shrink: 0;
        }
        .navbar-brand img { height: 48px; width: 48px; border-radius: 50%; border: 2px solid #e0e0e0; }
        .navbar-brand .brand-text { font-size: 1.3rem; font-weight: 700; letter-spacing: 0.5px; line-height: 1.2; color: var(--blue-dark); }
        .navbar-brand .brand-sub  { font-size: 0.68rem; color: #888; letter-spacing: 1.5px; text-transform: uppercase; }

        .nav-links { display: flex; align-items: center; gap: 0.05rem; }
        .nav-link {
            color: #333;
            padding: 0.45rem 0.8rem;
            border-radius: 4px;
            font-size: 0.82rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            transition: color 0.2s;
            white-space: nowrap;
        }
        .nav-link:hover { color: var(--blue); }
        .nav-link.active { color: var(--blue); }
        .nav-link-highlight { color: var(--blue); font-weight: 700; }
        .nav-link-highlight:hover { color: var(--blue-dark); }
        .nav-link-divider {
            width: 1px;
            height: 16px;
            background: #ccc;
            margin: 0 4px;
        }
        .nav-social {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: 8px;
            padding-left: 12px;
            border-left: 1px solid #ddd;
        }
        .nav-social a {
            color: #555;
            font-size: 0.82rem;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: border-color 0.2s, color 0.2s, background 0.2s;
        }
        .nav-social a:hover { border-color: var(--blue); color: var(--blue); background: #f0f4ff; }



        /* ════════════════════════════════════
           LAYER 3: Search Bar
        ════════════════════════════════════ */
        .searchbar {
            background: linear-gradient(90deg, #0d3e7a 0%, #1565c0 50%, #0097a7 100%);
            padding: 0.75rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 12px rgba(0,0,0,0.25);
        }
        .searchbar-form {
            display: flex;
            flex: 1;
            max-width: 700px;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .searchbar-input {
            flex: 1;
            padding: 0.7rem 1.2rem;
            border: none;
            outline: none;
            font-size: 0.9rem;
            background: #fff;
            color: #333;
        }
        .searchbar-select {
            padding: 0.7rem 1rem;
            border: none;
            border-left: 1px solid #e0e0e0;
            outline: none;
            font-size: 0.82rem;
            background: #f8f8f8;
            color: #444;
            cursor: pointer;
            min-width: 160px;
        }
        .searchbar-btn {
            background: var(--accent);
            color: #fff;
            border: none;
            padding: 0 1.4rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .searchbar-btn:hover { background: #e65100; }

        .searchbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-left: auto;
        }
        .searchbar-support {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 0.4rem 0.9rem;
        }
        .searchbar-support .support-icon { font-size: 1.6rem; color: #80deea; }
        .searchbar-support .support-label { font-size: 0.62rem; color: #80deea; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; }
        .searchbar-support .support-phone { font-size: 0.92rem; font-weight: 800; color: #fff; letter-spacing: 0.3px; }

        .searchbar-icon-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            color: rgba(255,255,255,0.9);
            font-size: 0.7rem;
            gap: 3px;
            cursor: pointer;
            transition: color 0.2s, transform 0.2s;
            text-decoration: none;
        }
        .searchbar-icon-group:hover { color: #fff; transform: translateY(-1px); }
        .searchbar-icon-group .icon {
            position: relative;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
            font-size: 1.15rem;
        }
        .searchbar-icon-group:hover .icon { background: rgba(255,255,255,0.2); }
        .searchbar-count {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--accent);
            color: #fff;
            font-size: 0.58rem;
            font-weight: 700;
            border-radius: 50%;
            width: 17px;
            height: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #1565c0;
        }

        /* ── Buttons ── */
        .btn { display: inline-block; padding: 0.5rem 1.2rem; border-radius: 6px; font-weight: 600; font-size: 0.9rem; cursor: pointer; border: none; transition: all 0.2s; }
        .btn-primary   { background: var(--blue); color: #fff; }
        .btn-primary:hover { background: var(--blue-dark); }
        .btn-accent    { background: var(--accent); color: #fff; }
        .btn-accent:hover { opacity: 0.9; }
        .btn-outline   { background: transparent; border: 2px solid rgba(255,255,255,0.5); color: #fff; }
        .btn-outline:hover { background: rgba(255,255,255,0.15); }
        .btn-danger    { background: var(--danger); color: #fff; }
        .btn-sm        { padding: 0.35rem 0.85rem; font-size: 0.82rem; }

        /* ── Alerts ── */
        .alert { padding: 0.85rem 1.2rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem; border-left: 4px solid; }
        .alert-success { background: #e8f5e9; border-color: var(--success); color: var(--success); }
        .alert-error   { background: #ffebee; border-color: var(--danger);  color: var(--danger); }
        .alert-info    { background: #e3f2fd; border-color: var(--blue);    color: var(--blue); }

        /* ── Container ── */
        .container    { max-width: 1200px; margin: 0 auto; padding: 0 1.25rem; }
        .page-content { padding: 2rem 0; }

        /* ── Cards ── */
        .card { background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); overflow: hidden; }
        .card-header { background: linear-gradient(135deg, var(--blue-dark), var(--blue)); color: #fff; padding: 1rem 1.5rem; font-size: 1rem; font-weight: 600; }
        .card-body { padding: 1.5rem; }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 0.75rem 1rem; text-align: left; border-bottom: 1px solid #eee; font-size: 0.9rem; }
        th { background: var(--gray-light); font-weight: 600; color: var(--blue-dark); }
        tr:hover td { background: #f9fbff; }

        /* ── Badge ── */
        .badge { display: inline-block; padding: 0.25rem 0.65rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; text-transform: capitalize; }
        .badge-success  { background: #e8f5e9; color: #2e7d32; }
        .badge-danger   { background: #ffebee; color: #c62828; }
        .badge-warning  { background: #fff3e0; color: #e65100; }
        .badge-info     { background: #e3f2fd; color: #1565c0; }
        .badge-primary  { background: #e8eaf6; color: #283593; }
        .badge-secondary{ background: #f5f5f5; color: #616161; }

        /* ── Footer ── */
        .footer-features { background: var(--blue); padding: 2rem; display: flex; justify-content: space-around; flex-wrap: wrap; gap: 1.5rem; margin-top: 3rem; }
        .footer-feature  { display: flex; align-items: flex-start; gap: 1rem; color: #fff; max-width: 200px; }
        .footer-feature-icon  { font-size: 2rem; flex-shrink: 0; opacity: 0.9; }
        .footer-feature-title { font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.2rem; }
        .footer-feature-sub   { font-size: 0.78rem; opacity: 0.8; }

        .footer-main {
            background: #fff;
            padding: 2.5rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr 1fr 1.3fr;
            gap: 2rem;
            border-top: 1px solid #eee;
        }
        .footer-col h4 { font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #111; margin-bottom: 1rem; }
        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 0.55rem; }
        .footer-col ul li a { font-size: 0.83rem; color: #555; transition: color 0.2s; }
        .footer-col ul li a:hover { color: var(--blue); }

        .footer-mpesa { background: #1a7a2e; color: #fff; padding: 0.6rem 1rem; border-radius: 6px; font-weight: 700; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 0.5rem; }
        .footer-till  { display: flex; gap: 4px; margin-bottom: 1.2rem; }
        .footer-till span { border: 2px solid #333; border-radius: 4px; width: 30px; height: 34px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1rem; color: #111; }

        .footer-contact-title { font-size: 1rem; font-weight: 700; color: #111; margin-bottom: 0.75rem; }
        .footer-contact-item  { display: flex; align-items: flex-start; gap: 8px; font-size: 0.83rem; color: #444; margin-bottom: 0.5rem; }
        .footer-contact-item strong { color: #111; }

        .footer-bottom { background: #f5f5f5; text-align: center; padding: 0.85rem; font-size: 0.78rem; color: #777; border-top: 1px solid #ddd; }
        .footer-bottom a { color: var(--blue); }
    </style>
    @yield('styles')
</head>
<body>

<!-- ══════════════════════════════════════════
     LAYER 1: Top Info Bar
══════════════════════════════════════════ -->
<div class="topbar">
    <div class="topbar-left">
        <a href="{{ route('repairs.create') }}">
            <i class="fa-solid fa-phone"></i> Contact Us
        </a>
        <a href="#">
            <i class="fa-regular fa-circle-question"></i> FAQs
        </a>
        <div class="topbar-location">
            <i class="fa-solid fa-location-dot"></i>
            Gaberon Plaza, NRB CBD, 4th Floor Shop No. A19
        </div>
    </div>
    <div class="topbar-right">
        @auth
            <a href="{{ route('orders.index') }}">
                <i class="fa-solid fa-box"></i> My Orders
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">
                <i class="fa-regular fa-user"></i> Login / Register
            </a>
        @endauth

    </div>
</div>

<!-- ══════════════════════════════════════════
     LAYER 2: Brand + Main Nav
══════════════════════════════════════════ -->
<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ asset('images/logo.png') }}" alt="Jerann Traders Logo">
        <div>
            <div class="brand-text">Jerann Traders</div>
            <div class="brand-sub">Tech &amp; Repair Hub</div>
        </div>
    </a>

    <div class="nav-links">
        <a href="{{ route('home') }}"           class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}">Shop</a>
        <a href="{{ route('repairs.create') }}" class="nav-link {{ request()->routeIs('about*') ? 'active' : '' }}">About Us</a>
        <a href="#"                             class="nav-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a>
        <a href="{{ route('repairs.create') }}" class="nav-link">Contact Us</a>
        <a href="{{ route('repairs.create') }}" class="nav-link nav-link-highlight">Request For Quotation</a>
        <div class="nav-link-divider"></div>
        <a href="{{ route('repairs.create') }}" class="nav-link">Request For Service</a>

        <!-- Social Icons -->
        <div class="nav-social">
            <a href="#" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" title="X / Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" title="Pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
            <a href="#" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#" title="Telegram"><i class="fa-brands fa-telegram"></i></a>
        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color:#ffd54f;">
                    <i class="fa-solid fa-gear"></i> Admin
                </a>
            @endif
        @endauth
    </div>
</nav>

<!-- ══════════════════════════════════════════
     LAYER 3: Search Bar
══════════════════════════════════════════ -->
<div class="searchbar">
    <form class="searchbar-form" action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" class="searchbar-input"
               placeholder="Search for products..."
               value="{{ request('search') }}">
        <select name="category" class="searchbar-select">
            <option value="">Select Category</option>
            <option value="printers"    {{ request('category') == 'printers'    ? 'selected' : '' }}>Printers</option>
            <option value="laptops"     {{ request('category') == 'laptops'     ? 'selected' : '' }}>Laptops</option>
            <option value="tablets"     {{ request('category') == 'tablets'     ? 'selected' : '' }}>Tablets</option>
            <option value="inks"        {{ request('category') == 'inks'        ? 'selected' : '' }}>Toner & Inks</option>
            <option value="accessories" {{ request('category') == 'accessories' ? 'selected' : '' }}>Accessories</option>
        </select>
        <button type="submit" class="searchbar-btn">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <div class="searchbar-right">
        <!-- 24/7 Support -->
        <div class="searchbar-support">
            <i class="fa-solid fa-headset support-icon"></i>
            <div>
                <div class="support-label">24/7 Support</div>
                <div class="support-phone">0702 939 491</div>
            </div>
        </div>

        <!-- Compare -->
        <a href="#" class="searchbar-icon-group">
            <div class="icon">
                <i class="fa-solid fa-arrows-rotate"></i>
                <span class="searchbar-count">0</span>
            </div>
            <span>Compare</span>
        </a>

        <!-- Wishlist -->
        <a href="#" class="searchbar-icon-group">
            <div class="icon">
                <i class="fa-regular fa-heart"></i>
                <span class="searchbar-count">0</span>
            </div>
            <span>Wishlist</span>
        </a>

        <!-- Cart -->
        @php
            $cartCount = auth()->check()
                ? \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity')
                : 0;
            $cartTotal = auth()->check()
                ? \App\Models\CartItem::where('user_id', auth()->id())
                    ->join('products','cart_items.product_id','=','products.id')
                    ->sum(\Illuminate\Support\Facades\DB::raw('cart_items.quantity * products.price'))
                : 0;
        @endphp
        <a href="{{ auth()->check() ? route('cart.index') : route('login') }}" class="searchbar-icon-group">
            <div class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="searchbar-count">{{ $cartCount }}</span>
            </div>
            <span>KSH {{ number_format($cartTotal) }}</span>
        </a>
    </div>
</div>

<!-- ══ Page Content ══ -->
<div class="container page-content">
    @if(session('success'))
        <div class="alert alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error"><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<!-- ── Footer Features Bar ── -->
<div class="footer-features">
    <div class="footer-feature">
        <div class="footer-feature-icon"><i class="fa-solid fa-truck-fast"></i></div>
        <div>
            <div class="footer-feature-title">Countrywide Delivery</div>
            <div class="footer-feature-sub">We dispatch immediately</div>
        </div>
    </div>
    <div class="footer-feature">
        <div class="footer-feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <div>
            <div class="footer-feature-title">Secure Payment</div>
            <div class="footer-feature-sub">100% Secure</div>
        </div>
    </div>
    <div class="footer-feature">
        <div class="footer-feature-icon"><i class="fa-solid fa-headset"></i></div>
        <div>
            <div class="footer-feature-title">24/7 Support</div>
            <div class="footer-feature-sub">Unlimited help desk</div>
        </div>
    </div>
    <div class="footer-feature">
        <div class="footer-feature-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div>
            <div class="footer-feature-title">100% Safe</div>
            <div class="footer-feature-sub">View our benefits</div>
        </div>
    </div>
    <div class="footer-feature">
        <div class="footer-feature-icon"><i class="fa-solid fa-box-open"></i></div>
        <div>
            <div class="footer-feature-title">Free Returns</div>
            <div class="footer-feature-sub">Track or cancel orders</div>
        </div>
    </div>
</div>

<!-- ── Footer Main ── -->
<div class="footer-main">
    <div class="footer-col">
        <h4>Quick Links</h4>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('products.index') }}">Shop</a></li>
            <li><a href="{{ route('repairs.create') }}">Request For Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Shipping Policy</a></li>
            <li><a href="#">Refund &amp; Returns Policy</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Printers &amp; Photocopiers</h4>
        <ul>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">All Printers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">Kyocera Printers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">HP Printers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">Canon Printers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">Epson Printers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'printers']) }}">Brother Printers</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Toner Cartridges</h4>
        <ul>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">Kyocera Toners</a></li>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">Ricoh Toners</a></li>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">HP Toners</a></li>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">Xerox Toners</a></li>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">Canon Toners</a></li>
            <li><a href="{{ route('products.index', ['category' => 'inks']) }}">Epson Inks</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Spares &amp; Consumables</h4>
        <ul>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">Drum Units</a></li>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">Fuser Units</a></li>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">OPC Drums</a></li>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">Rollers</a></li>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">Fuser Films</a></li>
            <li><a href="{{ route('products.index', ['category' => 'accessories']) }}">Developers</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Pay Easily via M-Pesa</h4>
        <div class="footer-mpesa">🟢 LIPA NA M-PESA</div>
        <p style="font-size:0.72rem;color:#666;margin-bottom:0.4rem;">BUY GOODS TILL NUMBER</p>
        <div class="footer-till">
            @foreach(str_split('522522') as $d)
                <span>{{ $d }}</span>
            @endforeach
        </div>

        <div class="footer-contact-title">Get In Touch</div>
        <div class="footer-contact-item"><strong>Jerann Trade Ltd</strong></div>
        <div class="footer-contact-item">
            <i class="fa-solid fa-location-dot" style="color:var(--blue);margin-top:2px;"></i>
            Gaberon Plaza, NRB CBD, 4th Floor Shop No. A19
        </div>
        <div class="footer-contact-item">
            <i class="fa-solid fa-phone" style="color:var(--blue);margin-top:2px;"></i>
            <a href="tel:0702939491" style="color:var(--blue);">0702 939 491</a>
        </div>
        <div class="footer-contact-item">
            <i class="fa-solid fa-envelope" style="color:var(--blue);margin-top:2px;"></i>
            <a href="mailto:info@jeranntraders.com" style="color:var(--blue);">info@jeranntraders.com</a>
        </div>
    </div>
</div>

<!-- ── Footer Bottom ── -->
<div class="footer-bottom">
    &copy; {{ date('Y') }} <strong>Jerann Traders</strong> — All Rights Reserved &nbsp;|&nbsp;
    Developed by <a href="https://ngwasidaniel.vercel.app/" target="_blank" rel="noopener">Dantechdevs</a>
</div>

@yield('scripts')
</body>
</html>