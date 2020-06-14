@extends('admin.layout.app',['pageTitle' => __('Main Dashboard'),'activeMenu' => 'Event Organiser'])
@section('content')


@component('admin.layout.inc.breadcrumb')
@slot('title')
{{ __('messages.dashboard') }}
@endslot
@endcomponent


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
@include('elements.alert')
<div class="row">
    <!-- Column -->
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap">
                            <div>
                                <h3 class="card-title">Sales Overview</h3>
                                <h6 class="card-subtitle">Ample Admin Vs Pixel Admin</h6> </div>
                            <div class="ml-auto">
                                <ul class="list-inline">
                                    <li>
                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Ample</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Pixel</h6> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="amp-pxl" style="height: 360px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Our Visitors </h3>
                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                <div id="visitor" style="height:290px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-body text-center ">
                <ul class="list-inline m-b-0">
                    <li>
                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Mobile</h6> </li>
                    <li>
                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Desktop</h6> </li>
                    <li>
                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Tablet</h6> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card blog-widget">
            <div class="card-body">
                <div class="blog-image"><img src="{{ asset('material') }}/assets/images/big/img1.jpg" alt="img" class="img-responsive"/></div>
                 <h3>Business development new rules for 2017</h3>
                <label class="label label-rounded label-success">Technology</label>
                <p class="m-t-20 m-b-20">
                    Lorem ipsum dolor sit amet, this is a consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
                </p>
                <div class="d-flex">
                    <div class="read"><a href="javascript:void(0)" class="link font-medium">Read More</a></div>
                    <div class="ml-auto">
                        <a href="javascript:void(0)" class="link m-r-10 " data-toggle="tooltip" title="Like"><i class="mdi mdi-heart-outline"></i></a> <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="Share"><i class="mdi mdi-share-variant"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <div>
                        <h3 class="card-title">Newsletter Campaign</h3>
                        <h6 class="card-subtitle">Overview of Newsletter Campaign</h6> 
                    </div>
                    <div class="ml-auto align-self-center">
                        <ul class="list-inline m-b-0">
                            <li>
                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Open Rate</h6> </li>
                            <li>
                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Recurring Payments</h6> </li>

                        </ul>
                    </div>
                    
                </div> 
                <div class="campaign ct-charts"></div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 m-t-20"><h1 class="m-b-0 font-light">5098</h1><small>Total Sent</small></div>
                    <div class="col-lg-4 col-md-4 m-t-20"><h1 class="m-b-0 font-light">4156</h1><small>Mail Open Rate</small></div>
                    <div class="col-lg-4 col-md-4 m-t-20"><h1 class="m-b-0 font-light">1369</h1><small>Click Rate</small></div>
                </div>
            </div>
        </div>    
    </div>    
</div> 
<!-- Row -->
   
<!-- ============================================================== -->
<!-- End PAge Content -->

@push('css')
<link href="{{ asset('material') }}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="{{ asset('material') }}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
<link href="{{ asset('material') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<!--This page css - Morris CSS -->
<link href="{{ asset('material') }}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">

@endpush

@push('js')
    <script src="{{ asset('material') }}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{ asset('material') }}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('material') }}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{ asset('material') }}/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="{{ asset('material') }}/js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('material') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> --}}
@endpush
@include('admin.layout.inc.right-sidebar') 

@endsection
