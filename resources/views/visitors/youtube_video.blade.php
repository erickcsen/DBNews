<?php $title_page = "Youtube Video - DB News" ?>
@extends("visitors.container.main")
@section("container")
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 ps-0" style="font-size: 10pt">
                    <a href="/" class="nolink text-muted">
                        Home
                    </a>
                    <span class="text-muted">
                        /
                    </span>
                    <span class="fw-bold text-capitalize">
                        Youtube Video
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <b class="color4a25a9" style="font-size: 18pt">Youtube Video</b>
                            <div style="margin-top: -10px">
                                @include('visitors.partials.long_divider')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-1 pb-4">
                    <div class="row">
                        <?php $temp = $category?>
                        @foreach ($youtube_video as $item)
                            <?php $link_page_id = $item->slug; ?>
                            <?php $link_domain = 'https://youtu.be/' ?>
                            <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                            <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                            <?php $gambar = $link_image ?>

                            <?php $tipe = $item->category->name ?>
                            <?php $category = $tipe ?>
                            <?php $tanggal = $item->created_at ?>
                            <?php $user = "@dbnewsid" ?>
                            <?php $menit = date_format($tanggal,"H:i") ?>
                            <?php $tanggal = date_format($tanggal,"d M Y") ?>
                            <?php $description = substr($item->description,0,255).'...' ?>
                            <?php $title = $item->title; ?>
                            <?php $link_id = "/watch_vidio"."/".$item->slug; ?>
                            <?php $photo = $gambar ?>
                                @include('visitors.partials.card_5')
                        @endforeach
                        @if (count($youtube_video) == 0)
                            <div class="text-muted text-center mb-5 mt-5">
                                <i class="fa fa-filter" style="font-size: 100px"></i>
                                <i class="fa fa-ban" style="font-size: 50px;margin-left:-25px"></i> <br>
                                <span class="text-muted" style="">
                                    Belum Ada Video
                                </span>
                            </div>
                        @endif
                        <?php $category = $temp ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 border-top py-3">
                    <div class="pagination justify-content-center">
                        {{ $youtube_video->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="col-12 d-lg-none d-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3" style="font-size: 10pt">
                    <a href="/" class="nolink text-muted">
                        Home
                    </a>
                    <span class="text-muted">
                        /
                    </span>
                    <span class="fw-bold text-capitalize">
                        Youtube Video
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2" <?=(count($youtube_video) > 0)?"":"hidden"?>>
                    <b class="color4a25a9">Youtube Video</b>
                    @include('visitors.partials.divider')
                </div>
                <div class="col-12">
                    @foreach ($youtube_video as $item)
                        <?php $link_page_id = $item->slug; ?>
                        <?php $link_domain = 'https://youtu.be/' ?>
                        <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                        <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                        <?php 
                            $gambar = $item->article_img;
                            $gambar = $link_image;
                            $tipe = $item->category->name;
                            $title = $item->title;
                            $tanggal = $item->category->created_at;
                            $tanggal = date_format($tanggal,"d M Y"); 
                            $link_id = "/watch_vidio"."/".$item->slug; 
                        ?>
                        <a href="{{$link_id}}" class="nolink">
                            @include('visitors.partials.card_2_mobile')
                        </a>
                    @endforeach
                    @if (count($youtube_video) == 0)
                        <div class="text-muted text-center mb-5">
                            <i class="fa fa-filter" style="font-size: 100px"></i>
                            <i class="fa fa-ban" style="font-size: 50px;margin-left:-25px"></i> <br>
                            <span class="text-muted" style="">
                                Belum Ada Video
                            </span>
                        </div>
                    @endif
                </div>
                <div class="col-12 mt-1 border-top pt-3 pb-3">
                    <div class="pagination justify-content-center">
                        {{ $youtube_video->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection