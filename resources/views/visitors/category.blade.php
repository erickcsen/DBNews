<?php $title_page = ucwords($category_selected) ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop --}}
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <!-- Article -->
            @if (count($article) > 0)
                <div class="row">
                    <div class="col-9 p-0 pe-1">
                        <!-- Banner -->
                        <div class="col-12">
                            <?php $article_utama = []; ?>
                            @if (count($article)>0)
                                <?php $article_utama = $today_headline; ?>
                            @endif
                            <?php 
                                $link_id = "/read_article"."/".$article_utama->slug;
                                $article_img = $article_utama->article_img;
                                $article_img = asset('storage/images/article/' . basename($article_img));
                                $category_name = $article_utama->category->name;
                                $category_name = ($article_utama->subcategory)?$article_utama->subcategory->name:$category_name;
                                $title = $article_utama->title;
                                $views = $article_utama->views;
                                $comments_number = count($article_utama->comments->where("parent_id","is",null))
                            ?>
                            @include('visitors.partials.banner_category')
                            <div class="col-12 mb-5"></div>
                        </div>
                        <!-- Banner -->
                    </div>
                    <div class="col-3 p-0 ps-1">
                        <div class="col-12 pt-3">
                            <b class="color4a25a9" style="font-size: 14pt">Berita Terbaru</b>
                            @include('visitors.partials.divider')
                        </div>
                        <div class="col-12">
                            @foreach ($berita_terbaru as $item)
                                <?php $gambar = $item->article_img ?>
                                <?php $gambar = asset('storage/images/article/' . basename($gambar)) ?>
                                <?php $tipe = $item->category->name ?>
                                <?php $tanggal = $item->created_at ?>
                                <?php $tanggal = date_format($tanggal,"d M Y"); ?>
                                <?php $title = $item->title; ?>
                                <a href="/read_article/{{$item->slug}}" class="nolink">
                                    @include('visitors.partials.card_2')
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <b class="color4a25a9 text-capitalize" style="font-size: 18pt">{{$category_selected}}</b>
                        <div style="margin-top:-10px;">
                            @include('visitors.partials.long_divider')
                        </div>
                    </div>
                    <div class="col-12 pb-2">
                        <div class="row">
                            <?php $temp = $category?>
                            @foreach ($article as $item)
                                <?php $tipe = $item->category->name ?>
                                <?php $category = ($item->subcategory)?$item->subcategory->name:$tipe ?>
                                <?php $tanggal = $item->created_at ?>
                                <?php $user = "Admin" ?>
                                <?php $menit = date_format($tanggal,"H:i") ?>
                                <?php $tanggal = date_format($tanggal,"d M Y") ?>
                                <?php $description = substr($item->description,0,97).'...' ?>
                                <?php $gambar = $item->article_img ?>
                                <?php $title = $item->title; ?>
                                <?php $photo = asset('storage/images/article/' . basename($gambar)) ?>
                                @include('visitors.partials.card_5')
                            @endforeach
                            <?php $category = $temp ?>
                        </div>
                    </div>
                    <div class="col-12 mb-3 text-center">
                        <a href="/visit_category/{{$category_selected}}/article" class="btn btn-light bgcolor4a25a9 text-white">
                            Load More
                        </a>
                    </div>
                </div>                
                <!-- Iklan 1 -->
                <?php $ads_bottom_id = 1 ?>
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
            @endif
            <!-- Article -->
            <!-- Youtube Video -->
            @if (count($youtube_video) > 0)
                <div class="row">
                    <div class="col-12 mt-3 p-0 d-none" <?=(count($article) > 0)?"":"hidden"?>>
                        <b class="color4a25a9" style="font-size: 18pt">Youtube Video</b>
                        <div style="margin-top:-10px;">
                            @include('visitors.partials.long_divider')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 pb-3 pt-3">
                        <?php if (isset($youtube_video)==false) $youtube_video = []?>
                        @if (count($youtube_video) > 0)
                            <div class="row">
                                <!-- Banner -->
                                <div class="col-12">
                                    <?php $youtube_utama = []; ?>
                                    @if (count($youtube_video)>0)
                                        <?php $youtube_utama = $youtube_video[0]; ?>
                                    @endif
                                    <?php $link_page_id = "/".$youtube_video[0]->slug; ?>
                                    <?php $link_domain = 'https://youtu.be/' ?>
                                    <?php $link_id_and_value = substr($youtube_video[0]->link,strlen($link_domain),strlen($youtube_video[0]->link))?>
                                    <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                                    <?php 
                                        $link_id = "/watch_vidio"."/".$youtube_utama->slug;
                                        $article_img = $link_image;
                                        $category_name = $youtube_utama->category->name;
                                        $title = $youtube_utama->title;
                                        $views = 0;
                                        $views = $youtube_utama->views;
                                    ?>
                                    @include('visitors.partials.banner_category')
                                    <div class="col-12 mb-5"></div>
                                </div>
                                <!-- Banner -->
                            </div>
                        @endif
                    </div>
                    <div class="col-4 p-0 ps-1">
                        <div class="col-12 pt-3">
                            <b class="color4a25a9" style="font-size: 14pt">Video Terbaru</b>
                            @include('visitors.partials.divider')
                        </div>
                        <div class="col-12">
                            @foreach ($youtube_video_terbaru as $item)
                                <?php $link_page_id = "/".$item->slug; ?>
                                <?php $link_domain = 'https://youtu.be/' ?>
                                <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                                <?php $link_image = 'https://img.youtube.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hqdefault.jpg' ?>
                                <?php $tanggal = date_format($item->created_at,"d M Y"); ?>
                                <?php 
                                    $gambar = $link_image;
                                    $tipe = $item->category->name;
                                    $title = $item->title;
                                ?>
                                <a href="/watch_vidio/{{$item->slug}}" class="nolink">
                                    @include('visitors.partials.card_2')
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0 pt-3">
                        <b class="color4a25a9 text-capitalize" style="font-size: 18pt">{{$category_selected}} Video </b>
                        <div class="col-xs-12" style="margin-top:-10px;">
                            @include('visitors.partials.long_divider')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $temp = $category?>
                    @for ($i = 0; $i < count($youtube_video); $i++)
                        <?php $link_page_id = "/".$youtube_video[$i]->slug; ?>
                        <?php $link_domain = 'https://youtu.be/' ?>
                        <?php $link_id_and_value = substr($youtube_video[$i]->link,strlen($link_domain),strlen($youtube_video[$i]->link))?>
                        <?php $link_image = 'https://img.youtube.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hqdefault.jpg' ?>
                        <?php 
                            $item = $youtube_video[$i];
                            $link_id = '/watch_vidio'.'/'.$item->slug;
                            $photo = $link_image;
                            $title = $youtube_video[$i]->title;
                            $user = "By Admin"; 
                            $category = $youtube_video[$i]->category->name; 
                            $tanggal = "27 Agustus 2024"; 
                            $description = $youtube_video[$i]->description;
                        ?>
                        @include('visitors.partials.card_5')
                    @endfor
                    <?php $category = $temp ?>
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <a href="/visit_category/{{$category_selected}}/video" class="btn btn-light bgcolor4a25a9 text-white">
                            Load More
                        </a>
                    </div>
                </div>
                <!-- Iklan 2 -->
                <?php $ads_bottom_id += 1 ?>
                <div class="row">
                    <div class="col-12 my-4" style="height: 200px">
                        <div class="col-12">
                            @foreach ($ads_bottom as $item)
                                <a href="{{$item->link}}" target="_blank">
                                    <img class="iklan_bottom_2 rounded" src="{{Storage::url($item->ad_img)}}" style="width:100%">
                                </a>
                            @endforeach
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
            @endif
            <!-- Youtube Video -->
            <!-- Sub Category Article -->
            @if (count($article)>0)
                @foreach ($sub_category_type as $item)
                    @if (count($item->article) > 0)
                        <div class="row">
                            <div class="col-12 mt-3 p-0">
                                <b class="color4a25a9 text-capitalize" style="font-size: 18pt">{{$item->name}} </b>
                                <div style="margin-top:-10px;">
                                    @include('visitors.partials.long_divider')
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php $temp = $category?>
                            @foreach ($item->article as $value_article)
                                <?php $link_id = "/read_article"."/".$value_article->slug ?>
                                <?php $tipe = $value_article->category->name ?>
                                <?php $category = ($value_article->subcategory)?$value_article->subcategory->name:$tipe ?>
                                <?php $tanggal = $value_article->created_at ?>
                                <?php $user = "Admin" ?>
                                <?php $menit = date_format($tanggal,"H:i") ?>
                                <?php $tanggal = date_format($tanggal,"d M Y") ?>
                                <?php $description = substr($value_article->description,0,95).'...' ?>
                                <?php $gambar = $value_article->article_img ?>
                                <?php $title = $value_article->title; ?>
                                <?php $photo = asset('storage/images/article/' . basename($gambar)) ?>
                                @include('visitors.partials.card_5')
                            @endforeach
                            <?php $category = $temp ?>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-1 mb-1">
                                <a href="/visit_category/{{$category_selected}}/{{$item->name}}" class="btn btn-light bgcolor4a25a9 text-white">
                                    Load More
                                </a>
                            </div>
                        </div>
                        <!-- Iklan 3 -->
                        @php
                            $ads_bottom_id += 1
                        @endphp
                        <div class="row">
                            <div class="col-12 my-4" style="height: 200px">
                                <div class="col-12">
                                    @foreach ($ads_bottom as $item)
                                        <a href="{{$item->link}}" target="_blank">
                                            <img class="iklan_bottom_<?=$ads_bottom_id?> rounded" src="{{Storage::url($item->ad_img)}}" style="width:100%">
                                        </a>
                                    @endforeach
                                </div>
                                <script>
                                    var myIndex_{{$ads_bottom_id}}= 0;
                                    carousel{{$ads_bottom_id}}();

                                    function carousel{{$ads_bottom_id}}() {
                                        var i;
                                        var x = document.getElementsByClassName("iklan_bottom_{{$ads_bottom_id}}");
                                        for (i = 0; i < x.length; i++) {
                                            x[i].style.display = "none";  
                                        }
                                        myIndex_{{$ads_bottom_id}}++;
                                        if (myIndex_{{$ads_bottom_id}} > x.length) {myIndex_{{$ads_bottom_id}} = 1}    
                                        x[myIndex_{{$ads_bottom_id}}-1].style.display = "block";  
                                        setTimeout(carousel{{$ads_bottom_id}}, 2000); // Change image every 2 seconds
                                    }
                                </script>
                            </div>
                        </div>
                        <!-- Iklan 3 -->
                    @endif
                @endforeach
            @endif
            <!-- Sub Category Article -->
            <div class="col-12">&nbsp;</div>
        </div>
    </div>
    {{-- Tampilan Desktop --}}
    {{-- Tampilan Mobile --}}
    <div id="content" class="col-12 d-lg-none d-inline-block">
        <div class="container">
            <!-- Article -->
            @if (count($article) > 0)
                <div class="row">
                    <div class="col-12">
                        @if (count($article) > 0)
                            <?php 
                                $link_id = "/read_article"."/".$article[0]->slug;
                                $article_img = $article[0]->article_img;
                                $article_img = asset('storage/images/article/' . basename($article_img));
                                $category_name = $article[0]->category->name;
                                $title = $article[0]->title;
                            ?>
                            @include('visitors.partials.banner_category_mobile')
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach ($article as $item)
                        <?php 
                            $gambar = $item->article_img;
                            $gambar = asset('storage/images/article/' . basename($gambar)) ;
                            $tipe = $item->category->name;
                            $title = $item->title;
                            $tanggal = $item->category->created_at;
                            $tanggal = date_format($tanggal,"d M Y"); 
                        ?>
                        <a href="/read_article/{{$item->slug}}" class="nolink">
                            @include('visitors.partials.card_2_mobile')
                        </a>
                    @endforeach
                    <div class="col-12 text-center mb-3">
                        <a href="/visit_category/{{$category_selected}}/article" class="btn btn-light bgcolor4a25a9 text-white">
                            Load More
                        </a>
                    </div>
                </div>
            @endif
            <!-- Article -->
            <!-- Youtube Video -->
            @if (count($youtube_video) > 0)
                <div class="row">
                    <div class="col-12 mb-3" <?=(count($article) > 0)?"":"hidden"?>>
                        <b class="color4a25a9">Youtube Video</b>
                        @include('visitors.partials.divider')
                    </div>
                    <div class="col-12">
                        <?php if (isset($youtube_video)==false) $youtube_video = []?>
                        @if (count($youtube_video) > 0)
                            @for ($i = 0; $i < count($youtube_video) && $i < 1; $i++)
                                <?php $link_page_id = $youtube_video[$i]->slug; ?>
                                <a href="{{route('watch_vidio',["id"=>$link_page_id])}}" class="nolink">
                                    <div class="col-12 pb-4">
                                        <?php $height = 300; ?>
                                        <?php $link_domain = 'https://youtu.be/' ?>
                                        <?php $link_id_and_value = substr($youtube_video[$i]->link,strlen($link_domain),strlen($youtube_video[$i]->link))?>
                                        <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                                        <img src="{{$link_image}}" width="100%" class="rounded border">
                                        <div class="col-12 py-2">
                                            <div class="bgcolorf9e701 ps-2 pe-2 py-1 d-inline rounded text-uppercase" style="font-size: 8pt">
                                                <b> {{$youtube_video[$i]->category->name}} </b>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <span class="color4a25a9 fw-bold" style="font-size:12pt">{{$youtube_video[$i]->title}}</span>
                                            <div class="text-muted pt-2" style="font-size: 8pt;">
                                                <span class="text-uppercase me-3">
                                                    <i class="fa fa-user"></i>
                                                    <b>By Admin</b>
                                                </span>
                                                <span class="text-capitalize">
                                                    <i class="fa fa-calendar"></i> 
                                                    <?php $tanggal = date_format($youtube_video[$i]->created_at,"d M Y"); ?>
                                                    {{$tanggal}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endfor
                            <div class="col-12">
                                @for ($i = 0; $i < count($youtube_video); $i++)
                                    <?php $height = 300; ?>
                                    <?php $link_page_id = $youtube_video[$i]->slug; ?>
                                    <?php $link_domain = 'https://youtu.be/' ?>
                                    <?php $link_id_and_value = substr($youtube_video[$i]->link,strlen($link_domain),strlen($youtube_video[$i]->link))?>
                                    <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                                    <?php $tanggal = date_format($youtube_video[$i]->created_at,"d M Y"); ?>
                                    <?php 
                                        $gambar = $link_image;
                                        $tipe = $youtube_video[$i]->category->name;
                                        $title = $youtube_video[$i]->title;
                                        $user = "Admin";
                                        $tanggal = $tanggal;
                                    ?>
                                    <a href="{{route('watch_vidio',["id"=>$link_page_id])}}" class="nolink">
                                        @include('visitors.partials.card_3_mobile')
                                    </a>
                                @endfor
                            </div>
                            <div class="col-12 pt-1 pb-3 mb-2 text-center">
                                <a href="/visit_category/{{$category_selected}}/video" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
                                    Load More
                                </a>
                            </div>
                        @endif
                    </div>
                </div>                
            @endif
            <!-- Youtube Video -->
            <!-- Sub Category Article -->
            @if (count($article)>0)
                @foreach ($sub_category_type as $item)
                    @if (count($item->article) > 0)
                        <div class="row">
                            <div class="col-12 mb-3">
                                <b class="color4a25a9"> {{$item->name}} - {{$title_page}} </b>
                                @include('visitors.partials.divider')
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($item->article as $value_article)
                                <?php 
                                    $gambar = $value_article->article_img;
                                    $gambar = asset('storage/images/article/' . basename($gambar)) ;
                                    $tipe = $item->name;
                                    $title = $value_article->title;
                                    $tanggal = $value_article->category->created_at;
                                    $tanggal = date_format($tanggal,"d M Y"); 
                                ?>
                                <a href="/read_article/{{$value_article->slug}}" class="nolink">
                                    @include('visitors.partials.card_2_mobile')
                                </a>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-1 mb-1">
                                <a href="/visit_category/{{$category_selected}}/{{$item->name}}" class="btn btn-light bgcolor4a25a9 text-white">
                                    Load More
                                </a>
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                    @endif
                @endforeach
            @endif
            <!-- Sub Category Article -->
            <div class="col-12">&nbsp;</div>
        </div>
    </div>
    {{-- Tampilan Mobile --}}
@endsection