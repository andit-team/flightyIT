<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/', []) }}">
                <b>
                    <!-- Light Logo icon -->
                    <img src="{{asset('logo-sort.png')}}" alt="">
                </b>
                <!--End Logo icon -->
                <span>
                 <b class="light-logo">{{session()->get('settings')[0]['site_name']}}</b>
                </span> </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
            </ul>
            <!-- ============================================================== -->
            
                
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">

                {{-- agent --}}
                @if(Sentinel::hasAccess('agency'))
                    <li class="nav-item"><a href="{{url('system-admin/agency/create')}}" class="nav-link waves-effect waves-dark"><i class="mdi mdi-settings-box"></i> Add Agency</a></li>
                @endif
                {{-- agent --}}
                @if(Sentinel::hasAccess('agent'))
                    <li class="nav-item"><a href="{{url('system-admin/agent/create')}}" class="nav-link waves-effect waves-dark"><i class="mdi mdi-settings-box"></i> Add Agent</a></li>
                @endif
                {{-- Add Ticket--}}
                @if(Sentinel::hasAccess('tickets'))
                    <li class="nav-item"><a href="{{url('system-admin/ticket/create')}}" class="nav-link waves-effect waves-dark {{ request()->is('ticket/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Add Ticket</a></li>
                @endif

                {{-- Tickets Search--}}
                @if(Sentinel::hasAccess('tickets'))
                    <li class="nav-item"><a href="{{url('system-admin/ticket/')}}" class="nav-link waves-effect waves-dark {{ request()->is('ticket/system-setting/') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Search Ticket</a></li>
                @endif

                <!-- Profile -->
                <!-- ============================================================== -->
                <?php $userImage = Core::getinfo('users','id',Sentinel::getUser()->id)?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{!empty($userImage->profile_image)?asset($userImage->profile_image) : asset('material/assets/images/users/1.jpg')}}" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{!empty($userImage->profile_image)?asset($userImage->profile_image) : asset('material/assets/images/users/1.jpg')}}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{Sentinel::getUser()->name}}</h4>
                                        <p class="text-muted">{{Sentinel::getUser()->email}}</p><a href="{{url('system-admin/myprofile')}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('system-admin/myprofile')}}"><i class="ti-user"></i> My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('system-admin/myprofile')}}"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('system-admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
