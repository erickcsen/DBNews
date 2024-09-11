<div class="col-lg-9">
    <div class="row">
        <div class="col-6 p-0">
            <h3 class="color4a25a9">Berita Terpopuler</h3>
        </div>
        <div class="col-6 p-0 text-end">
            <button class="btn btn-light color4a25a9 border-color4a25a9"> View All <img src="/images/up-right-arrow.png" height="20px">
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2"></div> 
        <?php $news_card_photo = "/images/berita1.png" ?>
        <?php $news_card_title = "Spanyol raih juara euro 2024" ?>
        <?php $news_card_user = "By Admin" ?>
        @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita")
        <?php $news_card_photo = "/images/berita2.png" ?>
        <?php $news_card_title = "Peco Bagnaia Kembali raih pole position" ?>
        <?php $news_card_user = "By Admin" ?>
        @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita")
        <?php $news_card_photo = "/images/berita3.png" ?>
        <?php $news_card_title = "Jonathan Cristie dicurang, PBSI Protes" ?>
        <?php $news_card_user = "By Admin" ?>
        @include("standard_mockup_view.partials.home.berita_terpopuler_part.card_berita")
    </div>
</div>