@extends('login/layout')
@section('content')

<div class="wrapper active">
    <div class="form-box login">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST" id="login">
            @csrf
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <div class="remember-forgot mt-1">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="remember">
                    Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="" class="register-link">Register</a></p>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <h2>Registration</h2>
        <form action="{{ route('register') }}" method="POST" id="register">
            @csrf
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" name="name" id="username" required autofocus>
                <label for="username">Username</label>
                @if ($errors->has('name'))
                    <span role="alert" style="color: red; font-size: 12px;">
                        <br>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" id="email" required>
                <label for="email">Email</label>
                @if ($errors->has('email'))
                    <span role="alert" style="color: red; font-size: 12px;">
                        <br>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
                @if ($errors->has('password'))
                    <span role="alert" style="color: red; font-size: 12px;">
                        <br>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="remember-forgot mt-1">
                <label for="remember_me">
                    <input type="checkbox" name="remember" id="agree-checkbox">
                    I agree to the terms & conditions
                </label>
            </div>
            <button type="submit" class="btn" id="register-button" disabled>Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
</div>

@endsection
