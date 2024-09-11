<!-- Berita Terpopuler -->
<div class="row">
    <div class="col-9 pb-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 p-0">
                        <b class="color4a25a9" style="font-size: 18pt">Berita Terpopuler</b>
                    </div>
                    <div class="col-6 p-0 text-end">
                        <a href="/berita_terpopuler" class="btn btn-light color4a25a9 border-color4a25a9"> 
                            View All
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 18L18 6M18 6H8M18 6V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-3">
                <div class="row">
                    <?php if (isset($berita_terpopuler)==false) $berita_terpopuler = [];?>
                    @for ($i = 0; $i < count($berita_terpopuler); $i++)
                        <?php 
                            $link_id = $berita_terpopuler[$i]->id;
                            $link_id = route('read_article',["id"=>$link_id]);
                            $photo = asset('storage/images/article/' . basename($berita_terpopuler[$i]->article_img));
                            $title = $berita_terpopuler[$i]->title;
                            $user = "By Admin"; 
                            $category = $berita_terpopuler[$i]->category->name; 
                            $tanggal = date_format($berita_terpopuler[$i]->created_at,"d M Y"); 
                        ?>
                        @include("visitors.partials.card_1")
                    @endfor
                    @if (count($berita_terpopuler) == 0)
                        $berita_terpopuler tidak ada data
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 pb-3">
        <div class="row">
            <div class="col-12">
                <b class="color4a25a9">Berita Terbaru</b>
                @include('visitors.partials.divider')
            </div>
            <?php if (isset($berita_terbaru)==false) $berita_terbaru = [];?>
            @for ($i = 0; $i < count($berita_terbaru); $i++)
                <?php 
                    $link_id = $berita_terbaru[$i]->id;
                    $gambar = asset('storage/images/article/' . basename($berita_terbaru[$i]->article_img));
                    $tipe = $berita_terbaru[$i]->category->name;
                    $title = $berita_terbaru[$i]->title;
                    $tanggal = date_format($berita_terbaru[$i]->created_at,"d M Y");
                ?>
                <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                    @include("visitors.partials.card_2")
                </a>
            @endfor
            @if (count($berita_terbaru) == 0)
                $berita_terbaru tidak ada data
            @endif
        </div>
    </div>
</div>
<!-- Berita Terpopuler -->