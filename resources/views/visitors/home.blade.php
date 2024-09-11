<?php $title_page = "Db News Landing Page" ?>
@extends("visitors.container.main")
@section("container")
    @php
        $link_url = ""
    @endphp
    <?php if (isset($article)==false) $article = [] ;?>
    @if (count($article) > 0)
        <div id="content" class="col-12 d-none d-lg-inline-block">
            <div class="container">
                @include('visitors.partials.home.today_headline_news')
                @include('visitors.partials.home.berita_terpopuler')
                <div>&nbsp;</div>
                @include('visitors.partials.home.youtube')
                <!-- Iklan -->
                <div class="row">
                    <?php $ads_bottom_id = 0 ?>
                    @if (count($ads_bottom) > 0)
                        <?php $link_url = $ads_bottom[$ads_bottom_id]->link?>
                        <a href="{{$link_url}}" target="_blank">
                            <div class="col-12 mb-5" style="height: 170px;background-size: contain;background-position: center;background-image: url('{{Storage::url($ads_bottom[$ads_bottom_id]->ad_img)}}');background-repeat:no-repeat;">
                            </div>
                        </a>
                    @endif
                </div>
                <!-- Iklan -->
                @include('visitors.partials.home.berita_terbaik_mingguan')
                <!-- Iklan -->
                <?php $ads_bottom_id = $ads_bottom_id+1 ?>
                @if (count($ads_bottom) > $ads_bottom_id)
                    <div class="col-12 mb-5"></div>
                    <div class="row">
                        <?php $link_url = $ads_bottom[$ads_bottom_id]->link?>
                        <a href="{{$link_url}}" target="_blank">
                            <div class="col-12 mb-5" style="height: 170px;background-size: contain;background-position: center;background-image: url('{{Storage::url($ads_bottom[$ads_bottom_id]->ad_img)}}');background-repeat:no-repeat;">
                            </div>
                        </a>
                    </div>
                @elseif(count($ads_bottom) > 0)
                    <?php $ads_bottom_id = 0 ?>
                    <div class="col-12 mb-5"></div>
                    <div class="row">
                        <?php $link_url = $ads_bottom[$ads_bottom_id]->link?>
                        <a href="{{$link_url}}" target="_blank">
                            <div class="col-12 mb-5" style="height: 170px;background-size: contain;background-position: center;background-image: url('{{Storage::url($ads_bottom[$ads_bottom_id]->ad_img)}}');background-repeat:no-repeat;">
                            </div>
                        </a>
                    </div>
                @endif
                <!-- Iklan -->
            </div>
        </div>
        <div id="content" class="col-12 d-lg-none d-inline-block">
            <div class="container">
                @include('visitors.partials.home.today_headline_news_mobile')
                @include('visitors.partials.home.berita_terpopuler_mobile')
                @include('visitors.partials.home.youtube_mobile')
                @include('visitors.partials.home.berita_terbaik_mingguan_mobile')
            </div>
        </div>        
    @elseif (count($youtube_video) > 0)
        <div id="content" class="col-12 d-none d-lg-inline-block">
            <div class="container">
                @include('visitors.partials.home.youtube')
            </div>
        </div>
        <div id="content" class="col-12 d-lg-none d-inline-block">
            <div class="container">
                @include('visitors.partials.home.youtube_mobile')
            </div>
        </div>
    @else
        <div id="content" class="col-12">
            <div class="container">
                <div class="col-12 text-center text-muted" style="margin:10% 0;margin-bottom:15%;" <?=count($article)>0?"hidden":""?> >
                    <i class="fa fa-filter" style="font-size: 100px"></i>
                    <i class="fa fa-ban" style="font-size: 50px;margin-left:-20px"></i>
                    <h3>Belum ada Article</h3>
                </div>
            </div>
        </div>
    @endif
    
    <script>
        async function get_sports_schedule() {
            var settings = {
                "url": "/api/jadwal_olahraga",
                "method": "GET",
                "timeout": 0,
            };
    
            $.ajax(settings).done(function (response) {
                let events = response.events;
                console.log(response.events);
                no_data_sports.hidden = response.events.length > 0;
                no_data_sports_mobile.hidden = response.events.length > 0;
                data_sports.hidden = response.events.length == 0;
                data_sports_mobile.hidden = response.events.length == 0;
                // events.forEach(liga => {
                let liga = []
                if (events.length > 0)
                    liga = events[0];
                    for (let i = 0; i < liga.length && i < 2; i++) {
                        const event = liga[i];
                        tanggal = formatDateToText(event.match_date);
                        
                        let element = `
                            <div class="col-12 p-0 p-2">
                                <div class="row">
                                    <div class="col-md-8 col-7 border-end">
                                        <img src="`+event.team_away_badge+`" onerror="this.onerror=null; this.src='`+event.league_logo+`';" height="30px"/>
                                        <small class="text-muted">
                                            `+event.match_awayteam_name+`
                                        </small> <br>
                                        <img src="`+event.team_home_badge+`" onerror="this.onerror=null; this.src='`+event.league_logo+`';" height="30px"/>
                                        <small class="text-muted">
                                            `+event.match_hometeam_name +`
                                        </small>
                                    </div>
                                    <div class="col-md-4 col-5 text-center text-muted mt-1">
                                        <small>
                                        `+tanggal+` <br>
                                        `+event.match_time+`
                                        </small>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-10 pt-2">
                                        <hr class="m-0"> 
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                        `;
                        data_sports.innerHTML += element;
                        data_sports_mobile.innerHTML += element;
                    }
                // });
                loadingSports.hidden = true;
                loadingSports_mobile.hidden = true;
            });
        }

        window.addEventListener('load', function() {
            get_sports_schedule();
        });

        function formatDateToText(date) {
            const today = new Date();
            const targetDate = new Date(date);

            today.setHours(0, 0, 0, 0);
            targetDate.setHours(0, 0, 0, 0);

            const diffDays = Math.floor((targetDate - today) / (1000 * 60 * 60 * 24));

            if (diffDays === 0) {
                return "Hari ini";
            } else if (diffDays === 1) {
                return "Besok";
            } else if (diffDays === -1) {
                return "Kemarin";
            } else if (diffDays > 1 && diffDays <= 7) {
                return "Minggu ini";
            } else if (diffDays > 7 && diffDays <= 30) {
                return "Bulan ini";
            } else if (diffDays > 30 && diffDays <= 60) {
                return "Minggu depan";
            } else if (diffDays > 60) {
                return tanggal.getDate()+"/"+tanggal.getMonth()+"/"+tanggal.getFullYear(); // Format default
            }
        }

    </script>
@endsection