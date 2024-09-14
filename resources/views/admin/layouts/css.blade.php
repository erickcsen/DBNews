{{-- <link rel="icon" href="{{asset('https://champion-chimp-vital.ngrok-free.app/dashboard-asset/assets/img/logo.png')}}" type="image/x-icon"/> --}}
<link rel="icon" href="/images/favicon.png" type="image/x-icon"/>

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Fonts and icons -->
<script src="/dashboard-asset/assets/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/dashboard-asset/assets/css/fonts.min.css']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="/dashboard-asset/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/dashboard-asset/assets/css/atlantis.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="/dashboard-asset/assets/css/demo.css">


