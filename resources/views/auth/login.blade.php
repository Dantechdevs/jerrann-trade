@extends('layouts.app')
@section('title', 'Login')

@section('styles')
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
@endsection

@section('content')
<div class="auth-wrap">
    <h1>Welcome back 👋</h1>
    <p class="sub">Sign in to your Jerann Traders account.</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus required>
                    @error('email')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.1rem;">
                    <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.85rem;cursor:pointer;">
                        <input type="checkbox" name="remember" style="accent-color:#1565c0;"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;padding:0.75rem;font-size:1rem;">Login</button>
            </form>
            <p style="text-align:center;margin-top:1.25rem;font-size:0.88rem;color:#666;">
                Don't have an account? <a href="{{ route('register') }}" style="color:#1565c0;font-weight:600;">Register here</a>
            </p>
        </div>
    </div>
</div>
@endsection
