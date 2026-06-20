<div class="pcard">
    {{-- Badges --}}
    <div class="pcard-badge-wrap">
        @if(isset($hot) && $hot)<span class="pcard-badge-hot">HOT</span>@endif
        @if(isset($new) && $new)<span class="pcard-badge-new">NEW</span>@endif
        @if($product->compare_price && $product->compare_price > $product->price)
            <span class="pcard-badge-discount">-{{ round((($product->compare_price - $product->price) / $product->compare_price) * 100) }}%</span>
        @endif
    </div>

    {{-- Hover Actions --}}
    <div class="pcard-actions">
        <a href="{{ route('products.show', $product) }}" class="pcard-action-btn" title="Quick View">👁</a>
        <a href="#" class="pcard-action-btn" title="Wishlist">♡</a>
        @auth
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="pcard-action-btn" title="Add to Cart">🛒</button>
        </form>
        @endauth
    </div>

    {{-- Image --}}
    <div class="pcard-img">
        @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
        @else
            <div class="no-img">{{ optional($product->category)->icon ?? '📦' }}</div>
        @endif
    </div>

    {{-- Info --}}
    <div class="pcard-name">{{ Str::limit($product->name, 50) }}</div>
    <div class="pcard-cat">{{ optional($product->category)->name }}</div>
    <div class="pcard-prices">
        @if($product->compare_price && $product->compare_price > $product->price)
            <div class="pcard-old-price">KES {{ number_format($product->compare_price) }}</div>
        @endif
        <div class="pcard-price">KES {{ number_format($product->price) }}</div>
    </div>

    <a href="{{ route('products.show', $product) }}" class="pcard-buy-btn">
        💬 BUY NOW
    </a>
</div>
