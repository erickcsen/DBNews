<?php 
    // $card_tipe_berita_terbaik = "Technology";
    // $card_gambar_berita_terbaik = "/images/populer1.jpg";
    // $card_title_berita_terbaik = "Influence The Future of CSS";
    // $card_tanggal_berita_terbaik = "27 August 2024";
    // $card_menit_berita_terbaik = "24";
    // $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite. ";
?>
<div class="col-12 p-0 mt-3">
    <div class="d-inline bgcolorf9e701 px-2 rounded">
        <b> <?=$card_tipe_berita_terbaik?> </b>
    </div> 
    <div class="row">
        <div class="col-6">
            <h5 class="color4a25a9 mt-3"><?=$card_title_berita_terbaik?> </h5>
            <small class="text-muted text-uppercase">
                <i class="fa fa-calendar me-1"></i> 
                <span class="me-3">
                    <?=$card_tanggal_berita_terbaik?>
                </span>
                <span class="me-4">
                    <svg height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="gray" d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                    </svg>
                    <?=$card_menit_berita_terbaik?> Mins
                </span>
            </small> <br>
            <?=$card_isi_berita_terbaik?><br>
            <button class="btn btn-light border-color4a25a9 color4a25a9 mt-3">
                Read more <img src="/images/up-right-arrow.png" height="20px">
            </button>
        </div>
        <div class="col-6">
            <div class="col-12 rounded" style="height: 250px; background:url('<?=$card_gambar_berita_terbaik?>');background-position:center;background-size:cover;"></div>
        </div>
    </div>
</div>