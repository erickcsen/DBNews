
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

                <a target="_blank" href="https://www.instagram.com/dbmedianews" class="nolink text-white">Instagram</a><br/>
                <a target="_blank" href="https://www.tiktok.com/@dbmedianews" class="nolink text-white">Tiktok</a><br/>
                <a target="_blank" href="https://www.youtube.com/@dbnewsid" class="nolink text-white">Youtube</a><br/>
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