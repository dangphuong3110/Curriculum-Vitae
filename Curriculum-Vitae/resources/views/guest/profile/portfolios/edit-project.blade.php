@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-3 pt-3">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change Project</b></div>
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
                    <form method="post" action="{{ route('portfolios.update', $portfolio->portfolio_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Name<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="project-name" class="form-control fs-6" value="{{ $portfolio->project_name }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Link<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="project-link" class="form-control fs-6" value="{{ $portfolio->project_link }}" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Description</label>
                            <div class="col-md-8">
                                <textarea name="project-desc" id="project-desc" cols="1" rows="1" class="form-control fs-6">{{ $portfolio->project_desc }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Image</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="file" name="image" id="imageInput" class="form-control fs-6" value="{{ asset('images/projects_img/' . $portfolio->image) }}"/>
                            </div>
                            <div class="col-md-3">
                                <img id="preview" src="{{ asset('images/projects_img/' . $portfolio->image) }}" alt="Preview Image" class="image-project-preview"/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Change" />
                            <a href="{{ route('portfolios.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection