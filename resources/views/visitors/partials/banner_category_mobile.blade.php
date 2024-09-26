<?php 
    // $link_id = "/read_article"."/".""
    // $article_img = ""
    // $article_img = asset('storage/images/article/' . basename($article_img)) 
    // $category_name = ""
    // $title = ""
?>
<div class="col-12 p-0 d-lg-none d-inline-block">
    <a href="{{$link_id}}" class="nolink">
        <div class="col-12">
            <div class="col-12 mb-3 rounded overflow-hidden">
                <div class="col-12 p-0 border rounded" style="background:black;">
                    <div class="col-12 rounded" style="background-image: url('{{$article_img}}');height:200px;background-size:auto 100%;background-position:center;background-repeat:no-repeat;">
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-4">
                        <div class="d-inline bgcolorf9e701 ps-2 pe-2 py-1 rounded text-uppercase" style="font-size: 8pt;">
                            <b class="color4a25a9">{{$category_name}}</b>
                        </div>
                    </div>
                    <div class="col-8 text-muted fw-bold text-end">
                        <span class="me-2" style="font-size: 10pt;">
                            <i class="fa fa-eye"></i>
                        </span>
                        <?php
                            $singkatan = "";
                            $views = $views == null ? 0 : $views;
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
                            <span class="me-2" style="font-size: 10pt;"> {{$views}} {{$singkatan}} </span>
                        @else
                            <span class="me-2" style="font-size: 10pt;"> {{$views}} {{$singkatan}} </span>   
                        @endif
                        <span class="me-2" style="font-size: 10pt;">
                            <i class="fa fa-comment"></i> {{$comments_number}}
                        </span>
                        <span class="me-2" style="font-size: 10pt;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10pt" height="10pt" viewBox="0 0 448 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="gray" d="M352 224c53 0 96-43 96-96s-43-96-96-96s-96 43-96 96c0 4 .2 8 .7 11.9l-94.1 47C145.4 170.2 121.9 160 96 160c-53 0-96 43-96 96s43 96 96 96c25.9 0 49.4-10.2 66.6-26.9l94.1 47c-.5 3.9-.7 7.8-.7 11.9c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-25.9 0-49.4 10.2-66.6 26.9l-94.1-47c.5-3.9 .7-7.8 .7-11.9s-.2-8-.7-11.9l94.1-47C302.6 213.8 326.1 224 352 224z" />
                            </svg> {{$share_number}}
                        </span>
                    </div>
                    <div class="col-12 overflow-hidden pt-2">
                        <span class="color4a25a9 fw-bold">
                            @if (strlen($title) > 65)
                                {{ substr($title,0,65) }} ..                                
                            @else                                
                                {{ $title }} <br>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>