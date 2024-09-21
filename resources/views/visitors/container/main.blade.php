<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- SEO -->
        {{-- Custom Description --}}
        @php
            $description = (isset($description))?$description:"Indeks berita terkini dan terbaru hari ini dari news, hiburan, lifestyle, sport, dan tech,  di Indonesia dan Internasional";
            $keywords = (isset($keywords))?$keywords:"berita hari ini, berita terkini, berita terbaru, info berita, peristiwa, kecelakaan, kriminal, hukum, berita unik, Politik, liputan khusus, news, hiburan, lifestyle, sport, dan tech, Indonesia, Internasional";
            $headline = "Indeks berita terkini dan terbaru hari ini dari news, hiburan, lifestyle, sport, dan tech di Indonesia dan Internasional";
        @endphp
        {{-- Custom Description --}}
        <meta name="google-site-verification" content="BbqCqP62zW_GDLgQiNlcOy-5u-FG_GKtce1A_ubvA0c" />
        <meta name="title" content="{{$title_page}}" />
        <meta name="description" content="{{$description}}" />
        <meta name="keywords" content="{{$keywords}}">
        <meta name="author" content="DBNews developer">
        <meta content="{{$headline}}" itemprop="headline">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="dbnews">
        <meta property="og:title" content="{{$title_page}}">
        <meta property="og:image" content="{{asset('/images/favicon.png')}}">
        <meta property="og:url" content="{{asset('')}}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="650">
        <meta property="og:image:height" content="366">
        <meta name="copyright" content="" itemprop="dateline">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
        <meta name="googlebot-news" content="index, follow">
        <meta content="{{$headline}}" itemprop="headline">
        <meta name="keywords" content="{{$keywords}}" itemprop="keywords">
        <meta name="thumbnailUrl" content="{{asset('images/favicon.png')}}" itemprop="thumbnailUrl">
        <meta content="{{asset('')}}" itemprop="url">
        
        <meta itemprop="title" content="{{$title_page}}" />
        <meta itemprop="description" content="{{$description}}" />
        <meta itemprop="image" content="{{asset('/images/favicon.png')}}">
        <meta name="app-url" content="{{asset('')}}">
        <meta name="file-base-url" content="{{asset('')}}">

        <script type="application/ld+json">
            {
                "@context" : "https://schema.org",
                "@type" : "Organization",
                "name" : "DBNews",
                "url" : "{{asset('')}}",
                "sameAs" : [
                    "https://www.instagram.com/dbmedianews/",
                    "https://www.tiktok.com/@dbmedianews",
                    "https://www.youtube.com/@dbnewsid"
                ],
                "logo": "{{asset('images/favicon.png')}}"
            }
        </script>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "WebSite",
                "url": "{{asset('')}}",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "{{asset('pencarian')}}?txt_pencarian={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>
        <!-- SEO -->
        <!-- Ad Sense -->
        <!-- Ad Sense -->
        <title>{{$title_page}}</title>
        <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <style>
            *{
                font-family: "Inter", system-ui;
                font-optical-sizing: auto;
                font-style: normal;
            }
            #header{
                top: 0;
                left: 0;
                right: 0;
                position: fixed;
                z-index: 1000;
            }

            .btn {
                font-size: 10pt;
            }
            
            .bgcolor4a25a9{
                background-color: #4a25a9;
            }
            .bgcolorf9e701{
                background-color: #f9e701;
            }
            .link-header{
                text-decoration: none;
                font-weight:bold;
            }
            .nolink{
                color: inherit;
                text-decoration: none;
            }
            #content{
                padding-top: 120px;
            }

            @media only screen and (max-width: 768px) {
                #content{
                    padding-top: 60px;
                }
            }
            
            .color4a25a9{
                color:#4a25a9;
                fill: #4a25a9;
            }
            .border-color4a25a9{
                border:1px solid #4a25a9;
            }

            .border-radius20px{ 
                border-radius: 20px;
            }

            .divider{
                border:1px solid silver;
                border-left:0px;
                border-right:0px;
                background:#f8f8f8;
            }
            .divider > .active{
                background-color: #f9e701;height:5px;width:40px;
            }
        </style>
        <style>
            /* Styling untuk Snackbar */
            .snackbar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -145px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
                white-space: nowrap;
                padding: 16px;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .snackbar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }

            @-webkit-keyframes fadein {
                from { bottom: 0; opacity: 0; }
                to { bottom: 30px; opacity: 1; }
            }

            @keyframes fadein {
                from { bottom: 0; opacity: 0; }
                to { bottom: 30px; opacity: 1; }
            }

            @-webkit-keyframes fadeout {
                from { opacity: 1; }
                to { opacity: 0; }
            }

            @keyframes fadeout {
                from { opacity: 1; }
                to { opacity: 0; }
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        @include("visitors.partials.header")
        @yield("container")
        {{-- <div style="margin-bottom: 100px;">
        </div>   --}}
        @include("visitors.partials.footer")
    </body>
</html>