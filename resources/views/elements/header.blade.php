

<--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                    {{ trans('global.home') }}
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <div class="input-group search-area d-lg-inline-flex d-none">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search here...">
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                        <i class="flaticon-381-link-1" style="font-size: 180%"></i> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div id="dlab_W_Notification1" class="widget-media dlab-scroll p-3 height380">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-panel">
                                            <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">Jira</a>
                                           </div>
                                    </li>
                                </ul>
                            </div>
                            <a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="32" height="32" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <div class="header-info">
                                <span class="text-black">{{ Auth::user()->name }}</span>
                                <p class="fs-12 mb-0">User role</p>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                                @can('profile_password_edit')    
                                <a href="{{ url('profile/password')}}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ms-2">{{ trans('global.change_password') }} </span>
                                </a>
                                @endcan
                            @endif
                            <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">{{ trans('global.logout') }} </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>