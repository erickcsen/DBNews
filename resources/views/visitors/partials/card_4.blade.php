<?php 
    // $tipe = "Technology";
    // $gambar = "/images/populer1.jpg";
    // $title = "Influence The Future of CSS";
    // $tanggal = "27 August 2024";
    // $menit = "24";
    // $isi = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite. ";
?>
<div class="col-12 p-0 mt-3 pb-3">
    <div class="d-inline bgcolorf9e701 px-2 rounded text-uppercase py-1" style="font-size: 9pt">
        <b> <?=$tipe?> </b>
    </div> 
    <div class="row">
        <div class="col-6">
            <b class="color4a25a9 mt-3" style="font-size: 14pt"><?=$title?> </b> <br>
            <small class="text-muted text-uppercase" style="font-size: 9pt">
                <i class="fa fa-calendar me-1"></i> 
                <span class="me-3">
                    <?=$tanggal?>
                </span>
                <span class="me-4">
                    <svg height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="gray" d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                    </svg>
                    <?=$menit?> 
                </span>
            </small>
            <div class="my-2" style="font-size: 11pt">
                {{substr($isi,3,strlen($isi))}}
            </div>
            <button class="btn btn-light border-color4a25a9 color4a25a9 mt-3">
                Read more
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M18 6H8M18 6V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div class="col-6">
            <div class="col-12 rounded border" style="height: 250px; background:url('<?=$gambar?>');background-position:center;background-size:cover;"></div>
        </div>
    </div>
</div>