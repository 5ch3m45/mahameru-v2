@extends('layouts.auth')

@section('content')
<div class="login-page" style="min-height:100vh">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="rounded" style="min-width: 50vw; max-width: 100%">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <h2>Lupa Password?</h2>
                                    <p>Silahkan masukkan email Anda. <br/>Kami akan mengirimkan token reset password.</p>
                                    <x-alert.success-and-failed/>
                                    <form method="POST" class="row g-4">
                                        @csrf
                                        <div class="col-12">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Verifikasi <span class="text-danger">*</span></label>
                                            <div>
                                                {!! captcha_img('math') !!}
                                            </div>
                                            <div class="input-group mt-2">
                                                <div class="input-group-text"><i class="bi bi-robot"></i></div>
                                                <input type="text" name="captcha" class="form-control" placeholder="Masukkan hasil perhitungan di atas">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end">Kirim Token</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-white text-danger text-center pt-5">
                                    <img src="http://mahameru.test/assets//images/logo.png" style="max-height: 10rem" alt="" srcset="">
                                    <h2 class="fs-1">MAHAMERU</h2>
                                    <p class="mb-2"><span>Manajemen Arsip Hasil Alih Media Baru</span></p>
                                    <p class="mb-0"><span>Dinas Kearsipan dan Perpustakaan Daerah</span></p>
                                    <p><span>Wonosobo</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
