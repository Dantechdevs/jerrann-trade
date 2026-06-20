@extends('layouts.app')
@section('title', 'Checkout')

@section('styles')
<style>
    h1 { font-size:1.6rem;font-weight:800;color:#0d3e7a;margin-bottom:1.5rem; }
    .checkout-layout { display:grid; grid-template-columns:1fr 340px; gap:1.5rem; align-items:start; }
    @media(max-width:768px){ .checkout-layout { grid-template-columns:1fr; } }
    .form-group { margin-bottom:1.1rem; }
    .form-group label { display:block;font-size:0.85rem;font-weight:600;color:#444;margin-bottom:0.35rem; }
    .form-control { width:100%;padding:0.6rem 0.9rem;border:1.5px solid #dde;border-radius:7px;font-size:0.9rem; }
    .form-control:focus { outline:none;border-color:#1565c0; }
    .payment-options { display:grid; gap:0.75rem; }
    .payment-option { display:flex;align-items:center;gap:0.75rem;padding:0.85rem 1rem;border:2px solid #dde;border-radius:8px;cursor:pointer;transition:all 0.2s; }
    .payment-option:has(input:checked) { border-color:#1565c0;background:#f0f7ff; }
    .payment-option input { accent-color:#1565c0; }
    .payment-icon { font-size:1.5rem; }
    .payment-label { font-weight:600;font-size:0.9rem;color:#333; }
    .payment-desc  { font-size:0.78rem;color:#888; }

    .summary-card { background:#fff;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.07);overflow:hidden; }
    .summary-header { background:linear-gradient(135deg,#0d3e7a,#1565c0);color:#fff;padding:1rem 1.25rem;font-weight:700; }
    .summary-body   { padding:1.25rem; }
    .summary-row    { display:flex;justify-content:space-between;margin-bottom:0.6rem;font-size:0.88rem; }
    .summary-total  { display:flex;justify-content:space-between;font-size:1.15rem;font-weight:800;color:#0d3e7a;border-top:2px solid #eee;padding-top:0.75rem;margin-top:0.75rem; }
</style>
@endsection

@section('content')
<h1>💳 Checkout</h1>

<form action="{{ route('checkout.store') }}" method="POST">
@csrf
<div class="checkout-layout">
    <!-- Form -->
    <div class="card">
        <div class="card-header">Shipping & Payment Details</div>
        <div class="card-body">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly style="background:#f8f8f8;">
            </div>
            <div class="form-group">
                <label>Phone Number *</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone) }}" placeholder="e.g. 0712345678" required>
            </div>
            <div class="form-group">
                <label>Delivery Address *</label>
                <textarea name="shipping_address" class="form-control" rows="3" placeholder="Street, estate, town…" required>{{ old('shipping_address', auth()->user()->address) }}</textarea>
            </div>
            <div class="form-group">
                <label>Order Notes (optional)</label>
                <textarea name="notes" class="form-control" rows="2" placeholder="Any special instructions?">{{ old('notes') }}</textarea>
            </div>

            <div class="form-group" style="margin-top:1.5rem;">
                <label style="font-size:1rem;margin-bottom:0.75rem;">Payment Method *</label>
                <div class="payment-options">
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="mpesa" {{ old('payment_method','mpesa')==='mpesa'?'checked':'' }} required>
                        <span class="payment-icon">📱</span>
                        <div>
                            <div class="payment-label">M-Pesa (STK Push)</div>
                            <div class="payment-desc">Pay instantly via Safaricom M-Pesa</div>
                        </div>
                    </label>
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="bank_transfer" {{ old('payment_method')==='bank_transfer'?'checked':'' }}>
                        <span class="payment-icon">🏦</span>
                        <div>
                            <div class="payment-label">Bank Transfer</div>
                            <div class="payment-desc">Transfer to our bank account</div>
                        </div>
                    </label>
                    <label class="payment-option">
                        <input type="radio" name="payment_method" value="cash_on_delivery" {{ old('payment_method')==='cash_on_delivery'?'checked':'' }}>
                        <span class="payment-icon">💵</span>
                        <div>
                            <div class="payment-label">Cash on Delivery</div>
                            <div class="payment-desc">Pay when your order arrives</div>
                        </div>
                    </label>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $e) <div>❌ {{ $e }}</div> @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Summary -->
    <div>
        <div class="summary-card">
            <div class="summary-header">Order Summary</div>
            <div class="summary-body">
                @foreach($items as $item)
                <div class="summary-row">
                    <span>{{ Str::limit($item->product->name, 22) }} ×{{ $item->quantity }}</span>
                    <span>KES {{ number_format($item->quantity * $item->product->price) }}</span>
                </div>
                @endforeach
                <div class="summary-total">
                    <span>Total</span>
                    <span>KES {{ number_format($total) }}</span>
                </div>
                <button type="submit" class="btn btn-accent" style="width:100%;text-align:center;margin-top:1.5rem;font-size:1.05rem;padding:0.85rem;">
                    ✅ Place Order
                </button>
                <a href="{{ route('cart.index') }}" class="btn btn-outline" style="width:100%;text-align:center;margin-top:0.75rem;">← Back to Cart</a>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
