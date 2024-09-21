<?php 
    // $gambar = "/images/youtube-video2.jpg";
    // $tipe = "News";
    // $title = "Kasus Penipuan Berkedok Lowongan Kerja";
    // $user = "Admin";
    // $tanggal = "27 August, 2024";
?>
<div class="col-12 ps-3 mb-2">
    <div class="row">
        <div class="col-4 rounded border bg-black p-0" style="height: fit-content;">
            <div class="col-12" style="background-image: url('<?=$gambar?>');height:100px;background-size:auto 100%;background-position:center;background-repeat:no-repeat;">
            </div>
        </div>
        <div class="col-8">
            <div class="d-inline fw-bold bgcolorf9e701 ps-2 pe-2 py-1 rounded text-uppercase" style="font-size: 8pt">
                <b>
                    <?=$tipe?>
                </b>
            </div> 
            <br>
            <div class="overflow-hidden fw-bold" style="height: 45px">
                <span class="color4a25a9" style="font-size: 12pt"> <?=$title?> </span> 
            </div>
            <div style="height: 10px"></div>
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