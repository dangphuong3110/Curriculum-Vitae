@extends('guest/profile/layout')

@section('content')

<div class="container mt-2">
    <div class="row d-flex justify-content-center mt-5 pt-5">
        <div class="col-md-6">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change Name</b></div>
                <div class="card-body">
                    @if($message = Session::get('success'))

                        <div class="alert alert-success">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3 mt-4">
                            <label class="col-md-2 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Name<span class="required">*</span></label>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control fs-6" value="{{ $user->name }}" required/>
                            </div>
                        </div>
                        <div class="text-center mt-4">
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