{{-- berita terbaik mingguan --}}
<div class="row">
    <div class="col-12 mb-3 mt-3">
        <b class="color4a25a9 float-start">Berita Terbaik Mingguan</b>
    </div>  
    <div class="col-12 mb-3" style="overflow-y: scroll;">
        <div style="display:flex;">
            <?php if (isset($berita_terbaik_mingguan)==false) $berita_terbaik_mingguan = []; ?>
            @for ($i = 0; $i < count($berita_terbaik_mingguan); $i++)
                <?php 
                    $link_id = $berita_terbaik_mingguan[$i]->slug;
                    $photo = asset('storage/images/article/'.basename($berita_terbaik_mingguan[$i]->article_img));
                    $title = $berita_terbaik_mingguan[$i]->title;
                    $user = "By Admin"; 
                    $category = $berita_terbaik_mingguan[$i]->category->name;
                    $tanggal = $berita_terbaik_mingguan[$i]->created_at; 
                    $tanggal = date_format($tanggal,"d M Y");

                ?>
                <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                    @include("visitors.partials.card_1_mobile")
                </a>
            @endfor
            @if (count($berita_terbaik_mingguan) == 0)
                $berita_terbaik_mingguan belum ada data
            @endif
            <div class="pb-3 ms-3 me-3" style="min-width: 150px;">
                <div class="col-12" style="transform: translateY(100%);">
                    <a href="/berita_terbaik_mingguan" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
                        <i class="fa fa-arrow-right"></i> <br>
                        Load More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if (count($randomArticle) > 0)
        <div class="col-12 mb-1 mt-3 text-capitalize">
            <b class="color4a25a9 float-start">Popular {{$randomCategory->name}}</b>
        </div>
        <div class="col-12">
            <?php if (isset($randomArticle)==false) $randomArticle = []; ?>
            @for ($i = 0; $i < count($randomArticle); $i++)
                <?php 
                    $link_id = $randomArticle[$i]->slug;
                    $gambar = asset('storage/images/article/'.basename($randomArticle[$i]->article_img));;
                    $tipe = $randomArticle[$i]->category->name;
                    $title = $randomArticle[$i]->title;
                    $tanggal = $randomArticle[$i]->created_at; 
                    $tanggal = date_format($tanggal,"d M Y");
                ?>
                <a href="{{route('read_article',["id"=>$link_id])}}" class="nolink">
                    @include('visitors.partials.card_2_mobile')
                </a>
            @endfor
            @if (count($randomArticle) == 0)
                $randomArticle tidak ada data
            @endif
        </div>
    @endif
    <div class="col-12 text-center pb-5 d-none">
        <a href="" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
            Load More
        </a>
    </div>
</div>
{{-- berita terbaik mingguan --}}