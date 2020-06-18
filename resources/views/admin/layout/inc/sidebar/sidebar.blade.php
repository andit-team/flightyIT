<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <?php $userImage = Core::getinfo('users','id',Sentinel::getUser()->id)?>
        <!-- User profile -->
        <div class="user-profile" style="background: url({{!empty($userImage->profile_banar)?asset($userImage->profile_banar) : asset('material//assets/images/users/1.jpg')}}) no-repeat; background-position: center; background-size: cover;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{!empty($userImage->profile_image)?asset($userImage->profile_image) : asset('material//assets/images/users/1.jpg')}}" alt="user"></div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Sentinel::getUser()->name}}</a>
                <div class="dropdown-menu animated flipInY"> 
                    <a href="{{url('system-admin/myprofile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a> 
                    <a href="{{url('system-admin/users/activities')}}" class="dropdown-item"><i class="mdi mdi-run-fast"></i> My Activities</a> 
                    <a href="{{url('system-admin/users/notification')}}" class="dropdown-item"><i class="mdi mdi-alarm-multiple"></i> My Notification</a>
                    <div class="dropdown-divider"></div> 
                    <a href="{{url('system-admin/myprofile')}}" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> 
                    <a href="{{url('system-admin/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{-- Dashboard --}}
                <li><a href="{{url('system-admin/dashboard')}}"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a></li>
                

                @if(Sentinel::hasAccess('agent'))
                    <li class="{{ Request::is('Payroll/*')?'active':''}}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('payroll/*')?'true':'false'}}"><i class="fa fa-cogs" style="font-size:17px"></i><span class="hide-menu">Agents</span></a>
                        <ul aria-expanded="{{ (Request::is('payroll/*') || Request::is('payroll/*'))?'true':'false'}}" class="collapse {{ (Request::is('payroll/*') || Request::is('payroll/*'))?'in':''}}">

                            <li><a href="{{url('system-admin/agent/create')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> New Agent</a></li>

                            <li><a href="{{url('system-admin/agent/')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Manage Agents</a></li>
                        </ul>                            
                    </li>
                @endif

                @if(Sentinel::hasAccess('agency'))
                    <li class="{{ Request::is('Payroll/*')?'active':''}}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('payroll/*')?'true':'false'}}"><i class="fa fa-cogs" style="font-size:17px"></i><span class="hide-menu">Agency</span></a>
                        <ul aria-expanded="{{ (Request::is('payroll/*') || Request::is('payroll/*'))?'true':'false'}}" class="collapse {{ (Request::is('payroll/*') || Request::is('payroll/*'))?'in':''}}">

                            <li><a href="{{url('system-admin/agency/create')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> New Agency</a></li>

                            <li><a href="{{url('system-admin/agency/')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Manage Agencies</a></li>
                        </ul>                            
                    </li>
                @endif
                
                @if(Sentinel::hasAccess('tickets'))
                    <li class="{{ Request::is('Payroll/*')?'active':''}}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('payroll/*')?'true':'false'}}"><i class="fa fa-cogs" style="font-size:17px"></i><span class="hide-menu">Tickets</span></a>
                        <ul aria-expanded="{{ (Request::is('payroll/*') || Request::is('payroll/*'))?'true':'false'}}" class="collapse {{ (Request::is('payroll/*') || Request::is('payroll/*'))?'in':''}}">

                            <li><a href="{{url('system-admin/ticket/create')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Add Ticket</a></li>

                            <li><a href="{{url('system-admin/ticket/')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Search Ticket</a></li>

                            <li><a href="{{url('system-admin/ticket/')}}" class="{{ request()->is('payroll/system-setting/create') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> Stock</a></li>
                        </ul>                            
                    </li>
                @endif

                @if(Sentinel::hasAccess('user-management'))
                    <hr class="hide-menu hr-borderd">
                    <li class="{{ Request::is('users/*')?'active':''}}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('users/*')?'true':'false'}}"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">User Management</span></a>
                        <ul aria-expanded="{{ Request::is('users/*')?'true':'false'}}" class="collapse {{ Request::is('users/*')?'in':''}}">
                            @if(Sentinel::hasAccess('user-menu'))
                            <li class="{{ Request::is('users/*/edit') && !Request::is('users/role/*')?'active':''}}">
                                <a class="has-arrow" href="#" aria-expanded="{{ Request::is('users/*/edit') && !Request::is('users/role/*')?'true':'false'}}"><i class="mdi mdi-account-multiple"></i> Manage User</a>
                                <ul aria-expanded="{{ Request::is('users/*/edit') && !Request::is('users/role/*')?'true':'false'}}" class="collapse {{ Request::is('users/*/edit') && !Request::is('users/role/*')?'in':''}}">
                                    @if(Sentinel::hasAccess('user-index'))
                                    <li><a href="{{url('system-admin/users')}}" class="{{ (Request::is('users/*/edit') && !Request::is('users/create')) && !Request::is('users/role/*')?'active':''}}"><i class="mdi mdi-library-books"></i> User List</a></li>
                                    @endif
                                    @if(Sentinel::hasAccess('user-add'))
                                    <li><a href="{{url('system-admin/users/create')}}"><i class="mdi mdi-open-in-new"> </i> New User</a></li>
                                    @endif
                                    @if(Sentinel::hasAccess('activities'))
                                    <li><a href="{{url('system-admin/users/activities')}}"><i class="mdi mdi-run-fast"></i> Users Activities</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            
                            @if(Sentinel::hasAccess('role-menu'))
                            <li class="{{ Request::is('users/role/*')?'active':''}}">
                                <a class="has-arrow" href="#" aria-expanded="{{ Request::is('users/role/*')?'true':'false'}}"><i class="mdi mdi-human-greeting"></i> Manage Roles</a>
                                <ul aria-expanded="false" class="collapse {{ Request::is('users/role/*')?'in':''}}">
                                    @if(Sentinel::hasAccess('role-index'))
                                    <li><a href="{{url('system-admin/users/roles')}}" class="{{ (Request::is('users/role/*') && !Request::is('users/role/create'))?'active':''}}"><i class="mdi mdi-library-books"></i> Roles List</a></li>
                                    @endif
                                    @if(Sentinel::hasAccess('role-add'))
                                    <li>
                                        <a href="{{route('createRole')}}" class="{{ Request::is('createRole')?'active':''}}"> <i class="mdi mdi-open-in-new"> </i> Add New</a>
                                    </li>
                                    @endif

                                </ul>
                            </li>
                            @endif 

                            @if(Sentinel::hasAccess('permission-menu'))
                            <li class="{{ Request::is('users/permission/*')?'active':''}}">
                                <a class="has-arrow" href="#" aria-expanded="{{Request::is('users/permission/*')?'true':'false'}}}}"><i class="mdi mdi-key"></i> Permissions</a>
                                <ul aria-expanded="false" class="collapse {{Request::is('users/permission/*')?'in':''}}}}">
                                    @if(Sentinel::hasAccess('permission-index'))
                                    <li><a href="{{url('system-admin/users/permissions')}}" class="{{ (Request::is('users/permission/*') && !Request::is('users/permission/create') ) ?'active':''}}"><i class="mdi mdi-library-books"></i> Permission List</a></li>
                                    @endif
                                    @if(Sentinel::hasAccess('permission-add'))
                                    <li>
                                        <a href="{{url('system-admin/users/permission/create')}}" class="{{ Request::is('users/permission/create')?'active':''}}"> <i class="mdi mdi-open-in-new"> </i> Add New</a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if(Sentinel::hasAccess('notifacation'))
                            <li>
                                <a href="{{url('system-admin/users/notification')}}"><i class="mdi mdi-alarm-multiple"></i> Notifications</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Sentinel::hasAccess('cms-management'))
                    <li class="{{ request()->is('cms/*') ? 'active' : '' }}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('cms/*')?'true':'false'}}"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">CMS</span></a>
                        <ul aria-expanded="{{ Request::is('cms/*')?'true':'false'}}" class="collapse {{ Request::is('cms/*')?'in':''}}">
                            @if(Sentinel::hasAccess('index-cms-page'))
                                <li><a href="{{url('system-admin/cms/')}}" class="{{ request()->is('system-admin/cms') && !Request::is('system-admin/cms/create') && !Request::is('system-admin/cms/menu') ? 'active' : '' }}"><i class="mdi mdi-content-duplicate"></i> Pages</a></li>
                            @endif
                            @if(Sentinel::hasAccess('create-cms-page'))
                                <li><a href="{{url('system-admin/cms/create')}}" class="{{ request()->is('system-admin/cms/create') ? 'active' : '' }}"><i class="mdi mdi-content-duplicate"></i> New Pages</a></li>
                            @endif
                            @if(Sentinel::hasAccess('cms-menu'))
                                <li><a href="{{url('system-admin/cms/menu')}}" class="{{ request()->is('system-admin/cms/menu') ? 'active' : '' }}"><i class="mdi mdi-content-duplicate"></i> Menus</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Core::isAdmin())
                    <li class="{{ Request::is('settings/*')?'active':''}}">
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ Request::is('settings/*')?'true':'false'}}"><i class="fa fa-cogs" style="font-size:17px"></i><span class="hide-menu">Settings</span></a>
                        <ul aria-expanded="{{ (Request::is('settings/siteSetting/*') || Request::is('settings/siteSetting/*'))?'true':'false'}}" class="collapse {{ (Request::is('settings/siteSetting/*') || Request::is('settings/siteSetting/*'))?'in':''}}">
                            <li><a href="{{url('system-admin/settings/system-setting/general')}}" class="{{ request()->is('settings/system-setting/general') ? 'active' : '' }}"><i class="mdi mdi-settings-box"></i> General Setting</a></li>
                            <li><a href="{{url('system-admin/settings/system-setting/site')}}" class="{{ request()->is('settings/system-setting/site') ? 'active' : '' }}"><i class="mdi mdi-wrench"></i> System Setting</a></li>
                        </ul>                            
                    </li>

                    <li class="{{ Request::is('emailtemplate/*')?'active':''}}">
                       <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="{{ (Request::is('emailtemplate/*') || Request::is('mailbox/*'))?'true':'false'}}"><i class="mdi mdi-email-variant"></i><span class="hide-menu"> Emails </span></a>
                        <ul aria-expanded="{{ (Request::is('emailtemplate/*') || Request::is('mailbox/*'))?'true':'false'}}" class="collapse {{ (Request::is('emailtemplate/*') || Request::is('mailbox/*'))?'in':''}}">
                            <li><a href="{{url('system-admin/emailtemplate')}}" class="{{ request()->is('emailtemplate/*') ? 'active' : '' }}"><i class="mdi mdi-library-books"></i> Email Templates</a></li>
                            <li><a href="{{url('system-admin/mailbox')}}" class="{{ request()->is('mailbox/*') ? 'active' : '' }}"><i class="mdi mdi-email-open-outline"></i> Mailbox</a></li>
                        </ul>                           
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <a href="{{url('system-admin/myprofile')}}" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <a href="{{url('system-admin/users/activities')}}" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-run-fast"></i></a>
        <a href="{{url('system-admin/logout')}}" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>