<!-- Youtube Video -->
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-2 p-0">
                <h4 class="color4a25a9">Youtube Video</h4>
            </div>
            <div class="col-10 text-end mt-1">
                <div class="">
                    <svg width="100%" height="5" xmlns="http://www.w3.org/2000/svg">
                        <!-- Persegi Panjang -->
                        <rect x="0" y="0" width="100" height="5" fill="orange"/>
                        <!-- Segitiga Siku -->
                        <polygon x="15" points="100,0,115,0 100,5" fill="orange"/>
                        <rect x="40" y="0" width="100%" height="1" fill="silver"/>
                        <rect x="30" y="4" width="100%" height="1" fill="silver"/>
                        <!-- -->
                    </svg>
                </div>
                <a href="" class="btn btn-light color4a25a9 border-color4a25a9" style="margin-top:-50px"> View All <img src="/images/up-right-arrow.png" height="20px">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-0 pe-3" style="border: 1px solid black; border-top:0;border-bottom:0;border-left:0;">
                <div class="col-12 rounded" style="background-image: url('/images/youtube-video1.jpg');height:300px;background-position:center;background-size:cover;"></div>
                <div class="col-12 py-2">
                    <div class="bgcolorf9e701 ps-2 pe-2 d-inline rounded">
                        <b> News </b>
                    </div>
                </div>
                <div class="col-12">
                    <h3 class="color4a25a9">Dalang Kasus Kebakaran Rumah Wartawan Merupakan Mantan Ketua Ormas</h3>
                    <div class="text-muted" style="font-size: 8pt;">
                        <span class="text-uppercase me-3">
                            <i class="fa fa-user"></i>
                            <b>By Admin</b>
                        </span>
                        <span class="text-capitalize">
                            <i class="fa fa-calendar"></i> 27 Agustus 2024 </span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <?php 
                    $card_gambar_youtube_video = "/images/youtube-video2.jpg";
                    $card_tipe_youtube_video = "News";
                    $card_title_youtube_video = "Kasus Penipuan Berkedok Lowongan Kerja";
                    $card_user_youtube_video = "Admin";
                    $card_tanggal_youtube_video = "27 August, 2024";
                ?>
                @include("standard_mockup_view.partials.home.youtube_video_part.card_youtube_video")
                <?php 
                    $card_gambar_youtube_video = "/images/youtube-video3.jpg";
                    $card_tipe_youtube_video = "Sport";
                    $card_title_youtube_video = "Ulas Semi Final Euro 2024 Inggris vs Belanda";
                    $card_user_youtube_video = "Admin";
                    $card_tanggal_youtube_video = "27 August, 2024";
                ?>
                @include("standard_mockup_view.partials.home.youtube_video_part.card_youtube_video")
                <?php 
                    $card_gambar_youtube_video = "/images/youtube-video4.jpg";
                    $card_tipe_youtube_video = "News";
                    $card_title_youtube_video = "Fakta-Fakta Penembakan Donald Trump";
                    $card_user_youtube_video = "Admin";
                    $card_tanggal_youtube_video = "27 August, 2024";
                ?>
                @include("standard_mockup_view.partials.home.youtube_video_part.card_youtube_video")
                @include("standard_mockup_view.partials.home.youtube_video_part.card_youtube_video")
            </div>
        </div>
    </div>
</div>
<!-- Youtube Video -->