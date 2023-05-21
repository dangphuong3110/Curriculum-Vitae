@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-3 pt-3">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change Work Experience</b></div>
                <div class="card-body">
                    @if($message = Session::get('success'))

                        <div class="alert alert-success">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('work-experiences.update', $workExperience->work_experience_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Company<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="company" class="form-control fs-6" value="{{ $workExperience->company }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Job Position<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="job-position" class="form-control fs-6" value="{{ $workExperience->job_position }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" cols="1" rows="1" class="form-control fs-6">{{ $workExperience->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Start Date<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="start-date" class="form-control fs-6" value="{{ $workExperience->start_date }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Resignation Date<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="end-date" class="form-control fs-6" value="{{ $workExperience->end_date }}" required/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Change" />
                            <a href="{{ route('work-experiences.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection