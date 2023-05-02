<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title><?= @$title ? $title.' | MAHAMERU' : 'MAHAMERU' ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- End favicon icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="{{ asset('/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/libs/select2-4.0.13/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/libs/select2-4.0.13/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <style>
        body, html {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"
        }
        span.avatars__others {
            background-color: #fafafa;
            box-shadow: 0px 0px 0px;
            color: black
        }
        .table th{
            background-color: #fafafa;
            color: black!important
        }
        .btn-primary {
            background-color: #1a9bfc;
            border-color: #1a9bfc;
        }
        .btn-primary:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        a {
            color: #0d6efd;
        }
        .text-primary {
            color: #0d6efd!important;
        }
        .page-link {
            color: #0d6efd;
        }

        @media (min-width: 1200px) { #form-table th { width: 300px }
        }

        .grid-sizer,
        .grid-item {
            width: 25%;
        }

        .grid-item {
            float: left;
        }

        .grid-item img {
            display: block;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @yield('content')
    </div>
    <script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/libs/bodymovin/bodymovin.js') }}"></script>
    <script src="{{ asset('/libs/lottie-interactivity/lottie-interactivity.min.js') }}"></script>
    <script src="{{ asset('/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('/libs/masonryGrid/jquery.masonryGrid.js') }}"></script>
    <script src="{{ asset('/libs/select2-4.0.13/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/libs/notifyjs/notify.min.js') }}"></script>
    <script src="{{ asset('/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('/js/waves.js') }}"></script>
    <script src="{{ asset('/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}?v=<?= time() ?>"></script>
    <script>
        $(document).ready(function() {
            
        })
    </script>
    @yield('script')
</body>

</html>