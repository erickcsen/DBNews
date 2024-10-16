<?php $title_page = "About Us" ?>
@extends("visitors.container.main")
@section("container")
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "image": "{{asset("/images/logo_dbnews.png")}}",
      "url": "{{asset("/about_us")}}",
      "sameAs": ["asset("/about_us")"],
      "logo": "{{asset("/images/logo_dbnews.png")}}",
      "name": "DB NEWS",
      "description": "<?php echo $TextAbout ?>",
      "email": "businessdbnews@gmail.com",
      "telephone": "08999373777",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Raya Tenggilis Mejoyo No. AA - 3",
        "addressLocality": "Indonesian",
        "addressCountry": "ID",
        "addressRegion": "East Java",
        "postalCode": "60293"
      },
    }
    </script>
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="content" class="col-12 
        {{-- d-none d-lg-inline-block --}}
    ">
        <div class="col-12" style="background: url('/images/ruangan.jpg');height:320px;background-position:center;background-size:cover;"></div>
        <div class="container">
            <div class="col-12 py-3">
                <h4 class="color4a25a9 mb-3 fw-bold">Tentang DBNEWS</h4>
                <p class="mb-3" style="text-align: justify;font-size:12pt">
                    <?php echo $TextAbout ?>
                </p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-6 p-0 text-center">
                                @php
                                    $singkatan = "";
                                    if ($AudienceReached >= 1000) {
                                        $singkatan = "K" ;
                                    } else if ($AudienceReached >= 1000000) {
                                        $singkatan = "M";
                                    }

                                    $AudienceReached_txt = "";
                                    if ($AudienceReached >= 1000000000) {
                                        $AudienceReached_txt = ">= 1B";
                                    }

                                    if ($AudienceReached >= 1000) {
                                        $AudienceReached = $AudienceReached / 1000;
                                    } else if ($AudienceReached >= 1000000){
                                        $AudienceReached = $AudienceReached / 1000000;
                                    }

                                    if ($AudienceReached < 1000000000) $AudienceReached = $AudienceReached.' '.$singkatan;
                                @endphp
                                <h4 class="fw-bold color4a25a9 bold">{{$AudienceReached}}</h4>
                                <span style="font-size:12pt">
                                    Audience Reached 
                                </span>
                            </div>
                            <div class="col-6 p-0 text-center">
                                @php
                                    $singkatan = "";
                                    if ($ActiveReader >= 1000) {
                                        $singkatan = "K" ;
                                    } else if ($ActiveReader >= 1000000) {
                                        $singkatan = "M";
                                    }

                                    $ActiveReader_txt = "";
                                    if ($ActiveReader >= 1000000000) {
                                        $ActiveReader_txt = ">= 1B";
                                    }

                                    if ($ActiveReader >= 1000) {
                                        $ActiveReader = $ActiveReader / 1000;
                                    } else if ($ActiveReader >= 1000000){
                                        $ActiveReader = $ActiveReader / 1000000;
                                    }

                                    if ($ActiveReader < 1000000000) $ActiveReader = $ActiveReader.' '.$singkatan;
                                @endphp
                                <h4 class="fw-bold color4a25a9 bold">{{$ActiveReader}}</h4>
                                <span style="font-size:12pt">
                                    Active Reader 
                                </span>
                            </div>
                        </div>
                        <div class="col-12 mb-3"></div>
                        <div class="row">
                            <div class="col-6 p-0 text-center">
                                @php
                                    $singkatan = "";
                                    if ($TopArticles >= 1000) {
                                        $singkatan = "K" ;
                                    } else if ($TopArticles >= 1000000) {
                                        $singkatan = "M";
                                    }

                                    $TopArticles_txt = "";
                                    if ($TopArticles >= 1000000000) {
                                        $TopArticles_txt = ">= 1B";
                                    }

                                    if ($TopArticles >= 1000) {
                                        $TopArticles = $TopArticles / 1000;
                                    } else if ($TopArticles >= 1000000){
                                        $TopArticles = $TopArticles / 1000000;
                                    }

                                    if ($TopArticles < 1000000000) $TopArticles = $TopArticles.' '.$singkatan;
                                @endphp
                                <h4 class="fw-bold color4a25a9 bold">{{$TopArticles}}</h4>
                                <span style="font-size:12pt">
                                    Top Articles
                                </span>
                            </div>
                            <div class="col-6 p-0 text-center">
                                <h4 class="fw-bold color4a25a9 bold">{{$VisitorGrowth}}</h4>
                                <span style="font-size:12pt">
                                    Visitor growth 
                                </span>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-inline-block d-md-none"></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5 class="fw-bold color4a25a9 ">Commitments</h5>
                        <span style="font-size: 12pt">
                            Kami berkomitmen untuk terus menyediakan artikel dan berita berita terbaru yang pastinya sangat informatif, relevan dan memastikan Anda selalu mendapatkan informasi-informasi terkini.
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-4 text-center">
                        <h5 class="color4a25a9 fw-bold"> Get in touch </h5>
                        <span style="font-size: 12pt">
                            Hubungi kami menggunakan informasi di bawah ini, kami akan segera menanggapi
                            Pertanyaan dan umpan balik dari anda
                        </span>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-2">
                                <div class="col-12 border py-3 px-3 rounded">
                                    <div class="border d-inline px-2 py-2 rounded" style="background-color: #e0e0e0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20px" height="20px">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path class="color4a25a9" d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"/>
                                        </svg>
                                    </div>
                                    <div class="mt-3">
                                        <b class="color4a25a9">Call Us</b> <br>
                                        <span class="text-muted" style="font-size: 10pt"> 
                                            Sen-Sab 
                                            dari 09.00-17.00
                                        </span> 
                                        <div class="mb-2"></div>
                                        <a href="tel:+{{$Phone}}" id="call_button" class="btn btn-light border fw-bold">
                                            Call our team
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <div class="col-12 border py-3 px-3 rounded">
                                    <div class="border d-inline px-2 py-2 rounded" style="background-color: #e0e0e0;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20px" height="20px">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path class="color4a25a9" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                                        </svg>
                                    </div>
                                    <div class="mt-3">
                                        <b class="color4a25a9">Visit Us</b> <br>
                                        <span class="text-muted" style="font-size: 10pt"> 
                                            Kunjungi kami
                                        </span>
                                        <div class="mb-2"></div>
                                        <a href="https://maps.app.goo.gl/qTrkc5MC8W7viuFJ6" class="btn btn-light border fw-bold" target="_blank">
                                            Get Direction
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2">
                                <div class="col-12 border py-3 px-3 rounded">
                                    <div class="border d-inline px-2 py-2 rounded" style="background-color: #e0e0e0;">
                                        <i class="color4a25a9 fa fa-instagram" style="font-size: 20px"></i>
                                    </div>
                                    <div class="mt-3">
                                        <b class="color4a25a9">Our Social Media</b> <br>
                                        <span class="text-muted" style="font-size: 10pt"> 
                                            Social Media
                                        </span>
                                        <div class="mb-2"></div>
                                        <button onclick="social_media.hidden=false" class="btn btn-light border fw-bold">
                                            Find Us
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="social_media" class="col-12 position-fixed top-0 bottom-0 start-0 end-0 z-2" style="padding-top:70px" hidden>
        <div class="container">
            <div class="row">
                <button onclick="social_media.hidden=true" class="col-12 position-fixed top-0 bottom-0 start-0 right-0 border-0" style="background: rgba(0, 0, 0, 0.5);"></button>
                <div class="col-lg-4 col-md-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-10 z-1">
                    <div class="col-12 bg-white rounded px-3 py-3">
                        <div class="border-bottom pb-2">
                            <b class="color4a25a9">Our Social Media</b>
                            <div class="float-end">
                                <button onclick="social_media.hidden=true" class="btn btn-light border position-absolute" style="margin-left:-30px ">
                                    <i class="fa fa-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="py-2">
                            <style>
                                .instagram-follow-button {
                                    display: inline-flex;
                                    align-items: center;
                                    background-color: #E1306C;
                                    color: white;
                                    border: none;
                                    border-radius: 4px;
                                    font-weight: bold;
                                    text-decoration: none;
                                    cursor: pointer;
                                    transition: background-color 0.3s ease;
                                }
                                .instagram-follow-button:hover {
                                    background-color: #C13584;
                                }
                                .instagram-follow-button .icon {
                                    width: 24px;
                                    height: 24px;
                                    margin-right: 8px;
                                }
                            </style>
                            <div class="col-12 mt-1">
                                <div class="pb-2">
                                    <b>Youtube : </b> @dbnewsid <br>
                                    <a href="https://www.youtube.com/@dbnewsid" target="_blank" class="btn btn-danger">
                                        <i class="fa fa-youtube-play"></i> Youtube
                                    </a>
                                </div>
                                <div class="pb-2">
                                    <b>Instagram : </b> @dbmedianews <br>
                                    <a href="https://www.instagram.com/dbmedianews" class="btn btn-light instagram-follow-button" target="_blank">
                                        <i class="fa fa-instagram"></i> &nbsp;
                                        Instagram
                                    </a>
                                </div>
                                <div>
                                    <b>Tiktok : </b> @dbmedianews <br>
                                    <a href="https://www.tiktok.com/@dbmedianews" class="btn btn-dark fw-bold border" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="15px"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path style="fill: white"
                                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                        </svg>
                                        Tiktok
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-1"></div>
            </div>
        </div>
    </div>
@endsection