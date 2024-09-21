<!-- Berita Terpopuler -->
<div class="col-12">
    <div class="row">
        <div class="col-12 mb-3">
            <b class="color4a25a9" style="font-size: 12pt">Berita Terpopuler</b>
        </div>
        <div class="col-12 mb-5" style="overflow-y: scroll;">
            <div style="display:flex;">
                <?php if (isset($berita_terpopuler)==false) $berita_terpopuler = [];?>
                @for ($i = 0; $i < count($berita_terpopuler); $i++)
                    <?php 
                        $link_id = $berita_terpopuler[$i]->slug;
                        $photo = asset('storage/images/article/'.basename($berita_terpopuler[$i]->article_img));
                        $title = $berita_terpopuler[$i]->title;
                        $user = $berita_terpopuler[$i]->user->name; 
                        $user = (strlen($user) >= 10)?substr($user, 0, 10).'..':$user; 
                        $user = 'By '.$user;
                        $category = $berita_terpopuler[$i]->category->name;
                        $tanggal = $berita_terpopuler[$i]->created_at; 
                    ?>
                    <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                        @include("visitors.partials.card_1_mobile")
                    </a>
                @endfor
                @if (count($berita_terpopuler) == 0)
                    $berita_terpopuler tidak ada data
                @endif
                <div class="pb-3 ms-3 me-3" style="min-width: 150px;">
                    <div class="col-12" style="transform: translateY(100%);">
                        <a href="/berita_terpopuler" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
                            <i class="fa fa-arrow-right"></i> <br>
                            Load More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <b class="color4a25a9">Berita Terbaru</b>
            @include('visitors.partials.divider')
        </div>
        <div class="col-12">
            <?php if (isset($berita_terbaru)==false) $berita_terbaru = [];?>
            @for ($i = 0; $i < count($berita_terbaru); $i++)
                <?php 
                    $link_id = $berita_terbaru[$i]->slug;
                    $gambar = asset('storage/images/article/'.basename($berita_terbaru[$i]->article_img));
                    $tipe = $berita_terbaru[$i]->category->name;
                    $title = $berita_terbaru[$i]->title;
                    $tanggal = $berita_terbaru[$i]->created_at;
                    $tanggal = date_format($tanggal,'d M Y');
                ?>
                <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                    @include("visitors.partials.card_2_mobile")
                </a>
            @endfor
            @if (count($berita_terbaru) == 0)
                $berita_terbaru tidak ada data
            @endif
        </div>
        <div class="col-12 mb-4 text-center">
            <a href="/berita_terbaru" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
                Load More
            </a>
        </div>
    </div>
</div>
<!-- Berita Terpopuler -->