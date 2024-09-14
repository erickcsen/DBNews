
<div id="footer" class="col-12 bgcolor4a25a9 text-white pt-3 d-none d-md-inline-block">
    <div class="container">
        <div class="row">
            <div class="col-4 p-2 mb-3">
                <img src="/images/logo_dbnews.png" alt="" srcset="" height="25px" class="mb-4"> <br>
                <span style="font-size: 12pt;">
                    DB News menyediakan berita akurat dalam bidang news, hiburan, lifestyle, sport, dan tech, serta menjadi ruang kreasi dan kontribusi kaum muda. Melalui program diskusi dan interaksi digital, kami berkomitmen menyebarkan inspirasi positif, menjunjung keberagaman, dan berperan dalam membentuk identitas bangsa.
                </span>
            </div>
            <div class="col-2">
                <b>
                    Eksplorasi
                </b>
                <div>
                    @include('visitors.partials.divider_footer')
                </div>
                <a href="/home" class="nolink text-white">Home</a><br/>
                <a href="/about_us" class="nolink text-white">Tentang Kami</a><br/>
                @auth
                    @if (Auth::user()->role != 0)
                        <a target="_blank" class="nolink" href="/dashboardAdmin" >Akun Saya</a>
                    @endif
                @else
                    <a href="/" class="nolink text-white">Akun Saya</a><br/>
                @endauth
            </div>
            <div class="col-2">
                <b>
                    Ikuti Kami
                </b>
                
                <div>
                    @include('visitors.partials.divider_footer')
                </div>

                <a target="_blank" href="https://www.instagram.com/dbmedianews" class="nolink text-white" style="font-size: 25px">
                    <i class="fa fa-instagram"></i>
                </a> &nbsp;
                <a target="_blank" href="https://www.tiktok.com/@dbmedianews" class="nolink text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" style="margin-top:-10px"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="white"
                            d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                    </svg>
                </a> &nbsp;
                <a target="_blank" href="https://www.youtube.com/@dbnewsid" class="nolink text-white" style="font-size: 20px">
                    <i class="fa fa-youtube-play"></i>
                </a><br/>
            </div>
            <div class="col-4">
                <b>
                    Informasi
                </b>
                <div>
                    @include('visitors.partials.divider_footer')
                </div>
                <div class="mb-3">
                    Phone : <br>
                    0899-9373-777 
                </div>
                Alamat : <br>
                Jl. Raya Tenggilis Mejoyo No. AA - 3, Kali Rungkut, Kec. Rungkut, Kota SBY, Jawa Timur 60293

            </div>
        </div>
    </div>
</div>