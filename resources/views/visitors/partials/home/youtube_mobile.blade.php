<div class="row">
    <div class="col-12 mb-3">
        <b class="color4a25a9">Youtube Video</b>
        @include('visitors.partials.divider')
    </div>
    <div class="col-12">
        <?php if (isset($youtube_video)==false) $youtube_video = []?>
        @if (count($youtube_video) > 0)
            @for ($i = 0; $i < count($youtube_video) && $i < 1; $i++)
                <?php $link_page_id = $youtube_video[$i]->id; ?>
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
            <div class="col-12 pt-1 pb-3 mb-2 text-center">
                <a href="/youtube_video" class="btn btn-light bgcolor4a25a9 border-color4a25a9 text-white">
                    Load More
                </a>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center" style="padding-top:50px;padding-bottom:100px">
                    <i class="fa fa-filter" style="font-size: 100px"></i>
                    <i class="fa fa-ban"style="font-size: 50px;margin-left:-20px"></i> <br>
                    Video Youtube Belum Ditambahkan
                </div>
            </div>
        @endif
    </div>
</div>