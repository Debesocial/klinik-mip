<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Welcome to Klinik</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/logo-klinik.jpg')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="public_assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public_assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="public_assets/css/animate.css" />
    <link rel="stylesheet" href="public_assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="public_assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="public_assets/css/main.css" />
</head>

<body>
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


    <header class="header navbar-area">
        <div class="toolbar-area" style="background: #194c79;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="toolbar-login">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index-2.html">
                                <img src="{{asset('assets/images/logo/logo-klinik.jpg')}}" alt="" style="width: 150px; height: 50px;">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll active dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="color: #194c79;">Home</a>
                                    </li>
                                    <li class="nav-item"><a href="contact.html" style="color: ##194c79;">about</a></li>
                                    <li class="nav-item"><a href="contact.html" style="color: ##194c79;">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="hero-area">
        <div class="hero-slider">
            <div class="hero-inner overlay" style="background-image: url('public_assets/1.webp');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Excellent And Friendly <br> Faculty
                                        Members</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting <br> industry. Lorem Ipsum has been the industry's
                                        standard
                                        <br>dummy text ever since an to impression.
                                    </p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-50">
                            <div class="home-slider">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Login to Klinik MIP</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            
                                            <form action="{{route('login')}}" method="POST">
                                                @csrf
                                                <div class="form-group position-relative has-icon-left mb-4 mt-3">
                                                    <input type="email" class="form-control form-control-xl" name="email" placeholder="email" value="hiski46@gmail.com" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left mb-4">
                                                    <input type="password" class="form-control form-control-xl" id="password" name="password" placeholder="Password" value="123123" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-shield-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-lg d-flex align-items-end">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                                                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                                        Show Password
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-lg d-flex align-items-end">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                                        Keep me logged in
                                                    </label>
                                                </div>
                                                <button type="submit" class=" form-control btn btn-primary mt-3 mb-5">Log in</button>
                                                @error("message")
                    <p class="text-danger">{{$message}}</p>
                @enderror
                                            </form>
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

    <div class="client-logo-section">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="client-logo">
                        <img src="logo/ABP.jpg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/MHA.png" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/MKP.png" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/MIP.png" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/MPM.png" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/RML.jpg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="logo/SUCOFINDO.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer p-3 text-center">
        <i>&copy; {{date('Y')}} <a href="mandiricoal.co.id">mandiricoal.co.id</a> </i>
        <i>Fueling the Bright Future</i>
       
    </footer>

    <script src="public_assets/js/bootstrap.min.js"></script>
    <script src="public_assets/js/count-up.min.js"></script>
    <script src="public_assets/js/wow.min.js"></script>
    <script src="public_assets/js/tiny-slider.js"></script>
    <script src="public_assets/js/glightbox.min.js"></script>
    <script src="public_assets/js/main.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

<!-- Mirrored from demo.graygrids.com/themes/edugrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jun 2022 10:07:27 GMT -->

</html>