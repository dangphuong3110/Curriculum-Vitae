@extends('login/layout')
@section('content')
<div class="wrapper">
    <!-- <span class="icon-close">
        <ion-icon name="close"></ion-icon>
    </span> -->
    <div class="form-box login">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                <label for="email">Email</label>
                @error('email')
                    <span role="alert" style="color: red; font-size: 12px;">
                        <br>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
                @error('password')
                    <span role="alert" style="color: red; font-size: 12px;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="remember-forgot">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="remember">
                    Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <h2>Registration</h2>
        <form action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" name="username" id="username" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <div class="remember-forgot">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="remember">
                    I agree to the terms & conditions
                </label>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
