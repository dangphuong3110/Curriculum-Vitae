@extends('login/layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CREATIVE CV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
</nav>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header fw-bold">Login to create CV</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                @error('email')
                                    <span role="alert" style="color: red">
                                        <br>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" required />
                                @error('password')
                                    <span role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for="remember_me">
                                    <input id="remember_me" type="checkbox" name="remember" class="mt-3">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            <div>
                                <button type="submit" class="btn-success mt-3">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
