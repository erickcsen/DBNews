<!-- Today Headline News -->
<div class="row">
    <div class="col-9 p-0" style="height: 610px">
        <?php if (isset($today_headline)==false) $today_headline = []; ?>
        @if (count($today_headline) > 0)
            <div class="carousel slide" data-bs-ride="carousel">
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    @for ($i=0;$i<count($today_headline);$i++)
                        <?php 
                            $item = $today_headline[$i];
                            $link_id = $item->slug;
                            $article_img = $item->article_img;
                            $category_name = $item->category->name;
                            $title = $item->title;
                            $views = $item->views;
                            $comments_number = count($item->comments->where("parent_id","is",null));
                            $share_number = ($item->share)?$item->share:0;
                        ?>
                        <div class="carousel-item <?=$i==0?"active":""?>">
                            @include('visitors.partials.banner')
                        </div>
                    @endfor
                </div>
            </div>
        @else
            variabel $today_headline tidak ada data
        @endif
    </div>
    <div class="col-3">
        <a href="/jadwal_olahraga" class="nolink">
            <div class="col-12">
                <b class="color4a25a9">Jadwal Olahraga</b>
                @include('visitors.partials.divider')
                <div id="loadingSports" class="col-12">
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
                    <div class="loader mt-3"></div>
                    <div class="fw-bold text-muted text-center my-3">
                        Harap tunggu
                    </div>
                </div>
                <div id="no_data_sports" class="col-12 text-center text-muted pt-3 pb-5 mb-3" hidden>
                    <i class="fa fa-filter" style="font-size: 50px"></i>
                    <i class="fa fa-ban" style="font-size: 30px;margin-left:-15px"></i> <br>
                    <span class="fw-bold">
                        Tidak memiliki data
                    </span>
                </div>
                <div class="col-12 ps-3 pb-3">
                    <div id="data_sports" class="row" hidden></div>
                </div>
            </div>
        </a>
        <div class="col-12 pb-0">
            <!-- Iklan 1 -->
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="col-12 overflow-hidden" style="height: 345px;">
                        @foreach ($ads_side as $item)
                            <center>
                                <a href="{{$item->link}}" target="_blank">
                                    <img class="iklan_side_1 rounded col-12" src="{{Storage::url($item->ad_img)}}" style="max-height: 345px;">
                                </a>
                            </center>
                        @endforeach
                    </div>
                    <script>
                        var myIndex_side1 = 0;
                        carousel_side1();

                        function carousel_side1() {
                            var i;
                            var x = document.getElementsByClassName("iklan_side_1");
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";  
                            }
                            myIndex_side1++;
                            if (myIndex_side1 > x.length) {myIndex_side1 = 1}    
                            x[myIndex_side1-1].style.display = "block";  
                            setTimeout(carousel_side1, 2000); // Change image every 2 seconds
                        }
                    </script>
                </div>
            </div>
            <!-- Iklan 1 -->
        </div>
    </div>
</div>
<!-- Today Headline News -->