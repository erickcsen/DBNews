<?php 
    // $news_card_photo = "/images/berita1.png";
    // $news_card_title = "Spanyol raih juara euro 2024";
    // $news_card_user = "By Admin";
?>
<div class="col-12 pt-2 mb-3">
    <div class="row">
        <div class="col-md-2 col-4">
            <div class="col-12" style="background-image: url('<?=$card_gambar_berita_baru?>');background-size:contain;height:100px;background-position:center;"></div>
        </div>
        <div class="col-md-10 col-8 p-0">
            <small class="border rounded px-2 text-muted">
                <?=$card_tipe_berita_baru?>
            </small> <br>
            <span class="color4a25a9">
                <?=$card_title_berita_baru?>
            </span> <br>
            <small class="text-muted">
                <i class="fa fa-calendar"></i>
                <?=$card_tanggal_berita_baru?>
            </small>
        </div>
    </div>
</div>