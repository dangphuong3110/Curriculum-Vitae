@extends('guest/profile/layout')
@section('content')
<div class="container option mt-5">
    <div class="row m-5 pt-5 ps-5 pe-5 d-flex justify-content-between">
        <div class="col-md-3 mb-4 change-password border border-primary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('user.index') }}" class="text-center p-4 m-4">
                <h5>Name & Password</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-about border border-secondary border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('about.index') }}" class="text-center p-4 m-4">
                <h5>About</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-skills border border-success border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('skills.index') }}" class="text-center p-4 m-4">
                <h5>Skills</h5>
            </a>
        </div>
    </div>
    <div class="row m-5 ps-5 pe-5 d-flex justify-content-between">
        <div class="col-md-3 mb-4 change-portfolio border border-danger border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('portfolio.index') }}" class="text-center p-4 m-4">
                <h5>Portfolio</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-work-experience border border-warning border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('work-experience.index') }}" class="text-center p-4 m-4">
                <h5>Work Experience</h5>
            </a>
        </div>
        <div class="col-md-3 mb-4 change-education border border-info border-5 rounded rounded-3 d-flex align-items-center justify-content-center">
            <a href="{{ route('education.index') }}" class="text-center p-4 m-4">
                <h5>Education</h5>
            </a>
        </div>
    </div>
</div>
@endsection