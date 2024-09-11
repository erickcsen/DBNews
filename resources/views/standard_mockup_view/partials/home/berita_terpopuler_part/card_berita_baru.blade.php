
<?php 
    // $card_gambar_berita_baru = "/images/populer1.jpg";
    // $card_tipe_berita_baru = "Technology";
    // $card_title_berita_baru = "Influence The Future of CSS";
    // $card_tanggal_berita_baru = "27 August, 2024";
?>
<div class="col-12 pt-2 mb-3">
    <div class="row">
        <div class="col-5">
            <div class="col-12" style="background-image: url('<?=$card_gambar_berita_baru?>');background-size:cover;height:100px;background-position:center;"></div>
        </div>
        <div class="col-7 p-0">
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