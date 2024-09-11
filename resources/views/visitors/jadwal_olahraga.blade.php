<?php $title_page = "Db News Landing Page" ?>
@extends("visitors.container.main")
@section("container")
    <div id="content" class="container">
        <div class="row">
            <div class="col-12 mb-3" style="font-size: 16pt">
                <b class="color4a25a9">Jadwal Olahraga</b>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-1">
                <b class="color4a25a9">Sepak Bola - Indonesia</b>
                @include('visitors.partials.long_divider')
            </div>
        </div>
        <div id="loadingSports_indonesia" class="col-12" style="min-height: 300px;">
            <style>
                .loader {
                    border: 10px solid #f3f3f3;
                    border-radius: 50%;
                    border-top: 10px solid #3498db;
                    width: 50px;
                    height: 50px;
                    margin: 0 auto;
                    -webkit-animation: spin 2s linear infinite; /* Safari */
                    animation: spin 2s linear infinite;
                }

                /* Safari */
                @-webkit-keyframes spin {
                    0% { -webkit-transform: rotate(0deg); }
                    100% { -webkit-transform: rotate(360deg); }
                }

                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
            <div style="transform:translateY(80%)">
                <div class="loader mt-3"></div>
                <div class="fw-bold text-muted text-center my-3">
                    Harap tunggu
                </div>
            </div>
        </div>
        <div id="no_data_sports_indonesia" class="col-12 text-center text-muted" style="min-height: 300px" hidden>
            <div class="col-12" style="transform:translateY(125%)">
                <i class="fa fa-filter" style="font-size: 50px"></i>
                <i class="fa fa-ban" style="font-size: 30px;margin-left:-15px"></i> <br>
                <span class="fw-bold">
                    Tidak memiliki data
                </span>
            </div>
        </div>
        <div id="jadwal_olahraga_indonesia" class="row">
            <!-- Card 
            <div class="col-lg-4 col-md-6 col-12">
                <div class="col-12 border text-center mb-3 rounded">
                    <div class="col-12 py-3 border-bottom">
                        <div class="row">
                            <div class="col-5">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_East_Timor_%283-2%29.svg" height="50px"/>
                            </div>
                            <div class="col-2" style="transform: translateY(25%);">
                                vs
                            </div>
                            <div class="col-5">
                                <img src="/images/flag-400.png" height="50px"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-2 pb-2 border-bottom" style="font-size:10pt">
                        <div class="row">
                            <div class="col-5">
                                Timor Leste 
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                Cambodia
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-2" style="font-size:10pt">
                        <b>FIFA World Cup </b> <br>
                        <small>
                            10/01/2024 - 01:02
                        </small>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
        <div class="row">
            <div class="col-12 mb-1 mt-3">
                <b class="color4a25a9">Sepak Bola - World Cup</b>
                @include('visitors.partials.long_divider')
            </div>
        </div>
        <div id="jadwal_olahraga_world_cup" class="row">
            <!-- Card 
            <div class="col-lg-4 col-md-6 col-12">
                <div class="col-12 border text-center mb-3 rounded">
                    <div class="col-12 py-3 border-bottom">
                        <div class="row">
                            <div class="col-5">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_East_Timor_%283-2%29.svg" height="50px"/>
                            </div>
                            <div class="col-2" style="transform: translateY(25%);">
                                vs
                            </div>
                            <div class="col-5">
                                <img src="/images/flag-400.png" height="50px"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-2 pb-2 border-bottom" style="font-size:10pt">
                        <div class="row">
                            <div class="col-5">
                                Timor Leste 
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                Cambodia
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-2" style="font-size:10pt">
                        <b>FIFA World Cup </b> <br>
                        <small>
                            10/01/2024 - 01:02
                        </small>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
        <div id="loadingSports_world_cup" class="col-12" style="min-height: 300px">
            <div style="transform:translateY(80%)">
                <div class="loader mt-3"></div>
                <div class="fw-bold text-muted text-center my-3">
                    Harap tunggu
                </div>
            </div>
        </div>
        <div id="no_data_sports_world_cup" class="col-12 text-center text-muted pt-3 pb-5 mb-3" style="min-height: 300px" hidden>
            <div style="transform:translateY(125%)">
                <i class="fa fa-filter" style="font-size: 50px"></i>
                <i class="fa fa-ban" style="font-size: 30px;margin-left:-15px"></i> <br>
                <span class="fw-bold">
                    Tidak memiliki data
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>
        <script>
            async function get_sports_schedule() {
                var settings = {
                    "url": "/api/jadwal_olahraga/indonesia",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    let events = response.indonesian_schedule;
                    console.log(response.indonesian_schedule);
                    no_data_sports_indonesia.hidden = events.length > 0;
                    events.forEach(liga => {
                        for (let i = 0; i < liga.length; i++) {
                            const event = liga[i];
                            tanggal = formatDateToText(event.match_date);
                            
                            let element = `
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="col-12 border text-center mb-3 rounded">
                                        <div class="col-12 py-3 border-bottom">
                                            <div class="row">
                                                <div class="col-5">
                                                    <img src="`+event.team_away_badge+`" onerror="this.onerror=null; this.src='`+event.league_logo+`';" height="50px"/>
                                                </div>
                                                <div class="col-2" style="transform: translateY(25%);">
                                                    vs
                                                </div>
                                                <div class="col-5">
                                                    <img src="`+event.team_home_badge+`" onerror="this.onerror=null; this.src='`+event.league_logo+`';" height="50px"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-2 pb-2 border-bottom" style="font-size:10pt">
                                            <div class="row">
                                                <div class="col-5">
                                                    `+event.match_awayteam_name+`
                                                </div>
                                                <div class="col-2"></div>
                                                <div class="col-5">
                                                    `+event.match_hometeam_name+`
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 py-2" style="font-size:10pt">
                                            <b> `+event.league_name+` </b> <br>
                                            <small>
                                                `+tanggal+` - `+event.match_time+`
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            `;
                            jadwal_olahraga_indonesia.innerHTML += element;
                        }
                    });
                    loadingSports_indonesia.hidden = true;
                })

                settings = {
                    "url": "/api/jadwal_olahraga/world_cup",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function (response) {
                    let events = response.worldcup_schedule;
                    no_data_sports_world_cup.hidden = events.length > 0;
                    events.forEach(liga => {
                        for (let i = 0; i < liga.length; i++) {
                            const event = liga[i];
                            tanggal = formatDateToText(event.match_date);
                            
                            let element = `
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="col-12 border text-center mb-3 rounded">
                                        <div class="col-12 py-3 border-bottom">
                                            <div class="row">
                                                <div class="col-5">
                                                    <img src="`+event.team_away_badge+`" height="50px"/>
                                                </div>
                                                <div class="col-2" style="transform: translateY(25%);">
                                                    vs
                                                </div>
                                                <div class="col-5">
                                                    <img src="`+event.team_home_badge+`" height="50px"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-2 pb-2 border-bottom" style="font-size:10pt">
                                            <div class="row">
                                                <div class="col-5">
                                                    `+event.match_awayteam_name+`
                                                </div>
                                                <div class="col-2"></div>
                                                <div class="col-5">
                                                    `+event.match_hometeam_name+`
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 py-2" style="font-size:10pt">
                                            <b> `+event.league_name+` </b> <br>
                                            <small>
                                                `+tanggal+` - `+event.match_time+`
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            `;
                            jadwal_olahraga_world_cup.innerHTML += element;
                        }
                    });
                    loadingSports_world_cup.hidden = true;
                })
            }

            get_sports_schedule();

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
    </div>
@endsection