<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Google Ads -->
        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1326912091817850" crossorigin="anonymous"></script> -->
        <meta name="google-adsense-account" content="ca-pub-1326912091817850">

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1283232183386430" crossorigin="anonymous"></script>
        <!-- Google Ads -->

        <!-- Google Analytic -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-LQ00D4NCT6"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LQ00D4NCT6');
        </script>
        <!-- Google Analytic -->

        <!-- SEO -->
        <meta name="google-site-verification" content="BbqCqP62zW_GDLgQiNlcOy-5u-FG_GKtce1A_ubvA0c" />
        <meta name="title" content="{{$title_page}}" />
        <meta name="description" content="{{$article->deskripsi_meta}}" />
        <meta name="keywords" content="{{$article->kata_kunci_meta}}">
        <meta property="og:site_name" content="dbnews">
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{asset('read_article/'.$article->slug)}}"/>
        <meta property="og:title" content="{{$title_page}}" />
        <meta property="og:description" content="{{$article->deskripsi_meta}}" />
        <meta property="og:image" content="{{asset(Storage::url($article->article_img))}}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:image" content="{{asset(Storage::url($article->article_img))}}" />
        <link rel="canonical" href="{{asset('read_article/'.$article->slug)}}">
        <meta name="language" content="id" />
        <meta name="geo.country" content="id" />
        <meta name="geo.placename" content="Indonesia" />
        <meta name="author" content="DBNews developer">
        <meta name="copyright" content="DBNews, All Rights Reserved" />
        <meta name="Distribution" content="Global">
        <meta name="Rating" content="General">
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
        <meta name="googlebot-news" content="index, follow" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="keywords" content="{{$article->kata_kunci_meta}}">
        <meta name="news_keywords" content="{{$article->kata_kunci_meta}}">

        <meta itemprop="name" content="{{$title_page}}">
        <meta itemprop="description" content="{{$article->deskripsi_meta}}">
        <meta itemprop="image" content="{{asset(Storage::url($article->article_img))}}">
        <meta name="app-url" content="{{asset('')}}">
        <meta name="file-base-url" content="{{asset('')}}">

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "NewsArticle",
                "headline": "{{$title_page}}",
                "image": [
                    "{{asset(Storage::url($article->article_img))}}"
                ],
                "thumbnailUrl": "{{asset(Storage::url($article->article_img))}}",
                "datePublished": "{{$article->created_at}}",
                "dateModified": "{{$article->updated_at}}",
                "author": [{
                    "@type": "Person",
                    "name": "{{$article->user->name}}",
                    "url": "{{asset('')}}"
                    }
                ]
            }
        </script>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "DBNews",
                        "item": {
                            "@type": "Thing",
                            "@id": "{{asset('')}}"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": "2",
                        "name": "{{$article->category->name}}",
                        "item": {
                            "@type": "Thing",
                            "@id": "{{asset('visit_category/'.$article->category->name)}}"
                        }
                    },
                    {
                        "@type": "ListItem",
                        "position": "3",
                        "name": "{{$title}}",
                        "item": {
                            "@type": "Thing",
                            "@id": "{{asset('read_article/'.$article->slug)}}"
                        }
                    }
                ]
            }
        </script>
        <!-- SEO -->
        <!-- Ad Sense -->
        <!-- Ad Sense -->
        <title>{{$title_page}}</title>
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

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
    </head>
    <body>
        @include("visitors.partials.header")
        @yield("container")
        {{-- <div style="margin-bottom: 100px;">
        </div>   --}}
        @include("visitors.partials.footer")
    </body>
</html>