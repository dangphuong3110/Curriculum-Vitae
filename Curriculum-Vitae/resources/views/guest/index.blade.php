@extends('guest/layout')

@section('content')
<div class="page-content">
    <!-- HOME -->
    <div class="profile-page">
        <div class="overlay bg-cover">
            <div class="home bg-cover d-flex align-items-center">
                <div class="container" data-aos="zoom-in">
                    <div class="content-center">
                        <div class="profile-image">
                            <a href="#"><img src="{{ asset('images/users_img/' . $about->image) }}" alt="profile image" onerror="this.src=`{{ asset('images/users_img/blank-user-img.jpg') }}`"></a>
                        </div>
                        <h2>{{ $user->name }}</h2>
                        <p class="category">{{ $about->profession }}</p>
                        <a class="btn btn-success mr-2" href="#contact" data-aos="zoom-in">Hire Me</a>
                        <a class="btn btn-success" href="{{ route('guest') }}" data-aos="zoom-in" title="Create your CV?">Create CV</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container" data-aos="zoom-in">
                    <a class="btn-default btn-lg btn-icon btn-fb" href="{{ $about->fb_link }}" title="Follow me on Facebook"><i
                        class="fa-brands fa-facebook-f"></i></a>
                    <a class="btn-default btn-lg btn-icon btn-twitter" href="{{ $about->twitter_link }}" title="Follow me on Twitter"><i
                        class="fa-brands fa-twitter"></i></a>
                    <a class="btn-default btn-lg btn-icon btn-google" href="{{ $about->google_link }}" title="Follow me on Google+"><i
                        class="fa-brands fa-google-plus-g"></i></a>
                    <a class="btn-default btn-lg btn-icon btn-ins" href="{{ $about->ins_link }}" title="Follow me on Instagram"><i
                        class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="card" data-aos="fade-up" data-aos-offset="20">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                <div class="card-body">
                    <h4 class="mt-0 title">About</h4>
                    <p>{{ $about->content }}</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-12">
                <div class="card-body">
                    <h4 class="mt-0 title">Basic Information</h4>
                    <div class="row">
                    <div class="col-sm-4"><strong class="text-uppercase">Age:</strong></div>
                    <div class="col-sm-8">{{ $about->age }}</div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                    <div class="col-sm-8">{{ $user->email }}</div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                    <div class="col-sm-8">{{ $about->phone_number }}</div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                    <div class="col-sm-8">{{ $about->address }}</div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
                    <div class="col-sm-8">{{ $about->language }}</div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

      <!-- SKILLS -->
    <section id="skills">
        <div class="container">
            <div class="text-center">
                <h4 class="mb-4 title">Professional Skills</h4>
            </div>
            @if(count($skills) > 0)
            <div class="card" data-aos="fade-up" data-aos-offset="20" data-aos-anchor-placement="top-bottom">
                <div class="card-body skill-items">
                    <div class="row">
                        @foreach($skills as $skill)
                        <div class="col-md-6">
                            <div class="progress-container">
                                <span class="progress-badge">{{ $skill->skill_name }}</span>
                                <div class="progress">
                                    <div class="progress-bar" data-aos="zoom-in-right" data-aos-duration="1500" data-aos-easing="ease-in-out" style="width: {{ $skill->skill_percent }}%"></div>
                                    <span class="progress-value">{{ $skill->skill_percent }}%</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
                <div class="card d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="30" data-aos-anchor-placement="top-bottom">
                    <h4>No skills</h4>  
                </div> 
            @endif
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="text-center">
                        <h4 class="mb-4 title">Portfolio</h4>
                    </div>
                </div>
            </div>
            @if(count($portfolios) > 0)
                <div class="row border pt-4 portfolio-detail">
                    @foreach($portfolios as $portfolio)
                        <div class="col-md-6">
                            <div class="portfolio-image" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                <a href="{{ $portfolio->project_link }}">
                                <figure class="effect">
                                    <img src="{{ asset('images/projects_img/' . $portfolio->image) }}" class="img-fluid" alt="Image" onerror="this.src=`{{ asset('images/projects_img/blank-project-img.jpg') }}`">
                                    <figcaption>
                                        <div class="content">
                                            <h4>{{ $portfolio->project_name }}</h4>
                                            <p>{{ $portfolio->project_desc }}</p>
                                        </div>
                                    </figcaption>
                                </figure>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="30" data-aos-anchor-placement="top-bottom">
                    <h4>No projects</h4>  
                </div> 
            @endif
        </div>
    </section>

      <!-- EXPERIENCE -->
    <section id="experience">
        <div class="container work-experience">
            <div class="text-center mb-4">
                <h4 class="title">Work Experience</h4>
            </div>
            @if(count($workexperiences) > 0)
                @foreach($workexperiences as $workexperience)
                <div class="card">
                    <div class="row">
                        <div class="col-md-3 bg-success" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                            <div class="card-body work-experience-header">
                                <p>{{ $workexperience->start_date }} - {{ $workexperience->end_date }}</p>
                                <h5>{{ $workexperience->company }}</h5>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                            <div class="card-body">
                                <h5>{{ $workexperience->job_position }}</h5>
                                <p>{{ $workexperience->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="card d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="30" data-aos-anchor-placement="top-bottom">
                    <h4>No work experiences</h4>  
                </div> 
            @endif
        </div>
    </section>
    <section>
        <div class="container education">
            <div class="text-center mb-4">
                <h4 class="title">Education</h4>
            </div>
            @if(count($educations) > 0)
                @foreach($educations as $education)
                <div class="card">
                    <div class="row">
                        <div class="col-md-3 bg-success" data-aos="fade-right" data-aos-offset="100" data-aos-duration="500">
                            <div class="card-body education-header">
                                <p>{{ $education->start_date }} - {{ $education->end_date }}</p>
                                <h5>{{ $education->degree }}</h5>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">
                            <div class="card-body">
                                <h5>{{ $education->major }}</h5>
                                <p class="category">{{ $education->school }}</p>
                                <p>{{ $education->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="card d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-offset="30" data-aos-anchor-placement="top-bottom">
                    <h4>No educations</h4>  
                </div> 
            @endif
        </div>
    </section>

      <!-- CONTACT -->
    <section id="contact">
        <div class="contact-information" style="background-image: url('/images/staticmap.jpg')">
            <div class="container">
                <div class="contact">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mb-0" data-aos="zoom-in">
                                <div class="text-center title">
                                    <h4>Contact Me</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="p pb-3"><strong>Feel free to contact me</strong></div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa-solid fa-circle-user"></i></span>
                                                            <input class="form-control" type="text" name="name" placeholder="Name" required="required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa-solid fa-file-lines"></i></span>
                                                            <input class="form-control" type="text" name="subject" placeholder="Subject" required="required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>
                                                            <input class="form-control" type="email" name="email" placeholder="E-mail" required="required"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-success" type="submit">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <p class="mb-0"><strong>Address</strong></p>
                                            <p class="pb-2">{{ $about->address }}</p>
                                            <p class="mb-0"><strong>Phone</strong></p>
                                            <p class="pb-2">{{ $about->phone_number }}</p>
                                            <p class="mb-0"><strong>Email</strong></p>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection