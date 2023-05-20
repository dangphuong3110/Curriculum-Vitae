<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile {{ $user->name }}</title>
    <!-- Libraries CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <header>
        <div class="profile-page mb-5">
            <nav class="navbar navbar-expand-lg bg-nav fixed-top">
                <div class="container">
                    <a class="navbar-translate" href="{{ route('guest') }}" data-aos="flip-left">Creative CV</a>
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list fs-1 text-white"></i>
                    </button>
                    <div id="navigation" class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto me-5">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cv', $user->id) }}" data-aos="flip-left">Your CV</a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="" class="nav-link" data-aos="flip-left" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row mt-2">
            <div class="col-12 text-end">
                <i class="bi bi-person-circle"></i> <b class="fs-6">{{ $user->name }}</b>
            </div>
        </div>
    </div>
    @yield('content')

    <!-- MODAL-LOGOUT -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #378c3f; color: #fff">
                    <h5 class="modal-title" id="confirmLogoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fs-5">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger me-2" onclick="confirmLogout()">Logout</button>
                    <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Libraries Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        AOS.init();
        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>