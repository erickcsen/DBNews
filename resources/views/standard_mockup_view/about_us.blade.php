<?php $title_page = "About Us" ?>
@extends("standard_mockup_view.container.main")
@section("container")
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="content" class="col-12 
        {{-- d-none d-lg-inline-block --}}
    ">
        <div class="col-12" style="background: url('/images/ruangan.jpg');height:320px;background-position:center;background-size:cover;"></div>
        <div class="container">
            <div class="col-12 py-3">
                <h4 class="color4a25a9 mb-3 fw-bold">Tentang DBNEWS</h4>
                <p class="mb-3" style="text-align: justify">
                    DB News adalah bagian dari keluarga besar DB Klik, yang memiliki sejarah panjang dalam industri distribusi IT. Dimulai pada tahun 2004 dengan nama DataBaru Computer, DB Klik berfokus pada bisnis distribusi tradisional dan secara resmi berdiri di Surabaya pada tahun 2018. Melihat potensi yang berkembang di sektor IT, DB Klik terus berinovasi dan memperluas pasar, membangun reputasi yang solid dalam industri. <br><br>
                    Berdasarkan pengalaman dan reputasi DB Klik, DB News diluncurkan untuk menyediakan berita terbaru dan paling dapat diandalkan dalam berbagai bidang, seperti news, hiburan, lifestyle, sport, dan tech. Kami bertujuan untuk memberikan informasi yang akurat dan relevan, serta menjaga Anda tetap terhubung dengan perkembangan terkini dari berbagai sektor. <br><br>
                    Dalam kerangka ini, DB News juga berfungsi sebagai ruang bagi kaum muda Indonesia untuk berkreasi dan berkontribusi. Kami menyajikan berbagai program diskusi, laporan, opini, serta interaksi melalui kanal digital kami. Di era digital ini, jejak digital sangat penting, dan kami ingin menyebarluaskan energi positif serta inspirasi yang dapat membentuk dan mempengaruhi masyarakat. <br><br>
                    DB News adalah tempat untuk bertukar ide dan gagasan. Kami menjunjung tinggi idealisme, keberagaman, kritisisme, dan toleransi, serta mendorong setiap individu untuk berperan aktif. Setiap zaman memiliki cerita sendiri, dan kami berharap dapat berkontribusi dalam membentuk wajah dan identitas negeri ini. <br>
                </p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-6 p-0 text-center">
                                <h4 class="fw-bold color4a25a9 bold">12k+</h4>
                                Audience Reached 
                            </div>
                            <div class="col-6 p-0 text-center">
                                <h4 class="fw-bold color4a25a9 bold">3k+</h4>
                                Active Reader 
                            </div>
                        </div>
                        <div class="col-12 mb-3"></div>
                        <div class="row">
                            <div class="col-6 p-0 text-center">
                                <h4 class="fw-bold color4a25a9 bold">120+</h4>
                                Top Articles
                            </div>
                            <div class="col-6 p-0 text-center">
                                <h4 class="fw-bold color4a25a9 bold">38%</h4>
                                Visitor growth 
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-inline-block d-md-none"></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5 class="fw-bold color4a25a9 ">Commitments</h5>
                        Kami berkomitmen untuk terus menyediakan artikel dan berita berita terbaru yang pastinya sangat informatif, relevan dan memastikan Anda selalu mendapatkan informasi-informasi terkini.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 my-4 text-center">
                        <h5 class="color4a25a9 fw-bold"> Get in touch </h5>
                        <span>
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
                                        <span class="text-muted"> 
                                            Sen-Sab 
                                            dari 09.00-17.00
                                        </span> 
                                        <div class="mb-2"></div>
                                        <button class="btn btn-light border fw-bold">
                                            Call our team
                                        </button>
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
                                        <span class="text-muted"> 
                                            Kunjungi kami
                                        </span>
                                        <div class="mb-2"></div>
                                        <button class="btn btn-light border fw-bold">
                                            Get Direction
                                        </button>
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
                                        <span class="text-muted"> 
                                            Social Media
                                        </span>
                                        <div class="mb-2"></div>
                                        <button class="btn btn-light border fw-bold">
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
@endsection