<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="hilhome">
    <meta name="keywords" content="service, repair, customer">
    <meta name="author" content="hilhome">

    <meta property="og:type" content="Web Template">
    <meta property="og:title" content="hilhome">
    <meta property="og:description" content="hilhome">
    <meta property="og:image" content="{{asset('frontend')}}/img/logo.png">

    <meta name="twitter:card" content="hilhome">
    <meta name="twitter:title" content="hilhome">
    <meta name="twitter:description" content="hilhome">
    <meta name="twitter:image" content="{{asset('frontend')}}/img/logo.png">

    <meta name="msapplication-TileImage" content="{{asset('frontend')}}/img/logo.png">

    <meta name="msapplication-TileColor" content="#407bff">
    <meta name="theme-color" content="#3fa3fe">

    <title>Hilhome</title>

    <!--=======================================
      All CSS Style link
    ===========================================-->
    @stack('css')
    @stack('tostCSS')
    <style>
        .toast-success {background-color: #51A351 !important;}
        .toast-error {background-color: #BD362F !important;}
        .toast-warning {background-color: #F89406 !important;}
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet">

    <!-- FAVICONS -->
    <link rel="icon" href="{{asset('frontend')}}/img/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{asset('frontend')}}/img/favicon-16x16.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('frontend')}}/img/favicon-16x16.png">

    <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{asset('frontend')}}/img/apple-icon-72x72.png" sizes="72x72" />
    <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{asset('frontend')}}/img/apple-icon-114x114.png" sizes="114x114" />
    <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{asset('frontend')}}/img/apple-icon-144x144.png" sizes="144x144" />
    <link rel="apple-touch-icon-precomposed" type="image/x-icon" href="{{asset('frontend')}}/img/favicon-16x16.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Pre Loader Area start -->
<!--    <div id="preloader">-->
<!--        <div class="loader"></div>-->
<!--    </div>-->
    <!-- Pre Loader Area End -->

    <!-- Menu Area Start -->
    @if(isset($menu))
        @include('frontend.layout.inc.menus.'.$menu,['logininfo' => session()->get('logininfo')[0]])
    @else
        @if(isset(session()->get('logininfo')[0]))
            @include('frontend.layout.inc.menus.customer-menu',['logininfo' => session()->get('logininfo')[0]])
        @else
            @include('frontend.layout.inc.menus.common_menu')
        @endif
    @endif
    <!-- Menu Area End -->

    @yield('content')

    <!-- Footer Start -->
    <footer class="footer">
        <!-- Footer Upper Area Start-->
        <div class="footer-upper-area">
            <div class="container">
                <!-- Row Start-->
                <div class="row">

                    <!-- Column Start-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-widget">
                            <p>Hilhome <span>Consider it Done</span></p>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="careers.html">Careers</a></li>
                                <li><a href="press.html">Press</a></li>
                                <li><a href="blog.html">Blog</a></li>
                            </ul>
                            <ul class="social-media d-flex">
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Column End-->

                    <!-- Column Start-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-widget">
                            <p>Customers</p>
                            <ul>
                                <li><a href="how-it-works.html">How to use Hilhome</a></li>
                                <li><a href="register.html">Sign up</a></li>
                                <li><a href="app.html">Get the app</a></li>
                                <li><a href="near-me.html">Services near me</a></li>
                                <li><a href="prices.html">Cost estimates</a></li>
                                <li><a href="how-to.html">Project how to’s</a></li>
                                <li><a href="guides.html">Project guides</a></li>
                                <li><a href="questions.html">Questions and answers</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Column End-->

                    <!-- Column Start-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-widget">
                            <p>Pros</p>
                            <ul>
                                <li><a href="how-hilhome-works.html">Hilhome for pros</a></li>
                                <li><a href="pro.html">Sign up as a pro</a></li>
                                <li><a href="community.html">Community</a></li>
                                <li><a href="stories.html">Success stories</a></li>
                                <li><a href="reviews.html">Pro reviews</a></li>
                                <li><a href="pro-app.html">iPhone app for pros</a></li>
                                <li><a href="pro-app.html">Android app for pros</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Column End-->

                    <!-- Column Start-->
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="footer-widget">
                            <p>Support</p>
                            <ul>
                                <li><a href="help.html">Help</a></li>
                                <li><a href="safety.html">Safety</a></li>
                                <li><a href="terms.html">Terms of Use</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="syndication-opt-out.html">Do Not Sell My Info</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Column End-->

                </div>
                <!-- Row End-->
            </div>
        </div>
        <!--  Footer Upper Area End-->

        <!-- Footer Bottom Area Start-->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-bottom-part">
                            <div class="copyright"><a href="https://hilhome.com/"><img src="{{asset('frontend')}}/img/favicon.png" alt="icon"> &copy; 2020 Hilhome, Inc.</a></div>
                            <div class="bottom-footer-right">
                                <a href="guarantee.html"><i class="fas fa-shield-alt"></i>Hilhome Guarantee</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Footer Bottom Area End-->

    </footer>
    <!-- Footer End -->

    <!--Go To Top Arrow area start-->
    <div class="top-arrow">
        <a id="scroll" style="display: none;"><i class="fas fa-angle-up"></i></a>
    </div>
    <!--Go To Top Arrow area End-->

    <!--=======================================
        All Jquery Script link
    ===========================================-->

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/jquery/popper.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->

   

    <!--VenoBox Script-->
    <script src="{{asset('frontend')}}/js/venobox.min.js"></script>

    <!--WOW JS Script-->
    <script src="{{asset('frontend')}}/js/wow.min.js"></script>

    <!--Owl Carousel JS Script-->
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>

    <!--Mean Menu/Mobile Menu Script-->
    <script src="{{asset('frontend')}}/js/jquery.meanmenu.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('frontend')}}/js/custom.js"></script>
    @stack('js')
    <script>
        var randomImage = {
            paths: [
                "{{asset('frontend')}}/img/hero-slide-img/1.jpg",
                "{{asset('frontend')}}/img/hero-slide-img/2.jpg",
                "{{asset('frontend')}}/img/hero-slide-img/3.jpg"
            ],

            generate: function(){
                var path = randomImage.paths[Math.floor(Math.random()*randomImage.paths.length)];
                var img = new Image();
                img.src = path;
                $("#randomImage").html(img);
            }
        };

        randomImage.generate();
    </script>
</body>

</html>