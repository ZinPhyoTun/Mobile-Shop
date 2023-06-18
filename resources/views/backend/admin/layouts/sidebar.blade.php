<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('admin.index') }}" class="sidebar-item @yield('home-active')">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Home
                    </a>
                </li>
                <li class="app-sidebar__heading">Products & Categories</li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="sidebar-item @yield('products-active')">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-item @yield('categories-active')">
                        <i class="metismenu-icon pe-7s-menu"></i>
                        Categories
                    </a>
                </li>
                <li class="app-sidebar__heading">User Management</li>
                <li>
                    <a href="{{ route('admin.users.index') }}" id="sidebar-user-btn" class="sidebar-item @yield('users-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.administrators.index') }}" id="sidebar-admin-btn" class="sidebar-item @yield('administrators-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Administrators
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>