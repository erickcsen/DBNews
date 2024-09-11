<?php 
    // $gambar = "/images/youtube-video2.jpg";
    // $tipe = "News";
    // $title = "Kasus Penipuan Berkedok Lowongan Kerja";
    // $user = "Admin";
    // $tanggal = "27 August, 2024";
?>
<div class="col-12 ps-3 mb-2">
    <div class="row">
        <div class="col-4 rounded" style="background-image: url('<?=$gambar?>');height:100px;background-size:cover;background-position:center;">
        </div>
        <div class="col-8">
            <div class="d-inline bgcolorf9e701 ps-2 pe-2 rounded text-uppercase py-1" style="font-size: 8pt">
                <b>
                    <?=$tipe?>
                </b>
            </div> 
            <br>
            <span class="color4a25a9 fw-bold" style="font-size: 12pt">
                <?=$title?>
            </span> 
            <br>
            <span class="text-muted" style="font-size: 8pt;">
                <i class="fa fa-user"></i> 
                <b class="text-uppercase me-2">
                    By <?=$user?>
                </b>
                <i class="fa fa-calendar"></i>
                <?=$tanggal?>
            </span>
        </div>
    </div>
</div>