<?php 
    // $card_gambar_youtube_video = "/images/youtube-video2.jpg";
    // $card_tipe_youtube_video = "News";
    // $card_title_youtube_video = "Kasus Penipuan Berkedok Lowongan Kerja";
    // $card_user_youtube_video = "Admin";
    // $card_tanggal_youtube_video = "27 August, 2024";
?>
<div class="col-12 ps-3 mb-2">
    <div class="row">
        <div class="col-4 rounded" style="background-image: url('<?=$card_gambar_youtube_video?>');height:100px;background-size:cover;background-position:center;">
        </div>
        <div class="col-8">
            <div class="d-inline bgcolorf9e701 ps-2 pe-2 rounded">
                <b>
                    <?=$card_tipe_youtube_video?>
                </b>
            </div> 
            <br>
            <b class="color4a25a9">
                <?=$card_title_youtube_video?>
            </b> 
            <br>
            <span class="text-muted" style="font-size: 8pt;">
                <i class="fa fa-user"></i> 
                <b class="text-uppercase me-2">
                    By <?=$card_user_youtube_video?>
                </b>
                <i class="fa fa-calendar"></i>
                <?=$card_tanggal_youtube_video?>
            </span>
        </div>
    </div>
</div>