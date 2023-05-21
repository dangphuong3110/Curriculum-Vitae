@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-4 pt-4">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Add Project</b></div>
                <div class="card-body">
                    @if($message = Session::get('failure'))

                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('portfolios.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Name<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="project-name" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Link<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="project-link" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Description</label>
                            <div class="col-md-8">
                                <textarea name="project-desc" id="project-desc" cols="1" rows="1" class="form-control fs-6"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Project Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" id="imageInput" class="form-control fs-6"/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Add" />
                            <a href="{{ route('portfolios.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection