<div class="main-header d-none d-lg-inline-block">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue2">
        <a href="#" class="logo">
            <img src="/dashboard-asset/assets/img/logo.png" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle d-none" data-toggle="sidebar_menu">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="/dashboard-asset/assets/img/user.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <!-- Display Username -->
                            <li>
                                <a href="/setting" class="dropdown-item">
                                    <strong>{{ Auth::user()->name }}</strong>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Right Side Of Navbar -->
    </nav>
    <!-- End Navbar -->
</div>
<div class="position-fixed z-3 top-0 start-0 end-0 d-lg-none d-inline-block">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue2">
        <a href="/dashboardAdmin" class="logo">
            <img src="/dashboard-asset/assets/img/logo.png" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="btn btn-primary border" type="button" onclick="sidebar_menu.classList.toggle('d-none');">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="btn btn-primary border position-absolute end-0 me-3" type="button" data-toggle="dropdown">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" height="1.5em">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="white" d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
            </svg>
        </button>
        <div class="dropdown">
            <ul class="dropdown-menu dropdown-user animated fadeIn" style="margin-top:-25px;line-height:initial;width:initial;margin-left:-225px;">
                <div class="dropdown-user-scroll scrollbar-outer">
                    <!-- Display Username -->
                    <li>
                        <a href="/setting" class="dropdown-item">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <!-- End Logo Header -->
</div>

