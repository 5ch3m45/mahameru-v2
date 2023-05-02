@extends('layouts.app')

@section('title', 'Klasifikasi Baru')

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
                        <li class="breadcrumb-item">
                            <a href="{{ route('klasifikasi') }}" class="link">
                                Klasifikasi
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Baru</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Klasifikasi Baru</h1>
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
                    <tr>
                        <th>Kode</th>
                        <td>
                            <input type="text" name="kode" class="form-control form-control-sm" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <textarea name="nama" id="" class="form-control form-control-sm"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            <textarea name="deskripsi" id="" class="form-control form-control-sm"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Arsip</h2>
            </div>
            <div class="col-12">
                <form id="filter-form" class="row mb-4">
                    <div class="col-12 col-md-3">
                        <label for="search-table">Cari</label>
                        <input id="search-table" class="form-control" type="text" name="search" value="" placeholder="Cari">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="status-table">Status</label>
                        <select name="status" id="status-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="1">Draft</option>
                            <option value="2">Terpublikasi</option>
                            <option value="3">Dihapus</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="level-table">Level</label>
                        <select name="level" id="level-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="2">Publik</option>
                            <option value="1">Rahasia</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="sort-table">Urutkan</label>
                        <select name="sort" id="sort-table" class="form-control">
                            <option value="baru-diupload">
                                Baru Diupload
                            </option>
                            <option value="terbaru">
                                Terbaru
                            </option>
                            <option value="terlama">
                                Terlama
                            </option>
                            <option value="terpopuler">
                                Terpopuler
                            </option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="sort-table">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
                <!-- title -->
                <div class="table-responsive">
                    <table id="arsip-table" class="table mb-4 text-nowrap" aria-describedby="table arsip">
                        <thead>
                            <tr>
                                <th class="border-top-0">Informasi</th>
                                <th class="border-top-0">Pengolah</th>
                                <th class="border-top-0">Pencipta</th>
                                <th class="border-top-0">Tanggal</th>
                                <th class="border-top-0">Lampiran</th>
                                <th class="border-top-0">Viewers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data<i class="bi bi-emoji-neutral ms-1"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#delete-klasifikasi').on('click', function() {
        $('#delete-klasifikasi-modal').modal('show')
    })
</script>
@endsection
