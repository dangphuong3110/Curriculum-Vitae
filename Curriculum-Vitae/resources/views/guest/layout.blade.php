<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV {{ $user->name }}</title>
    <!-- Libraries CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <header>
        <div class="profile-page sidebar-collapse">
            <nav class="navbar navbar-expand-lg bg-nav fixed-top navbar-transparent">
                <div class="container">
                    <a class="navbar-translate" href="#" data-aos="flip-left">Creative CV</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#about" data-aos="flip-left">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#skills" data-aos="flip-left">Skills</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#portfolio" data-aos="flip-left">Portfolios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#experience" data-aos="flip-left">Experiences</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact" data-aos="flip-left">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container text-center">
            <a href="https://www.facebook.com/ndp.3110/" class="facebook btn btn-link">
                <i class="fa-brands fa-facebook-f fa-2x"></i>
            </a>
            <a href="#" class="twitter btn btn-link">
                <i class="fa-brands fa-twitter fa-2x"></i>
            </a>
            <a href="#" class="google btn btn-link">
                <i class="fa-brands fa-google-plus-g fa-2x"></i>
            </a>
            <a href="#" class="instagram btn btn-link">
                <i class="fa-brands fa-instagram fa-2x"></i>
            </a>
        </div>
        <div class="title text-center">
            <h4>Curriculum Vitae</h4>
        </div>
        <div class="text-center">
            <p>&copy; Creative CV</p>
        </div>
    </footer>
    <!-- Libraries Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Custom Js -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>