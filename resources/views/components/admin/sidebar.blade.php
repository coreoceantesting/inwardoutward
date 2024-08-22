@php
$user = auth()->user();

$role = $user->roles->pluck('name')[0];

@endphp
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>
                @if ($role == 'Department' ||$role == 'inward/outward' || $role == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @endif
                @if ( $role == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('wards.index') }}" class="nav-link" data-key="t-horizontal">Ward</a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('departments.index') }}" class="nav-link" data-key="t-horizontal">Departments</a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('subdepartments.index') }}" class="nav-link" data-key="t-horizontal"> Sub Departments</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('deliverymode.index') }}" class="nav-link" data-key="t-horizontal"> Delivery Mode</a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('lettertype.index') }}" class="nav-link" data-key="t-horizontal"> Letter Type</a>
                            </li>
                        </ul>

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('vip.index') }}" class="nav-link" data-key="t-horizontal">VIP</a>
                            </li>
                        </ul>
                    </div>
                </li>


                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                @endif
                @if ($role == 'inward/outward' || $role == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-arrow-bottom-left-bold-box-outline"></i>

                        <span data-key="t-layouts">Inward</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('inwardfile.index') }}" class="nav-link" data-key="t-horizontal">Inward</a>
                                </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        {{-- <i class="bx bx-user-circle"></i> --}}
                        <i class="mdi mdi-arrow-top-right-bold-box-outline"></i>

                        <span data-key="t-layouts">Outward</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('outwardfile.index') }}" class="nav-link" data-key="t-horizontal">Outward</a>
                                </li>

                        </ul>
                    </div>
                </li>
                @endif
                @if ($role == 'Department' || $role == 'Super Admin')

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="mdi mdi-file-sign"></i>
                        <span data-key="t-layouts">Acknowledge</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('Department_inwardoutward.index') }}" class="nav-link" data-key="t-horizontal">Acknowledge</a>
                                </li>

                        </ul>
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('acknowlege_list') }}" class="nav-link" data-key="t-horizontal">Acknowledge List</a>
                            </li>

                    </ul>
                    </div>
                </li>


                @endif
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
