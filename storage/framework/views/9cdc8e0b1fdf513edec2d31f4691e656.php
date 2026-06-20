<?php $__env->startSection('title', $product->name . ' – Jerann Traders'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .container { max-width: 1200px; margin: 0 auto; padding: 0 1.25rem; }

    /* Breadcrumb */
    .breadcrumb {
        font-size: 0.82rem; color: #888;
        padding: 0.9rem 0;
        display: flex; align-items: center; gap: 0.4rem; flex-wrap: wrap;
    }
    .breadcrumb a { color: #555; transition: color 0.2s; }
    .breadcrumb a:hover { color: #1565c0; }
    .breadcrumb-sep { color: #ccc; }

    /* Product Layout */
    .product-wrap {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        padding: 1.5rem 0 2.5rem;
    }
    @media(max-width:768px){ .product-wrap { grid-template-columns: 1fr; gap: 1.5rem; } }

    /* Image */
    .product-img-main {
        border: 1px solid #eee;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        min-height: 380px; background: #fafafa; position: relative; overflow: hidden;
    }
    .product-img-main img { max-height: 360px; max-width: 100%; object-fit: contain; padding: 1.5rem; }
    .product-img-main .no-img { font-size: 6rem; }
    .product-discount-badge {
        position: absolute; top: 12px; right: 12px;
        background: #1565c0; color: #fff;
        font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 4px;
    }
    .product-img-zoom {
        position: absolute; bottom: 10px; left: 10px;
        background: rgba(0,0,0,0.45); color: #fff; border: none;
        border-radius: 50%; width: 32px; height: 32px;
        font-size: 1rem; cursor: pointer; display: flex; align-items: center; justify-content: center;
    }
    .thumb-row { display: flex; gap: 8px; margin-top: 10px; }
    .thumb {
        width: 70px; height: 70px; border: 2px solid #eee; border-radius: 6px;
        overflow: hidden; cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: border-color 0.2s;
    }
    .thumb:hover, .thumb.active { border-color: #1565c0; }
    .thumb img { max-width: 100%; max-height: 100%; object-fit: contain; padding: 4px; }

    /* Info */
    .product-nav { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; }
    .product-nav a {
        width: 28px; height: 28px; border: 1px solid #ddd; border-radius: 4px;
        display: flex; align-items: center; justify-content: center;
        color: #555; font-size: 0.8rem; transition: background 0.2s; text-decoration: none;
    }
    .product-nav a:hover { background: #f5f5f5; }
    .product-title { font-size: 1.6rem; font-weight: 800; color: #111; line-height: 1.3; margin-bottom: 1rem; }

    .product-price-row { display: flex; align-items: baseline; gap: 0.75rem; margin-bottom: 0.75rem; flex-wrap: wrap; }
    .product-old-price { font-size: 1rem; color: #bbb; text-decoration: line-through; }
    .product-price { font-size: 1.8rem; font-weight: 900; color: #1565c0; }

    .product-desc-short {
        font-size: 0.86rem; color: #555; line-height: 1.7;
        margin-bottom: 1.2rem; padding-bottom: 1.2rem; border-bottom: 1px solid #eee;
    }

    /* Qty */
    .qty-label { font-size: 0.82rem; color: #333; margin-bottom: 0.4rem; font-weight: 600; }
    .qty-row { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.9rem; flex-wrap: wrap; }
    .qty-control { display: flex; align-items: center; border: 1px solid #ddd; border-radius: 6px; overflow: hidden; }
    .qty-btn {
        width: 36px; height: 44px; background: #f5f5f5; border: none;
        font-size: 1.1rem; cursor: pointer; transition: background 0.2s; color: #333;
        display: flex; align-items: center; justify-content: center;
    }
    .qty-btn:hover { background: #e0e0e0; }
    .qty-input { width: 52px; height: 44px; border: none; border-left: 1px solid #ddd; border-right: 1px solid #ddd; text-align: center; font-size: 1rem; font-weight: 600; outline: none; color: #111; }
    .btn-add-cart {
        background: #1565c0; color: #fff; border: none;
        padding: 0 1.6rem; height: 44px; border-radius: 6px;
        font-size: 0.88rem; font-weight: 700; cursor: pointer;
        transition: background 0.2s; display: inline-flex; align-items: center; gap: 6px;
    }
    .btn-add-cart:hover { background: #0d3e7a; }
    .btn-buy-now {
        background: #1565c0; color: #fff; border: none;
        padding: 0 1.6rem; height: 44px; border-radius: 6px;
        font-size: 0.88rem; font-weight: 700; cursor: pointer;
        transition: opacity 0.2s; display: inline-flex; align-items: center; gap: 6px;
        text-decoration: none;
    }
    .btn-buy-now:hover { opacity: 0.88; }
    .btn-whatsapp {
        display: inline-flex; align-items: center; gap: 8px;
        background: #25d366; color: #fff; border: none;
        padding: 0 1.8rem; height: 44px; border-radius: 6px;
        font-size: 0.88rem; font-weight: 700; cursor: pointer;
        text-decoration: none; transition: opacity 0.2s;
        margin: 0.6rem 0; width: fit-content;
    }
    .btn-whatsapp:hover { opacity: 0.88; }

    .product-actions-row { display: flex; gap: 1.5rem; margin: 0.75rem 0; font-size: 0.85rem; }
    .product-action-link { display: flex; align-items: center; gap: 5px; color: #444; cursor: pointer; transition: color 0.2s; text-decoration: none; }
    .product-action-link:hover { color: #1565c0; }

    .product-divider { border: none; border-top: 1px solid #eee; margin: 1rem 0; }

    .product-meta-table { font-size: 0.85rem; }
    .product-meta-row { display: flex; gap: 0.5rem; padding: 0.35rem 0; }
    .product-meta-label { color: #888; min-width: 100px; font-weight: 600; }
    .product-meta-val { color: #333; }
    .product-meta-val a { color: #1565c0; }

    .share-row { display: flex; align-items: center; gap: 0.6rem; margin-top: 1rem; font-size: 0.85rem; color: #888; }
    .share-icon {
        width: 28px; height: 28px; border-radius: 50%;
        background: #f0f0f0; display: flex; align-items: center; justify-content: center;
        font-size: 0.78rem; color: #444; text-decoration: none; transition: background 0.2s, color 0.2s;
    }
    .share-icon:hover { background: #1565c0; color: #fff; }

    /* ── Tabs ── */
    .product-tabs { margin: 2.5rem 0 0; border-bottom: 2px solid #eee; }
    .tab-links { display: flex; gap: 0; }
    .tab-link {
        padding: 0.9rem 1.8rem; font-size: 0.92rem; font-weight: 600;
        color: #666; border: none; background: none; cursor: pointer;
        border-bottom: 3px solid transparent; margin-bottom: -2px;
        transition: color 0.2s, border-color 0.2s;
    }
    .tab-link.active { color: #1565c0; border-bottom-color: #1565c0; }
    .tab-link:hover { color: #1565c0; }
    .tab-pane { display: none; padding: 2rem 0; }
    .tab-pane.active { display: block; }

    /* Description tab */
    .desc-section { margin-bottom: 1.5rem; }
    .desc-section h3 { font-size: 1rem; font-weight: 700; color: #111; margin-bottom: 0.75rem; }
    .desc-section ul { list-style: none; padding: 0; }
    .desc-section ul li {
        padding: 0.35rem 0 0.35rem 1.2rem;
        border-bottom: 1px solid #f5f5f5;
        font-size: 0.88rem; color: #444;
        position: relative;
    }
    .desc-section ul li::before { content: '›'; position: absolute; left: 0; color: #1565c0; font-weight: 700; }
    .save-badge {
        display: inline-block;
        background: #e8f5e9; color: #2e7d32;
        padding: 0.3rem 0.75rem; border-radius: 4px;
        font-size: 0.82rem; font-weight: 700; margin-bottom: 1rem;
    }

    /* Reviews tab */
    .reviews-summary { display: flex; align-items: center; gap: 2rem; margin-bottom: 2rem; }
    .reviews-score { text-align: center; }
    .reviews-score .score { font-size: 3rem; font-weight: 900; color: #111; line-height: 1; }
    .reviews-score .stars { font-size: 1.2rem; color: #f9a825; }
    .reviews-score .count { font-size: 0.78rem; color: #888; }
    .write-review-btn {
        padding: 0.6rem 1.5rem; border: 2px solid #1565c0; color: #1565c0;
        background: none; border-radius: 6px; font-weight: 600; font-size: 0.88rem;
        cursor: pointer; transition: all 0.2s;
    }
    .write-review-btn:hover { background: #1565c0; color: #fff; }
    .no-reviews { color: #888; font-size: 0.9rem; padding: 1rem 0; }

    /* Shipping tab */
    .shipping-info { font-size: 0.9rem; color: #444; line-height: 1.8; }
    .shipping-info h4 { font-weight: 700; color: #111; margin: 1rem 0 0.4rem; }
    .shipping-table { width: 100%; border-collapse: collapse; margin-top: 1rem; font-size: 0.85rem; }
    .shipping-table th { background: #f5f5f5; padding: 0.6rem 1rem; text-align: left; font-weight: 700; border: 1px solid #eee; }
    .shipping-table td { padding: 0.6rem 1rem; border: 1px solid #eee; color: #555; }

    /* Related */
    .related-section { padding: 2.5rem 0 3rem; }
    .section-title { font-size: 1.4rem; font-weight: 800; color: #111; margin-bottom: 0.4rem; }
    .section-underline { width: 50px; height: 3px; background: #1565c0; border-radius: 2px; margin-bottom: 1.5rem; }
    .related-grid {
        display: grid; grid-template-columns: repeat(4, 1fr);
        gap: 1px; background: #eee; border: 1px solid #eee; border-radius: 8px; overflow: hidden;
    }
    .related-card {
        background: #fff; padding: 1rem;
        display: flex; flex-direction: column;
        text-decoration: none; transition: box-shadow 0.2s; position: relative;
    }
    .related-card:hover { box-shadow: inset 0 0 0 2px #1565c0; }
    .related-compare {
        position: absolute; top: 8px; left: 8px;
        font-size: 0.65rem; color: #888; background: #f5f5f5;
        padding: 2px 7px; border-radius: 3px; text-decoration: none;
    }
    .related-img { height: 130px; display: flex; align-items: center; justify-content: center; margin: 1.5rem 0 0.75rem; }
    .related-img img { max-height: 120px; max-width: 100%; object-fit: contain; }
    .related-img .icon { font-size: 3rem; }
    .related-name { font-size: 0.85rem; font-weight: 600; color: #111; margin-bottom: 0.25rem; line-height: 1.3; }
    .related-cat { font-size: 0.72rem; color: #aaa; margin-bottom: 0.5rem; }
    .related-old { font-size: 0.72rem; color: #bbb; text-decoration: line-through; }
    .related-price { font-size: 0.95rem; font-weight: 800; color: #1565c0; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo e(route('home')); ?>">Home</a>
        <span class="breadcrumb-sep">/</span>
        <?php if($product->category): ?>
        <a href="<?php echo e(route('products.index', ['category'=>$product->category->slug])); ?>"><?php echo e($product->category->name); ?></a>
        <span class="breadcrumb-sep">/</span>
        <?php endif; ?>
        <span style="color:#111;font-weight:600;"><?php echo e($product->name); ?></span>
    </div>

    <!-- Product Detail -->
    <div class="product-wrap">

        <!-- Image col -->
        <div>
            <div class="product-img-main">
                <?php if($product->compare_price && $product->compare_price > $product->price): ?>
                    <div class="product-discount-badge">
                        -<?php echo e(round((($product->compare_price - $product->price) / $product->compare_price) * 100)); ?>%
                    </div>
                <?php endif; ?>
                <?php if($product->image): ?>
                    <img src="<?php echo e(Str::startsWith($product->image,'images/') ? asset($product->image) : asset('storage/'.$product->image)); ?>"
                         alt="<?php echo e($product->name); ?>" id="mainImg">
                <?php else: ?>
                    <div class="no-img"><?php echo e(optional($product->category)->icon ?? '📦'); ?></div>
                <?php endif; ?>
                <button class="product-img-zoom" title="Zoom">⛶</button>
            </div>
            <!-- Thumbnail row (shows same image as placeholder for more images) -->
            <?php if($product->image): ?>
            <div class="thumb-row">
                <div class="thumb active">
                    <img src="<?php echo e(Str::startsWith($product->image,'images/') ? asset($product->image) : asset('storage/'.$product->image)); ?>" alt="">
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Info col -->
        <div>
            <div class="product-nav">
                <a href="#">‹</a>
                <a href="<?php echo e(route('products.index')); ?>">⊞</a>
                <a href="#">›</a>
            </div>

            <h1 class="product-title"><?php echo e($product->name); ?></h1>

            <div class="product-price-row">
                <?php if($product->compare_price && $product->compare_price > $product->price): ?>
                    <span class="product-old-price">KSh <?php echo e(number_format($product->compare_price)); ?></span>
                <?php endif; ?>
                <span class="product-price">KSh <?php echo e(number_format($product->price)); ?></span>
            </div>

            <?php if($product->compare_price && $product->compare_price > $product->price): ?>
            <div class="save-badge">
                KSh <?php echo e(number_format($product->price)); ?> &nbsp;|&nbsp;
                Save: KSh <?php echo e(number_format($product->compare_price - $product->price)); ?>

                (<?php echo e(round((($product->compare_price - $product->price) / $product->compare_price) * 100)); ?>%)
            </div>
            <?php endif; ?>

            <div class="product-desc-short">
                <?php echo nl2br(e($product->description ?? 'Contact us for more details about this product.')); ?>

            </div>

            <?php if($product->isInStock()): ?>
                <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <div class="qty-label"><?php echo e($product->name); ?> quantity</div>
                    <div class="qty-row">
                        <div class="qty-control">
                            <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="qty-input" id="qtyInput">
                            <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                        </div>
                        <button type="submit" class="btn-add-cart">Add to cart</button>
                        <a href="<?php echo e(route('checkout.index')); ?>" class="btn-buy-now">Buy now</a>
                    </div>
                </form>
                <?php else: ?>
                <div class="qty-label"><?php echo e($product->name); ?> quantity</div>
                <div class="qty-row">
                    <div class="qty-control">
                        <button class="qty-btn">−</button>
                        <input type="number" value="1" class="qty-input">
                        <button class="qty-btn">+</button>
                    </div>
                    <a href="<?php echo e(route('login')); ?>" class="btn-add-cart">Add to cart</a>
                    <a href="<?php echo e(route('login')); ?>" class="btn-buy-now">Buy now</a>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <div style="padding:0.75rem 1rem;background:#fff3f3;border:1px solid #ffcdd2;border-radius:6px;color:#c62828;font-weight:600;font-size:0.88rem;margin-bottom:1rem;">
                    Out of Stock — Contact us to request this item
                </div>
            <?php endif; ?>

            <a href="https://wa.me/254702939491?text=Hi%2C+I%27m+interested+in+<?php echo e(urlencode($product->name)); ?>+at+KSh+<?php echo e(number_format($product->price)); ?>"
               target="_blank" class="btn-whatsapp">💬 Order On WhatsApp</a>

            <div class="product-actions-row">
                <a href="#" class="product-action-link">⇄ Compare</a>
                <a href="#" class="product-action-link">♡ Add to wishlist</a>
            </div>

            <hr class="product-divider">

            <div class="product-meta-table">
                <?php if(isset($product->sku) && $product->sku): ?>
                <div class="product-meta-row">
                    <span class="product-meta-label">SKU:</span>
                    <span class="product-meta-val"><?php echo e($product->sku); ?></span>
                </div>
                <?php endif; ?>
                <?php if($product->category): ?>
                <div class="product-meta-row">
                    <span class="product-meta-label">Categories:</span>
                    <span class="product-meta-val">
                        <a href="<?php echo e(route('products.index', ['category'=>$product->category->slug])); ?>"><?php echo e($product->category->name); ?></a>
                    </span>
                </div>
                <?php endif; ?>
                <?php if($product->brand): ?>
                <div class="product-meta-row">
                    <span class="product-meta-label">Tags:</span>
                    <span class="product-meta-val"><?php echo e($product->brand); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="share-row">
                <span>Share:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank" class="share-icon" style="background:#1877f2;color:#fff;">f</a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url()->current())); ?>" target="_blank" class="share-icon" style="background:#000;color:#fff;">𝕏</a>
                <a href="https://pinterest.com/pin/create/button/?url=<?php echo e(urlencode(url()->current())); ?>" target="_blank" class="share-icon" style="background:#e60023;color:#fff;">P</a>
                <a href="https://www.linkedin.com/shareArticle?url=<?php echo e(urlencode(url()->current())); ?>" target="_blank" class="share-icon" style="background:#0077b5;color:#fff;">in</a>
                <a href="https://t.me/share/url?url=<?php echo e(urlencode(url()->current())); ?>" target="_blank" class="share-icon" style="background:#0088cc;color:#fff;">✈</a>
            </div>
        </div>
    </div>

    <!-- ── Tabs ── -->
    <div class="product-tabs">
        <div class="tab-links">
            <button class="tab-link active" onclick="openTab(event,'tab-desc')">Description</button>
            <button class="tab-link" onclick="openTab(event,'tab-shipping')">Shipping &amp; Delivery</button>
            <button class="tab-link" onclick="openTab(event,'tab-reviews')">Reviews (0)</button>
        </div>
    </div>

    <!-- Description Tab -->
    <div id="tab-desc" class="tab-pane active">
        <div class="desc-section">
            <h3>Description</h3>
            <p style="font-size:0.9rem;color:#444;line-height:1.8;margin-bottom:1.2rem;">
                <?php echo e($product->description ?? 'No description available for this product.'); ?>

            </p>
        </div>
        <?php if($product->category && str_contains(strtolower($product->category->name ?? ''), 'toner')): ?>
        <div class="desc-section">
            <h3>Compatible Printers</h3>
            <ul>
                <li><?php echo e($product->brand ?? 'Compatible'); ?> LaserJet Enterprise 500 color MFP M575dn</li>
                <li><?php echo e($product->brand ?? 'Compatible'); ?> LaserJet Enterprise 500 color MFP M575f</li>
                <li><?php echo e($product->brand ?? 'Compatible'); ?> LaserJet Enterprise 500 color Printer M551dn</li>
                <li><?php echo e($product->brand ?? 'Compatible'); ?> LaserJet Enterprise 500 color Printer M551n</li>
                <li><?php echo e($product->brand ?? 'Compatible'); ?> LaserJet Enterprise 500 color Printer M551xh</li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="desc-section">
            <h3>Additional Information</h3>
            <table class="shipping-table" style="max-width:400px;">
                <tr><th>Brand</th><td><?php echo e($product->brand ?? 'N/A'); ?></td></tr>
                <tr><th>Category</th><td><?php echo e(optional($product->category)->name ?? 'N/A'); ?></td></tr>
                <tr><th>Stock</th><td><?php echo e($product->stock); ?> units</td></tr>
                <tr><th>Condition</th><td>Brand New</td></tr>
                <tr><th>Warranty</th><td>6 months</td></tr>
            </table>
        </div>
    </div>

    <!-- Shipping Tab -->
    <div id="tab-shipping" class="tab-pane">
        <div class="shipping-info">
            <h4>🚚 Delivery Information</h4>
            <p>We offer fast and reliable delivery across Kenya. Orders placed before 12PM are dispatched same day.</p>
            <table class="shipping-table">
                <thead>
                    <tr><th>Location</th><th>Delivery Time</th><th>Cost</th></tr>
                </thead>
                <tbody>
                    <tr><td>Nairobi CBD (Pick-up)</td><td>Same Day</td><td>Free</td></tr>
                    <tr><td>Nairobi (Delivery)</td><td>Same Day – Next Day</td><td>KSh 200 – 500</td></tr>
                    <tr><td>Outside Nairobi</td><td>1 – 3 Business Days</td><td>KSh 500 – 1,000</td></tr>
                    <tr><td>Countrywide (Courier)</td><td>2 – 5 Business Days</td><td>Calculated at checkout</td></tr>
                </tbody>
            </table>
            <h4>📦 Returns & Refunds</h4>
            <p>We accept returns within 7 days of delivery for items that are defective or not as described. Contact us via WhatsApp at <strong>0702 939 491</strong> to initiate a return.</p>
            <h4>💳 Payment Methods</h4>
            <p>We accept M-Pesa (Till: 522522), Cash on Delivery, Bank Transfer, Visa, and Mastercard.</p>
        </div>
    </div>

    <!-- Reviews Tab -->
    <div id="tab-reviews" class="tab-pane">
        <div class="reviews-summary">
            <div class="reviews-score">
                <div class="score">0.0</div>
                <div class="stars">☆☆☆☆☆</div>
                <div class="count">0 reviews</div>
            </div>
            <button class="write-review-btn">Write a review</button>
        </div>
        <div class="no-reviews">Be the first to review "<?php echo e($product->name); ?>"</div>
    </div>

    <!-- Related Products -->
    <?php if($related->isNotEmpty()): ?>
    <div class="related-section">
        <div class="section-title">Related Products</div>
        <div class="section-underline"></div>
        <div class="related-grid">
            <?php $__currentLoopData = $related->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="related-card">
                <a href="<?php echo e(route('products.show', $r)); ?>" style="text-decoration:none;color:inherit;">
                    <span class="related-compare">Compare</span>
                    <div class="related-img">
                        <?php if($r->image): ?>
                            <img src="<?php echo e(Str::startsWith($r->image,'images/') ? asset($r->image) : asset('storage/'.$r->image)); ?>" alt="<?php echo e($r->name); ?>">
                        <?php else: ?>
                            <div class="icon"><?php echo e(optional($r->category)->icon ?? '📦'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="related-name"><?php echo e(Str::limit($r->name, 55)); ?></div>
                    <div class="related-cat"><?php echo e(optional($r->category)->name); ?></div>
                    <?php if($r->compare_price && $r->compare_price > $r->price): ?>
                        <div class="related-old">KSh <?php echo e(number_format($r->compare_price)); ?></div>
                    <?php endif; ?>
                    <div class="related-price">KSh <?php echo e(number_format($r->price)); ?></div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function changeQty(delta) {
    const input = document.getElementById('qtyInput');
    if (!input) return;
    let val = parseInt(input.value) + delta;
    const max = parseInt(input.max) || 99;
    if (val < 1) val = 1;
    if (val > max) val = max;
    input.value = val;
}
function openTab(e, id) {
    document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    e.target.classList.add('active');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/products/show.blade.php ENDPATH**/ ?>