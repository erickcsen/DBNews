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
                {{-- Show email verification notice --}}
                {{-- ===================== VERIFICATION NOTIFICATION ===================== --}}
                {{-- @if (auth()->check() && !auth()->user()->hasVerifiedEmail())
                    <div class="alert alert-danger">
                        {{ __('Please verify your email address. A verification link has been sent to your email address.') }}
                    </div>
                @endif --}}

                
                @include('visitors.partials.home.today_headline_news')
                @include('visitors.partials.home.berita_terpopuler')
                <div>&nbsp;</div>
                @include('visitors.partials.home.youtube')
                <!-- Iklan 1 -->
                <div class="row">
                    <div class="col-12 my-4" style="height: 200px">
                        <div class="col-12">
                            @foreach ($ads_bottom as $item)
                                <a href="{{$item->link}}" target="_blank">
                                    <img class="iklan_bottom_1 rounded" src="{{Storage::url($item->ad_img)}}" style="width:100%">
                                </a>
                            @endforeach
                        </div>
                        <script>
                            var myIndex = 0;
                            carousel1();

                            function carousel1() {
                                var i;
                                var x = document.getElementsByClassName("iklan_bottom_1");
                                for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";  
                                }
                                myIndex++;
                                if (myIndex > x.length) {myIndex = 1}    
                                x[myIndex-1].style.display = "block";  
                                setTimeout(carousel1, 2000); // Change image every 2 seconds
                            }
                        </script>
                    </div>
                </div>
                <!-- Iklan 1 -->
                @include('visitors.partials.home.berita_terbaik_mingguan')
                <!-- Iklan 2 -->
                <div class="row">
                    <div class="col-12 my-4" style="height: 200px">
                        <div class="col-12">
                            @for ($i = count($ads_bottom)-1; count($ads_bottom) > 0 && $i >= 0; $i--)
                                <?php $item = $ads_bottom[$i]; ?>
                                <a href="{{$item->link}}" target="_blank">
                                    <img class="iklan_bottom_2 rounded" src="{{Storage::url($item->ad_img)}}" style="width:100%">
                                </a>
                            @endfor
                        </div>
                        <script>
                            var myIndex2 = 0;
                            carousel2();

                            function carousel2() {
                                var i;
                                var x = document.getElementsByClassName("iklan_bottom_2");
                                for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";  
                                }
                                myIndex2++;
                                if (myIndex2 > x.length) {myIndex2 = 1}    
                                x[myIndex2-1].style.display = "block";  
                                setTimeout(carousel2, 2000); // Change image every 2 seconds
                            }
                        </script>
                    </div>
                </div>
                <!-- Iklan 2 -->
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