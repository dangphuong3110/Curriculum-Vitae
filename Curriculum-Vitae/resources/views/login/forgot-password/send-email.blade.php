@extends('login/layout')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Reset Password</b></div>
                <div class="card-body">
                    @if($message = Session::get('failure'))

                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('send-reset-code') }}">
                        @csrf
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Email<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="email" name="email" class="form-control fs-6" id="email" value="{{ old('email') }}" required autofocus/>
                            </div>
                        </div>
                       <div class="row d-flex justify-content-center pt-2">
                            <div class="col-md-4">
                                <button type="submit" class="btn">Send Reset Code</button>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('login') }}" class="btn d-flex align-items-center justify-content-center">Go Back</a>
                            </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection