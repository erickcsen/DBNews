<?php $title_page = $article->title; ?>
@extends('visitors.container.main')
@section('container')
    <?php $link_image_article = asset('storage/images/article/' . basename($article->article_img)); ?>
    <style>
        #isi_article img {
            max-width: 100%;
        }
    </style>
    {{-- Tampilan Desktop --}}
    <div id="content" class="col-12 d-none d-lg-inline-block">
        <div class="container">
            <div class="row">
                <div class="col-9 mb-3">
                    <!-- Judul -->
                    <div class="row">
                        <div class="col-12 mb-2">
                            <a href="/" class="nolink text-muted">
                                Home
                            </a>
                            <span class="text-muted">
                                /
                            </span>
                            <a href="/visit_category/{{ $article->category->name }}"
                                class="nolink text-muted text-capitalize">
                                {{ $article->category->name }}
                            </a>
                            @if ($article->subcategory)
                                <span class="text-muted">
                                    /
                                </span>
                                <b>
                                    {{ $article->subcategory->name }}
                                </b>
                            @endif
                        </div>
                        <div class="col-12">
                            <a href="/read_article/{{ $article->id }}" class="nolink">
                                <span class="color4a25a9 fw-bold" style="font-size: 18pt">
                                    {{ $article->title }}
                                </span>
                            </a>
                        </div>
                        <div class="col-12">
                            <b class="text-dark" style="font-size:10pt">
                                {{ date_format($article->created_at, 'd M Y') }}
                            </b> <br>
                        </div>
                        <div class="col-6" style="font-size:10pt">
                            <span class="text-muted text-capitalize">
                                {{ $article->user->name }}
                            </span>
                            - <b>Dbmedianews</b>
                        </div>
                        <div class="col-6 text-end pb-3">
                            <button onclick="share_to_medsos.hidden=false;share_button_increase()"
                                class="btn btn-light border rounded-pill text-muted">
                                <i class="fa fa-share"></i>
                                Share
                            </button>
                        </div>
                    </div>
                    <!-- Judul -->
                    <!-- Isi Artikel -->
                    <div class="row">
                        <!-- Foto -->
                        <div class="col-12 rounded"
                            style="background-image: url('{{ $link_image_article }}');height:500px;background-size:cover;background-position:center;">
                        </div>
                        <!-- Foto -->
                        <!-- Isi Article -->
                        <div class="col-12">
                            <div class="col-12 p-0 mb-3">
                            </div>
                            <div id="isi_article" class="col-12 p-0" style="text-align: justify">
                                <?php echo $article->description; ?>
                            </div>
                        </div>
                        <!-- Isi Article -->
                    </div>
                    <!-- Isi Artikel - -->
                    <div class="row">
                        <div id="isi_komentar" class="col-12">
                            <b style="font-size: 18pt">Comment ({{count($comments)}})</b>
                        </div>
                        @auth
                            <div class="col-12 mt-3 mb-3">
                                <form action="{{ route('detail.comment.store', $article->id) }}#isi_komentar" method="POST">
                                    @csrf
                                    <textarea name="comment_text" id="comment_text" class="form-control mb-3" placeholder="Write a comment.."
                                        style="height: 100px;"></textarea>
                                    <button class="btn btn-primary">
                                        Post Comments
                                    </button>
                                </form>
                            </div>
                        @else
                            <p style="font-size: 10pt">You must be logged in to post a comment.</p>
                        @endauth
                        @foreach ($comments ?? [] as $comment)
                            <div id="comment_{{$comment->id}}" class="col-12 mt-3">
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <div class="border px-2 rounded-circle text-muted position-absolute"
                                            style="font-size: 16pt">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @auth
                                            @if (Auth::id() === $comment->user->id || Auth::user()->role == 1)
                                                <div class="float-end">
                                                    <button class="btn btn-light rounded bg-white" data-bs-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 14px">
                                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                            <path fill="gray" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"/>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown dropdown-menu-end">
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <form action="{{ route('comment.delete', $comment->id) }}#isi_komentar" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item" href="#">Delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endauth
                                        <div class="card-subtitle mt-1 mb-1 text-muted mb-2 ms-4 ps-3">
                                            <div class="d-none d-md-inline-block">
                                                <b class="text-dark"> {{ $comment->user->name }} </b>
                                                <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                            </div>
                                            <div class="d-md-none d-inline-block">
                                                <b class="text-dark"> {{ substr($comment->user->name,0,15).'...' }} </b>
                                                <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                            </div>
                                        </div>
                                        <p class="card-text">{{ $comment->comment_text }}</p>
                                        <button onclick="reply_{{$comment->id}}.hidden=false" class="btn btn-light bg-white text-muted px-0 py-0">
                                            <i class="fa fa-comment-o text-muted"></i>
                                            <span style="font-size:10pt">
                                                Reply
                                            </span>
                                        </button>
                                        <form action="{{ route('comment.reply', $comment->id) }}#comment_{{$comment->id}}" method="post">
                                            @csrf
                                            <div id="reply_{{$comment->id}}" class="col-12 mt-3" hidden>
                                                <div class="row">
                                                    <div class="col-1 p-0">
                                                        <div class="border px-2 rounded-circle text-muted float-end"
                                                            style="font-size: 16pt">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-11 ps-1">
                                                        <textarea name="reply_text" class="form-control auto-resize" placeholder="Add Reply" style="font-size:10pt;height:12pt;resize:none;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-end mt-1">
                                                        <button type="button" onclick="reply_{{$comment->id}}.hidden=true" class="btn btn-light border" style="font-size:8pt">Cancel</button>
                                                        <button class="btn btn-primary" style="font-size:8pt">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if ($comment->replies)
                                @foreach ($comment->replies as $reply)
                                    <div class="col-12 mt-3 ps-5">
                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <div class="border px-2 rounded-circle text-muted position-absolute"
                                                    style="font-size: 16pt">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="float-end">
                                                    @auth
                                                        @if (Auth::id() === $reply->user->id || Auth::user()->role == 1)
                                                            <div class="float-end">
                                                                <button class="btn btn-light rounded bg-white" data-bs-toggle="dropdown">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 14px">
                                                                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                        <path fill="gray" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"/>
                                                                    </svg>
                                                                </button>
                                                                <div class="dropdown dropdown-menu-end">
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <form action="{{ route('comment.delete', $reply->id) }}#isi_komentar" method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button class="dropdown-item" href="#">Delete</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                </div>
                                                <div class="card-subtitle mt-1 mb-1 text-muted mb-4 ms-4 ps-3">
                                                    <b class="text-dark"> {{ $reply->user->name }} </b>
                                                    <small>{{ date_format($reply->created_at, 'M. d, Y') }}</small>
                                                </div>
                                                <p class="card-text">{{ $reply->comment_text }}</p>
                                                <button onclick="reply_{{$reply->id}}.hidden=false" class="btn btn-light bg-white text-muted px-0 py-0">
                                                    <i class="fa fa-comment-o text-muted"></i>
                                                    <span style="font-size:10pt">
                                                        Reply
                                                    </span>
                                                </button>

                                                <form action="{{ route('comment.reply', $comment->id) }}#comment_{{$comment->id}}" method="post">
                                                    @csrf
                                                    <div id="reply_{{$reply->id}}" class="col-12 mt-3" hidden>
                                                        <div class="row">
                                                            <div class="col-1 p-0">
                                                                <div class="border px-2 rounded-circle text-muted float-end"
                                                                    style="font-size: 16pt">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-11 ps-1">
                                                                <textarea name="reply_text" class="form-control auto-resize" placeholder="Add Reply" style="font-size:10pt;height:12pt;resize:none;">@<?=substr($reply->user->email,0,strpos($reply->user->email, "@"))?> </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 text-end mt-1">
                                                                <button type="button" onclick="reply_{{$reply->id}}.hidden=true" class="btn btn-light border" style="font-size:8pt">Cancel</button>
                                                                <button class="btn btn-primary" style="font-size:8pt">Send</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-3">
                    <div class="col-12 mb-4">
                        <?php $ads_side_id = 0; ?>
                        @if (count($ads_side) > $ads_side_id)
                            <?php $ads_img = $ads_side[$ads_side_id]->ad_img; ?>
                            <?php $ads_img = Storage::url($ads_img); ?>
                            <?php $link_url = $ads_side[$ads_side_id]->link; ?>
                            <a href="{{ $link_url }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ $ads_img }}" class="rounded" alt="" width="100%">
                            </a>
                        @endif
                    </div>
                    <div class="col-12">
                        <b class="color4a25a9" style="font-size: 14pt">Berita Terbaru</b>
                        @include('visitors.partials.divider')
                    </div>
                    <div class="col-12">
                        <?php if (isset($berita_terbaru) == false) {
                            $berita_terbaru = [];
                        } ?>
                        @for ($i = 0; $i < count($berita_terbaru); $i++)
                            <?php
                            $link_id = $berita_terbaru[$i]->id;
                            $gambar = asset('storage/images/article/' . basename($berita_terbaru[$i]->article_img));
                            $tipe = $berita_terbaru[$i]->category->name;
                            $title = $berita_terbaru[$i]->title;
                            $tanggal = date_format($berita_terbaru[$i]->created_at, 'd M Y');
                            ?>
                            <a href="{{ route('read_article', ['id' => $link_id]) }}" class="nolink">
                                @include('visitors.partials.card_2')
                            </a>
                        @endfor
                        @if (count($berita_terbaru) == 0)
                            $berita_terbaru tidak ada data
                        @endif
                    </div>
                    <div class="col-12">
                        <b class="color4a25a9" style="font-size: 14pt">Rekomendasi Berita</b>
                        @include('visitors.partials.divider')
                    </div>
                    <div class="col-12">
                        <?php if (isset($rekomendasi_berita) == false) {
                            $rekomendasi_berita = [];
                        } ?>
                        @for ($i = 0; $i < count($rekomendasi_berita); $i++)
                            <?php
                            $link_id = $rekomendasi_berita[$i]->id;
                            $gambar = asset('storage/images/article/' . basename($rekomendasi_berita[$i]->article_img));
                            $tipe = $rekomendasi_berita[$i]->category->name;
                            $title = $rekomendasi_berita[$i]->title;
                            $tanggal = date_format($rekomendasi_berita[$i]->created_at, 'd M Y');
                            ?>
                            <a href="{{ route('read_article', ['id' => $link_id]) }}" class="nolink">
                                @include('visitors.partials.card_2')
                            </a>
                        @endfor
                        @if (count($rekomendasi_berita) == 0)
                            $rekomendasi_berita tidak ada data
                        @endif
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
                <div class="col-12 pb-3">
                    <!-- Judul -->
                    <div class="row">
                        <div class="col-12 mb-2" style="font-size: 10pt;">
                            <a href="/" class="nolink text-muted">
                                Home
                            </a>
                            <span class="text-muted">
                                /
                            </span>
                            <a href="/visit_category/{{ $article->category->name }}"
                                class="nolink text-dark text-capitalize text-muted">
                                {{ $article->category->name }}
                            </a>
                            @if ($article->subcategory)
                                <span class="text-muted">
                                    /
                                </span>
                                <b>
                                    {{ $article->subcategory->name }}
                                </b>
                            @endif
                        </div>
                        <div class="col-12 pb-3">
                            <a href="/read_article" class="nolink">
                                <span class="color4a25a9 fw-bold" style="font-size:16pt">
                                    {{ $article->title }}
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- Judul -->
                    <!-- Isi Artikel -->
                    <div class="row">
                        <!-- Foto -->
                        <div class="col-12">
                            <img src="{{ $link_image_article }}" width="100%" alt="">
                        </div>
                        <!-- Foto -->
                        <!-- Isi Article -->
                        <div id="isi_article" class="col-12 mt-3" style="text-align: justify;font-size:12pt">
                            <?php echo $article->description; ?>
                        </div>
                        <!-- Isi Article -->
                    </div>
                    <!-- Isi Artikel - -->
                    <div class="col-12 py-1 pb-3">
                        <button onclick="share_to_medsos.hidden=false;share_button_increase()"
                            class="btn btn-light border rounded-pill text-muted">
                            <i class="fa fa-share"></i>
                            Share Article
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <b style="font-size: 18pt">Comment</b>
                        </div>
                        @auth
                            <div class="col-12 mt-3 mb-3">
                                <form action="{{ route('detail.comment.store', $article->id) }}" method="POST">
                                    @csrf
                                    <textarea id="comment_text" name="comment_text" class="form-control mb-3" placeholder="Write a comment.."
                                        style="height: 100px;"></textarea>
                                    <button type="submit" class="btn btn-primary">
                                        Post Comments
                                    </button>
                                </form>
                            </div>
                        @else
                            <p style="font-size: 10pt">You must be logged in to post a comment.</p>
                        @endauth

                        <div style="font-size: 10pt">
                            @foreach ($comments ?? [] as $comment)
                                <div id="comment_{{$comment->id}}" class="col-12 mt-3">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <div class="border px-2 rounded-circle text-muted position-absolute"
                                                style="font-size: 16pt">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            @auth
                                                @if (Auth::id() === $comment->user->id || Auth::user()->role == 1)
                                                    <div class="float-end">
                                                        <button class="btn btn-light rounded bg-white" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 14px">
                                                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path fill="gray" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown dropdown-menu-end">
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <form action="{{ route('comment.delete', $comment->id) }}#isi_komentar" method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item" href="#">Delete</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endauth
                                            <div class="card-subtitle mt-1 mb-1 text-muted mb-2 ms-4 ps-3">
                                                <div class="d-none d-md-inline-block">
                                                    <b class="text-dark"> {{ $comment->user->name }} </b>
                                                    <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                                </div>
                                                <div class="d-md-none d-inline-block">
                                                    @if (strlen($comment->user->name) > 20)
                                                        <b class="text-dark"> {{ substr($comment->user->name,0,20).'...' }} </b> <br>
                                                    @else
                                                        <b class="text-dark"> {{ $comment->user->name }} </b> <br>
                                                    @endif
                                                    <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                                </div>
                                            </div>
                                            <p class="card-text">{{ $comment->comment_text }}</p>
                                            <button onclick="reply2_{{$comment->id}}.hidden=false" class="btn btn-light bg-white text-muted px-0 py-0">
                                                <i class="fa fa-comment-o text-muted"></i>
                                                <span style="font-size:10pt">
                                                    Reply
                                                </span>
                                            </button>
                                            <form action="{{ route('comment.reply', $comment->id) }}#comment_{{$comment->id}}" method="post">
                                                @csrf
                                                <div id="reply2_{{$comment->id}}" class="col-12 mt-3" hidden>
                                                    <div class="row">
                                                        <div class="col-1 p-0">
                                                            <div class="border px-2 rounded-circle text-muted float-end"
                                                                style="font-size: 16pt">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-11 ps-1">
                                                            <textarea name="reply_text" class="form-control auto-resize" placeholder="Add Reply" style="font-size:10pt;height:12pt;resize:none;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 text-end mt-1">
                                                            <button type="button" onclick="reply_{{$comment->id}}.hidden=true" class="btn btn-light border" style="font-size:8pt">Cancel</button>
                                                            <button class="btn btn-primary" style="font-size:8pt">Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if ($comment->replies)
                                    @foreach ($comment->replies as $reply)
                                        <div class="col-12 mt-3 ps-3">
                                            <div class="card mb-1">
                                                <div class="card-body">
                                                    <div class="border px-2 rounded-circle text-muted position-absolute"
                                                        style="font-size: 16pt">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <div class="float-end">
                                                        @auth
                                                            @if (Auth::id() === $reply->user->id || Auth::user()->role == 1)
                                                                <div class="float-end">
                                                                    <button class="btn btn-light rounded bg-white" data-bs-toggle="dropdown">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 14px">
                                                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                            <path fill="gray" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"/>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown dropdown-menu-end">
                                                                        <ul class="dropdown-menu">
                                                                            <li>
                                                                                <form action="{{ route('comment.delete', $reply->id) }}#isi_komentar" method="POST" style="display:inline;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button class="dropdown-item" href="#">Delete</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endauth
                                                    </div>
                                                    <div class="card-subtitle mt-1 mb-1 text-muted mb-2 ms-4 ps-3">
                                                        <div class="d-none d-md-inline-block">
                                                            <b class="text-dark"> {{ $comment->user->name }} </b>
                                                            <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                                        </div>
                                                        <div class="d-md-none d-inline-block">
                                                            @if (strlen($comment->user->name) > 20)
                                                                <b class="text-dark"> {{ substr($comment->user->name,0,20).'...' }} </b> <br>
                                                            @else
                                                                <b class="text-dark"> {{ $comment->user->name }} </b> <br>
                                                            @endif
                                                            <small>{{ date_format($comment->created_at, 'M. d, Y') }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="card-text">{{ $reply->comment_text }}</p>
                                                    <button onclick="reply2_{{$reply->id}}.hidden=false" class="btn btn-light bg-white text-muted px-0 py-0">
                                                        <i class="fa fa-comment-o text-muted"></i>
                                                        <span style="font-size:10pt">
                                                            Reply
                                                        </span>
                                                    </button>
    
                                                    <form action="{{ route('comment.reply', $comment->id) }}#comment_{{$comment->id}}" method="post">
                                                        @csrf
                                                        <div id="reply2_{{$reply->id}}" class="col-12 mt-3" hidden>
                                                            <div class="row">
                                                                <div class="col-1 p-0">
                                                                    <div class="border px-2 rounded-circle text-muted float-end"
                                                                        style="font-size: 16pt">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-11 ps-1">
                                                                    <textarea name="reply_text" class="form-control auto-resize" placeholder="Add Reply" style="font-size:10pt;height:12pt;resize:none;">@<?=substr($reply->user->email,0,strpos($reply->user->email, "@"))?> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12 text-end mt-1">
                                                                    <button type="button" onclick="reply_{{$reply->id}}.hidden=true" class="btn btn-light border" style="font-size:8pt">Cancel</button>
                                                                    <button class="btn btn-primary" style="font-size:8pt">Send</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-5">
                    <div class="col-12">
                        <b class="color4a25a9" style="font-size: 14pt">Berita Terbaru</b>
                        <div class="" style="margin-top:-10px">
                            <svg width="100%" height="5" xmlns="http://www.w3.org/2000/svg">
                                <!-- Persegi Panjang -->
                                <rect x="0" y="0" width="30" height="5" fill="orange" />
                                <!-- Segitiga Siku -->
                                <polygon x="15" points="30,0,40,0 30,5" fill="orange" />
                                <rect x="40" y="0" width="100%" height="1" fill="silver" />
                                <rect x="30" y="4" width="100%" height="1" fill="silver" />
                                <!-- -->
                            </svg>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php if (isset($berita_terbaru) == false) {
                            $berita_terbaru = [];
                        } ?>
                        @for ($i = 0; $i < count($berita_terbaru); $i++)
                            <?php
                            $link_id = $berita_terbaru[$i]->id;
                            $gambar = asset('storage/images/article/' . basename($berita_terbaru[$i]->article_img));
                            $tipe = $berita_terbaru[$i]->category->name;
                            $title = $berita_terbaru[$i]->title;
                            $tanggal = date_format($berita_terbaru[$i]->created_at, 'd M Y');
                            ?>
                            <a href="{{ route('read_article', ['id' => $link_id]) }}" class="nolink">
                                @include('visitors.partials.card_2_mobile')
                            </a>
                        @endfor
                        @if (count($berita_terbaru) == 0)
                            $berita_terbaru tidak ada data
                        @endif
                    </div>
                    <div class="col-12 pb-3">
                        <center>
                            <a href="../berita_terbaru"
                                class="btn btn-default border-color4a25a9 bgcolor4a25a9 text-white">
                                Load More
                            </a>
                        </center>
                    </div>
                    @if (count($vidio) > 0)
                        <div class="col-12">
                            <b class="color4a25a9" style="font-size: 14pt">Vidio</b>
                            @include('visitors.partials.divider')
                        </div>
                        <div class="col-12 pt-3">
                            @for ($i = 0; $i < count($vidio); $i++)
                                <?php $link_domain = 'https://youtu.be/'; ?>
                                <?php $link_id_and_value = substr($vidio[$i]->link, strlen($link_domain), strlen($vidio[$i]->link)); ?>
                                <?php $link_image = 'https://img.youtube.com/vi/' . ($link_id = substr($link_id_and_value, 0, strpos($link_id_and_value, '?')) . '/hqdefault.jpg'); ?>

                                <?php
                                $user = 'admin';
                                $link_id = $vidio[$i]->id;
                                $gambar = $link_image;
                                $tipe = $vidio[$i]->category->name;
                                $title = $vidio[$i]->title;
                                $tanggal = date_format($vidio[$i]->created_at, 'd M Y');
                                ?>
                                <a href="{{ route('read_article', ['id' => $link_id]) }}" class="nolink">
                                    @include('visitors.partials.card_3')
                                </a>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">

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
                    <a href="https://api.whatsapp.com/send?text={{ $article->title }}%0A{{ $fullUrl }}"
                        target="_blank" class="btn btn-success rounded-circle" style="font-size: 25px;width:50px">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $fullUrl }}" target="_blank"
                        class="btn btn-primary rounded-circle" style="font-size: 25px;width:50px">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://x.com/intent/post?url={{ $fullUrl }}&text={{ $article->title }}"
                        target="_blank" class="btn btn-dark rounded-circle" style="font-size: 25px;width:50px">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path style="fill:white;"
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com/share?url={{ $fullUrl }}" target="_blank"
                        class="btn btn-light border rounded-circle" style="width: 50px; font-size:25px;">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                        </svg>
                    </a>
                </div>
                <hr>
                <div class="col-12">
                    <input type="text" value="<?= $fullUrl ?>" readonly class="form-control">
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
            tempInput.value = url;
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
    <script>
        function autoResizeTextareas() {
            const textareas = document.querySelectorAll('textarea.auto-resize');
            
            textareas.forEach(textarea => {
                textarea.style.height = 'auto'; // Reset height
                textarea.style.height = `${textarea.scrollHeight}px`; // Set height to scrollHeight
            });
        }

        // Attach event listeners to all textareas with the class 'auto-resize'
        document.querySelectorAll('textarea.auto-resize').forEach(textarea => {
            textarea.addEventListener('input', autoResizeTextareas);
        });

        // Initialize the height of textareas on page load
        autoResizeTextareas();
    </script>
    <script>
        function share_button_increase(){
            $.get("/read_article/1/share", function(data){
                console.log(data)
            });
        }                   
    </script>
@endsection