@extends('guest/profile/layout')

@section('content')
<div class="container option">
    <div class="row m-4 pt-5 ps-5 pe-5 d-flex justify-content-between">
        <div class="col-md-3 mb-4 change-information border border-primary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('user.index') }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">Personal Information</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-about border border-secondary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('about.edit', $user->id) }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">About</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-skills border border-success border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('skills.index') }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">Skills</h5>
            </a>
        </div>
    </div>
    <div class="row m-4 ps-5 pe-5 d-flex justify-content-between">
        <div class="col-md-3 mb-4 change-portfolio border border-danger border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('portfolios.index') }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">Portfolios</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-work-experience border border-warning border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('work-experiences.index') }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">Work Experiences</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-education border border-info border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('education.index') }}" class="text-center p-4 m-4">
                <h5 class="fw-bold">Education</h5>
            </a>
        </div>
    </div>
</div>
@endsection