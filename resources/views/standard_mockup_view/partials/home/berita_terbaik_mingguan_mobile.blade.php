{{-- berita terbaik mingguan --}}
<div class="row">
    <div class="col-12 mb-3 mt-3">
        <b class="color4a25a9 float-start">Berita Terbaik Mingguan</b>
    </div>  
    <div class="col-12 mb-2" style="overflow-y: scroll;">
        <div class="row">
            <div style="min-width:900px; float:left;">
                <?php 
                    $card_tipe_berita_terbaik = "Technology";
                    $card_gambar_berita_terbaik = "./images/Berita Terbaik 1.jpg";
                    $card_title_berita_terbaik = "WordPress Full-Site Editing A Deep Dive Into The ";
                    $card_tanggal_berita_terbaik = "27 August 2024";
                    $card_menit_berita_terbaik = "20";
                    $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite. ";
                ?>
                @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_berita_terbaik_mingguan_mobile")
                <?php 
                    $card_tipe_berita_terbaik = "News";
                    $card_gambar_berita_terbaik = "./images/Berita Terbaik 2.jpg";
                    $card_title_berita_terbaik = "Effective Communication For Everyday Meetings";
                    $card_tanggal_berita_terbaik = "27 August 2024";
                    $card_menit_berita_terbaik = "20";
                    $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite.";
                ?>
                @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_berita_terbaik_mingguan_mobile")
                <?php 
                    $card_tipe_berita_terbaik = "Gadget";
                    $card_gambar_berita_terbaik = "./images/Berita Terbaik 3.jpg";
                    $card_title_berita_terbaik = "A Roadmap For Building A Business Chatbot";
                    $card_tanggal_berita_terbaik = "27 August 2024";
                    $card_menit_berita_terbaik = "20";
                    $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite.";
                ?>
                @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_berita_terbaik_mingguan_mobile")
                <?php 
                    $card_tipe_berita_terbaik = "Mobile";
                    $card_gambar_berita_terbaik = "./images/Berita Terbaik 4.jpg";
                    $card_title_berita_terbaik = "Easy Fluid Typography With clamp() Using Sass Functions";
                    $card_tanggal_berita_terbaik = "27 August 2024";
                    $card_menit_berita_terbaik = "20";
                    $card_isi_berita_terbaik = "Browned butter and brown sugar caramelly oodness crispy edgesthick and soft centers and melty little puddles of chocolate y first favorite.";
                ?>
                @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_berita_terbaik_mingguan_mobile")
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-1 mt-3">
        <b class="color4a25a9 float-start">Popular Tech</b>
    </div>
    <div class="col-12">
        <?php 
            $card_gambar_berita_terbaik = "/images/PopulerTech2.jpg";
            $card_tipe_berita_terbaik = "Mobile";
            $card_title_berita_terbaik = "Effective For Everyday Meetings";
            $card_tanggal_berita_terbaik = "27 August 2024";
        ?>
        @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_popular_mobile")
        <?php 
            $card_gambar_berita_terbaik = "/images/PopulerTech3.jpg";
            $card_tipe_berita_terbaik = "News";
            $card_title_berita_terbaik = "The Butter Chocolate Cookies Daily";
            $card_tanggal_berita_terbaik = "27 August 2024";
        ?>
        @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_popular_mobile")
        <?php 
            $card_gambar_berita_terbaik = "/images/PopulerTech4.jpg";
            $card_tipe_berita_terbaik = "Gadget";
            $card_title_berita_terbaik = "The Anatomy Of Themed Design";
            $card_tanggal_berita_terbaik = "27 August 2024";
        ?>
        @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_part.card_popular_mobile")
    </div>
    <div class="col-12 text-center pb-5">
        <a href="" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
            Load More
        </a>
    </div>
</div>
{{-- berita terbaik mingguan --}}