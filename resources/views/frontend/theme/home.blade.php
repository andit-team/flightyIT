
@extends('frontend.layout.theme-master',['pageTitle' => __('home page')])
@section('content')


	<!-- Hero Area Start -->
    <section class="hero-area padding-zero">
        <div class="container">
            <div class="row hero-wrapper">

                <!-- Hero Left Side -->
                <div class="col-12 col-sm-12 col-md-10 col-lg-7">
                    <div class="hero-search-content-left">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#hire-pro" role="tab" data-toggle="tab">Hire a pro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#find-customer" role="tab" data-toggle="tab">Find customer</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="hire-pro">
                                <div class="search-box">
                                    <h1>Find local professionals for pretty much anything.</h1>
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
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="find-customer">
                                <div class="find-customer">
                                    <h1>Meet new customers in your area.</h1>
                                    <p>Sign up for a free profile on Hilhome to start growing your business.</p>
                                    <a href="pro.html" class="btn theme-button">Get started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Left Side -->
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="hero-slider-area" id="randomImage">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End -->

    <!-- Home App Download Area Start -->
    <section class="home-app-download-area padding-zero">
        <div class="container">
            <div class="row home-app-slider-outer position-relative">
                <div class="col-12">
                    <div class="home-app-slider-wrap owl-carousel">

                        <!-- Single Item Start -->
                        <div class="item d-flex">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="home-app-content">
                                    <h4>When you need to hire someone – a landscaper, a DJ, anyone – Hilhome finds them for you for free.</h4>
                                    <p>See price estimates, read reviews and chat with pros, all in the app.</p>
                                    <div class="apple-google-btn-wrap">
                                        <a href="#"><img src="{{asset('frontend')}}/img/home-app-slide-img/apple-app-btn.png" alt="img"></a>
                                        <a href="#"><img src="{{asset('frontend')}}/img/home-app-slide-img/google-app-btn.png" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="home-app-img-side">
                                    <img src="{{asset('frontend')}}/img/home-app-slide-img/1.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item d-flex">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="home-app-content">
                                    <h4>Wait, what’s a pro?</h4>
                                    <p>Hilhome pros are local business owners right in your community. They’re the neighbors you just haven’t met yet, with the skills you need to get the job done.</p>
                                    <div class="apple-google-btn-wrap">
                                        <a href="how-it-works.html" class="btn theme-button">Lern more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="home-app-img-side">
                                    <img src="{{asset('frontend')}}/img/home-app-slide-img/2.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item d-flex">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="home-app-content">
                                    <h4>The Hilhome Guarantee.</h4>
                                    <p>If the job isn’t done as agreed, you can get your money back. And if there’s property damage, you’re protected.</p>
                                    <div class="apple-google-btn-wrap">
                                        <a href="guarantee.html" class="btn theme-button">Lern more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="home-app-img-side">
                                    <img src="{{asset('frontend')}}/img/home-app-slide-img/1.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                        <!-- Single Item End -->

                    </div>
                    <div class="slide_nav">
                        <span class="testi_prev"><i class="fas fa-angle-left"></i></span>
                        <span class="testi_next"><i class="fas fa-angle-right"></i></span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Home App Download Area End -->

    <!-- Services Near Me Start -->
    <section class="services-area">
        <div class="container">
            <div class="row hero-wrapper services-wrapper">

                <!-- Hero Left Side -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home-essentials" role="tab" data-toggle="tab">Home Essentials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#outdoor-services" role="tab" data-toggle="tab">Outdoor Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#fitness-wellness" role="tab" data-toggle="tab">Fitness/Wellness</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tax-prep-financial" role="tab" data-toggle="tab">Tax Prep & Financial Planning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="more-services.html" role="tab" data-toggle="tab">More</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home-essentials">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="outdoor-services">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/4.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/5.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/6.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="fitness-wellness">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/7.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tax-prep-financial">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/4.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/5.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="more-services.html">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/6.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/7.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>HVAC Technicians</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Services Near Me End -->

    <!-- Get Free Cost Estimate Area Start -->
    <section class="recent-questions-area get-free-cost-estimate-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-area">
                        <h3 class="section-heading">Get free cost estimates.</h3>
                        <p> We analyzed millions of bids from Thumbtack professionals to see what things really cost. Find out what other people have paid for projects like yours.</p>
                    </div>
                </div>
            </div>

            <div class="row home-app-slider-outer position-relative">
                <div class="col-12">
                    <div class="recent-questions-slider-wrap owl-carousel">

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="prices-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>Local Moving (under 50 miles)</h6>
                                    <p><i class="fas fa-dollar-sign"></i>Avg. price:<span>$80 – $100</span></p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="prices-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>Carpet Cleaning</h6>
                                    <p><i class="fas fa-dollar-sign"></i>Avg. price:<span>$120 – $150</span></p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="prices-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                                    <h6>Junk Removal</h6>
                                    <p><i class="fas fa-dollar-sign"></i>Avg. price:<span>$170 – $230</span></p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="prices-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/4.jpg" alt="img">
                                    <h6>Carpet Cleaning</h6>
                                    <p><i class="fas fa-dollar-sign"></i>Avg. price:<span>$120 – $150</span></p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                    </div>
                    <div class="slide_nav">
                        <span class="testi_prev"><i class="fas fa-angle-left"></i></span>
                        <span class="testi_next"><i class="fas fa-angle-right"></i></span>
                    </div>
                </div>
                <div class="col-12">
                    <a href="prices.html" class="btn theme-button">See all cost guides</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Get Free Cost Estimate Area End -->

    <!-- Home States Area Start -->
    <section class="recent-questions-area home-states-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="trending-now-these-areas">
                        <h5>Trending now in these areas.</h5>
                        <p>
                            <a href="#">Atlanta</a>
                            <a href="#">Boston</a>
                            <a href="#">Dallas</a>
                            <a href="#">Denver</a>
                            <a href="#">Houston</a>
                            <a href="#">Miami</a>
                            <a href="#">Phoenix</a>
                            <a href="#">San Francisco</a>
                            <a href="#">Seattle</a>
                            <a href="#">Washington DC</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row all-50-states align-items-center">
                <div class="col-12 col-12 col-md-4">
                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="all-50-states-content">
                        <div class="section-title-area">
                            <h3 class="section-heading">All 50 states.</h3>
                            <p>There’s nothing worse than getting your hopes up, then not being able to find what you want. That won’t happen on Thumbtack. From big cities to small towns, we’ve got pros covering every county in the U.S.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row all-states-name-area">
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <ul>
                        <li><a href="#">Atlanta</a></li>
                        <li><a href="#">Boston</a></li>
                        <li><a href="#">Dallas</a></li>
                        <li><a href="#">Denver</a></li>
                        <li><a href="#">Houston</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Phoenix</a></li>
                        <li><a href="#">San Francisco</a></li>
                        <li><a href="#">Seattle</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="section-title-area">
                        <h5 class="section-heading">Popular services in Your Area.</h5>
                    </div>
                </div>
            </div>
            <div class="row home-app-slider-outer position-relative">
                <div class="col-12">
                    <div class="popular-services-slider-wrap owl-carousel">

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>House Cleaning</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>Handyman</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                                    <h6>Massage Therapy</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="all-services-near-me.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>Handyman</h6>
                                    <p><i class="fas fa-map-marker-alt"></i>See pros near you</p>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                    </div>
                    <div class="popular_slide_nav">
                        <span class="testi_prev"><i class="fas fa-angle-left"></i></span>
                        <span class="testi_next"><i class="fas fa-angle-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home States Area End -->

    <!-- Recent Questions Area Start -->
    <section class="recent-questions-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-area">
                        <h3 class="section-heading">Recent questions from Hilhome customers.</h3>
                    </div>
                </div>
            </div>

            <div class="row home-app-slider-outer position-relative">
                <div class="col-12">
                    <div class="recent-questions-slider-wrap owl-carousel">

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="question-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/1.jpg" alt="img">
                                    <h6>What is an HVAC system?</h6>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="question-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/2.jpg" alt="img">
                                    <h6>Do you tip cabinet installers?</h6>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="question-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                                    <h6>How much does it cost for surround sound installation?</h6>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                        <!-- Single Item Start -->
                        <div class="item">
                            <a href="question-details.html">
                                <div class="services-box">
                                    <img src="{{asset('frontend')}}/img/services-img/4.jpg" alt="img">
                                    <h6>How much does it cost to have gutters cleaned?</h6>
                                </div>
                            </a>
                        </div>
                        <!-- Single Item End -->

                    </div>
                    <div class="slide_nav">
                        <span class="testi_prev"><i class="fas fa-angle-left"></i></span>
                        <span class="testi_next"><i class="fas fa-angle-right"></i></span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Recent Questions Area End -->

    <!-- Open For Business Area Start -->
    <section class="open-for-business-area">
        <div class="container">
            <div class="row all-50-states align-items-center">
                <div class="col-12 col-sm-12 col-md-4">
                    <img src="{{asset('frontend')}}/img/services-img/3.jpg" alt="img">
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="all-50-states-content">
                        <div class="section-title-area">
                            <h3 class="section-heading">Open for business.</h3>
                            <p>Whatever work you do, we’ll find you the jobs you want.</p>
                            <a href="pro.html" class="btn theme-button">Become a Hilhome pro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Open For Business Area End -->


@endsection