<?php $title_page = $youtube_video->title ?>
@extends("visitors.container.video")
@section("container")
    {{-- Tampilan Desktop --}}
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-9 mb-3">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <a href="/" class="nolink text-muted">
                                Home 
                            </a> 
                            <span class="text-muted">
                                / 
                            </span>
                            <a href="/visit_category/{{$youtube_video->category->name}}" class="nolink text-muted text-capitalize">
                                {{$youtube_video->category->name}}
                            </a>
                            <span class="text-muted">
                                / 
                            </span>
                            <span class="nolink text-dark text-capitalize fw-bold">
                                {{substr($youtube_video->title,0,25)}}...
                            </span>
                        </div>
                    </div>
                    <!-- Video -->
                    <div class="row">
                        <div class="col-12">
                            <?php $link_domain = 'https://youtu.be/' ?>
                            <?php $link_id_and_value = substr($youtube_video->link,strlen($link_domain),strlen($youtube_video->link))?>
                            <?php $link_video = 'https://www.youtube.com/embed/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'' ?>
                            <iframe width="560" height="500" src="{{$link_video}}?autoplay=1" class="col-12" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Video -->
                    <!-- Judul -->
                    <div class="row">
                        <div class="col-12">
                            <span class="fw-bold" style="font-size: 18pt">{{$youtube_video->title}}</span>
                        </div>
                        <div class="col-6 text-capitalize pb-3">
                            <b class="text-dark">
                                {{date_format($youtube_video->created_at, "d M Y")}}
                            </b> <br>
                            <span class="text-muted">
                                {{$youtube_video->user->name}}
                            </span>
                            - <b>Dbmedianews</b>
                        </div>
                        <div class="col-6 text-end mb-3">
                            <button onclick="share_to_medsos.hidden=false"
                                class="btn btn-light border rounded-pill text-muted">
                                <i class="fa fa-share"></i>
                                Share
                            </button>
                        </div>
                    </div>
                    <!-- Judul -->
                    <!-- Isi Artikel -->
                    <div class="row">
                        <div class="col-12 mb-1" style="text-align: justify;">
                            <?php echo $youtube_video->description; ?>
                        </div>
                    </div>
                    <div class="row">
                        <style>
                            .instagram-follow-button {
                                display: inline-flex;
                                align-items: center;
                                background-color: #E1306C;
                                color: white;
                                border: none;
                                border-radius: 4px;
                                font-weight: bold;
                                text-decoration: none;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                            }
                            .instagram-follow-button:hover {
                                background-color: #C13584;
                            }
                            .instagram-follow-button .icon {
                                width: 24px;
                                height: 24px;
                                margin-right: 8px;
                            }
                        </style>
                        <div class="col-12 mt-1">
                            <a href="https://www.youtube.com/@dbnewsid" target="_blank" class="btn btn-danger">
                                <i class="fa fa-youtube-play"></i> Subscribe
                            </a>
                            <a href="https://www.instagram.com/dbmedianews" class="btn btn-light instagram-follow-button" target="_blank">
                                <i class="fa fa-instagram"></i> &nbsp;
                                Follow Instagram
                            </a>
                            <a href="https://www.tiktok.com/@dbmedianews" class="btn btn-dark fw-bold border" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" height="15px"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path style="fill: white"
                                        d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                </svg>
                                Follow on Tiktok
                            </a>
                        </div>
                        <!-- Tags - -->
                        <div class="col-12">
                            <input name="kata_kunci_meta" id="kata_kunci_meta" value="{{$youtube_video->kata_kunci_meta}}" onkeyup="tags_event(this)" class="form-control" placeholder="Masukkan Kata Kunci" style="resize: none" hidden/>
                            <script>
                                window.addEventListener('load', function() {
                                    tags_event(kata_kunci_meta)
                                });
                                function tags_event(e){
                                    let txt = e.value;
                                    let arry_txt = txt.split(",");
                                    arry_txt = (arry_txt).toString().split("#");
                                    tags.innerHTML = '';
                                    tags2.innerHTML = '';
                                    for (let i = 0; i < arry_txt.length; i++) {
                                        let txt = arry_txt[i];
                                        let short_txt = txt.length > 25 ? txt.substring(0,25)+'..' : txt;
                                        if (txt != '') tags.innerHTML = tags2.innerHTML += (txt!="")?`
                                            <a href='{{asset('pencarian')}}?txt_pencarian=`+txt+`&tipe=video' class='nolink'>
                                                <div class="d-inline-block mb-2 me-0 ms-0">
                                                    <div class="d-inline rounded px-2 py-1 fw-bold text-white" style="background: gray; width:fit-content;">
                                                        #`+short_txt+`
                                                    </div>
                                                </div>
                                            </a>
                                        `:"";
                                    }
                                }
                            </script>
                            <div id="tags" class="col-12 p-0 pt-3 mb-3 text-capitalize">
                            </div>
                        </div>
                        <!-- Tags - -->
                    </div>
                    <div class="row d-none">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 mt-3">
                            <h4>Comments</h4>
                        </div>
                        <div class="col-12">
                            <textarea name="comment" style="height: 100px;" id="" class="form-control border mb-3" placeholder="Add a comment..."></textarea>
                            <button class="btn btn-primary">
                                Comments
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5"></div>
                    </div>
                    <!-- Isi Artikel -->
                </div>
                <div class="col-3">
                    <?php if (isset($video_terbaru)==false) $video_terbaru = [];?>
                    <div class="col-12 pb-3">
                        <div class="col-12" style="height: 375px;">
                            @foreach ($ads_side as $item)
                                <a href="{{$item->link}}" target="_blank">
                                    <img class="iklan_side_1 rounded col-12" src="{{Storage::url($item->ad_img)}}" style="max-height: 375px; max-width:100%">
                                </a>
                            @endforeach
                        </div>
                        <script>
                            var myIndex_side1 = 0;
                            carousel_side1();

                            function carousel_side1() {
                                var i;
                                var x = document.getElementsByClassName("iklan_side_1");
                                for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";  
                                }
                                myIndex_side1++;
                                if (myIndex_side1 > x.length) {myIndex_side1 = 1}    
                                x[myIndex_side1-1].style.display = "block";  
                                setTimeout(carousel_side1, 2000); // Change image every 2 seconds
                            }
                        </script>
                    </div>
                    <div class="col-12" {{count($video_terbaru)==0?"hidden":""}}>
                        <b class="color4a25a9" style="font-size: 14pt">Video Terbaru</b>
                        @include('visitors.partials.divider')
                    </div>
                    <div class="col-12" {{count($video_terbaru)==0?"hidden":""}}>
                        @for ($i = 0; $i < count($video_terbaru); $i++)
                            <?php $link_domain = 'https://youtu.be/' ?>
                            <?php $link_id_and_value = substr($video_terbaru[$i]->link,strlen($link_domain),strlen($video_terbaru[$i]->link))?>
                            <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>

                            <?php 
                                $link_id = $video_terbaru[$i]->slug;
                                $gambar = $link_image;
                                $tipe = $video_terbaru[$i]->category->name;
                                $title = $video_terbaru[$i]->title;
                                $tanggal = date_format($video_terbaru[$i]->created_at,"d M Y");
                            ?>
                            <a href="/watch_vidio/{{$link_id}}" class="nolink">
                                @include("visitors.partials.card_2")
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Desktop --}}
    {{-- Tampilan Mobile --}}
    <div id="content" class="col-12 d-lg-none d-inline-block">
        <div class="container">
            <div class="col-12 mb-3">
                <!-- Video -->
                <div class="row">
                    <div class="col-12 mb-2" style="font-size: 10pt;">
                        <a href="/" class="nolink text-muted">
                            Home 
                        </a> 
                        <span class="text-muted">
                            / 
                        </span>
                        <a href="/visit_category/{{$youtube_video->category->name}}" class="nolink text-muted text-capitalize">
                            {{$youtube_video->category->name}}
                        </a>
                        <span class="text-muted">
                            / 
                        </span>
                        <span class="nolink text-dark text-capitalize fw-bold">
                            {{substr($youtube_video->title,0,25)}}...
                        </span>
                    </div>
                    <div class="col-12">
                        <?php $link_domain = 'https://youtu.be/' ?>
                        <?php $link_id_and_value = substr($youtube_video->link,strlen($link_domain),strlen($youtube_video->link))?>
                        <?php $link_video = 'https://www.youtube.com/embed/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'' ?>
                        <iframe height="250" src="{{$link_video}}?autoplay=1" class="col-12 rounded border" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Video -->
                <!-- Judul -->
                <div class="row">
                    <div class="col-12">
                        <span class="fw-bold" style="font-size: 16pt">{{$youtube_video->title}}</span>
                    </div>
                    <div class="col-12 pt-2 pb-2">
                        <div class="col-12" style="font-size: 10pt">
                            <b class="text-dark">
                                {{date_format($youtube_video->created_at, "d M Y")}}
                            </b> <br>
                        </div>
                        <div class="col-12" style="font-size: 10pt">
                            <span class="text-muted text-capitalize">
                                {{$youtube_video->user->name}}
                            </span>
                            - <b>Dbmedianews</b>
                        </div>
                    </div>
                </div>
                <!-- Judul -->
                <!-- Isi Artikel -->
                <div class="row">
                    <div class="col-12" style="font-size:10pt;text-align:justify;">
                        <?php echo $youtube_video->description; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <a href="https://www.youtube.com/@dbnewsid" class="btn btn-danger">
                            <i class="fa fa-youtube-play"></i> Subcscribe
                        </a>
                        <a href="https://www.instagram.com/dbmedianews" class="btn btn-light instagram-follow-button" target="_blank">
                            <i class="fa fa-instagram"></i> &nbsp;
                            Follow Instagram
                        </a>
                        <a href="https://www.tiktok.com/@dbmedianews" class="btn btn-dark fw-bold border" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" height="15px"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path style="fill: white"
                                    d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                            </svg>
                            Follow on Tiktok
                        </a>
                        <button onclick="share_to_medsos.hidden=false"
                            class="btn btn-light border rounded-pill text-muted">
                            <i class="fa fa-share"></i>
                            Share
                        </button>
                    </div>
                </div>
                <!-- Isi Artikel -->
                <!-- Tags -->
                <div class="row">
                    <div class="col-12">
                        <div id="tags2" class="col-12 p-0 pt-3 mb-3 text-capitalize">
                        </div>
                    </div>
                </div>
                <!-- Tags -->
                <div class="row d-none">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 mt-3">
                        <h4>Comments</h4>
                    </div>
                    <div class="col-12">
                        <textarea name="comment" style="height: 100px;" id="" class="form-control border mb-3" placeholder="Add a comment..."></textarea>
                        <button class="btn btn-primary">
                            Comments
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-5"></div>
                </div>
                <!-- Isi Artikel -->
            </div>
            <div class="col-12">
                <?php if (isset($video_terbaru)==false) $video_terbaru = [];?>
                <div class="col-12" {{count($video_terbaru)==0?"hidden":""}}>
                    <b class="color4a25a9" style="font-size: 14pt">Video Terbaru</b>
                    @include('visitors.partials.divider')
                </div>
                <div class="col-12" {{count($video_terbaru)==0?"hidden":""}}>
                    @for ($i = 0; $i < count($video_terbaru); $i++)
                        <?php $height = 300; ?>
                        <?php $link_page_id = $video_terbaru[$i]->slug; ?>
                        <?php $link_domain = 'https://youtu.be/' ?>
                        <?php $link_id_and_value = substr($video_terbaru[$i]->link,strlen($link_domain),strlen($video_terbaru[$i]->link))?>
                        <?php $link_image = 'https://i.ytimg.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hq720.jpg' ?>
                        <?php $tanggal = date_format($video_terbaru[$i]->created_at,"d M Y"); ?>
                        <?php 
                            $gambar = $link_image;
                            $tipe = $video_terbaru[$i]->category->name;
                            $title = $video_terbaru[$i]->title;
                            $user = "Admin";
                            $tanggal = $tanggal;
                        ?>
                        <a href="/watch_vidio/{{$link_page_id}}" class="nolink">
                            @include("visitors.partials.card_3_mobile")
                        </a>
                    @endfor
                </div>
                <div class="col-12 text-center pb-3 d-none">
                    <a href="#" class="btn btn-default border-color4a25a9 bgcolor4a25a9 text-white">
                        Load More
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Mobile --}}
    {{-- Share to Medsos --}}
    <div id="share_to_medsos" class="col-12 position-fixed z-1 top-0 start-0 end-0 bottom-0" style="padding-top:100px"
        hidden>
        <div class="row">
            <button onclick="share_to_medsos.hidden=true;"
                class="border-0 col-12 top-0 start-0 end-0 bottom-0 position-absolute"
                style="background: rgba(0,0,0,0.5);"></button>
            <div class="col-lg-4 col-md-3 col-1"></div>
            <div class="col-lg-4 col-md-6 col-10 border rounded py-2 bg-white mt-3 z-1">
                <div class="col-12 border-bottom">
                    <span class="fw-bold">
                        Share
                    </span>
                    <button onclick="share_to_medsos.hidden=true" class="btn btn-light border float-end">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="col-12 p-0 pt-2 text-center">
                    <a href="https://api.whatsapp.com/send?text={{ $youtube_video->title }}%0A{{ $youtube_video->link }}"
                        target="_blank" class="btn btn-success rounded-circle" style="font-size: 25px;width:50px">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $youtube_video->link }}" target="_blank"
                        class="btn btn-primary rounded-circle" style="font-size: 25px;width:50px">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://x.com/intent/post?url={{ $youtube_video->link }}&text={{ $youtube_video->title }}"
                        target="_blank" class="btn btn-dark rounded-circle" style="font-size: 25px;width:50px">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path style="fill:white;"
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com/share?url={{$youtube_video->link}}" target="_blank" class="btn btn-light border rounded-circle" style="width: 50px; font-size:25px;">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                        </svg>
                    </a>
                </div>
                <hr>
                <div class="col-12">
                    <input type="text" value="<?= $youtube_video->link ?>" readonly class="form-control">
                    <div class="text-end">
                        <button id="copyButton" class="btn btn-light border rounded-pill position-absolute"
                            style="margin-top:-35px;margin-left:-65px;">
                            Copy
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-1"></div>
        </div>
    </div>
    {{-- Share to Medsos --}}
    <div id="snackbar" class="d-none">Tautan telah disalin ke clipboard!</div>
    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Ambil URL halaman saat ini
            var url = window.location.href;
            
            // Buat elemen input sementara
            var tempInput = document.createElement('input');
            tempInput.value = "{{$youtube_video->link}}";
            document.body.appendChild(tempInput);
            
            // Pilih dan salin teks dari elemen input
            tempInput.select();
            document.execCommand('copy');
            
            // Hapus elemen input sementara
            document.body.removeChild(tempInput);
            
            // Beri tahu pengguna bahwa tautan telah disalin (opsional)
            // Tampilkan Snackbar
            var snackbar = document.getElementById('snackbar');
            snackbar.className = 'snackbar show';
            setTimeout(function() {
                snackbar.className = snackbar.className.replace('show', '');
            }, 3000); // Snackbar tampil selama 3 detik
        });
    </script>
@endsection