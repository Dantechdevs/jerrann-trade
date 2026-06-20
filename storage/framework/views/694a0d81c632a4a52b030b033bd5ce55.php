<?php $__env->startSection('title', 'Jerann Traders – Printers, Laptops & Repair Services'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .container { max-width: 1200px; margin: 0 auto; padding: 0 1.25rem; }

    /* ── Hero Slider ── */
    .hero {
        background: linear-gradient(135deg, #0d3e7a 0%, #1565c0 55%, #00acc1 100%);
        color: #fff;
        padding: 5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-bottom: 0;
    }
    .hero::before {
        content: '';
        position: absolute;
        top: -50%; left: -20%;
        width: 140%; height: 200%;
        background: radial-gradient(ellipse at center, rgba(255,255,255,0.08) 0%, transparent 70%);
    }
    .hero h1  { font-size: 2.8rem; font-weight: 800; margin-bottom: 1rem; position: relative; }
    .hero p   { font-size: 1.1rem; color: rgba(255,255,255,0.85); max-width: 600px; margin: 0 auto 2rem; position: relative; }
    .hero-btns { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; position: relative; }
    .btn-hero-primary { background: #f57c00; color: #fff; padding: 0.8rem 2.2rem; border-radius: 6px; font-weight: 700; font-size: 1rem; transition: opacity 0.2s; }
    .btn-hero-primary:hover { opacity: 0.9; }
    .btn-hero-outline { background: transparent; border: 2px solid rgba(255,255,255,0.7); color: #fff; padding: 0.8rem 2.2rem; border-radius: 6px; font-weight: 700; font-size: 1rem; transition: background 0.2s; }
    .btn-hero-outline:hover { background: rgba(255,255,255,0.15); }

    /* ── Category Stats Bar ── */
    .cat-stats {
        background: #fff;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: center;
        gap: 0;
    }
    .cat-stat {
        padding: 1.2rem 2.5rem;
        text-align: center;
        border-right: 1px solid #eee;
        cursor: pointer;
        transition: color 0.2s;
        text-decoration: none;
        color: #333;
    }
    .cat-stat:last-child { border-right: none; }
    .cat-stat:hover { color: #1565c0; }
    .cat-stat-name { font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .cat-stat-count { font-size: 0.78rem; color: #888; margin-top: 2px; }

    /* ── Section Title ── */
    .section-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #111;
        margin-bottom: 0.5rem;
    }
    .section-underline {
        width: 60px;
        height: 3px;
        background: #1565c0;
        border-radius: 2px;
        margin-bottom: 2rem;
    }

    /* ── Product Grid ── */
    .section-wrap { padding: 3rem 0; }
    .product-row {
        display: grid;
        gap: 1px;
        background: #eee;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }
    .product-row-5 { grid-template-columns: 1fr repeat(5, 1fr); }
    .product-row-4 { grid-template-columns: repeat(5, 1fr); }

    /* Banner+products layout */
    .section-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 1px;
        background: #eee;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 0;
    }
    .section-banner {
        background: #e8f5e9;
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-height: 420px;
        position: relative;
        overflow: hidden;
    }
    .section-banner img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; }
    .section-banner-overlay {
        position: relative;
        z-index: 1;
        background: linear-gradient(0deg, rgba(0,0,0,0.65) 0%, transparent 100%);
        margin: -2rem -1.5rem;
        padding: 2rem 1.5rem;
    }
    .section-banner-tag { font-size: 0.7rem; color: rgba(255,255,255,0.8); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem; }
    .section-banner-title { font-size: 1.6rem; font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 0.3rem; }
    .section-banner-sub { font-size: 0.82rem; color: rgba(255,255,255,0.75); }
    .section-products { display: grid; grid-template-columns: repeat(4, 1fr); background: #fff; }

    /* ── Product Card ── */
    .pcard {
        background: #fff;
        padding: 1.2rem;
        display: flex;
        flex-direction: column;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
        position: relative;
        transition: box-shadow 0.2s;
    }
    .pcard:hover { box-shadow: inset 0 0 0 2px #1565c0; z-index: 1; }
    .pcard-badge-wrap { position: absolute; top: 0.6rem; left: 0.6rem; display: flex; flex-direction: column; gap: 3px; z-index: 2; }
    .pcard-badge-discount { background: #1565c0; color: #fff; font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 3px; }
    .pcard-badge-hot { background: #e53935; color: #fff; font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 3px; }
    .pcard-badge-new { background: #43a047; color: #fff; font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 3px; }
    .pcard-img {
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.8rem;
        overflow: hidden;
    }
    .pcard-img img { max-height: 150px; max-width: 100%; object-fit: contain; }
    .pcard-img .no-img { font-size: 3.5rem; }
    .pcard-actions {
        position: absolute;
        right: 0.6rem;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 6px;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .pcard:hover .pcard-actions { opacity: 1; }
    .pcard-action-btn {
        width: 34px; height: 34px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #eee;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.9rem;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        transition: background 0.2s;
        text-decoration: none;
        color: #333;
    }
    .pcard-action-btn:hover { background: #1565c0; color: #fff; border-color: #1565c0; }
    .pcard-name { font-size: 0.85rem; font-weight: 600; color: #111; margin-bottom: 0.25rem; line-height: 1.3; }
    .pcard-cat { font-size: 0.72rem; color: #aaa; margin-bottom: 0.5rem; }
    .pcard-prices { margin-bottom: 0.7rem; }
    .pcard-old-price { font-size: 0.75rem; color: #bbb; text-decoration: line-through; }
    .pcard-price { font-size: 1rem; font-weight: 800; color: #1565c0; }
    .pcard-buy-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: #1565c0;
        color: #fff;
        padding: 0.5rem;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        border: none;
        cursor: pointer;
        width: 100%;
        transition: background 0.2s;
        margin-top: auto;
    }
    .pcard-buy-btn:hover { background: #0d3e7a; }

    /* ── Simple 5-col product grid (no banner) ── */
    .products-5col {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        background: #eee;
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        gap: 1px;
    }
    .view-all-btn {
        display: block;
        text-align: center;
        margin: 1.5rem auto 0;
        border: 2px solid #1565c0;
        color: #1565c0;
        padding: 0.65rem 2.5rem;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.88rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        width: fit-content;
        transition: all 0.2s;
    }
    .view-all-btn:hover { background: #1565c0; color: #fff; }

    /* ── Promo Banner ── */
    .promo-banner {
        background: #1565c0;
        padding: 1.5rem 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin: 3rem 0;
        border-radius: 8px;
    }
    .promo-banner-left { display: flex; align-items: center; gap: 1.2rem; color: #fff; }
    .promo-banner-icon { font-size: 2.5rem; }
    .promo-banner-text { font-size: 1.1rem; font-weight: 700; }
    .promo-banner-sub { font-size: 0.82rem; color: rgba(255,255,255,0.8); }
    .promo-banner-right { display: flex; align-items: center; gap: 1rem; }
    .promo-social-btn {
        width: 36px; height: 36px;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.4);
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        font-size: 0.9rem;
        text-decoration: none;
        transition: background 0.2s;
    }
    .promo-social-btn:hover { background: rgba(255,255,255,0.2); }
    .promo-social-label { color: rgba(255,255,255,0.8); font-size: 0.82rem; font-weight: 600; }

    /* ── FAQ Section ── */
    .faq-section { padding: 3rem 0; }
    .faq-layout { display: grid; grid-template-columns: 280px 1fr; gap: 3rem; align-items: start; }
    .faq-img { font-size: 8rem; text-align: center; }
    .faq-title { font-size: 1.6rem; font-weight: 800; color: #111; margin-bottom: 1rem; text-align: center; }
    .faq-item { border-bottom: 1px solid #e0e0e0; }
    .faq-question {
        width: 100%; background: none; border: none; text-align: left;
        padding: 1rem 0; font-size: 0.95rem; font-weight: 600; color: #222;
        cursor: pointer; display: flex; justify-content: space-between; align-items: center;
    }
    .faq-question.open { color: #1565c0; }
    .faq-answer { padding: 0 0 1rem; font-size: 0.88rem; color: #555; display: none; line-height: 1.6; }
    .faq-answer.open { display: block; }

    /* ── Reviews ── */
    .reviews-section { padding: 3rem 0; background: #f9f9f9; }
    .reviews-layout { display: grid; grid-template-columns: 260px 1fr; gap: 2rem; align-items: start; }
    .rating-card { background: #fff; border-radius: 10px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06); margin-bottom: 1rem; }
    .rating-card-header { font-size: 1rem; font-weight: 700; color: #111; margin-bottom: 1rem; }
    .rating-item { display: flex; align-items: center; gap: 1rem; background: #f5f5f5; border-radius: 8px; padding: 0.8rem; margin-bottom: 0.8rem; }
    .rating-circle { width: 50px; height: 50px; border-radius: 50%; border: 3px solid #1565c0; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; font-weight: 800; color: #1565c0; flex-shrink: 0; }
    .rating-label { font-size: 0.78rem; color: #888; }
    .rating-platform { font-weight: 700; color: #333; font-size: 0.9rem; }
    .reviews-right { }
    .reviews-header { text-align: center; margin-bottom: 1.5rem; }
    .reviews-excellent { font-size: 1.3rem; font-weight: 800; letter-spacing: 2px; color: #111; }
    .reviews-stars { font-size: 1.8rem; color: #f9a825; margin: 0.3rem 0; }
    .reviews-count { font-size: 0.82rem; color: #666; }
    .reviews-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .review-card { background: #fff; border-radius: 10px; padding: 1.2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    .review-top { display: flex; align-items: center; gap: 0.8rem; margin-bottom: 0.75rem; }
    .review-avatar { width: 40px; height: 40px; border-radius: 50%; background: #e3f2fd; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
    .review-name { font-weight: 700; font-size: 0.88rem; color: #111; }
    .review-date { font-size: 0.72rem; color: #aaa; }
    .review-stars { font-size: 0.9rem; color: #f9a825; }
    .review-text { font-size: 0.82rem; color: #555; line-height: 1.5; }

    /* ── Brands ── */
    .brands-section { padding: 3rem 0; }
    .brands-layout { display: grid; grid-template-columns: 280px 1fr; gap: 3rem; align-items: center; }
    .brands-grid { display: grid; grid-template-columns: repeat(4, 1fr); border: 1px solid #eee; }
    .brand-cell {
        padding: 1.2rem;
        text-align: center;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
        font-weight: 600;
        color: #444;
        font-size: 0.9rem;
        transition: color 0.2s, background 0.2s;
        cursor: pointer;
    }
    .brand-cell:hover { color: #1565c0; background: #f0f7ff; }
    .brand-cell:nth-child(4n) { border-right: none; }

    /* ── Payment & Social Footer ── */
    .pay-social-bar {
        background: #fff;
        border-top: 1px solid #eee;
        padding: 1.2rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .pay-label { font-size: 0.82rem; font-weight: 700; color: #333; margin-bottom: 0.5rem; }
    .pay-icons { display: flex; gap: 0.5rem; flex-wrap: wrap; }
    .pay-icon { padding: 0.3rem 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 0.78rem; font-weight: 700; color: #444; }
    .pay-icon.mpesa { background: #4caf50; color: #fff; border-color: #4caf50; }
    .pay-icon.visa { background: #1a1f71; color: #fff; border-color: #1a1f71; }
    .pay-icon.mastercard { background: #eb001b; color: #fff; border-color: #eb001b; }
    .pay-icon.paypal { background: #003087; color: #fff; border-color: #003087; }
    .pay-icon.airtel { background: #e60000; color: #fff; border-color: #e60000; }
    .social-icons { display: flex; gap: 0.5rem; }
    .social-icon {
        width: 36px; height: 36px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.9rem;
        text-decoration: none;
        color: #fff;
        transition: opacity 0.2s;
    }
    .social-icon:hover { opacity: 0.85; }
    .si-fb { background: #1877f2; }
    .si-ig { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
    .si-yt { background: #ff0000; }
    .si-li { background: #0077b5; }
    .si-wa { background: #25d366; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $products = \App\Models\Product::active()->with('category')->latest()->limit(20)->get();
    $printers   = $products->filter(fn($p) => optional($p->category)->slug === 'printers')->take(5);
    $toners     = $products->filter(fn($p) => optional($p->category)->slug === 'inks')->take(4);
    $laptops    = $products->filter(fn($p) => optional($p->category)->slug === 'laptops')->take(5);
    $spares     = $products->filter(fn($p) => optional($p->category)->slug === 'accessories')->take(4);
    $newIn      = $products->take(5);
?>

<!-- ══ HERO ══ -->
<div class="hero">
    <h1>🖨️ Your Tech Partner in Nairobi</h1>
    <p>Quality printers, laptops, tablets, inks & accessories — plus expert repair services for all your devices.</p>
    <div class="hero-btns">
        <a href="<?php echo e(route('products.index')); ?>" class="btn-hero-primary">Shop Now</a>
        <a href="<?php echo e(route('repairs.create')); ?>" class="btn-hero-outline">Book a Repair</a>
    </div>
</div>

<!-- ══ CATEGORY STATS BAR ══ -->
<div class="cat-stats">
    <a href="<?php echo e(route('products.index', ['category'=>'printers'])); ?>" class="cat-stat">
        <div class="cat-stat-name">Printers</div>
        <div class="cat-stat-count"><?php echo e(\App\Models\Product::whereHas('category', fn($q)=>$q->where('slug','printers'))->count()); ?> Products</div>
    </a>
    <a href="<?php echo e(route('products.index', ['category'=>'inks'])); ?>" class="cat-stat">
        <div class="cat-stat-name">Toners</div>
        <div class="cat-stat-count"><?php echo e(\App\Models\Product::whereHas('category', fn($q)=>$q->where('slug','inks'))->count()); ?> Products</div>
    </a>
    <a href="<?php echo e(route('products.index', ['category'=>'laptops'])); ?>" class="cat-stat">
        <div class="cat-stat-name">Laptops</div>
        <div class="cat-stat-count"><?php echo e(\App\Models\Product::whereHas('category', fn($q)=>$q->where('slug','laptops'))->count()); ?> Products</div>
    </a>
    <a href="<?php echo e(route('products.index', ['category'=>'accessories'])); ?>" class="cat-stat">
        <div class="cat-stat-name">Spare Parts</div>
        <div class="cat-stat-count"><?php echo e(\App\Models\Product::whereHas('category', fn($q)=>$q->where('slug','accessories'))->count()); ?> Products</div>
    </a>
</div>

<div class="container">

    <!-- ══ BEST SELLERS ══ -->
    <div class="section-wrap">
        <div class="section-title">Best Seller Copiers &amp; Printers</div>
        <div class="section-underline"></div>
        <div class="products-5col">
            <?php $__empty_1 = true; $__currentLoopData = $printers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('home._pcard', ['product'=>$product, 'hot'=>true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php for($i=0;$i<5;$i++): ?>
            <div class="pcard"><div class="pcard-img"><div class="no-img">🖨️</div></div><div class="pcard-name">Kyocera Printer</div><div class="pcard-cat">Printers</div><div class="pcard-price">KES 85,000</div></div>
            <?php endfor; ?>
            <?php endif; ?>
        </div>
        <a href="<?php echo e(route('products.index', ['category'=>'printers'])); ?>" class="view-all-btn">VIEW ALL PRINTERS ➜</a>
    </div>

    <!-- ══ NEW IN STOCK ══ -->
    <div class="section-wrap" style="padding-top:0;">
        <div class="section-title">New In Stock</div>
        <div class="section-underline"></div>
        <div class="products-5col">
            <?php $__empty_1 = true; $__currentLoopData = $newIn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('home._pcard', ['product'=>$product, 'new'=>true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php for($i=0;$i<5;$i++): ?>
            <div class="pcard"><div class="pcard-img"><div class="no-img">📦</div></div><div class="pcard-name">New Product</div><div class="pcard-price">KES 12,500</div></div>
            <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- ══ PRINTERS SECTION WITH BANNER ══ -->
    <div class="section-wrap" style="padding-top:0;">
        <div class="section-title">Multifunctional Photocopiers and Printers</div>
        <div class="section-underline"></div>
        <div class="section-layout">
            <div class="section-banner" style="background:#1a7a2e;">
                <img src="<?php echo e(asset('images/banners/banner-printers.png')); ?>" alt="Printers Banner">
                <div class="section-banner-overlay">
                    <div class="section-banner-tag">With Warranty</div>
                    <div class="section-banner-title">New and Refurbished</div>
                    <div class="section-banner-sub">For Business, Schools, Offices &amp; More</div>
                    <a href="<?php echo e(route('products.index', ['category'=>'printers'])); ?>" style="display:inline-block;margin-top:0.8rem;border:2px solid #fff;color:#fff;padding:0.4rem 1.2rem;border-radius:4px;font-size:0.8rem;font-weight:700;">SHOP NOW ➜</a>
                </div>
            </div>
            <div class="section-products">
                <?php $__empty_1 = true; $__currentLoopData = $printers->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('home._pcard', ['product'=>$product, 'hot'=>true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php for($i=0;$i<4;$i++): ?>
                <div class="pcard"><div class="pcard-img"><div class="no-img">🖨️</div></div><div class="pcard-name">Kyocera Printer</div><div class="pcard-price">KES 90,000</div></div>
                <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ══ PROMO SHARE BANNER ══ -->
    <div class="promo-banner">
        <div class="promo-banner-left">
            <div class="promo-banner-icon">🏷️</div>
            <div>
                <div class="promo-banner-text">Share our website and get a 10% discount on all products.</div>
                <div class="promo-banner-sub">Simply click on the social icons and share the site</div>
            </div>
        </div>
        <div class="promo-banner-right">
            <div class="promo-social-label">Follow us on:</div>
            <a href="#" class="promo-social-btn">f</a>
            <a href="#" class="promo-social-btn">𝕏</a>
            <a href="#" class="promo-social-btn">in</a>
            <a href="#" class="promo-social-btn">✈</a>
        </div>
    </div>

    <!-- ══ TONER CARTRIDGES WITH BANNER ══ -->
    <div class="section-wrap" style="padding-top:0;">
        <div class="section-title">Toner Cartridges &amp; Refills</div>
        <div class="section-underline"></div>
        <div class="section-layout">
            <div class="section-banner" style="background:#c8956c;">
                <img src="<?php echo e(asset('images/banners/banner-toners.png')); ?>" alt="Toners Banner">
                <div class="section-banner-overlay">
                    <div class="section-banner-tag">Upto 25% off</div>
                    <div class="section-banner-title">Genuine, High-Quality Toners</div>
                    <div class="section-banner-sub">Delivered where you are</div>
                    <a href="<?php echo e(route('products.index', ['category'=>'inks'])); ?>" style="display:inline-block;margin-top:0.8rem;border:2px solid #fff;color:#fff;padding:0.4rem 1.2rem;border-radius:4px;font-size:0.8rem;font-weight:700;">SHOP NOW ➜</a>
                </div>
            </div>
            <div class="section-products">
                <?php $__empty_1 = true; $__currentLoopData = $toners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('home._pcard', ['product'=>$product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php for($i=0;$i<4;$i++): ?>
                <div class="pcard"><div class="pcard-img"><div class="no-img">🖊️</div></div><div class="pcard-name">Kyocera TK Toner</div><div class="pcard-price">KES 7,500</div></div>
                <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ══ LAPTOPS ══ -->
    <div class="section-wrap" style="padding-top:0;">
        <div class="section-title">Computers &amp; Laptops</div>
        <div class="section-underline"></div>
        <div class="products-5col">
            <?php $__empty_1 = true; $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('home._pcard', ['product'=>$product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php for($i=0;$i<5;$i++): ?>
            <div class="pcard"><div class="pcard-img"><div class="no-img">💻</div></div><div class="pcard-name">HP ProBook Laptop</div><div class="pcard-price">KES 38,000</div></div>
            <?php endfor; ?>
            <?php endif; ?>
        </div>
        <a href="<?php echo e(route('products.index', ['category'=>'laptops'])); ?>" class="view-all-btn">VIEW ALL COMPUTERS ➜</a>
    </div>

    <!-- ══ SPARE PARTS WITH BANNER ══ -->
    <div class="section-wrap" style="padding-top:0;">
        <div class="section-title">Spare Parts</div>
        <div class="section-underline"></div>
        <div class="section-layout">
            <div class="section-banner" style="background:#7ec8c0;">
                <img src="<?php echo e(asset('images/banners/banner-spares.png')); ?>" alt="Spares Banner">
                <div class="section-banner-overlay">
                    <div class="section-banner-tag">Top Quality</div>
                    <div class="section-banner-title">Spares for your Copier</div>
                    <div class="section-banner-sub">Best Prices</div>
                    <a href="<?php echo e(route('products.index', ['category'=>'accessories'])); ?>" style="display:inline-block;margin-top:0.8rem;border:2px solid #fff;color:#fff;padding:0.4rem 1.2rem;border-radius:4px;font-size:0.8rem;font-weight:700;">SHOP NOW ➜</a>
                </div>
            </div>
            <div class="section-products">
                <?php $__empty_1 = true; $__currentLoopData = $spares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php echo $__env->make('home._pcard', ['product'=>$product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php for($i=0;$i<4;$i++): ?>
                <div class="pcard"><div class="pcard-img"><div class="no-img">⚙️</div></div><div class="pcard-name">Fuser Unit</div><div class="pcard-price">KES 15,000</div></div>
                <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ══ FAQ ══ -->
    <div class="faq-section">
        <div class="faq-title">Frequently Asked Questions</div>
        <div class="faq-layout">
            <div class="faq-img"><img src="<?php echo e(asset('images/banners/faq-illustration.png')); ?>" alt="FAQ" style="width:100%;max-width:260px;"></div>
            <div>
                <?php $__currentLoopData = [
                    ['Do you have Warranty?', 'Yes. We provide 12 months warranty for new printers and copiers, and 6 months warranty for refurbished printers and copiers.'],
                    ['How long do you take to deliver?', 'For Nairobi CBD orders, we deliver same day. Countrywide deliveries typically take 1–3 business days via courier.'],
                    ['What is the difference Between New and Refurbished?', 'New products are brand new in box. Refurbished are professionally restored to full working condition and tested before sale — they come with a warranty.'],
                    ['Do you have technicians?', 'Yes. We have qualified technicians available for on-site repairs, servicing, and installation of printers and photocopiers.'],
                    ['So what happens after I place my order?', 'You will receive an order confirmation via email or WhatsApp. Our team will then contact you to arrange delivery or pickup.'],
                    ['Can I pay on delivery?', 'Yes, we accept M-Pesa, cash on delivery, and bank transfers. M-Pesa Till: 522522.'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$q, $a]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        <?php echo e($q); ?> <span>＋</span>
                    </button>
                    <div class="faq-answer"><?php echo e($a); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- ══ REVIEWS ══ -->
    <div class="section-wrap">
        <div class="section-title" style="text-align:center;justify-content:center;">WHAT OUR CUSTOMERS SAY</div>
        <div class="section-underline" style="margin:0 auto 2rem;"></div>
        <div class="reviews-layout">
            <div>
                <div class="rating-card">
                    <div class="rating-card-header">We have Great Ratings</div>
                    <div class="rating-item">
                        <div class="rating-circle">4.8</div>
                        <div>
                            <div class="rating-label">Star Rating</div>
                            <div class="rating-platform">On Google</div>
                        </div>
                    </div>
                    <div class="rating-item">
                        <div class="rating-circle">4.6</div>
                        <div>
                            <div class="rating-label">Star Rating</div>
                            <div class="rating-platform">On Facebook</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="reviews-header">
                    <div class="reviews-excellent">EXCELLENT</div>
                    <div class="reviews-stars">★★★★½</div>
                    <div class="reviews-count">Based on customer reviews</div>
                </div>
                <div class="reviews-grid">
                    <?php $__currentLoopData = [
                        ['👤','James M.','1 month ago','★★★★★','Fast delivery and genuine Kyocera toner. Will definitely order again!'],
                        ['👤','Faith W.','2 months ago','★★★★★','Got my HP laptop repaired here. Very professional team and fair pricing.'],
                        ['👤','Peter O.','3 months ago','★★★★☆','Good prices on toners. Delivery to Mombasa was done in 2 days.'],
                        ['👤','Grace N.','1 week ago','★★★★★','Best place for printer supplies in Nairobi CBD. Very knowledgeable staff.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$av,$name,$date,$stars,$text]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="review-card">
                        <div class="review-top">
                            <div class="review-avatar"><?php echo e($av); ?></div>
                            <div>
                                <div class="review-name"><?php echo e($name); ?></div>
                                <div class="review-date"><?php echo e($date); ?></div>
                            </div>
                        </div>
                        <div class="review-stars"><?php echo e($stars); ?></div>
                        <div class="review-text"><?php echo e($text); ?></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ══ BRANDS ══ -->
    <div class="brands-section">
        <div class="brands-layout">
            <div>
                <div class="section-title">Brands We Distribute</div>
                <div class="section-underline"></div>
            </div>
            <div class="brands-grid">
                <?php $__currentLoopData = ['Xerox','Toshiba','Sharp','HP','Canon','Konica Minolta','Kyocera','Ricoh','Epson','Brother','Samsung','Panasonic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index', ['search'=>$brand])); ?>" class="brand-cell"><?php echo e($brand); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div><!-- /container -->

<!-- ══ PAYMENT & SOCIAL BAR ══ -->
<div class="pay-social-bar" style="padding: 1.2rem 2rem;">
    <div>
        <div class="pay-label">Payment System:</div>
        <div class="pay-icons">
            <span class="pay-icon visa">VISA</span>
            <span class="pay-icon mastercard">Mastercard</span>
            <span class="pay-icon paypal">PayPal</span>
            <span class="pay-icon mpesa">M-PESA</span>
            <span class="pay-icon airtel">Airtel Money</span>
        </div>
    </div>
    <div>
        <div class="pay-label">Our Social Links:</div>
        <div class="social-icons">
            <a href="#" class="social-icon si-fb">f</a>
            <a href="#" class="social-icon si-ig">📷</a>
            <a href="#" class="social-icon si-yt">▶</a>
            <a href="#" class="social-icon si-li">in</a>
            <a href="#" class="social-icon si-wa">💬</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const icon = btn.querySelector('span');
    const isOpen = answer.classList.contains('open');
    document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
    document.querySelectorAll('.faq-question').forEach(b => { b.classList.remove('open'); b.querySelector('span').textContent = '＋'; });
    if (!isOpen) {
        answer.classList.add('open');
        btn.classList.add('open');
        icon.textContent = '－';
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/home/index.blade.php ENDPATH**/ ?>