
<!-- Youtube Video -->
<div class="row">
    <div class="col-12 p-0 pb-3 pt-3">
        <div class="row">
            <div class="col-2 p-0">
                <h4 class="color4a25a9 fw-bold">Youtube Video</h4>
            </div>
            <div class="col-10 text-end mt-1">
                <div class="">
                    @include('visitors.partials.long_divider')
                </div>
                <a href="/youtube_video" class="btn btn-light color4a25a9 border-color4a25a9" style="margin-top:-50px"> 
                    View All 
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M18 6H8M18 6V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>                     
        </div>
        <?php if (isset($youtube_video)==false) $youtube_video = []?>
        @if (count($youtube_video) > 0)
            <div class="row">
                <?php $i = 0 ?>
                <?php $height = 400; ?>
                <?php $link_page_id = $youtube_video[$i]->id; ?>
                <?php $link_domain = 'https://youtu.be/' ?>
                <?php $link_id_and_value = substr($youtube_video[$i]->link,strlen($link_domain),strlen($youtube_video[$i]->link))?>
                <?php $link_image = 'https://img.youtube.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hqdefault.jpg' ?>
                <div class="col-6 p-0" style="border-right: 1px solid gray">
                    <a href="{{route('watch_vidio',["id"=>$link_page_id])}}" class="nolink">
                        <div class="col-12 p-0 pe-3">
                            <img src="{{$link_image}}" width="100%" class="border rounded">
                            <div class="col-12">
                                <div class="col-12 py-2">
                                    <div class="bgcolorf9e701 ps-2 pe-2 d-inline rounded text-uppercase py-1" style="font-size: 10pt;">
                                        <b>
                                            <?=$youtube_video[$i]->category->name?>
                                        </b>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="color4a25a9 fw-bold" style="font-size: 16pt"><?=$youtube_video[$i]->title?></span>
                                    <div class="text-muted" style="font-size: 8pt;">
                                        <span class="text-uppercase me-3">
                                            <i class="fa fa-user"></i>
                                            <b>By Admin</b>
                                        </span>
                                        <span class="text-capitalize"> 
                                            <i class="fa fa-calendar"></i> <?=date_format($youtube_video[$i]->created_at,"d M Y")?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    @for ($i = 0; $i < count($youtube_video); $i++)
                        <?php $link_page_id = $youtube_video[$i]->id; ?>
                        <?php $link_domain = 'https://youtu.be/' ?>
                        <?php $link_id_and_value = substr($youtube_video[$i]->link,strlen($link_domain),strlen($youtube_video[$i]->link))?>
                        <?php $link_image = 'https://img.youtube.com/vi/'.$link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, "?")).'/hqdefault.jpg' ?>                                
                        <?php 
                            $gambar = $link_image;
                            $tipe = $youtube_video[$i]->category->name;
                            $title = $youtube_video[$i]->title;
                            $user = "Admin";
                            $tanggal = date_format($youtube_video[$i]->created_at,"d M Y");
                        ?>
                        <a href="{{route('watch_vidio',["id"=>$link_page_id])}}" class="nolink">
                            @include("visitors.partials.card_3")
                        </a>
                    @endfor
                </div>
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
<!-- Youtube Video -->