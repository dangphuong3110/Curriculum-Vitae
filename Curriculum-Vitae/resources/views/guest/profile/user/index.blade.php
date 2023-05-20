@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-5 pt-5">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <b class="fs-5">Personal Information</b>
                    <a href="{{ route('guest') }}" class="btn btn-danger fs-6">Go Back</a>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-4 change-name border border-primary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-center p-3 m-3">
                                <h5 class="fw-bold">Change Name</h5>
                            </a>
                        </div>
                        <div class="col-md-4 change-password border border-secondary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
                            <a href="{{ route('user.password', $user->id) }}" class="text-center p-3 m-3">
                                <h5 class="fw-bold">Change Password</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection