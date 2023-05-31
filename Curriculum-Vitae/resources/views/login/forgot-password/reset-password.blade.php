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
                    <form method="post" action="{{ route('reset-password', ['email' => $email]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-5 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Reset Password Code<span class="required">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="reset-password-code" class="form-control fs-6" required autofocus/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-5 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">New Password<span class="required">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="new-password" class="form-control fs-6" required/>
                            </div>
                            @if ($errors->has('new-password'))
                                <span role="alert" style="color: red; font-size: 12px;">
                                    <br>
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-5 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Confirm Password<span class="required">*</span></label>
                            <div class="col-md-7">
                                <input type="password" name="confirm-password" class="form-control fs-6" required/>
                            </div>
                            @if ($errors->has('confirm-password'))
                                <span role="alert" style="color: red; font-size: 12px;">
                                    <br>
                                    <strong>{{ $errors->first('confirm-password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-center pt-2">
                            <div class="col-md-3">
                                <input type="submit" class="btn" value="Reset" />
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