{{-- today headline --}}
@include("standard_mockup_view.partials.home.today_headline_part.banner_mobile")
<div class="row">
    <div class="col-12">
        <b class="color4a25a9">Jadwal Olahraga</b>
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
    </div>
    <!-- Card Jadwal Olahraga -->
    @include("standard_mockup_view.partials.home.today_headline_part.card_jadwal_olahraga_mobile")
    <div class="col-12 py-0">
        <hr>
    </div>
    @include("standard_mockup_view.partials.home.today_headline_part.card_jadwal_olahraga_mobile")
    <!-- Card Jadwal Olahraga -->
    <div class="col-12">&nbsp;</div>
</div>
{{-- today headline --}}