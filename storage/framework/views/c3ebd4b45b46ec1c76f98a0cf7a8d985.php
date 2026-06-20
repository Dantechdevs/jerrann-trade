<div class="pcard">
    
    <div class="pcard-badge-wrap">
        <?php if(isset($hot) && $hot): ?><span class="pcard-badge-hot">HOT</span><?php endif; ?>
        <?php if(isset($new) && $new): ?><span class="pcard-badge-new">NEW</span><?php endif; ?>
        <?php if($product->compare_price && $product->compare_price > $product->price): ?>
            <span class="pcard-badge-discount">-<?php echo e(round((($product->compare_price - $product->price) / $product->compare_price) * 100)); ?>%</span>
        <?php endif; ?>
    </div>

    
    <div class="pcard-actions">
        <a href="<?php echo e(route('products.show', $product)); ?>" class="pcard-action-btn" title="Quick View">👁</a>
        <a href="#" class="pcard-action-btn" title="Wishlist">♡</a>
        <?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <button type="submit" class="pcard-action-btn" title="Add to Cart">🛒</button>
        </form>
        <?php endif; ?>
    </div>

    
    <div class="pcard-img">
        <?php if($product->image): ?>
            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
        <?php else: ?>
            <div class="no-img"><?php echo e(optional($product->category)->icon ?? '📦'); ?></div>
        <?php endif; ?>
    </div>

    
    <div class="pcard-name"><?php echo e(Str::limit($product->name, 50)); ?></div>
    <div class="pcard-cat"><?php echo e(optional($product->category)->name); ?></div>
    <div class="pcard-prices">
        <?php if($product->compare_price && $product->compare_price > $product->price): ?>
            <div class="pcard-old-price">KES <?php echo e(number_format($product->compare_price)); ?></div>
        <?php endif; ?>
        <div class="pcard-price">KES <?php echo e(number_format($product->price)); ?></div>
    </div>

    <a href="<?php echo e(route('products.show', $product)); ?>" class="pcard-buy-btn">
        💬 BUY NOW
    </a>
</div>
<?php /**PATH C:\xampp\htdocs\jerann-traders\resources\views/home/_pcard.blade.php ENDPATH**/ ?>