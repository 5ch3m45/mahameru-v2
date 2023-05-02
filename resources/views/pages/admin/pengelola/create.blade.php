@extends('layouts.app')

@section('title', 'Pengelola Baru')

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
                        <li class="breadcrumb-item" href="{{ route('pengelola') }}">Pengelola</li>
                        <li class="breadcrumb-item active" aria-current="page">Baru</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Pengelola Baru</h1>
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
                            <input type="text" name="name" required class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" required class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div>Password</div>
                            <a href="javascript:void(0)" id="toggle-password-btn">Lihat</a>
                        </th>
                        <td>
                            <input type="password" name="password" required class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>
                            <input type="text" name="phone" class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>Unit/Dinas</th>
                        <td>
                            <input type="text" name="company" class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>Hak Akses</th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="1" id="kelola-admin-check">
                                <label class="form-check-label" for="kelola-admin-check">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="3" id="kelola-arsip-publik-check">
                                <label class="form-check-label" for="kelola-arsip-publik-check">
                                    Arsip Publik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="2" id="kelola-arsip-rahasia-check">
                                <label class="form-check-label" for="kelola-arsip-rahasia-check">
                                    Arsip Rahasia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="5" id="kelola-klasifikasi-check">
                                <label class="form-check-label" for="kelola-klasifikasi-check">
                                    Klasifikasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="4" id="kelola-aduan-check">
                                <label class="form-check-label" for="kelola-aduan-check">
                                    Aduan
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Arsip Dikelola</h2>
            </div>
            <div class="col-12"></div>
        </div>
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

    $('#kelola-arsip-rahasia-check').on('click', function() {
        if($(this).is(':checked')) {
            $('#kelola-arsip-publik-check').prop('checked', true);
        }
    })
</script>
@endsection
