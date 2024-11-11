<?php $title_page = "Hasil Pencarian - ".$txt_pencarian ?>
@extends("visitors.container.main")
@section("container")
    <style>
        .active {
            z-index: 0;
        }
    </style>
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <form action="/pencarian" id="formFilterElement" method="get">
                        <div class="row">
                            <div class="col-12">
                                <b>Filter</b>
                            </div>
                            @php
                                if (!isset($data["urut"])) {
                                    $data["urut"] = "";
                                }
                                if (!isset($data["tipe"])) {
                                    $data["tipe"] = "";
                                }
                                if (!isset($data["pilih_kategori"])) {
                                    $data["pilih_kategori"] = "";
                                }
                            @endphp
                            <input type="hidden" name="urut" value="{{$data["urut"]}}">
                            <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                            <input type="hidden" name="txt_pencarian" value="{{$txt_pencarian}}">
                            <div class="col-12 text-muted" style="font-size: 10pt">
                                Urut berdasarkan : 
                            </div>
                            <div class="col-12">
                                <button name="urut" value="" class="btn btn-@if($data["urut"]==""){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                    Relevansi
                                    <i class="fa fa-arrow-right float-end mt-1"></i>
                                </button>
                                <button name="urut" value="baru" class="btn btn-@if($data["urut"]=="baru"){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                    Terbaru
                                    <i class="fa fa-arrow-right float-end mt-1"></i>
                                </button>
                            </div>
                            <div class="col-12 mt-2 text-muted" style="font-size: 10pt">
                                Tipe Artikel
                            </div>
                            <div class="col-12">
                                <button name="tipe" value="" class="btn btn-@if($data["tipe"]==""){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                    Artikel Berita
                                    <i class="fa fa-arrow-right float-end mt-1"></i>
                                </button>
                                <button name="tipe" value="video" class="btn btn-@if($data["tipe"]=="video"){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                    Video
                                    <i class="fa fa-arrow-right float-end mt-1"></i>
                                </button>
                            </div>
                            <div class="col-12 mt-2 text-muted" style="font-size: 10pt">
                                Kategori Article
                            </div>
                            <div class="col-12 mb-5">
                                <select id="selectElementCategory" name="pilih_kategori" class="form-control" style="font-size: 10pt">
                                    <option value="">Semua Kategori</option>
                                    @for ($i = 0; $i < count($category); $i++)
                                        <option @if ($data["pilih_kategori"]==$category[$i]->name)
                                            selected
                                        @endif>
                                            {{$category[$i]->name}} 
                                        </option>
                                    @endfor
                                </select>
                                <script>
                                    // Tambahkan event listener untuk menangani perubahan pada select
                                    selectElementCategory.addEventListener('change', function() {
                                        formFilterElement[0].submit();
                                    });
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-9 pb-3">
                    <div class="col-12 mb-4 border-bottom text-capitalize">
                        <b>Hasil Pencarian :</b> <br>
                        <span style="font-size: 18pt">
                            {{substr($txt_pencarian, 0, 50)}} {{(strlen($txt_pencarian)>50)?"..":""}}
                        </span>
                    </div>
                    <?php $i=0; ?>
                    <div class="col-12 p-0 @if ($data["tipe"]!="")
                        d-none
                    @endif ">
                        @for ($i = 0; $i < count($article); $i++)
                            <?php $item=$article[$i]; ?>
                            <a href="/read_article/{{$item->slug}}" class="nolink">
                                <div class="col-12 border rounded pe-2 mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <?php $img = $article[$i]->article_img; ?>
                                            <div class="d-inline bgcolorf9e701 fw-bold px-2 py-1 rounded position-absolute mt-2 ms-2" style="font-size: 10pt">
                                                {{$item->category->name}}
                                            </div>
                                            <img src="{{Storage::url($img)}}" width="100%" class="rounded">
                                        </div>
                                        <div class="col-8 pt-2">
                                            <div class="col-12 text-capitalize color4a25a9">
                                                <b style="font-size:14pt">
                                                    {{$article[$i]->title}}
                                                </b>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <span style="font-size: 10pt">
                                                    {{preg_replace('/ {2,}/', ' ', str_replace('&nbsp;', ' ',strip_tags(substr($article[$i]->description,0,220)))).'...'}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endfor
                        @if (count($article) == 0)
                            <div class="text-center text-muted pb-5">
                                <i class="fa fa-filter" style="font-size: 100px"></i>
                                <i class="fa fa-ban" style="font-size: 50px;margin-left:-20px"></i> <br>
                                <span class="fw-bold" style="font-size:25px">
                                    Not Found
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 p-0 @if ($data["tipe"]!="video")
                        d-none
                    @endif">
                        @for ($i = 0; $i < count($youtube_video); $i++)
                            <?php $item=$youtube_video[$i]; ?>
                            <?php $link_domain = 'https://youtu.be/' ?>
                            <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                            <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                            
                            <a href="/watch_vidio/{{$item->slug}}" class="nolink">
                                <div class="col-12 border rounded pe-2 mb-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <?php $img = $link_image; ?>
                                            <div class="d-inline bgcolorf9e701 fw-bold px-2 py-1 rounded position-absolute mt-2 ms-2" style="font-size: 10pt">
                                                {{$item->category->name}}
                                            </div>
                                            <img src="{{$img}}" width="100%" class="rounded">
                                        </div>
                                        <div class="col-8 pt-2">
                                            <div class="col-12 text-capitalize color4a25a9">
                                                <b style="font-size:14pt">
                                                    {{$item->title}}
                                                </b>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <span style="font-size: 10pt">
                                                    {{preg_replace('/ {2,}/', ' ', str_replace('&nbsp;', ' ',strip_tags(substr($item->description,0,220))))."..."}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                        @endfor
                        
                        @if (count($youtube_video) == 0)
                            <div class="text-center text-muted pb-5">
                                <i class="fa fa-filter" style="font-size: 100px"></i>
                                <i class="fa fa-ban" style="font-size: 50px;margin-left:-20px"></i> <br>
                                <span class="fw-bold" style="font-size:25px">
                                    Not Found
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 border-top pt-2 text-normal">
                        <div class="col-12 p-0 @if ($data["tipe"]!="")
                            d-none
                        @endif">
                            <div class="pagination justify-content-center">
                                {{ $article->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <div class="col-12 p-0 @if ($data["tipe"]!="video")
                            d-none
                        @endif">
                            <div class="pagination justify-content-center">
                                {{ $youtube_video->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="col-12 d-lg-none d-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <b>Hasil Pencarian</b> <br>
                    <form action="/pencarian" id="formFilterElement" method="get">
                        <div class="d-inline">
                            <input type="text" name="txt_pencarian" class="form-control" placeholder="Masukkan berita yang dicari" value="{{$txt_pencarian}}">
                            <input type="hidden" name="urut" value="{{$data["urut"]}}">
                            <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                            <input type="hidden" name="pilih_kategori" value="{{$data["pilih_kategori"]}}">
                        </div>
                    </form>
                    <button onclick="filter_popup.hidden=false" class="btn btn-light border rounded text-muted float-end" style="margin-top:-36px">
                        <i class="fa fa-sliders"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="col-12 bg-light ps-2 pe-2 rounded">
                        <form action="/pencarian" id="formFilterElement" method="get">
                            <input type="hidden" name="urut" value="{{$data["urut"]}}">
                            <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                            <input type="hidden" name="txt_pencarian" value="{{$txt_pencarian}}">
                            <input type="hidden" name="pilih_kategori" value="{{$data["pilih_kategori"]}}">
                            <div class="row">
                                <div class="col-6 p-0" style="font-size:10pt">
                                    <button name="urut" class="btn btn-@if($data["urut"]==""){{"primary fw-bold"}}@else{{"light"}}@endif form-control">
                                        Relevansi
                                    </button>
                                </div>
                                <div class="col-6 p-0" style="font-size:10pt">
                                    <button name="urut" value="baru" class="btn btn-@if($data["urut"]=="baru"){{"primary fw-bold"}}@else{{"light"}}@endif fw-none form-control">
                                        Terbaru
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $i=0; ?>
                    <div class="col-12 p-0 @if ($data["tipe"]!="")
                        d-none
                    @endif">
                        @for ($i = 0; $i < count($article); $i++)
                            <?php $item=$article[$i]; ?>
                            <?php $img = $item->article_img; ?>
                            <?php 
                                $gambar = Storage::url($img);
                                $tipe = $item->category->name;
                                $title = $item->title;
                                $tanggal = date_format($item->created_at,'d M Y');
                            ?>
                            <a href="/read_article/{{$item->slug}}" class="nolink">
                                @include('visitors.partials.card_2_mobile')
                            </a>
                        @endfor
                        
                        @if (count($article) == 0)
                            <div class="text-center text-muted pb-5">
                                <i class="fa fa-filter" style="font-size: 100px"></i>
                                <i class="fa fa-ban" style="font-size: 50px;margin-left:-20px"></i> <br>
                                <span class="fw-bold" style="font-size:25px">
                                    Not Found
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 p-0 @if ($data["tipe"]!="video")
                        d-none
                    @endif">
                        @for ($i = 0; $i < count($youtube_video); $i++)
                            <?php $item=$youtube_video[$i]; ?>
                            <?php $link_domain = 'https://youtu.be/' ?>
                            <?php $link_id_and_value = substr($item->link,strlen($link_domain),strlen($item->link))?>
                            <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                            <?php 
                                $gambar = $link_image;
                                $tipe = $item->category->name;
                                $title = $item->title;
                                $tanggal = date_format($item->created_at,'d M Y');
                            ?>
                            <a href="/watch_vidio/{{$item->slug}}" class="nolink">
                                @include('visitors.partials.card_2_mobile')
                            </a>
                        @endfor
                        
                        @if (count($youtube_video) == 0)
                            <div class="text-center text-muted pb-5">
                                <i class="fa fa-filter" style="font-size: 100px"></i>
                                <i class="fa fa-ban" style="font-size: 50px;margin-left:-20px"></i> <br>
                                <span class="fw-bold" style="font-size:25px">
                                    Not Found
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-5 border-top pt-2">
                    <div class="col-12 p-0 @if ($data["tipe"]!="")
                        d-none
                    @endif">
                        <div style="width: 100%;overflow:auto">
                            <div class="pagination justify-content-center">
                                {{ $article->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 @if ($data["tipe"]!="video")
                        d-none
                    @endif">
                        <div style="width: 100%;overflow:auto">
                            <div class="pagination justify-content-center">
                                {{ $youtube_video->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter_popup" class="position-fixed top-0 bottom-0 left-0 right-0 z-2 col-12" style="position: fixed" hidden>
            <div class="col-8 col-md-4 bg-white end-0 top-0 bottom-0 position-fixed border px-2 z-1">
                <div class="row">
                    <div class="col-12 border-bottom py-2 mb-3 ms-1">
                        <b>Filter</b>
                    </div>
                </div>
                <form action="/pencarian" id="formFilterElement2" method="get">
                    <input type="hidden" name="urut" value="{{$data["urut"]}}">
                    <input type="hidden" name="tipe" value="{{$data["tipe"]}}">
                    <input type="hidden" name="txt_pencarian" value="{{$txt_pencarian}}">
                    <div class="row">
                        <div class="col-12 text-muted" style="font-size: 10pt">
                            Urut berdasarkan : 
                        </div>
                        <div class="col-12">
                            <button name="urut" value="" class="btn btn-@if($data["urut"]==""){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                Relevansi
                                <i class="fa fa-arrow-right float-end mt-1"></i>
                            </button>
                            <button name="urut" value="baru" class="btn btn-@if($data["urut"]=="baru"){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                Terbaru
                                <i class="fa fa-arrow-right float-end mt-1"></i>
                            </button>
                        </div>
                        <div class="col-12 mt-2 text-muted" style="font-size: 10pt">
                            Tipe Artikel
                        </div>
                        <div class="col-12">
                            <button name="tipe" value="" class="btn btn-@if($data["tipe"]==""){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                Artikel Berita
                                <i class="fa fa-arrow-right float-end mt-1"></i>
                            </button>
                            <button name="tipe" value="video" class="btn btn-@if($data["tipe"]=="video"){{"primary"}}@else{{"light"}}@endif border form-control text-start">
                                Video
                                <i class="fa fa-arrow-right float-end mt-1"></i>
                            </button>
                        </div>
                        <div class="col-12 mt-2 text-muted" style="font-size: 10pt">
                            Kategori Article
                        </div>
                        <div class="col-12 mb-5">
                            <select id="selectElementCategory2" name="pilih_kategori" class="form-control" style="font-size: 10pt">
                                <option value="">Semua Kategori</option>
                                @for ($i = 0; $i < count($category); $i++)
                                    <option @if ($data["pilih_kategori"]==$category[$i]->name)
                                        selected
                                    @endif>
                                        {{$category[$i]->name}} 
                                    </option>
                                @endfor
                            </select>
                            <script>
                                // Tambahkan event listener untuk menangani perubahan pada select
                                selectElementCategory2.addEventListener('change', function() {
                                    formFilterElement2.submit();
                                });
                            </script>
                        </div>
                    </div>
                </form>
            </div>
            <button onclick="filter_popup.hidden=true" class="position-fixed top-0 bottom-0 w-100 border-0" style="background: rgba(0, 0, 0, 0.5)"></button>
        </div>
    </div>
    <script>
        document.querySelectorAll('a.page-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = event.srcElement.attributes[1].nodeValue+"&txt_pencarian={{$txt_pencarian}}&urut={{$data['urut']}}&tipe={{$data['tipe']}}&pilih_kategori={{$data['pilih_kategori']}}";
            });
        });
    </script>
@endsection