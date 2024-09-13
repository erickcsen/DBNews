<?php 
    use App\Http\Controllers\VisitorsController;

    if (isset($category)==false) $category = [];
    if (isset($category_link)==false) $category_link = [];
    if (count($category) == 0) $category = [VisitorsController::class,"category_menu"];

    foreach ($category as $category_value => $value) {
        $category_link[count($category_link)] = $value->name;
    }

    $url_txt_pencarian_header = "/pencarian";
?>
<!-- Header Desktop -->
<div id="header" class="col-12 z-2">
    <!-- Top Header -->
    <div class="col-12 pt-2 pb-2 bgcolor4a25a9">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-4 pt-1">
                    <a href="/">
                        <img src="/images/logo_dbnews.png" alt="" srcset="" height="25px">
                    </a>
                </div>
                <!-- Logo -->
                <!-- Search -->
                <div class="col-4 d-none d-lg-block">
                    <form action="{{$url_txt_pencarian_header}}" method="GET">
                        @php
                            if (!isset($data["urut"])) {
                                $data["urut"] = "";
                            }
                            if (!isset($data["tipe"])) {
                                $data["tipe"] = "";
                            }
                            if (!isset($data["pilih_kategori"])) {
                                $data["pilih_kategori"] = "";
                            }
                        @endphp
                        <input type="hidden" name="urut" value="{{$data["urut"]}}">
                        <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                        <input name="txt_pencarian" type="text" placeholder="Search here" class="form-control rounded-pill"
                            style="padding-left: 30px;">
                        <i class="fa fa-search text-secondary"
                            style="margin-top: -27px;margin-left:10px;position:absolute;"></i>
                    </form>
                </div>
                <!-- Search -->
                <!-- Right Button -->
                <div class="col-lg-4 col-8 text-end pt-1">
                    @if (Route::has('login'))
                        @auth
                            <div class="dropdown">
                                <button type="button" class="btn btn-default text-white dropdown-toggle d-none d-lg-inline-block" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @if (Auth::user()->role != 0)
                                        <li><a class="dropdown-item" target="_blank" href="/dashboardAdmin" >Dashboard Admin</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        @else
                            <a href="/login" class="btn btn-default d-none d-lg-inline-block d-none text-white">
                                <i class="fa fa-user text-white" style="font-size: 12pt"></i> &nbsp;
                                Sign In
                            </a>
                        @endauth
                    @endif
                    <button class="btn btn-default text-white d-lg-none d-inline-block"
                        onclick="fitur_search.hidden=false">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="btn btn-default text-white d-lg-none d-inline-block"
                        onclick="fitur_sidebar.hidden=false;">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- Right Button -->
            </div>
        </div>
    </div>
    <!-- Top Header -->
    <!-- Bottom Header -->
    <div id="bottom_menu" class="col-12 bgcolorf9e701 d-none d-lg-block" style="padding-top:10px;padding-bottom:10px;">
        <div class="container">
            <!-- Menu -->
            <div class="row">
                <style>
                    #header *{
                        text-transform: capitalize;
                    }
                    /* width */
                    #header *::-webkit-scrollbar {
                        width: 20px;
                        height: 0px;
                        opacity: 0;
                        /* Menampilkan scrollbar saat hover */
                        transition: opacity 0.3s;
                        /* Transisi ketika muncul */
                    }

                    div#bottom_menu:hover::-webkit-scrollbar {
                        opacity: 1;
                        /* Menampilkan scrollbar saat hover */
                    }

                    /* Track */
                    #header *::-webkit-scrollbar-track {
                        box-shadow: inset 0 0 5px grey;
                        border-radius: 10px;
                    }

                    /* Handle */
                    #header *::-webkit-scrollbar-thumb {
                        background: silver;
                        border-radius: 10px;
                    }

                    /* Handle on hover */
                    #header *::-webkit-scrollbar-thumb:hover {
                        background: gray;
                    }
                </style>
                <div class="col-10">
                    <style>
                        #header .scroll-container {
                            overflow: auto;
                            white-space: nowrap;
                            width: 100%;
                        }

                        #header .scroll-button {
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                            border: none;
                            cursor: pointer;
                        }

                        #header .scroll-left {
                            left: 0;
                        }

                        #header .scroll-right {
                            right: 0;
                        }
                    </style>
                    <div class="p-0" style="position: relative;">
                        <button id="scrollButtonLeft" class="scroll-button scroll-left rounded-circle btn btn-primary d-none" onclick="scrollContainer(-100)">&#10094;</button>
                        <div id="scrollContainer" class="scroll-container" id="scrollContainer" style="display:flex;overflow:hidden;overflow-x:auto">
                            <a href="/" class="text-dark link-header link_header_geser">
                                <button type="button" class="btn p-0 pt-1 link-header text-dark text-light d-inline-block me-2">
                                    Home
                                </button>
                            </a>
                            <a href="/about_us" class="text-dark link-header link_header_geser">
                                <button type="button" class="btn p-0 pt-1 link-header text-dark text-light d-inline-block me-2">
                                    About Us
                                </button>
                            </a>
                            @for ($i = 0; $i < count($category_link); $i++)
                                <a href="/visit_category/{{$category_link[$i]}}" class="text-dark link-header link_header_geser">
                                    <button type="button" class="btn p-0 pt-1 link-header text-dark text-light d-inline-block me-2">
                                        {{$category_link[$i]}} 
                                    </button>
                                </a>
                                {{-- @if (count($category[$i]->subcategories) == 0)
                                    <a href="/visit_category/{{$category_link[$i]}}" class="text-dark me-3 link-header link_header_geser">
                                        <button type="button" class="btn p-0 pt-1 link-header text-dark text-light d-inline-block"
                                            style="min-width:75px;">
                                            {{$category_link[$i]}} 
                                        </button>
                                    </a>
                                @else
                                    <div>
                                        <button type="button" class="btn btn-default me-3 p-0 px-1 fw-bold dropdown-toggle" data-bs-toggle="dropdown" style="margin-top:4px;">
                                            {{$category[$i]->name}}
                                        </button>
                                        <div class="dropdown" style="position:absolute;">
                                            <ul class="dropdown-menu">
                                                @for ($j = 0; $j < count($category[$i]->subcategories); $j++)
                                                    <li><a class="dropdown-item" href="/visit_category/{{$category_link[$i]}}/{{$category[$i]->subcategories[$j]->name}}">{{$category[$i]->subcategories[$j]->name}} </a></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                @endif --}}
                            @endfor
                            <div class="d-inline-block" style="width: 120px;">&nbsp;</div>
                        </div>
                        <button id="scrollButtonRight" class="scroll-button scroll-right rounded-circle btn btn-primary" <?=count($category_link)<15?"hidden":""?> onclick="scrollContainer(100)">&#10095;</button>
                        <script>
                            const scrollContainerID = document.querySelector('.scroll-container');
                            const scrollButtonLeft = document.getElementById('scrollButtonLeft');
                            const scrollButtonRight = document.getElementById('scrollButtonRight');

                            scrollContainerID.addEventListener('scroll', function() {
                                const scrollLeft = scrollContainerID.scrollLeft;
                                const maxScrollLeft = scrollContainerID.scrollWidth - scrollContainerID.clientWidth;
                                console.log(scrollLeft)

                                if (scrollLeft >= 0) {
                                    scrollButtonRight.classList.remove('d-none');
                                } else {
                                    scrollButtonRight.classList.add('d-none');
                                }

                                if (scrollLeft >= maxScrollLeft) {
                                    scrollButtonRight.classList.add('d-none');
                                }

                                if (scrollLeft == 0){
                                    scrollButtonLeft.classList.add('d-none');
                                } else {
                                    scrollButtonLeft.classList.remove('d-none');
                                }
                            });
                        </script>
                    </div>
                    <script>
                        function scrollContainer(amount) {
                            const container = document.getElementById('scrollContainer');
                            container.scrollBy({
                                left: amount,
                                behavior: 'smooth'
                            });
                        }
                    </script>
                </div>
                <div class="col-2" style="font-size: 14pt">
                    <a href="https://www.instagram.com/dbmedianews" target="_blank" class="nolink" style="padding-right: 5px">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@dbmedianews" target="_blank" class="nolink" style="padding-right: 5px">
                        <svg xmlns="http://www.w3.org/2000/svg" height="12pt" style="margin-top:-2px "
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@dbnewsid" target="_blank" class="nolink" style="padding-right: 5px">
                        <i class="fa fa-youtube-play"></i>
                    </a>
                </div>
            </div>
            <!-- Menu -->
        </div>
    </div>
    <!-- Bottom Header -->
