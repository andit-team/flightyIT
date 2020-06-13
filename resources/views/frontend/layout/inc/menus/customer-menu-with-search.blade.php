<header class="menu-section-area menu-search-area menu-after-login padding-zero">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg d-none d-sm-none d-md-block d-lg-block d-xl-block" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="{{asset('frontend')}}/img/mobile-logo.png" alt="logo" class="img-fluid"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Search Bar in Main Menu Area Start-->
            <div class="search-box">
                <form action="#" method="post">
                    <div class="custom-select">
                        <select>
                            <option value="House Cleaning">House Cleaning</option>
                            <option value="Photographers">Photographers</option>
                            <option value="Makeup artists">Makeup artists</option>
                            <option value="Handyman">Handyman</option>
                            <option value="Massage Therapy">Massage Therapy</option>
                            <option value="Dog Training">Dog Training</option>
                            <option value="Event Planners">Event Planners</option>
                        </select>
                    </div>
                    <input type="text" value="{{$logininfo['zip']}}" placeholder="Zip code">
                    <button type="submit">Search</button>
                </form>
            </div>
            <!-- Search Bar in Main Menu Area End-->

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-capitalize ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="pro.html">Sign up as a pro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-activity.html">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer-inbox.html">inbox</a>
                    </li>
                    <li class="nav-item dropdown-box">
                        <a class="nav-link" href="#"><span class="customer-img"><img src="{{ !isset($logininfo['picture']) ? asset('frontend').'/img/pros-img/1.jpg' : asset('/').$logininfo['picture'] }}" alt="img"></span>{{$logininfo['name']}}<i class="fas fa-angle-down"></i></a>
                        <ul class="dropdown-list">
                            <li><a href="customer-profile.html">Profile</a></li>
                            <li><a href="index.html">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <!-- Mobile Menu Start -->
    <nav class="mobile_menu hidden d-none">
        <a href="index.html"><img class="mobile-logo" src="assets/img/mobile-logo.png" alt="logo"></a>
        <ul class="nav navbar-nav navbar-right menu">

            <!-- Search Bar in Mobile Menu Area Start-->
            <div class="search-box">
                <form action="#" method="post">
                    <div class="custom-select">
                        <select>
                            <option value="House Cleaning">House Cleaning</option>
                            <option value="Photographers">Photographers</option>
                            <option value="Makeup artists">Makeup artists</option>
                            <option value="Handyman">Handyman</option>
                            <option value="Massage Therapy">Massage Therapy</option>
                            <option value="Dog Training">Dog Training</option>
                            <option value="Event Planners">Event Planners</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Zip code">
                    <button type="submit">Search</button>
                </form>
            </div>
            <!-- Search Bar in Mobile Menu Area End-->

            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pro.html">Sign up as a pro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer-activity.html">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer-inbox.html">inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customer-profile.html">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Log out</a>
            </li>
        </ul>
    </nav>
    <!-- Mobile Menu End -->

</header>