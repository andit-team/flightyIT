@extends('admin.layout.app',['pageTitle' => __('Agent Dashboard')])
@section('content')


@component('admin.layout.inc.breadcrumb')
@slot('title')
My Dashboard
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
                                <h3 class="card-title">Ticket Status</h3>
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
                <h3 class="card-title">My Customers </h3>
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