</div>
<!-- Header Desktop -->

<!-- Fitur Sidebar -->
<div id="fitur_sidebar" class="col-12 position-fixed top-0 bottom-0 left-0 right-0 z-2" style="background: white;"
    hidden>
    <!-- Header Desktop -->
    <div id="header" class="col-12 z-2">
        <!-- Top Header -->
        <div class="col-12 pt-2 pb-2 bgcolor4a25a9">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-4">
                        <a href="/">
                            <img src="/images/logo_dbnews.png" alt="" srcset="" height="25px">
                        </a>
                    </div>
                    <!-- Logo -->
                    <!-- Search -->
                    <div class="col-4 d-none d-lg-block">
                        <input type="text" placeholder="Search here" class="form-control rounded-pill"
                            style="padding-left: 30px;">
                        <i class="fa fa-search text-secondary"
                            style="margin-top: -27px;margin-left:10px;position:absolute;"></i>
                    </div>
                    <!-- Search -->
                    <!-- Right Button -->
                    <div class="col-lg-4 col-8 text-end">
                        <button class="btn btn-default text-white" onclick="fitur_search.hidden=false">
                            <i class="fa fa-search"></i>
                        </button>
                        <button class="btn btn-default text-white" onclick="fitur_sidebar.hidden=true">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- Right Button -->
                </div>
            </div>
        </div>
        <!-- Top Header -->
    </div>
    <div class="position-absolute w-100" style="overflow:auto;margin-top:55px;height:100%;">
        <a href="/">
            <button class="btn btn-light w-100 text-start border-bottom">
                Home
            </button>
        </a>
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role != 0)
                    <a href="/dashboardAdmin">
                        <button class="btn btn-light w-100 text-start border-bottom">
                            Akun Saya
                        </button>
                    </a>
                @endif
            @else
                <a href="/login">
                    <button class="btn btn-light w-100 text-start border-bottom">
                        Akun Saya
                    </button>
                </a>
            @endauth
        @endif
        @if (count($category_link) > 0)
            <div id="menu_categories_open" class="btn btn-light w-100 text-start border-bottom"
                onclick="menu_nav_categories.hidden=false;this.hidden=true;menu_categories_closed.hidden=false;">
                Categories
                <i class="fa fa-angle-down" style="float:right;margin-top:3px;"></i>
            </div>
            <div id="menu_categories_closed" class="btn btn-secondary w-100 text-start border-bottom"
                onclick="menu_nav_categories.hidden=true;this.hidden=true;menu_categories_open.hidden=false;" hidden>
                Categories
                <i class="fa fa-angle-up" style="float:right;margin-top:3px;"></i>
            </div>
        @endif
        <div id="menu_nav_categories" class="mx-2 border-start border-end rounded" hidden>
            @for ($i = 0; $i < count($category_link); $i++)
                <a href="/visit_category/{{$category_link[$i]}}">
                    <button class="btn btn-light w-100 text-start border-bottom text-capitalize">
                        {{$category_link[$i]}}
                    </button>
                </a>
            @endfor
        </div>
        <a href="/about_us">
            <button class="btn btn-light w-100 text-start border-bottom">
                About us
            </button>
        </a>
        @if (Route::has('login'))
            @auth
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button class="btn btn-light w-100 text-start border-bottom">
                        Log Out
                    </button>
                </a>
            @else
            @endauth
        @endif
        <div class="col-12" style="height:100px"></div>
        <div class="position-fixed w-100 border bottom-0 bg-light">
            <div class="col-12 text-center" style="font-size: 20pt">
                <a href="https://www.instagram.com/dbmedianews" target="_blank" class="nolink" style="padding-right: 30px">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@dbmedianews" target="_blank" class="nolink" style="padding-right: 30px">
                    <svg xmlns="http://www.w3.org/2000/svg" height="17pt" style="margin-top: -2px"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/@dbnewsid" target="_blank" class="nolink" style="">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Header Desktop -->
