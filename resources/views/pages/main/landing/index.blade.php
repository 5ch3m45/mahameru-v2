<!DOCTYPE html>
<html lang="en">

<head>
    <title>MAHAMERU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landing/vendors/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/owl-carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="home">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <div class="d-flex">
                        <img src="{{ asset('images/logo.png') }}" style="height: 48px">
                        <span class="ml-2">
                            <div class="my-auto" bis_skin_checked="1">
                                <p class="mb-0" style="line-height: 1.2; font-size: 1.3rem"><strong>MAHAMERU</strong></p>
                                <p style="margin: 0; line-height: 1; font-size: .8rem; white-space: pre-wrap;">Manajemen Arsip Hasil Alih Media Baru</p>
                            </div>
                        </span>
                    </div>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <img src="{{ asset('landing/images/Group2.svg') }}" alt="">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cara-kerja">Cara&nbsp;Kerja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#publikasi">Publikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#arsip-hari-ini">Arsip&nbsp;Hari&nbsp;Ini</a>
                        </li>
                        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
                            <a class="btn btn-info" href="{{ route('login') }}">Unggah Arsip</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="banner">
        <div class="container">
            <h1 class="font-weight-semibold">Tanpa arsip, banyak cerita <br/>akan hilang.</h1>
            <p class="font-weight-normal text-muted pb-3">— Sara Sheridan (penulis)</p>
            <h6 class="font-weight-normal text-muted pb-3">Platform ini digunakan untuk menyimpan dan mengelola arsip hasil digitalisasi berupa foto, video ataupun dokumen<br/> dari arsip fisik.</h6>
            <div>
                <a href="{{ route('main.arsip.index') }}" class="btn btn-info mr-1"><i class="bi bi-search"></i> Telusuri</a>
            </div>
            <img src="{{ asset('images/landing.png') }}" alt="" class="img-fluid">
            <a href="http://www.freepik.com" style="font-size: .3rem; color: #00000000">Designed by upklyak / Freepik</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="cara-kerja">
                <div class="content-header">
                    <h2>Bagaimana Kami Bekerja</h2>
                    <h6 class="section-subtitle text-muted">Tahapan arsip fisik menjadi arsip digital di platform Mahameru.</h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="features-width text-center">
                            <img src="{{ asset('images/multifunction-printer.png') }}" alt="" class="img-icons" style="height: 64px">
                            <h5 class="py-3">Digitalisasi</h5>
                            <p class="text-muted">Melakukan kegiatan pemindaian/alih media dari arsip berbentuk cetak, audio, maupun video menjadi bentuk digital.</p>

                        </div>
                    </div>
                    <div class="col">
                        <div class="features-width text-center">
                            <img src="{{ asset('images/working.png') }}" alt="" class="img-icons" style="height: 64px">
                            <h5 class="py-3">Klasifikasi</h5>
                            <p class="text-muted">Melakukan kegiatan pengelompokkan arsip berdasarkan masalah secara numerik.</p>

                        </div>
                    </div>
                    <div class="col">
                        <div class="features-width text-center">
                            <img src="{{ asset('images/cloud-upload.png') }}" alt="" class="img-icons" style="height: 64px">
                            <h5 class="py-3">Unggah</h5>
                            <p class="text-muted">Melakukan kegiatan mengirim arsip digital dari sistem lokal (komputer) ke sistem jarak jauh (web) sehingga dapat diakses oleh masyarakat secara luas.</p>

                        </div>
                    </div>
                </div>
            </section>
            <section class="digital-marketing-service mt-5" id="publikasi">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0 text-right" data-aos="fade-right">
                        <h3 class="m-0">{{ number_format(floor(\App\Arsip::sum('viewers')/100)*100, 0, ',', '.') }}++ <br> pengunjung</h3>
                    </div>
                    <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                        <img src="{{ asset('landing/images/Group1.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                        <img src="{{ asset('landing/images/Group2.png') }}" alt="" class="img-fluid">
                    </div>
                    @if(false)
                    <div class="col-12 col-lg-5 flex-item grid-margin text-left" data-aos="fade-left">
                        <h3 class="m-0">Cari arsip</h3>
                        <div class="col-lg-7 col-xl-6 p-0">
                            <form action="{{ route('main.arsip.index') }}" class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Ketik untuk mencari.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <button class="input-group-text bg-info text-white" role="button" style="height: 35px; border-radius: 0px 4px 4px 0px;"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-lg-5 grid-margin grid-margin-lg-0 text-left" data-aos="fade-right">
                        <h3 class="m-0">{{ number_format(floor(\App\Lampiran::count()/100)*100, 0, ',', '.') }}++<br> dokumen</h3>
                        <div class="p-0">
                            <p class="pb-4 m-0 text-muted">lampiran arsip<br/>telah kami unggah.</p>
                        </div>
                        <a href="{{ route('main.arsip.index') }}">
                            <button class="btn btn-info">Telusuri</button>
                        </a>
                    </div>
                </div>
            </section>
            
            <section class="customer-feedback" id="arsip-hari-ini">
                <div class="row">
                    <div class="col-12 text-center pb-5">
                        <h2>Arsip hari ini</h2>
                        <h6 class="section-subtitle text-muted m-0">Lihat hari ini di masa lalu.</h6>
                    </div>
                    <div class="owl-carousel owl-theme grid-margin">
                        @forelse($todayArsips as $key => $arsip)
                        <div class="card customer-cards">
                            <a href="{{ route('main.arsip.show', ['arsip' => $arsip]) }}">
                                <img src="{{ asset(str_replace('assets/', '', $arsip->lampirans->first()->thumb ?? $arsip->lampirans->first()->url)) }}" style="width: 100%" alt="">
                                <div class="card-body pt-0">
                                    <div class="text-center">
                                        <p class="m-0 py-3 text-muted">{{ $arsip->informasi }}</p>
                                        <div class="content-divider m-auto"></div>
                                        <h6 class="card-title pt-3">{{ $arsip->pencipta }}</h6>
                                        <h6 class="customer-designation text-muted m-0">{{ date('Y', strtotime($arsip->tanggal)) }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="card customer-cards">
                            <div class="card-body" style="background-color: #fafafa">
                                <div class="text-center">
                                    <p class="mb-0" style="font-size: 2rem"><i class="bi bi-folder-x"></i></p>
                                    <h6 class="card-title pt-3">Belum ada Arsip hari ini</h6>
                                    <a href="{{ route('main.arsip.index') }}" class="text-info">Telusuri semua</a>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </section>
            @if(false)
            <section class="case-studies" id="case-studies-section">
                <div class="row grid-margin">
                    <div class="col-12 text-center pb-5">
                        <h2>Our case studies</h2>
                        <h6 class="section-subtitle text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum.</h6>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-primary text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('landing/images/Group95.svg') }}" class="case-studies-card-img" alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Online marketing</h6>
                                            <button class="btn btn-white">Read More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Online Marketing</h6>
                                    <p>Seo, Marketing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-warning text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('landing/images/Group108.svg') }}" class="case-studies-card-img" alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Web Development</h6>
                                            <button class="btn btn-white">Read More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Web Development</h6>
                                    <p>Developing, Designing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-violet text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('landing/images/Group126.svg') }}" class="case-studies-card-img" alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Web Designing</h6>
                                            <button class="btn btn-white">Read More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Web Designing</h6>
                                    <p>Designing, Developing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('landing/images/Group115.svg') }}" class="case-studies-card-img" alt="">
                                    </div>
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Software Development</h6>
                                            <button class="btn btn-white">Read More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Software Development</h6>
                                    <p>Developing, Designing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <section class="contact-us" id="contact-section">
                <div class="contact-us-bgimage grid-margin">
                    <div class="pb-4">
                        <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Punya masukan?</h4>
                        <h4 class="pt-1" data-aos="fade-down">Hubungi kami sekarang juga</h4>
                    </div>
                    <div data-aos="fade-up">
                        <button class="btn btn-rounded btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Hubungi kami</button>
                    </div>
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
            <!-- Modal for Contact - us Button -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Hubungi Kami</h4>
                        </div>
                        <div class="modal-body pb-4">
                            <x-alert.success-and-failed-non-dismissable/>
                            <form action="{{ route('main.aduan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="Name">Nama <span class="text-danger">*</span></label>
                                    <input type="text" required name="name" class="form-control" id="Name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" required class="form-control" id="Email-1" placeholder="Email" value="{{ old('email') }}">
                                    <small class="text-danger">*) Harap isi dengan email yang valid</small>
                                </div>
                                <div class="form-group">
                                    <label for="Message">Pesan/Aduan <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" name="aduan" id="Message" placeholder="Enter your Message">{{ old('aduan') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Verifikasi <span class="text-danger">*</span></label>
                                    <div>
                                        {!! captcha_img('math') !!}
                                    </div>
                                    <input type="text" name="captcha" class="form-control" placeholder="Masukkan hasil perhitungan di atas">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('landing/vendors/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="{{ asset('landing/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('landing/js/landingpage.js?v=1.0') }}"></script>
    @if(!empty(Session::get('error_ref')) && Session::get('error_ref') == 'modal')
    <script>
    $(function() {
        $('#exampleModal').modal('show');
    });
    </script>
    @endif
</body>

</html>