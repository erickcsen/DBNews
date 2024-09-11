
<div class="col-lg-3 mt-3">
    <b class="color4a25a9">Berita Terbaru</b>
    <div style="margin-top:-10px">
      <svg width="100%" height="5" xmlns="http://www.w3.org/2000/svg">
          <!-- Persegi Panjang -->
          <rect x="0" y="0" width="30" height="5" fill="orange"/>
          <!-- Segitiga Siku -->
          <polygon x="15" points="30,0,40,0 30,5" fill="orange"/>
          <rect x="40" y="0" width="100%" height="1" fill="silver"/>
          <rect x="30" y="4" width="100%" height="1" fill="silver"/>
          <!-- -->
      </svg>
    </div>
    <?php 
      $card_gambar_berita_baru = "/images/populer1.jpg";
      $card_tipe_berita_baru = "Technology";
      $card_title_berita_baru = "Influence The Future of CSS";
      $card_tanggal_berita_baru = "27 August, 2024";
    ?>
    @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita_baru")
    <?php 
      $card_gambar_berita_baru = "/images/populer2.jpg";
      $card_tipe_berita_baru = "Technology";
      $card_title_berita_baru = "Best Tech Accessor 5 Work From Home";
      $card_tanggal_berita_baru = "27 August, 2024";
    ?>
    @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita_baru")
    <?php 
      $card_gambar_berita_baru = "/images/populer3.jpg";
      $card_tipe_berita_baru = "Technology";
      $card_title_berita_baru = "The Butter Chocolate Cookies Daily";
      $card_tanggal_berita_baru = "27 August, 2024";
    ?>
    @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita_baru")
</div>