</div>
<!-- Fitur Sidebar -->
<!-- Fitur Search -->
<div id="fitur_search" class="col-12 position-fixed top-0 bottom-0 left-0 right-0 z-2"
    style="background-color: rgba(0, 0, 0, 0.5)" hidden>
    <!-- Header Desktop -->
    <div id="header" class="col-12 z-2">
        <!-- Top Header -->
        <div class="col-12 pt-0 pb-0 bgcolor4a25a9 overflow-hidden" style="height: 62px">
            <div class="container">
                <div class="row">
                    <!-- Search -->
                    <div class="col-12 pt-2 text-end">
                        <form action="{{$url_txt_pencarian_header}}" method="GET">
                            <input type="hidden" name="urut" value="{{$data["urut"]}}">
                            <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                            <input type="text" name="txt_pencarian" placeholder="Search here" class="form-control rounded-pill">
                            <button class="btn btn-default text-muted rounded-pill" style="margin-top: -66px">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- Search -->
                </div>
            </div>
        </div>
        <!-- Top Header -->
    </div>
    <button onclick="fitur_search.hidden=true" class="position-absolute top-0 left-0 right-0 bottom-0 w-100"
        style="background: none;border:0;">
    </button>
    <!-- Header Desktop -->
</div>
<!-- Fitur Search -->