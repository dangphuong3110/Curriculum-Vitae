@extends('guest/profile/layout')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center mt-2">
        <div class="col-12">
            <div class="card p-0">
                <div class="card-header"><b class="fs-5">Change About</b></div>
                <div class="card-body">
                    @if($message = Session::get('success'))

                        <div class="alert alert-success m-0 p-1">
                            {{ $message }}
                        </div>

                    @endif
                    @if($message = Session::get('failure'))

                        <div class="alert alert-danger m-0 p-1">
                            {{ $message }}
                        </div>

                    @endif
                    <form method="post" action="{{ route('about.update', $about->about_id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3 mt-1">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Introduction</label>
                                    <div class="col-md-9">
                                        <textarea name="content" id="content" cols="1" rows="1" class="form-control fs-6">{{ $about->content }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Profession</label>
                                    <div class="col-md-9">
                                        <input type="text" name="profession" class="form-control fs-6" value="{{ $about->profession }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" name="age" class="form-control fs-6" value="{{ $about->age }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone-number" class="form-control fs-6" value="{{ $about->phone_number }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control fs-6" value="{{ $about->address }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Language</label>
                                    <div class="col-md-9">
                                        <input type="text" name="language" class="form-control fs-6" value="{{ $about->language }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3 mt-1">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Link Facebook</label>
                                    <div class="col-md-9">
                                        <input type="text" name="fb-link" class="form-control fs-6" value="{{ $about->fb_link }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Link Twitter</label>
                                    <div class="col-md-9">
                                        <input type="text" name="twitter-link" class="form-control fs-6" value="{{ $about->twitter_link }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Link Google</label>
                                    <div class="col-md-9">
                                        <input type="text" name="google-link" class="form-control fs-6" value="{{ $about->google_link }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Link Instagram</label>
                                    <div class="col-md-9">
                                        <input type="text" name="ins-link" class="form-control fs-6" value="{{ $about->ins_link }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label class="col-md-3 col-label-form fs-6 fw-bold d-flex align-items-center justify-content-center">Profile Picture</label>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <input type="file" name="image" id="imageInput" class="form-control fs-6" value="{{ asset('images/users_img/' . $about->image) }}"/>
                                    </div>
                                    <div class="col-md-3">
                                        <img id="preview" src="{{ asset('images/users_img/' . $about->image) }}" alt="Preview Image" class="image-preview"/>
                                    </div>
                                </div>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success fs-6" value="Change" />
                            <a href="{{ route('guest') }}" class="btn btn-danger fs-6">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection