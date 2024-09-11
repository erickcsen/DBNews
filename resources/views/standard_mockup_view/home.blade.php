<?php $title_page = "Db News Landing Page" ?>
@extends("standard_mockup_view.container.main")
@section("container")
    {{-- Tampilan Desktop --}}
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            @include("standard_mockup_view.partials.home.today_headline")
            @include("standard_mockup_view.partials.home.berita_terpopuler")
            @include("standard_mockup_view.partials.home.youtube_video")
            <!-- Iklan -->
            <div class="row">
                <div class="col-12 mt-5 mb-5" style="height: 170px;background-size: contain;background-position: center;background-image: url('./images/Iklan2.png');background-repeat:no-repeat;">
                </div>
            </div>
            <!-- Iklan -->
            @include("standard_mockup_view.partials.home.berita_terbaik_mingguan")
            <!-- Iklan -->
            <div class="row">
                <div class="col-12 mt-5 mb-5" style="height: 170px;background-size: contain;background-position: center;background-image: url('./images/Iklan4.png');background-repeat:no-repeat;">
                </div>
            </div>
            <!-- Iklan -->
        </div>
    </div>
    {{-- Tampilan Desktop --}}
    {{-- Tampilan Mobile --}}
    <div id="content" class="border col-12 d-lg-none d-md-inline-block">
        <div class="container">
            @include("standard_mockup_view.partials.home.today_headline_mobile")
            @include("standard_mockup_view.partials.home.berita_terpopuler_mobile")
            @include("standard_mockup_view.partials.home.youtube_video_mobile")
            @include("standard_mockup_view.partials.home.berita_terbaik_mingguan_mobile")
        </div>
    </div>
    {{-- Tampilan Mobile --}}
@endsection