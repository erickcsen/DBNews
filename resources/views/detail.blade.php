<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        :root {
            --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        body {
            background: #111 !important;
        }

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-bottom: 2rem;
        }

        .btn {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .btn:hover,
        .btn:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: none !important;
            -webkit-text-fill-color: #fff !important;
            border: 5px solid #fff !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <!-----------------NAVBAR------------------------->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <a class="navbar-brand" href="">DBNEWS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--<a class="navbar-brand" href="">tindog</a>-->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role != 0)
                                <a href="{{ route('dashboardAdmin') }}" class="btn">Dashboard</a>
                            @endif
                            <div class="dropdown d-inline-block">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn">Register</a>
                            @endif
                        @endauth
                    @endif

                </li>
            </ul>

        </div>
    </nav>

    <div class="container mx-auto mt-4">
        <!-----------------ARTICLE------------------------->
        <div class="card" style="width: 100%;">
            <img src="{{ asset('storage/images/article/' . basename($article->article_img)) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->category->name }} // {{ optional($article->subcategory)->name }}</h6>
                <span class="badge badge-info">Views: {{ $article->views }}</span>
                <p class="card-text">{!! $article->description !!}</p>
            </div>
        </div>
        <!-----------------COMMENT------------------------->
        <div class="mt-4">
            <h4>Comments</h4>
    
            @foreach ($article->comments->whereNull('parent_id') as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $comment->user->name }}
                            <small>({{ $comment->created_at->diffForHumans() }})</small>
                        </h6>
                        <p class="card-text">{{ $comment->comment_text }}</p>
    
                        @auth
                            @if (Auth::id() === $comment->user->id || Auth::user()->role == 1)
                                <form action="{{ route('comment.delete', $comment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endif
                            <!-- Reply Form -->
                            <form action="{{ route('comment.reply', $comment->id) }}" method="POST" class="mt-2">
                                @csrf
                                <div class="form-group">
                                    <label for="reply_text">Reply:</label>
                                    <textarea class="form-control" id="reply_text" name="reply_text" rows="2" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-secondary">Reply</button>
                            </form>
                        @endauth
    
                        <!-- Replies -->
                        @foreach ($comment->replies as $reply)
                            <div class="card mt-2 ms-4">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{ $reply->user->name }}
                                        <small>({{ $reply->created_at->diffForHumans() }})</small>
                                    </h6>
                                    <p class="card-text">{{ $reply->comment_text }}</p>
    
                                    @auth
                                        @if (Auth::id() === $reply->user->id || Auth::user()->role == 1)
                                            <form action="{{ route('comment.delete', $reply->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
    
            @auth
                <form action="{{ route('detail.comment.store', $article->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="content">Add a comment:</label>
                        <textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @else
                <p>You must be logged in to post a comment.</p>
            @endauth
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
