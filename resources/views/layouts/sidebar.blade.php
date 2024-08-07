<!-- START SIDEBAR -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        {{-- Home --}}
       <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Home -->
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Home
                </p>
            </a>
        </li>

        @can('manage-dashboard')
            <!-- Dashboard -->
            <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
        @endcan

        @can('manage-news')
            <!-- News  -->
            <li class="nav-header">NEWS</li>
            <li class="nav-item has-treeview {{ request()->routeIs('news.index') ? 'active' : '' }}">
                <a href="{{ route('news.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        News
                    </p>
                </a>
            </li>
        @endcan

        @can('manage-categories')
            <!-- Category -->
            <li class="nav-header">CATEGORY</li>
            <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Category</p>
                </a>
            </li>
        @endcan

        @can('manage-users')
            <!-- User -->
            <li class="nav-header">USER</li>
            <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>User</p>
                </a>
            </li>
        @endcan

        <!-- Logout (if authenticated) -->
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt fa-lg" aria-hidden="true"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
</nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- END SIDEBAR --}}
<style>
    .nav-sidebar .active {
    background-color: #007BFF; 
}
</style>
