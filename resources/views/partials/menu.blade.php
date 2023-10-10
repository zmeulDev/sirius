<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('setup_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/checklists*") ? "menu-open" : "" }} {{ request()->is("admin/machines*") ? "menu-open" : "" }} {{ request()->is("admin/checklist-comments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/checklists*") ? "active" : "" }} {{ request()->is("admin/machines*") ? "active" : "" }} {{ request()->is("admin/checklist-comments*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setup.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('checklist_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.checklists.index") }}" class="nav-link {{ request()->is("admin/checklists") || request()->is("admin/checklists/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.checklist.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('machine_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.machines.index") }}" class="nav-link {{ request()->is("admin/machines") || request()->is("admin/machines/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-desktop">

                                        </i>
                                        <p>
                                            {{ trans('cruds.machine.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('checklist_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.checklist-comments.index") }}" class="nav-link {{ request()->is("admin/checklist-comments") || request()->is("admin/checklist-comments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comments">

                                        </i>
                                        <p>
                                            {{ trans('cruds.checklistComment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('maintenance_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.maintenances.index") }}" class="nav-link {{ request()->is("admin/maintenances") || request()->is("admin/maintenances/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-server">

                            </i>
                            <p>
                                {{ trans('cruds.maintenance.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('report_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/daily-checks*") ? "menu-open" : "" }} {{ request()->is("admin/xo-softs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/daily-checks*") ? "active" : "" }} {{ request()->is("admin/xo-softs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-flag-checkered">

                            </i>
                            <p>
                                {{ trans('cruds.report.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('daily_check_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.daily-checks.index") }}" class="nav-link {{ request()->is("admin/daily-checks") || request()->is("admin/daily-checks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-check-double">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dailyCheck.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('xo_soft_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.xo-softs.index") }}" class="nav-link {{ request()->is("admin/xo-softs") || request()->is("admin/xo-softs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bomb">

                                        </i>
                                        <p>
                                            {{ trans('cruds.xoSoft.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('farm_info_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/farms*") ? "menu-open" : "" }} {{ request()->is("admin/backup-clusters*") ? "menu-open" : "" }} {{ request()->is("admin/backup-trackers*") ? "menu-open" : "" }} {{ request()->is("admin/domains*") ? "menu-open" : "" }} {{ request()->is("admin/datacenters*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/farms*") ? "active" : "" }} {{ request()->is("admin/backup-clusters*") ? "active" : "" }} {{ request()->is("admin/backup-trackers*") ? "active" : "" }} {{ request()->is("admin/domains*") ? "active" : "" }} {{ request()->is("admin/datacenters*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-angle-double-down">

                            </i>
                            <p>
                                {{ trans('cruds.farmInfo.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('farm_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.farms.index") }}" class="nav-link {{ request()->is("admin/farms") || request()->is("admin/farms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-neuter">

                                        </i>
                                        <p>
                                            {{ trans('cruds.farm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('backup_cluster_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.backup-clusters.index") }}" class="nav-link {{ request()->is("admin/backup-clusters") || request()->is("admin/backup-clusters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bezier-curve">

                                        </i>
                                        <p>
                                            {{ trans('cruds.backupCluster.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('backup_tracker_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.backup-trackers.index") }}" class="nav-link {{ request()->is("admin/backup-trackers") || request()->is("admin/backup-trackers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-gem">

                                        </i>
                                        <p>
                                            {{ trans('cruds.backupTracker.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('domain_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.domains.index") }}" class="nav-link {{ request()->is("admin/domains") || request()->is("admin/domains/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-braille">

                                        </i>
                                        <p>
                                            {{ trans('cruds.domain.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('datacenter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.datacenters.index") }}" class="nav-link {{ request()->is("admin/datacenters") || request()->is("admin/datacenters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.datacenter.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/user-alerts*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users-cog">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/permissions*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>