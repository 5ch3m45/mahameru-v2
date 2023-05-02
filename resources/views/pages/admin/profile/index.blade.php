@extends('layouts.app')

@section('title', 'Profile Saya')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profil Anda</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">{{ auth()->user()->name }}</h1>
                    <div>
                        <a href="{{ url()->previous() }}">
                            <button class="btn btn-primary rounded-corner">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <x-alert.success-and-failed/>

        <form method="POST" class="row mb-5">
            @csrf
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h2><span class="text-primary">#</span> Informasi</h2>
                <div>
                    <button type="submit" class="btn btn-success text-white"><i class="bi bi-cloud-arrow-up-fill"></i> Simpan</button>
                </div>
            </div>
            <div class="col-12">
                <table id="form-table" class="table" aria-describedby="table edit arsip">
                    <input type="hidden" name="active" value="1">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" name="name" required class="form-control form-control-sm" value="{{ auth()->user()->name }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" required class="form-control form-control-sm" value="{{ auth()->user()->email }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>
                            <input type="text" name="phone" class="form-control form-control-sm" value="{{ auth()->user()->phone }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Unit/Dinas</th>
                        <td>
                            <input type="text" name="company" class="form-control form-control-sm" value="{{ auth()->user()->company }}">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <form method="POST" action="{{ route('profile.update-password') }}" class="row mb-5">
            @csrf
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h2><span class="text-primary">#</span> Keamanan</h2>
                <div>
                    <button type="submit" class="btn btn-success text-white"><i class="bi bi-cloud-arrow-up-fill"></i> Simpan</button>
                </div>
            </div>
            <div class="col-12">
                <table class="table form-table" aria-describedby="table edit arsip">
                    <input type="hidden" name="active" value="1">
                    <tr>
                        <th>Password Lama</th>
                        <td>
                            <input type="password" name="old_password" required class="form-control form-control-sm" value="">
                            @error('old_password') <div class="text-danger">{{ $message }}</div> @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Password Baru</th>
                        <td>
                            <input type="password" name="new_password" required class="form-control form-control-sm" value="">
                            @error('new_password') <div class="text-danger">{{ $message }}</div> @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Konfirmasi Password Baru</th>
                        <td>
                            <input type="password" name="new_password_confirm" required class="form-control form-control-sm" value="">
                            @error('new_password_confirm') <div class="text-danger">{{ $message }}</div> @endif
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#toggle-password-btn').on('click', function() {
        let type = $('input[name=password]').attr('type');
        if(type == 'password') {
            return $('input[name=password]').attr('type', 'text');
        }
        return $('input[name=password]').attr('type', 'password');
    });
</script>
@endsection
