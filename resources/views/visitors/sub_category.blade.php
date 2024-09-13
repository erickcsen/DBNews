<?php $title_page = ucwords($sub_category_selected." - ".$category_selected) ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop --}}
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                                {{$sub_category_selected}}
                            </b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 text-capitalize">
                            <b class="color4a25a9" style="font-size: 18pt">{{$sub_category_selected}} - {{$category_selected}}</b>
                            <div style="margin-top: -10px">
                                @include('visitors.partials.long_divider')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1 pb-4">
                            <div class="row">
                                <?php $temp = $category?>
                                @foreach ($article as $item)
                                    <?php $tipe = $item->subcategory->name ?>
                                    <?php $category = $tipe ?>
                                    <?php $tanggal = $item->created_at ?>
                                    <?php $user = "Admin" ?>
                                    <?php $menit = date_format($tanggal,"H:i") ?>
                                    <?php $tanggal = date_format($tanggal,"d M Y") ?>
                                    <?php $description = substr($item->description,0,255).'...' ?>
                                    <?php $gambar = $item->article_img ?>
                                    <?php $title = $item->title; ?>
                                    <?php $link_id = "/read_article"."/".$item->id; ?>
                                    <?php $photo = asset('storage/images/article/' . basename($gambar)) ?>
                                        @include('visitors.partials.card_5')
                                @endforeach
                                <?php $category = $temp ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 border-top py-3">
                            {{ $article->links('pagination::bootstrap-4') }}
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
                <div class="col-12 mb-3" style="font-size: 10pt">
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
                        {{$sub_category_selected}}
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2 text-capitalize" <?=(count($article) > 0)?"":"hidden"?>>
                    <b class="color4a25a9">{{$sub_category_selected}} - {{$category_selected}}</b>
                    @include('visitors.partials.divider')
                </div>
                <div class="col-12">
                    @foreach ($article as $item)
                        <?php 
                            $gambar = $item->article_img;
                            $gambar = asset('storage/images/article/' . basename($gambar)) ;
                            $tipe = $item->subcategory->name;
                            $title = $item->title;
                            $tanggal = $item->category->created_at;
                            $tanggal = date_format($tanggal,"d M Y"); 
                        ?>
                        @include('visitors.partials.card_2_mobile')
                    @endforeach
                </div>
                <div class="col-12 mt-1 border-top pt-3 pb-3">
                    {{ $article->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Mobile --}}
@endsection