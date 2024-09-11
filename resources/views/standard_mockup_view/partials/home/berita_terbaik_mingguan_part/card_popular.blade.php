<?php 
    // $card_gambar_berita_terbaik = "";
    // $card_tipe_berita_terbaik = "";
    // $card_title_berita_terbaik = "";
    // $card_tanggal_berita_terbaik = "";
?>
<div class="col-12 pt-2 mb-3">
    <div class="row">
    <div class="col-5">
        <div class="col-12" style="background-image: url('<?=$card_gambar_berita_terbaik?>');background-size:cover;height:100px;background-position:center;"></div>
    </div>
    <div class="col-7 p-0">
        <small class="border rounded px-2 text-muted">
            <?=$card_tipe_berita_terbaik?>
        </small> <br>
        <span class="color4a25a9">
            <?=$card_title_berita_terbaik?>
        </span> <br>
        <small class="text-muted">
            <i class="fa fa-calendar"></i>
            <?=$card_tanggal_berita_terbaik?>
        </small>
    </div>
    </div>
</div>