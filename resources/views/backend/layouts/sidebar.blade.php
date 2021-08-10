@php
$list_menu = config('menu')
@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('asset-backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset-backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @auth('admin')
                        Admin
                    @endauth
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
<<<<<<< HEAD
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
=======
                    <a href="{{ route('dashboard') }}" class="nav-link active">
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @foreach ($list_menu as $menu)
<<<<<<< HEAD
                <!-- List Menu -->
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/'.$menu['name']) || request()->is('admin/'.$menu['name'].'/*') ? 'active' : '' }}">
=======
                <!-- Product -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
                        <i class="nav-icon {{ $menu['icon'] }}"></i>
                        <p>
                            {{ $menu['label'] }}
                            @isset($menu['child_item'])
                            <i class="fas fa-angle-left right"></i>
                            @endisset
                            <span class="badge badge-info right">{{ Rand(4,13) }}</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @isset($menu['child_item'])
<<<<<<< HEAD
                        @foreach($menu['child_item'] as $menu_child)
                        <li class="nav-item">
                            <a href="{{ route($menu_child['route']) }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $menu_child['label'] }}</p>
                            </a>
                        </li>
                        @endforeach
=======
                            @foreach($menu['child_item'] as $menu_child)
                            <li class="nav-item">
                                <a href="{{ $menu_child['route'] }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $menu_child['label'] }}</p>
                                </a>
                            </li>
                            @endforeach
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
                        @endisset
                    </ul>
                </li>
                @endforeach
<<<<<<< HEAD
=======
                <li class="nav-item fixed-bottom text-center">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Sign Out
                        </p>
                    </a>
                </li>
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
