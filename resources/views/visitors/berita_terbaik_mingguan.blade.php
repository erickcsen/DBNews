<?php $title_page = "Berita Terbaik Mingguan - DB News" ?>
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
                        Berita Terbaik Mingguan
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <b class="color4a25a9" style="font-size: 18pt">Berita Terbaik Mingguan</b>
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
                        @foreach ($article as $item)
                            <?php $tipe = $item->category->name ?>
                            <?php $category = $tipe ?>
                            <?php $tanggal = $item->created_at ?>
                            <?php $user = "Admin" ?>
                            <?php $menit = date_format($tanggal,"H:i") ?>
                            <?php $tanggal = date_format($tanggal,"d M Y") ?>
                            <?php $description = substr($item->description,0,255).'...' ?>
                            <?php $gambar = $item->article_img ?>
                            <?php $title = $item->title; ?>
                            <?php $link_id = "/read_article"."/".$item->slug; ?>
                            <?php $photo = asset('storage/images/article/' . basename($gambar)) ?>
                                @include('visitors.partials.card_5')
                        @endforeach
                        <?php $category = $temp ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 border-top py-3">
                    <div class="pagination justify-content-center">
                        {{ $article->links('pagination::bootstrap-4') }}
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
                        Berita Terbaik Mingguan
                    </span>
                </div>
                <div class="col-12 mb-2" <?=(count($article) > 0)?"":"hidden"?>>
                    <b class="color4a25a9">Berita Terbaik Mingguan</b>
                    @include('visitors.partials.divider')
                </div>
                <div class="col-12">
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
                </div>
                <div class="col-12 mt-1 border-top pt-3 pb-3">
                    <div class="pagination justify-content-center">
                        {{ $article->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection