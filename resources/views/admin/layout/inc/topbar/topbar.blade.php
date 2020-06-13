<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/', []) }}">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{-- <img src="{{ !empty(session()->get('settings')[0]['logo'])?asset(Storage::url(session()->get('settings')[0]['logo'])) : url('logo.png') }}" alt="homepage" class="dark-logo"> --}}
                    <!-- Light Logo icon -->
                    <img src="{{asset('logo-sort.png')}}" alt="">
                    {{-- <img src="{{!empty(session()->get('settings')[0]['logo']) ? asset(Storage::url(session()->get('settings')[0]['logo'])) :  asset('logo.png')}}"  height="34" width="33" alt="user"> --}}
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                 <!-- dark Logo text -->
                 {{-- <img src="{{ asset('material') }}/assets/images/logo-text.png" alt="homepage" class="dark-logo" /> --}}
                 <!-- Light Logo text -->
                 {{-- <img src="{{ asset('material') }}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
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
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
              
            </ul>
            <!-- ============================================================== -->
            
                
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        @if(App\Notification::where('user',Sentinel::getUser()->id)->where('is_read',0)->count() > 0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <?php $notifactions = App\Notification::where('user',Sentinel::getUser()->id)->where('is_read',0)->get() ;?>
                            <li>
                                <div class="message-center">
                                    @forelse($notifactions as $data)
                                        <a href="{{url('system-admin/users/notification')}}" class="updateNotification" data-id={{$data->id}}>
                                            <div class="btn btn-success btn-circle"><i class="fa fa-bell"></i></div>
                                            <div class="mail-contnet">
                                            <h5>{{Sentinel::findById($data->from)->name}}</h5> <span class="mail-desc">{{$data->content}}</span>
                                            </div>
                                        </a>
                                    @empty
                                    @endforelse
                                </div>
                            <li>
                                <a class="nav-link text-center" href="{{url('system-admin/users/notification')}}"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                
                @if(Core::isAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <?php $emails = DB::table('mailboxes')->where('status','unread')->orderBy('id','desc');
                            $count = $emails->count();
                            $emails = $emails->get();
                        ?>
                        @if($count > 0)
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        @endif
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">Emails</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    @forelse($emails as $data)
                                    <a href="{{url('mailbox/detail/'.$data->id)}}">
                                        <div class="btn btn-success btn-circle"><i class="mdi mdi-email"></i></div>
                                        <div class="mail-contnet">
                                        <h5>{{$data->to}}</h5> <span class="mail-desc">{{Core::limit_text(strip_tags($data->message),5)}}</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="{{url('mailbox')}}"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
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
                            <li><a href="{{url('system-admin/users/activities')}}"><i class="mdi mdi-run-fast"></i> My Activities</a></li>
                            <li><a href="{{url('system-admin/users/notification')}}"><i class="mdi mdi-alarm-multiple"></i> My Notification</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('system-admin/myprofile')}}"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('system-admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                @php
                    if(\Session::has('locale')){
                        $language = Session::get('locale');
                        if($language == 'bn'){
                            $flag = 'bd';
                        }
                        if($language == 'hi'){
                            $flag = 'in';
                        }
                        if($language == 'en'){
                            $flag = 'us';
                        }
                    }else{
                        $flag = 'us';
                    }
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-{{$flag}}"></i></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up"> 
                        <a class="dropdown-item" href="{{url('locale/bn')}}"><i class="flag-icon flag-icon-bd"></i> Bangla</a> 
                        <a class="dropdown-item" href="{{url('locale/hi')}}"><i class="flag-icon flag-icon-in"></i> Hindi</a>
                        <a class="dropdown-item" href="{{url('locale/en')}}"><i class="flag-icon flag-icon-us"></i> English</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
