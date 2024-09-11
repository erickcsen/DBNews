<?php 
    // $link_id = "";
    // $photo = "/images/berita1.png";
    // $title = "Spanyol raih juara euro 2024";
    // $user = "By Admin"; 
    // $category = "By Admin"; 
    // $tanggal = "27 Agustus 2024"; 
?>
<div class="col-4 p-0 pe-2">
    <a href="{{$link_id}}" class="nolink">
        <div class="col-12 pt-3 ps-2 border rounded" style="height: 200px;background:url('<?=$photo?>');background-size: cover;background-position:top center;">
            <div class="col-12 bgcolorf9e701 d-inline ps-2 pe-2 py-1 ms-1 rounded text-uppercase" style="font-size: 9pt">
                <b>
                    <?=$category?>
                </b>
            </div>
        </div>
        <div class="text-capitalize color4a25a9 fw-bold" style="height: 53px;overflow:hidden;font-size:12pt">
            <span><?=$title?></span>
        </div>
        <span class="text-uppercase text-muted" style="font-size: 8pt;">
            <span class="me-3">
                <i class="fa fa-user"></i> 
                <b> <?=$user?> </b>
            </span>
            <i class="fa fa-calendar"></i> <?=$tanggal?>
        </span>
    </a>
</div>