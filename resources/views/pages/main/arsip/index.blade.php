<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arsip | MAHAMERU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landing/vendors/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/owl-carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        body, html {
                font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"
        }
        .breadcrumb-item {
        	font-size: .8rem
        }
    </style>
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0 py-3 bg-white" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <a href="{{ route('home') }}" class="d-flex">
                        <img src="{{ asset('images/logo.png') }}" style="height: 48px">
                        <span class="ml-2">
                            <div class="my-auto" bis_skin_checked="1">
                                <p class="mb-0" style="line-height: 1.2; font-size: 1.3rem"><strong>MAHAMERU</strong></p>
                                <p style="margin: 0; line-height: 1; font-size: .8rem; white-space: pre-wrap;">Manajemen Arsip Hasil Alih Media Baru</p>
                            </div>
                        </span>
                    </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="{{ asset('images/logo.png') }}" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#cara-kerja">Cara&nbsp;Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#publikasi">Publikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#arsip-hari-ini">Arsip&nbsp;Hari&nbsp;Ini</a>
                        </li>
                        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                            <a href="{{ route('login') }}">
                                <button class="btn btn-info">Unggah Arsip</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div style="background-color: #e9ecef">
    	<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Arsip</li>
				</ol>
			</nav>
    	</div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <section class="arsip-index" id="features-section" style="margin-bottom: 200px">
                <div class="content-header">
                    <h2>Arsip</h2>
                    <h6 class="section-subtitle text-muted">Tahapan arsip fisik menjadi arsip digital di platform Mahameru.</h6>
                </div>
                <div class="py-4">
                    <label for="">Cari</label>
                    <input type="text" name="" id="search-input" class="form-control mb-3" placeholder="Ketik untuk mencari..." value="{{ @$request->search }}">
                    <div class="d-flex justify-content-start">
                        <div class="mr-2">
                            <div class="dropdown">
                                <small id="date-type" role="button" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kapan saja
                                </small>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="dateType(0)">Kapan saja</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="dateType(1)">Sebelum</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="dateType(2)">Setelah</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="dateType(3)">Antara</a></li>
                                </ul>
                                <input type="hidden" name="" id="date-type-input">
                            </div>
                        </div>
                        <div id="dates-container" class="d-none">
                            <small id="dates" class="dropdown-toggle">Pilih tanggal..</small>
                            <input type="hidden" name="" id="date-start-input">
                            <input type="hidden" name="" id="date-end-input">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <ul class="list-group list-group-flush">
                        <div id="arsip-list"></div>
                        <a id="next-page" href="javascript:void(0)" class="list-group-item text-center">
                            <i class="bi bi-arrow-down-circle"></i> Muat lebih banyak
                        </a>
                    </ul>
                </div>
            </section>
            
            <section class="contact-details" id="contact-details-section">
                <div class="row text-center text-md-left">
                    <div class="col-12 col-md-6 col-lg-4 grid-margin">
                        <div class="d-flex" class="pb-2">
                            <img src="{{ asset('images/logo.png') }}" style="height: 48px">
                            <span class="ml-2">
                                <div class="my-auto">
                                    <p class="mb-0" style="line-height: 1.2; font-size: 1.3rem"><strong>MAHAMERU</strong></p>
                                    <p style="margin: 0; line-height: 1; font-size: .8rem; white-space: pre-wrap;">Manajemen Arsip Hasil Alih Media Baru</p>
                                </div>
                            </span>
                        </div>
                        <div class="pt-2">
                            <p class="text-muted mb-1">
                                <a href="mailto:support@mahameru.wonosobokab.go.id">support@mahameru.wonosobokab.go.id</a>
                            </p>
                            <p class="text-muted m-0">
                                <a href="tel:0286324824">(0286) 324824</a>
                            </p>
                        </div>
                    </div>
                    @if(false)
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Our Guidelines</h5>
                        <a href="#">
                            <p class="m-0 pb-2">Terms</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1 pb-2">Privacy policy</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1 pb-2">Cookie Policy</p>
                        </a>
                        <a href="#">
                            <p class="m-0 pt-1">Discover</p>
                        </a>
                    </div>
                    @endif
                    <div class="col-12 col-md-6 col-lg-4 grid-margin">
                        <h5 class="pb-2">Kontak kami</h5>
                        <p class="text-muted">Jl. Pangeran Diponegoro Nomor 02<br/>Wonosobo</p>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="https://www.instagram.com/arpusdawonosobo/" class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z"/></svg></a>
                            <a href="https://www.youtube.com/channel/UCqTl7amxBeXN31PC5c1pmwg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10 15l5.19-3L10 9v6m11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73Z"/></svg></a>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="border-top">
                <p class="text-center text-muted pt-4">Copyright © 2023 Dinas Kearsipan dan Perpustakaan Daerah Wonosobo <br> Theme by <a href="https://www.bootstrapdash.com/" class="px-1">Bootstrapdash.</a>All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="{{ asset('landing/vendors/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="{{ asset('landing/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('landing/js/landingpage.js?v=1.0') }}"></script>
    <script>
        let page = 1;

        function debounce(func, timeout = 300){
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => { func.apply(this, args); }, timeout);
            };
        }

        function initDatePicker(double = false) {
            if(double) {
                $('#dates').daterangepicker({
                    showDropdowns: true,
                    opens: 'right',
                    singleDatePicker: false,
                    linkedCalendars: false,
                }, function(start, end, label) {
                    $('#date-start-input').val(start.format('YYYY-MM-DD'));
                    $('#date-end-input').val(end.format('YYYY-MM-DD'));
                    $('#dates').text((new Date(start)).toLocaleDateString('id-ID', { day: "numeric", month: "short", year: "numeric" }) + ' s/d ' + (new Date(end)).toLocaleDateString('id-ID', { day: "numeric", month: "short", year: "numeric" }));
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                });
            } else {
                $('#dates').daterangepicker({
                    showDropdowns: true,
                    opens: 'right',
                    singleDatePicker: true,
                    linkedCalendars: false,
                }, function(start, end, label) {
                    $('#date-start-input').val(start.format('YYYY-MM-DD'));
                    $('#date-end-input').val('');
                    $('#dates').text((new Date(start)).toLocaleDateString('id-ID', { day: "numeric", month: "short", year: "numeric" }));
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                });
            }
        }

        function dateType(type) {
            switch (type) {
                case 0:
                    $('#date-type').text('Kapan saja');
                    $('#date-type-input').val(0);
                    $('#date-start-input').val('');
                    $('#date-end-input').val('');
                    $('#dates').text('Pilih tanggal..');
                    $('#dates-container').addClass('d-none');
                    initDatePicker();
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                    break;
                case 1:
                    $('#date-type').text('Sebelum');
                    $('#date-type-input').val(1);
                    $('#date-start-input').val('');
                    $('#date-end-input').val('');
                    $('#dates').text('Pilih tanggal..');
                    $('#dates-container').removeClass('d-none');
                    initDatePicker();
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                    break;
                case 2:
                    $('#date-type').text('Setelah');
                    $('#date-type-input').val(2);
                    $('#date-start-input').val('');
                    $('#date-end-input').val('');
                    $('#dates').text('Pilih tanggal..');
                    $('#dates-container').removeClass('d-none');
                    initDatePicker();
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                    break;
                case 3:
                    $('#date-type').text('Antara');
                    $('#date-type-input').val(3);
                    $('#date-start-input').val('');
                    $('#date-end-input').val('');
                    $('#dates').text('Pilih tanggal..');
                    $('#dates-container').removeClass('d-none');
                    initDatePicker(true);
                    $('#arsip-list').html('');
                    page = 1;
                    get();
                    break;
            
                default:
                    alert('error')
                    break;
            }
        }

        function get() {
            $('#next-page').html('Memuat..');
            $.get(`/arsip-api?page=${page}&search=${$('#search-input').val()}&type=${$('#date-type-input').val()}&start=${$('#date-start-input').val()}&end=${$('#date-end-input').val()}`)
                .done(function(res) {
                    if(res.data.data.length) {
                        res.data.data.forEach((arsip) => $('#arsip-list').append(`
                            <a href="/arsip/${arsip.id}" class="list-group-item">
                                <div class="row">
                                    <div class="col-12 order-2 order-lg-1 col-lg-10">
                                        <p class="mb-0"><small>${arsip.klasifikasi.kode}. ${arsip.klasifikasi.nama.length <= 20 ? arsip.klasifikasi.nama : arsip.klasifikasi.nama.substr(0, 20)+'..'}</small></p>
                                        <p class="mb-0"><span style="font-weight: 500">${arsip.pencipta}</span></p>
                                        <p class="mb-0"><small>${arsip.informasi}</small></p>
                                        <p class="mb-0"><small style="color: #aaa">${(new Date(arsip.tanggal)).toLocaleDateString('id-ID', { day: "numeric", month: "long", year: "numeric" })}</small></p>
                                    </div>
                                    <div class="col-12 order-1 order-lg-2 col-lg-2 d-none d-lg-flex justify-content-center">
                                        <img src="http://mahameru.wonosobokab.go.id/assets/${arsip.lampirans.length ? (arsip.lampirans[0].thumb ? arsip.lampirans[0].thumb : arsip.lampirans[0].url).replace('assets/', '') : ''}" class="img-fluid" alt="quixote" style="max-height: 6rem">
                                    </div>
                                    <div class="col-12 order-1 order-lg-2 col-lg-2 d-block d-lg-none mt-3">
                                        <img src="http://mahameru.wonosobokab.go.id/assets/${arsip.lampirans.length ? (arsip.lampirans[0].thumb ? arsip.lampirans[0].thumb : arsip.lampirans[0].url).replace('assets/', '') : ''}" class="img-fluid" alt="quixote" style="max-height: 6rem">
                                    </div>
                                </div>
                            </a>
                        `))
                    } else {
                        $('#arsip-list').html(`
                            <a href="#" class="list-group-item text-center">
                                Tidak ada arsip
                            </a>
                        `)
                    }
                    page += 1;

                    if(res.data.current_page === res.data.last_page || !res.data.data.length) {
                        $('#next-page').hide();
                    } else {
                        $('#next-page').show();
                        $('#next-page').html('<i class="bi bi-arrow-down-circle"></i> Muat lebih banyak');
                    }
                });
        }

        get();

        $('#next-page').click(function() {
            get();
        });

        $('#search-input').on('keyup', debounce(function() {
            $('#arsip-list').html('');
            page = 1;
            get();
        }, 800))
    </script>
</body>

</html>