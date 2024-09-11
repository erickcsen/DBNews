<?php 
    // $link_id = "";
    // $article_img = "";
    // $category_name = "";
    // $title = "";
    // $views = "";
    // $comments_number = "";
    // $share_number = "";
?>
<div class="col-12 p-0 d-none d-lg-inline-block">
    <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
        <div class="col-12 p-0 c">
            <div class="col-12 mb-3 rounded border" style="background-image: url('{{ asset('storage/images/article/' . basename($article_img)) }}');height:450px;background-size:cover;">
                <div class="col-12 mb-3 rounded" style="background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgba(0,0,0,1));height:450px;"></div>
            </div>
            <div class="col-12" style="padding-left:20px;margin-top:-60pt;margin-bottom:40px;">
                <b class="text-light">
                    <h2> Today's Headline </h2>
                </b>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-6">
                    <div class="d-inline bgcolorf9e701 ps-2 pe-2 py-1 rounded text-uppercase" style="font-size: 10pt">
                        <b class="color4a25a9">{{$category_name}}</b>
                    </div>
                </div>
                <div class="col-6 text-muted fw-bold text-end">
                    <span class="me-2">
                        <i class="fa fa-eye"></i>
                    </span>
                    <?php
                        $views = $views == null ? 0 :$views;
                        $singkatan = "";
                        if ($views >= 1000) {
                            $singkatan = "K" ;
                        } else if ($views >= 1000000) {
                            $singkatan = "M";
                        }

                        $more_than_million = "";
                        if ($views >= 1000000000) {
                            $more_than_million = ">= 1B";
                        }

                        if ($views >= 1000) {
                            $views = $views / 1000;
                        } else if ($views >= 1000000){
                            $views = $views / 1000000;
                        }
                    ?>
                    @if ($more_than_million == "") 
                        <span class="me-2"> {{$views}} {{$singkatan}} </span>
                    @else
                        <span class="me-2"> {{$views}} {{$singkatan}} </span>   
                    @endif
                    <span class="me-2">
                        <i class="fa fa-comment"></i> {{$comments_number}}
                    </span>
                    <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 448 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="gray" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z" />
                        </svg> {{$share_number}}
                    </span>
                </div>
                <div class="col-12">
                    <span class="color4a25a9 fw-bold" style="font-size: 18pt">{{$title}}</span>
                </div>
            </div>
        </div>
    </a>
</div>