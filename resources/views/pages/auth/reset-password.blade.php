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
                                    <h2>Perbarui Password</h2>
                                    <p>Silahkan masukkan password baru Anda.</p>
                                    <x-alert.success-and-failed/>
                                    @if(@$user)
                                    <form method="POST" class="row g-4">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ @$user->id }}">
                                        <div class="col-12">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru">
                                            </div>
                                            @error('password') <div class="text-danger">{{ $message }}</div> @endif
                                        </div>

                                        <div class="col-12">
                                            <label>Ulangi Password <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="password" name="password_confirm" class="form-control" placeholder="Konfirmasi Password Baru">
                                            </div>
                                            @error('password_confirm') <div class="text-danger">{{ $message }}</div> @endif
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end">Perbarui</button>
                                        </div>
                                    </form>
                                    @else
                                    <div class="alert alert-danger mb-4" role="alert">
                                        Link tidak valid.
                                    </div>
                                    @endif
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
