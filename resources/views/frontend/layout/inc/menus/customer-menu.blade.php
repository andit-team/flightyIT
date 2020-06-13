<header class="menu-section-area menu-after-login padding-zero">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg d-none d-sm-none d-md-block d-lg-block d-xl-block" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="{{asset('frontend')}}/img/logo.png" alt="logo" class="img-fluid"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-capitalize ml-auto">
                    <li class="nav-item">
                        <a class="nav-link theme-button" href="pro.html">Sign up as a pro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-projects.html">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-inbox.html">inbox</a>
                    </li>
                    <li class="nav-item dropdown-box">
                        <a class="nav-link" href="#"><span class="customer-img"><img src="{{ !isset($logininfo['picture']) ? asset('frontend').'/img/pros-img/1.jpg' : asset('/').$logininfo['picture'] }}" alt="img"></span>{{$logininfo['name']}}<i class="fas fa-angle-down"></i></a>
                        <ul class="dropdown-list">
                            <li><a href="{{url('customer/profile')}}">Profile</a></li>
                            <li><a href="{{url('logout')}}">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <!-- Mobile Menu Start -->
    <nav class="mobile_menu hidden d-none">
        <a href="index.html"><img class="mobile-logo" src="{{asset('frontend')}}/img/mobile-logo.png" alt="logo"></a>
        <ul class="nav navbar-nav navbar-right menu">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pro.html">Sign up as a pro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer-projects.html">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer-inbox.html">inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('customer/profile')}}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('logout')}}">Log out</a>
            </li>
        </ul>
    </nav>
    <!-- Mobile Menu End -->

</header>