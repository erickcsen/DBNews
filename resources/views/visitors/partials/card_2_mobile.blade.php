<?php 
    // $gambar = "/images/populer1.jpg";
    // $tipe = "Technology";
    // $title = "Influence The Future of CSS";
    // $tanggal = "27 August, 2024";
?>

<div class="col-12 pt-2 mb-3">
    <div class="row">
        <div class="col-md-4 col-5">
            <div class="col-12 rounded border" style="background-image: url('<?=$gambar?>');background-size:cover;height:100px;background-position:center;"></div>
        </div>
        <div class="col-md-8 col-7 p-0">
            <small class="border rounded px-2 py-1 fw-bold text-muted text-uppercase" style="font-size: 8pt">
                <?=$tipe?>
            </small>
            <div class="overflow-hidden fw-bold text-capitalize" style="height: 45px"> 
                <span class="color4a25a9" style="font-size: 12pt">
                    <?=$title?>
                </span> 
            </div>
            <small class="text-muted" style="font-size: 8pt;">
                <i class="fa fa-calendar"></i>
                <?=$tanggal?>
            </small>
        </div>
    </div>
</div>