<?php 
    // $photo = "/images/berita1.png";
    // $title = "Spanyol raih juara euro 2024";
    // $user = "By Admin";
    // $category = "Sport";
    // $tanggal = "17 August 2021";
?>
<div class="pb-3 me-3" style="min-width: 280px;">
    <div class="col-12 pt-3 ps-2 rounded border" style="height: 200px;background:url('<?=$photo?>');background-size: cover;background-position:top center;">
        <div class="col-12 bgcolorf9e701 d-inline ps-2 pe-2 ms-1 pt-1 pb-1 rounded text-uppercase" style="font-size: 8pt">
            <b>
                <?=$category?>
            </b>
        </div>
    </div>
    <div class="text-capitalize color4a25a9 fw-bold" style="height: 53px;overflow:hidden;font-size:12pt;">
        <span><?=$title?></span>
    </div>
    <span class="text-uppercase text-muted" style="font-size: 8pt;">
        <span class="me-3">
            <i class="fa fa-user"></i> 
            <b> <?=$user?> </b>
        </span>
        <i class="fa fa-calendar"></i> <?=$tanggal?>
    </span>
</div>