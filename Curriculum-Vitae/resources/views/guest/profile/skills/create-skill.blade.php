@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-5 pt-5">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Add Skill</b></div>
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
                    <form method="post" action="{{ route('skills.store') }}">
                        @csrf
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Skill Name</label>
                            <div class="col-md-8">
                                <input type="text" name="skill-name" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label class="col-md-4 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Skill Level (%)</label>
                            <div class="col-md-8">
                                <input type="text" name="skill-percent" class="form-control fs-6" required/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Add" />
                            <a href="{{ route('skills.index') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection