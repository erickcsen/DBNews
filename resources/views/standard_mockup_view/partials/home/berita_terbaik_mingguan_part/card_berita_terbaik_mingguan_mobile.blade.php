<?php 
    // $card_tipe_berita_terbaik = "Technology";
    // $card_gambar_berita_terbaik = "/images/populer1.jpg";
    // $card_title_berita_terbaik = "Influence The Future of CSS";
    // $card_tanggal_berita_terbaik = "27 August 2024";
    // $card_menit_berita_terbaik = "24";
    // $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite. ";
?>

<div class="pb-3 me-3" style="width: 200px;float: left;">
    <div class="col-12 pt-3 ps-2 rounded" style="height: 200px;background:url('<?=$card_gambar_berita_terbaik?>');background-size: cover;background-position:top center;">
        <div class="col-12 bgcolorf9e701 d-inline ps-2 pe-2 ms-1 pt-1 pb-1 rounded">
            <b>
                {{$card_tipe_berita_terbaik}}
            </b>
        </div>
    </div>
    <div class="text-capitalize color4a25a9" style="height: 55px;overflow:hidden;">
        <b><?=$card_title_berita_terbaik?></b>
    </div>
    <span class="text-uppercase text-muted" style="font-size: 8pt;">
        <i class="fa fa-calendar"></i> {{$card_tanggal_berita_terbaik}}
    </span>
</div>