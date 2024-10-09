<div class="row">
    <?php $ads_side_id = 1 ?>
    <div class="col-<?=(count($randomArticle) > 0 || count($ads_side)-1 >= $ads_side_id)?"9":"12"?> p-0">
        <div class="row">
            <div class="col-12 p-0 mb-2">
                <span class="color4a25a9 float-start fw-bold" style="font-size: 18pt">Berita Terbaik Mingguan</span>
                <a href="/berita_terbaik_mingguan" class="btn btn-light color4a25a9 border-color4a25a9 float-end"> 
                    View All 
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M18 6H8M18 6V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="col-12 p-0">
                @include('visitors.partials.long_divider')
            </div>
            <div class="col-12 p-0 pb-5">
                <?php if (isset($berita_terbaik_mingguan)==false) $berita_terbaik_mingguan = []; ?>
                @for ($i = 0; $i < count($berita_terbaik_mingguan); $i++)
                    <?php 
                        $link_id = $berita_terbaik_mingguan[$i]->slug;
                        $tipe = $berita_terbaik_mingguan[$i]->category->name;
                        $gambar = asset('storage/images/article/' . basename($berita_terbaik_mingguan[$i]->article_img));
                        $title = $berita_terbaik_mingguan[$i]->title;
                        $tanggal = date_format($berita_terbaik_mingguan[$i]->created_at,"d M Y");
                        $menit = date_format($berita_terbaik_mingguan[$i]->created_at,"H:i");
                        $isi = substr($berita_terbaik_mingguan[$i]->description, 0, 255).'...';
                    ?>
                    <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                        @include('visitors.partials.card_4')
                    </a>
                @endfor
                @if (count($berita_terbaik_mingguan) == 0)
                    <div class="col-12 text-muted text-center" style="transform: translateY(50%);">
                        <i class="fa fa-filter" style="font-size:100px"></i>
                        <i class="fa fa-ban" style="font-size:50px;margin-left:-20px"></i> <br>
                        <span class="fw-bold">
                            Tidak Article Terbaik Minggu Ini
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-<?=(count($randomArticle) > 0 || count($ads_side)-1 >= $ads_side_id)?"3":"12"?> ps-4 mb-4">
        <div class="row">
            <!-- Iklan 2 
            <div class="col-12">
                <div class="col-12" style="height: 375px;">
                    @for ($i = count($ads_side)-1; count($ads_bottom) > 0 && $i >= 0; $i--)
                        <?php $item = $ads_side[$i]; ?>
                        <a href="{{$item->link}}" target="_blank">
                            <img class="iklan_side_2 rounded col-12" src="{{Storage::url($item->ad_img)}}" style="max-height: 375px; max-width:100%">
                        </a>
                    @endfor
                </div>
                <script>
                    var myIndex_side2 = 0;
                    carousel_side2();

                    function carousel_side2() {
                        var i;
                        var x = document.getElementsByClassName("iklan_side_2");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";  
                        }
                        myIndex_side2++;
                        if (myIndex_side2 > x.length) {myIndex_side2 = 1}    
                        x[myIndex_side2-1].style.display = "block";  
                        setTimeout(carousel_side2, 2000); // Change image every 2 seconds
                    }
                </script>
            </div>
            <!-- Iklan 2 -->
            <!-- Iklan 2 Khusus -->
            <div class="col-12">
                <div class="col-12" style="height: 375px;">
                    @foreach ($ads_side as $item)
                        @if ($item->title=="DBSpace")
                            <?php $item = $ads_side[$i]; ?>
                            <a href="{{$item->link}}" target="_blank">
                                <img class="iklan_side_2 rounded col-12" src="{{Storage::url($item->ad_img)}}" style="max-height: 375px; max-width:100%">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Iklan 2 Khusus -->
            @if (count($randomArticle) > 0)
                <div class="col-12 mt-3 text-capitalize">
                    <b class="color4a25a9">Popular {{$randomCategory->name}}</b>
                </div>
                <div class="col-12">
                    @include('visitors.partials.divider')
                </div>
                @php
                    $popular_random_article = $randomArticle[0];
                @endphp
                <a href="/read_article/{{$popular_random_article->slug}}" class="nolink">
                    <div class="col-12">
                        <div class="col-12 mt-3 rounded overflow-hidden" style="background:url('{{Storage::url($popular_random_article->article_img)}}');height:300px;background-size:cover;background-position:center">
                            <div class="col-12" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));height:300px;">
                            </div>
                        </div>
                        <div class="col-12 px-3 text-white" style="margin-top: -120px">
                            <div class="d-inline bgcolorf9e701 px-2 py-1 rounded text-dark text-uppercase" style="font-size:8pt">
                                @if ($popular_random_article->subcategory)
                                    <b> {{$popular_random_article->subcategory->name}} </b>
                                @else
                                    <b> {{$popular_random_article->category->name}} </b>
                                @endif
                            </div>
                            <div class="mb-2 mt-2 overflow-hidden text-capitalize" style="max-height: 50px"> {{$popular_random_article->title}} </div>
                            <div style="font-size: 8pt;">
                                <i class="fa fa-calendar"></i>
                                <span class="me-3"> 27 August 2024 </span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 18px;">
                                    <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path style="fill: white;" d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg> {{date_format($popular_random_article->created_at,"h:i")}}
                            </div>
                        </div>
                        <div class="col-12" style="margin-bottom: 30px"></div>
                    </div>
                </a>
                <div class="col-12">
                    <?php if (isset($randomArticle)==false) $randomArticle = []; ?>
                    @if (count($randomArticle) > 1)
                        @for ($i = 1; $i < count($randomArticle); $i++)
                            <?php 
                                $link_id = $randomArticle[$i]->slug;
                                $gambar = asset('storage/images/article/' . basename($randomArticle[$i]->article_img));
                                $tipe = $randomArticle[$i]->category->name;
                                $title = $randomArticle[$i]->title;
                                $tanggal = date_format($randomArticle[$i]->created_at,"d M Y");;
                            ?>
                            <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                                @include("visitors.partials.card_2")
                            </a>
                        @endfor
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>