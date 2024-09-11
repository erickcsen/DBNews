<?php 
    // $news_card_photo = "/images/berita1.png";
    // $news_card_title = "Spanyol raih juara euro 2024";
    // $news_card_user = "By Admin"; 
?>
<div class="col-4 p-0 pe-2">
    <div class="col-12 pt-3 ps-2" style="height: 200px;background:url('<?=$news_card_photo?>');background-size: cover;background-position:top center;">
        <div class="col-12 bgcolorf9e701 d-inline ps-2 pe-2 ms-1 pt-1 pb-1 rounded">
            <b>
                Sport
            </b>
        </div>
    </div>
    <div class="text-capitalize color4a25a9" style="height: 55px;overflow:hidden;">
        <b><?=$news_card_title?></b>
    </div>
    <span class="text-uppercase text-muted" style="font-size: 8pt;">
        <span class="me-3">
            <i class="fa fa-user"></i> 
            <b> <?=$news_card_user?> </b>
        </span>
        <i class="fa fa-calendar"></i> 27 Agustus 2024
    </span>
</div>