<!-- Today Headline News -->
<div class="row">
    <div class="col-9 p-0">
        <?php if (isset($today_headline)==false) $today_headline = []; ?>
        @if (count($today_headline) > 0)
            <?php 
                $link_id = $today_headline[0]->id;
                $article_img = $today_headline[0]->article_img;
                $category_name = $today_headline[0]->category->name;
                $title = $today_headline[0]->title;
                $views = $today_headline[0]->views;
                $comments_number = count($today_headline[0]->comments->where("parent_id","is",null));
                $share_number = ($today_headline[0]->share)?$today_headline[0]->share:0;
            ?>
            @include('visitors.partials.banner')            
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
        <div class="col-12 pb-3">
            <?php $ads_side_id = 0 ?>
            @if (count($ads_side) > 0)
                <a href="{{$ads_side[$ads_side_id]->link}}" target="_blank">
                    <img src="{{Storage::url($ads_side[$ads_side_id]->ad_img)}}" width="100%" class="rounded">
                </a>
            @endif
        </div>
    </div>
</div>
<!-- Today Headline News -->