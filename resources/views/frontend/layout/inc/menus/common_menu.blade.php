<header class="menu-section-area padding-zero">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg d-none d-sm-none d-md-block d-lg-block d-xl-block" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend')}}/img/logo.png" alt="logo" class="img-fluid"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-capitalize ml-auto">
                    <li class="nav-item">
                        <a class="nav-link theme-button" href="pro.html">Join as a pro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('registration')}}">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <!-- Mobile Menu Start -->
    <nav class="mobile_menu hidden d-none">
        <a href="{{url('/')}}"><img class="mobile-logo" src="{{asset('frontend')}}/img/mobile-logo.png" alt="logo"></a>
        <ul class="nav navbar-nav navbar-right menu">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pro.html">Join as a pro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('registration')}}">Sign up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
        </ul>
    </nav>
    <!-- Mobile Menu End -->

</header>