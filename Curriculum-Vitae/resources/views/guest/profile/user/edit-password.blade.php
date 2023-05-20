@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-5 pt-4">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change Password</b></div>
                <div class="card-body">
                    @if($message = Session::get('success'))

                        <div class="alert alert-success">
                            {{ $message }}
                        </div>

                    @endif
                    @if($message = Session::get('failure'))

                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('user.updatePassword', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Current Password</label>
                            <div class="col-md-8">
                                <input type="password" name="current-password" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">New Password</label>
                            <div class="col-md-8">
                                <input type="password" name="new-password" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Confirm Password</label>
                            <div class="col-md-8">
                                <input type="password" name="confirm-password" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success fs-6" value="Change" />
                            <a href="{{ route('user.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection