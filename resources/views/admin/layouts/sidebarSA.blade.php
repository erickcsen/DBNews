<style>
    @media screen and (max-width: 991px) {
        .sidebar {
            position: fixed;
            left: 0 !important;
            right: 0;
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0) !important;
            transition: all .5s;
            margin-top: 0;
            /* width: 100%; */
        }
    }
</style>
<!-- Sidebar -->
<div id="sidebar_menu" class="d-none d-lg-inline-block">
    <div class="sidebar sidebar-style-2" data-background-color="blue2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="col-12 ps-4 pt-2 border-bottom pb-2 d-lg-none d-inline-block">
                    <a href="#" class="logo">
                        <img src="/dashboard-asset/assets/img/logo.png" alt="navbar brand" class="navbar-brand">
                    </a>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item {{ request()->routeIs('dashboardAdmin') ? 'active' : '' }}">
                        <a href="{{route('dashboardAdmin')}}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
    
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">User Access</h4>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                        <a href="{{route('user.index')}}">
                            <i class="far fa-user"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('user.indexx') ? 'active' : '' }}">
                        <a href="{{route('user.indexx')}}">
                            <i class="far fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
    
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Components</h4>
                    </li>
                    <li class="nav-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <a href="{{route('category.index')}}">
                            <i class="far fa-folder-open"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('subcategory.index') ? 'active' : '' }}">
                        <a href="{{route('subcategory.index')}}">
                            <i class="fas fa-tags"></i>
                            <p>Sub Category</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('article.index') ? 'active' : '' }}" >
                        <a href="{{route('article.index')}}">
                            <i class="fas fa-newspaper"></i>
                            <p>Article</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('sport.index') ? 'active' : '' }}" >
                        <a href="{{route('sport.index')}}">
                            <i class="fas fa-basketball-ball"></i>
                            <p>Sport</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('video.index') ? 'active' : '' }}">
                        <a href="{{route('video.index')}}">
                            <i class="far fa-file-video"></i>
                            <p>Video</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('ad.index') ? 'active' : '' }}">
                        <a href="{{route('ad.index')}}">
                            <i class="fas fa-bullhorn"></i>
                            <p>Ad</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about.index') ? 'active' : '' }}">
                        <a href="{{route('about.index')}}">
                            <i class="fas fa-info-circle"></i>
                            <p>About</p>
                        </a>
                    </li>
    
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Setting Account</h4>
                    </li>
                    <li class="nav-item {{ request()->routeIs('setting.index') ? 'active' : '' }}">
                        <a href="{{route('setting.index')}}">
                            <i class="fas fa-circle-notch"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <button class="position-fixed z-3 end-0 start-0 top-0 bottom-0 border-0 d-lg-none" style="background: rgba(0, 0, 0, 0.5)" onclick="sidebar_menu.classList.toggle('d-none');">
    </button>
</div>
<!-- End Sidebar -->
