<?php $title_page = ucwords($category_selected)." - All Video" ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop --}}
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
                    <a href="/visit_category/{{$category_selected}}" class="nolink text-muted text-capitalize">
                        {{$category_selected}}
                    </a>
                    <span class="text-muted">
                        /
                    </span>
                    <b class="text-capitalize">
                        All Video
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 p-0 text-capitalize">
                            <b class="color4a25a9" style="font-size: 18pt">{{$category_selected}} - Video</b>
                            <div style="margin-top: -10px">
                                @include('visitors.partials.long_divider')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1 pb-4">
                            <div class="row">
                                <?php $temp = $category?>
                                @foreach ($youtube_video as $item)
                                    <?php $link_domain = 'https://youtu.be/' ?>
                                    <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                                    <?php $link_image = 'https://img.youtube.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hqdefault.jpg' ?>
                                
                                    <?php $tipe = $item->category->name ?>
                                    <?php $category = $tipe ?>
                                    <?php $tanggal = $item->created_at ?>
                                    <?php $user = "Admin" ?>
                                    <?php $menit = date_format($tanggal,"H:i") ?>
                                    <?php $tanggal = date_format($tanggal,"d M Y") ?>
                                    <?php $description = substr($item->description,0,255).'...' ?>
                                    <?php $gambar = $link_image ?>
                                    <?php $title = $item->title; ?>
                                    <?php $link_id = "/watch_vidio"."/".$item->id; ?>
                                    <?php $photo = $gambar ?>
                                        @include('visitors.partials.card_5')
                                @endforeach
                                <?php $category = $temp ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 border-top py-3">
                            {{ $youtube_video->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Desktop --}}
    {{-- Tampilan Mobile --}}
    <div id="content" class="col-12 d-lg-none d-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 ps-2" style="font-size: 10pt">
                    <a href="/" class="nolink text-muted">
                        Home
                    </a>
                    <span class="text-muted">
                        /
                    </span>
                    <a href="/visit_category/{{$category_selected}}" class="nolink text-muted text-capitalize">
                        {{$category_selected}}
                    </a>
                    <span class="text-muted">
                        /
                    </span>
                    <b class="text-capitalize">
                        All Video
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2 text-capitalize">
                    <b class="color4a25a9">{{$category_selected}} - Video</b>
                    @include('visitors.partials.divider')
                </div>
                <div class="row">
                    <div class="col-12">
                        @for ($i = 0; $i < count($youtube_video); $i++)
                            <?php $height = 300; ?>
                            <?php $link_page_id = $youtube_video[$i]->id; ?>
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
                </div>
                <div class="row">
                    <div class="col-12 mt-1 border-top pt-3 pb-3">
                        {{ $youtube_video->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Mobile --}}
@endsection