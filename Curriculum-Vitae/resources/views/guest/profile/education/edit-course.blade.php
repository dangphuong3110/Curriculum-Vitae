@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-1 pt-2">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change Course</b></div>
                <div class="card-body">
                    @if($message = Session::get('success'))

                        <div class="alert alert-success">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('education.update', $course->education_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Major<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="major" class="form-control fs-6" value="{{ $course->major }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Degree<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="degree" class="form-control fs-6" value="{{ $course->degree }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">School<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="school" class="form-control fs-6" value="{{ $course->school }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" cols="1" rows="1" class="form-control fs-6">{{ $course->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Start Date<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="start-date" class="form-control fs-6" value="{{ $course->start_date }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">End Date<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="end-date" class="form-control fs-6" value="{{ $course->end_date }}" required/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Change" />
                            <a href="{{ route('education.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection