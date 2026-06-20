@extends('layouts.app')
@section('title', 'Register')

@section('styles')
<style>
    .auth-wrap { max-width:480px;margin:2rem auto; }
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
    <h1>Create an Account 🎉</h1>
    <p class="sub">Join Jerann Traders and shop the best tech deals in Nairobi.</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    @error('name')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. 0712345678">
                    @error('phone')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')<div class="error">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;padding:0.75rem;font-size:1rem;margin-top:0.5rem;">Create Account</button>
            </form>
            <p style="text-align:center;margin-top:1.25rem;font-size:0.88rem;color:#666;">
                Already have an account? <a href="{{ route('login') }}" style="color:#1565c0;font-weight:600;">Login here</a>
            </p>
        </div>
    </div>
</div>
@endsection
