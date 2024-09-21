<!-- Today Headline News -->
<div class="col-12">
    <?php if (isset($today_headline)==false) $today_headline = []; ?>
    @if (count($today_headline) > 0)
        <?php 
            $link_id = $today_headline[0]->slug;
            $article_img = $today_headline[0]->article_img;
            $category_name = $today_headline[0]->category->name;
            $title = $today_headline[0]->title;
            $views = $today_headline[0]->views;
            $comments_number = count($today_headline[0]->comments->where("parent_id","is",null));
            $share_number = ($today_headline[0]->share)?$today_headline[0]->share:0;
        ?>
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
                        @include('visitors.partials.banner_mobile')
                    </div>
                @endfor
            </div>
        </div>
    @else
        variabel $today_headline tidak ada data
    @endif
</div>
<div class="col-12">
    <a href="/jadwal_olahraga" class="nolink">
        <div class="col-12">
            <b class="color4a25a9" style="font-size: 12pt">Jadwal Olahraga</b>
            @include('visitors.partials.divider')
            <div id="loadingSports_mobile" class="col-12">
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
            <div id="no_data_sports_mobile" class="col-12 text-center text-muted pt-3 pb-5 mb-3" hidden>
                <i class="fa fa-filter" style="font-size: 50px"></i>
                <i class="fa fa-ban" style="font-size: 30px;margin-left:-15px"></i> <br>
                <span class="fw-bold">
                    Tidak memiliki data
                </span>
            </div>
            <div class="col-12 ps-2 pb-3">
                <div id="data_sports_mobile" class="row" hidden></div>
            </div>
        </div>
    </a>
</div>
<!-- Today Headline News -->