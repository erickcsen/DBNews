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
                    <a href="/sign_in" class="btn btn-default d-none d-lg-inline-block d-none">
                        <div class="d-inline">
                            <i class="fa fa-user text-white"></i>
                        </div> &nbsp;
                        <span class="text-white">
                            Sign In
                        </span>
                    </a>
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
    <div id="bottom_menu" class="col-12 bgcolorf9e701 d-none d-lg-block">
        <div class="container">
            <!-- Menu -->
            <div class="row">
                <style>
                    /* width */
                    #header *::-webkit-scrollbar {
                        width: 20px;
                        height: 5px;
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
                <!-- <div id="container_link_header" class="col-12" style="overflow-y: auto;">
                    <button id="btn_header_left" class="btn btn-light position-absolute p-0 px-2"
                        style="margin-left:-20px;">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <div style="width:auto;display:flex;">
                        <a href="/" class="text-dark me-3 link-header link_header_geser">
                            <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                style="min-width:100px;">
                                Home
                            </button>
                        </a>
                        <a href="/about_us" class="text-dark me-3 link-header link_header_geser">
                            <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                style="min-width:100px;">
                                About Us
                            </button>
                        </a>
                        @for ($i = 0; $i < 10; $i++)
                            <a href="/category_<?= $i ?>" class="text-dark me-3 link-header link_header_geser">
                            <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                style="min-width:100px;">
                                Category <?= $i ?>
                            </button>
                            </a>
                            @endfor
                            <div class="d-inline-block" style="width: 120px;">&nbsp;</div>
                    </div>
                    <button id="btn_header_right" class="btn btn-light position-absolute p-0 px-2"
                        style="right:0;margin-right:60px;margin-top:-27px">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <script>
                        let item = document.getElementById("container_link_header")
                        let btn_header_left = document.getElementById("btn_header_left")
                        let btn_header_right = document.getElementById("btn_header_right")
                        btn_header_left.addEventListener('click', () => {
                            item.scrollBy({
                                left: 200,
                                behavior: "smooth"
                            })
                        });
                        btn_header_right.addEventListener('click', () => {
                            item.scrollBy({
                                right: 200,
                                behavior: "smooth"
                            })
                        });
                    </script>
                </div> -->
                <div class="col-12">
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
                        <div id="scrollContainer" class="scroll-container" id="scrollContainer" style="display:flex;">
                            <a href="/" class="text-dark me-3 link-header link_header_geser">
                                <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                    style="min-width:100px;">
                                    Home
                                </button>
                            </a>
                            <a href="/about_us" class="text-dark me-3 link-header link_header_geser">
                                <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                    style="min-width:100px;">
                                    About Us
                                </button>
                            </a>
                            @for ($i = 0; $i < 10; $i++)
                                <a href="/category_<?= $i ?>" class="text-dark me-3 link-header link_header_geser">
                                    <button type="button" class="btn p-0 link-header text-dark text-light d-inline-block"
                                        style="min-width:100px;">
                                        Category <?= $i ?>
                                    </button>
                                </a>
                            @endfor
                            <div class="d-inline-block" style="width: 120px;">&nbsp;</div>
                        </div>
                        <button id="scrollButtonRight" class="scroll-button scroll-right rounded-circle btn btn-primary" onclick="scrollContainer(100)">&#10095;</button>
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
    <div class="position-absolute w-100" style="overflow-y:auto;margin-top:55px;">
        <a href="/">
            <button class="btn btn-light w-100 text-start border-bottom">
                Home
            </button>
        </a>
        <a href="/about_us">
            <button class="btn btn-light w-100 text-start border-bottom">
                About us
            </button>
        </a>
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
        <div id="menu_nav_categories" class="mx-2 border-start border-end rounded" hidden>
            <a href="#" class="btn btn-light text-start border-bottom w-100">
                Link 1
            </a>
            <a href="#" class="btn btn-light text-start border-bottom w-100">
                Link 2
            </a>
            <a href="#" class="btn btn-light text-start border-bottom w-100">
                Link 3
            </a>
        </div>
        <a href="#">
            <button class="btn btn-light w-100 text-start border-bottom">
                Contact
            </button>
        </a>
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
                        <input type="text" placeholder="Search here" class="form-control rounded-pill">
                        <button class="btn btn-default text-muted rounded-pill" style="margin-top: -66px">
                            <i class="fa fa-search"></i>
                        </button>
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