@extends('layouts.app')
@section('title', 'Book a Repair')

@section('styles')
<style>
    .repair-form-wrap { max-width:660px;margin:0 auto; }
    h1 { font-size:1.6rem;font-weight:800;color:#0d3e7a;margin-bottom:0.5rem; }
    .sub { color:#888;font-size:0.9rem;margin-bottom:1.5rem; }
    .form-group { margin-bottom:1.1rem; }
    .form-group label { display:block;font-size:0.85rem;font-weight:600;color:#444;margin-bottom:0.35rem; }
    .form-control { width:100%;padding:0.6rem 0.9rem;border:1.5px solid #dde;border-radius:7px;font-size:0.9rem; }
    .form-control:focus { outline:none;border-color:#1565c0; }
    .form-row { display:grid;grid-template-columns:1fr 1fr;gap:1rem; }
    @media(max-width:560px){ .form-row { grid-template-columns:1fr; } }
</style>
@endsection

@section('content')
<div class="repair-form-wrap">
    <h1>🔧 Book a Device Repair</h1>
    <p class="sub">Fill in your device details and we'll get back to you within 24 hours.</p>

    <div class="card">
        <div class="card-header">Repair Request Form</div>
        <div class="card-body">
            <form action="{{ route('repairs.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>Device Type *</label>
                        <select name="device_type" class="form-control" required>
                            <option value="">Select device...</option>
                            <option value="printer"  {{ old('device_type')==='printer'  ? 'selected':'' }}>🖨️ Printer</option>
                            <option value="laptop"   {{ old('device_type')==='laptop'   ? 'selected':'' }}>💻 Laptop</option>
                            <option value="tablet"   {{ old('device_type')==='tablet'   ? 'selected':'' }}>📱 Tablet</option>
                            <option value="other"    {{ old('device_type')==='other'    ? 'selected':'' }}>🔧 Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number *</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', auth()->user()->phone) }}" placeholder="0712345678" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" placeholder="e.g. HP, Dell, Samsung">
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control" value="{{ old('model') }}" placeholder="e.g. LaserJet Pro M404">
                    </div>
                </div>

                <div class="form-group">
                    <label>Issue Description * (min 20 characters)</label>
                    <textarea name="issue_description" class="form-control" rows="5" placeholder="Describe the problem in detail — what happens, any error messages, when it started…" required minlength="20">{{ old('issue_description') }}</textarea>
                </div>

                @if($errors->any())
                    <div class="alert alert-error">
                        @foreach($errors->all() as $e)<div>❌ {{ $e }}</div>@endforeach
                    </div>
                @endif

                <button type="submit" class="btn btn-primary" style="width:100%;padding:0.75rem;font-size:1rem;margin-top:0.5rem;">
                    📤 Submit Repair Request
                </button>
            </form>
        </div>
    </div>

    <div class="card" style="margin-top:1.5rem;">
        <div class="card-body" style="display:flex;gap:2rem;flex-wrap:wrap;">
            <div style="flex:1;min-width:180px;">
                <div style="font-size:1.8rem;margin-bottom:0.4rem;">📍</div>
                <strong>Location</strong><br>
                <span style="color:#666;font-size:0.88rem;">Nairobi, Kenya</span>
            </div>
            <div style="flex:1;min-width:180px;">
                <div style="font-size:1.8rem;margin-bottom:0.4rem;">⏱️</div>
                <strong>Turnaround</strong><br>
                <span style="color:#666;font-size:0.88rem;">Most repairs in 1–3 days</span>
            </div>
            <div style="flex:1;min-width:180px;">
                <div style="font-size:1.8rem;margin-bottom:0.4rem;">🔒</div>
                <strong>Warranty</strong><br>
                <span style="color:#666;font-size:0.88rem;">30-day repair warranty</span>
            </div>
        </div>
    </div>
</div>
@endsection
