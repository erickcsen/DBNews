<?php 
    // $gambar = "/images/populer1.jpg";
    // $tipe = "Technology";
    // $title = "Influence The Future of CSS";
    // $tanggal = "27 August, 2024";
?>
<div class="col-12 pt-2 mb-3">
    <div class="row">
        <div class="col-5">
            <div class="col-12 border rounded" style="background-image: url('<?=$gambar?>');background-size:cover;height:100px;background-position:center;"></div>
        </div>
        <div class="col-7 p-0">
            <small class="border fw-bold rounded px-2 text-muted text-uppercase py-1" style="font-size: 8pt">
                <?=$tipe?>
            </small> <br>
            <div style="height: 53px; overflow:hidden;">
                <span class="color4a25a9 fw-bold">
                    <?=$title?>
                </span>
            </div>
            <small class="text-muted" style="font-size: 9pt">
                <i class="fa fa-calendar"></i>
                <?=$tanggal?>
            </small>
        </div>
    </div>
</div>