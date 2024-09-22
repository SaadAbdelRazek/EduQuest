<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> App landing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">

</head>
<body>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/loder.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start-->


<!-- Register -->

<main class="login-body" data-vide-bg="{{asset('img/login-bg.mp4')}}">
    <!-- Login Admin -->
    <form class="form-default" action="" method="POST">

        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="{{route('login')}}"><img src="{{asset('img/logo/loder.png')}}" alt=""></a>
            </div>
            <h2>Registration Here</h2>

            <div class="form-input">
                <input  type="text" name="name" placeholder="Full name">
            </div>
            <div class="form-input">
                <input type="email" name="email" placeholder="Email Address">
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Confirm Password">
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="Registration">
            </div>
            <!-- Forget Password -->
            <a href="{{route('login')}}" class="registration">login</a>
        </div>
    </form>
    <!-- /end login form -->
</main>



<script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/animated.headline.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>


<!-- Date Picker -->

<script src="{{asset('js/gijgo.min.js')}}"></script>

<!-- Nice-select, sticky -->

<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.sticky.js')}}"></script>

<!-- Progress -->

<script src="{{asset('js/jquery.barfiller.js')}}"></script>

<!-- counter , waypoint,Hover Direction -->

<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/hover-direction-snake.min.js')}}"></script>

<!-- contact -->

<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->

<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vide/0.5.1/jquery.vide.min.js"></script>

</body>
</html>
