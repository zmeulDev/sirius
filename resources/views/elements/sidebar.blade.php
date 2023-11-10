<div class="dlabnav">
    <div class="dlabnav-scroll">
        

        <ul class="metismenu" id="menu">
                
                <li>
                    <a class=" {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        
                        <i class="flaticon-381-home-2"></i> 
                            <span class="nav-text">{{ trans('global.dashboard') }}</span>
                    </a>
                </li>
                @can('setup_access')
                    <li class="{{ request()->is("admin/checklists*") ? "menu-open" : "" }} {{ request()->is("admin/machines*") ? "menu-open" : "" }} {{ request()->is("admin/checklist-comments*") ? "menu-open" : "" }}">
                        
                    <a class="has-arrow ai-icon {{ request()->is("admin/checklists*") ? "active" : "" }} {{ request()->is("admin/machines*") ? "active" : "" }} {{ request()->is("admin/checklist-comments*") ? "active" : "" }}" href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-381-magic-wand"></i> 
                            <span class="nav-text">{{ trans('cruds.setup.title') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('checklist_access')
                                <li class="">
                                    <a href="{{ route("admin.checklists.index") }}" class="{{ request()->is("admin/checklists") || request()->is("admin/checklists/*") ? "active" : "" }}">
                                        {{ trans('cruds.checklist.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('machine_access')
                                <li class="">
                                    <a href="{{ route("admin.machines.index") }}" class="{{ request()->is("admin/machines") || request()->is("admin/machines/*") ? "active" : "" }}">
                                      {{ trans('cruds.machine.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('checklist_comment_access')
                                <li class="">
                                    <a href="{{ route("admin.checklist-comments.index") }}" class="{{ request()->is("admin/checklist-comments") || request()->is("admin/checklist-comments/*") ? "active" : "" }}">
                                    {{ trans('cruds.checklistComment.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('maintenance_access')
                    <li class="">
                        <a href="{{ route("admin.maintenances.index") }}" class=" {{ request()->is("admin/maintenances") || request()->is("admin/maintenances/*") ? "active" : "" }}">
                        <i class="flaticon-381-alarm-clock-1"></i> 
                            <span class="nav-text">{{ trans('cruds.maintenance.title') }}</span>   
                        
                        </a>
                    </li>
                @endcan
                @can('report_access')
                    <li class="  {{ request()->is("admin/daily-checks*") ? "menu-open" : "" }} {{ request()->is("admin/xo-softs*") ? "menu-open" : "" }}">
                        <a class="has-arrow ai-icon {{ request()->is("admin/daily-checks*") ? "active" : "" }} {{ request()->is("admin/xo-softs*") ? "active" : "" }}" href="javascript:void(0);" aria-expanded="false">
                        <i class="flaticon-381-diploma"></i> 
                            <span class="nav-text">{{ trans('cruds.report.title') }}</span>    
                        
                        </a>
                        <ul class="aria-expanded="false"">
                            @can('daily_check_access')
                                <li class="">
                                    <a href="{{ route("admin.daily-checks.index") }}" class="{{ request()->is("admin/daily-checks") || request()->is("admin/daily-checks/*") ? "active" : "" }}">
                                       {{ trans('cruds.dailyCheck.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('xo_soft_access')
                                <li class="">
                                    <a href="{{ route("admin.xo-softs.index") }}" class="{{ request()->is("admin/xo-softs") || request()->is("admin/xo-softs/*") ? "active" : "" }}">
                                      {{ trans('cruds.xoSoft.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('farm_info_access')
                    <li class="  {{ request()->is("admin/farms*") ? "menu-open" : "" }} {{ request()->is("admin/backup-clusters*") ? "menu-open" : "" }} {{ request()->is("admin/backup-trackers*") ? "menu-open" : "" }} {{ request()->is("admin/domains*") ? "menu-open" : "" }} {{ request()->is("admin/datacenters*") ? "menu-open" : "" }}">
                        <a class="has-arrow ai-icon {{ request()->is("admin/farms*") ? "active" : "" }} {{ request()->is("admin/backup-clusters*") ? "active" : "" }} {{ request()->is("admin/backup-trackers*") ? "active" : "" }} {{ request()->is("admin/domains*") ? "active" : "" }} {{ request()->is("admin/datacenters*") ? "active" : "" }}" href="javascript:void(0);" aria-expanded="false">
                        <i class="flaticon-381-panel-3"></i> 
                            <span class="nav-text">{{ trans('cruds.farmInfo.title') }}</span>   
                        
                        </a>
                        <ul class="aria-expanded="false"">
                            @can('farm_access')
                                <li class="">
                                    <a href="{{ route("admin.farms.index") }}" class="{{ request()->is("admin/farms") || request()->is("admin/farms/*") ? "active" : "" }}">
                                    {{ trans('cruds.farm.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('backup_cluster_access')
                                <li class="">
                                    <a href="{{ route("admin.backup-clusters.index") }}" class="{{ request()->is("admin/backup-clusters") || request()->is("admin/backup-clusters/*") ? "active" : "" }}">
                                {{ trans('cruds.backupCluster.title') }}
                              
                                    </a>
                                </li>
                            @endcan
                            @can('backup_tracker_access')
                                <li class="">
                                    <a href="{{ route("admin.backup-trackers.index") }}" class="{{ request()->is("admin/backup-trackers") || request()->is("admin/backup-trackers/*") ? "active" : "" }}">
                                      {{ trans('cruds.backupTracker.title') }}
                                  
                                    </a>
                                </li>
                            @endcan
                            @can('domain_access')
                                <li class="">
                                    <a href="{{ route("admin.domains.index") }}" class="{{ request()->is("admin/domains") || request()->is("admin/domains/*") ? "active" : "" }}">
                                      {{ trans('cruds.domain.title') }}
                                     
                                    </a>
                                </li>
                            @endcan
                            @can('datacenter_access')
                                <li class="">
                                    <a href="{{ route("admin.datacenters.index") }}" class="{{ request()->is("admin/datacenters") || request()->is("admin/datacenters/*") ? "active" : "" }}">
                                    {{ trans('cruds.datacenter.title') }}
                                    
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="{{ request()->is("admin/user-alerts*") ? "menu-open" : "" }}">
                        <a class="has-arrow ai-icon {{ request()->is("admin/user-alerts*") ? "active" : "" }}" href="javascript:void(0);" aria-expanded="false">
                        <i class="flaticon-381-settings-3"></i> 
                            <span class="nav-text">{{ trans('cruds.setting.title') }}</span>   
                        
                        </a>
                        <ul aria-expanded="false">
                            @can('user_alert_access')
                                <li class="">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                      {{ trans('cruds.userAlert.title') }}
                                    </a> 
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="  {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }}">
                        <a class="has-arrow ai-icon {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/permissions*") ? "active" : "" }}" href="javascript:void(0);" aria-expanded="false">
                            <i class="flaticon-381-user-8"></i> 
                            <span class="nav-text">{{ trans('cruds.userManagement.title') }}</span>    
                        </a>
                        <ul aria-expanded="false">
                            @can('user_access')
                                <li class="">
                                    <a href="{{ route("admin.users.index") }}" class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                       {{ trans('cruds.user.title') }}
                                    </a>  
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="">
                                    <a href="{{ route("admin.roles.index") }}" class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        {{ trans('cruds.role.title') }}
                                    </a>  
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="">
                                    <a href="{{ route("admin.permissions.index") }}" class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        {{ trans('cruds.permission.title') }}
                                    </a>    
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="">
                    <a href="{{ route("admin.systemCalendar") }}" class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        
                        <i class="flaticon-381-calendar-3"></i> 
                            <span class="nav-text">{{ trans('global.systemCalendar') }}</span>
                    </a>
                </li>
        </ul>

        <a class="add-menu-sidebar" href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#addOrderModalside" >+ New Checklist</a>
        <div class="copyright">
            <p><strong>Sirius Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> in Cluj</p>
        </div>
    </div>
</div>