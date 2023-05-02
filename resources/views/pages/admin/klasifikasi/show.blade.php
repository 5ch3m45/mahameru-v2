@extends('layouts.app')

@section('title', 'Klasifikasi #'.$klasifikasi->kode)

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
                        <li class="breadcrumb-item active" aria-current="page">#{{ $klasifikasi->kode }}</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Klasifikasi #{{ $klasifikasi->kode }}</h1>
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
                    <button id="delete-klasifikasi" type="button" class="btn btn-danger text-white me-2"><i class="bi bi-trash"></i> Hapus</button>
                    <button type="submit" class="btn btn-success text-white"><i class="bi bi-cloud-arrow-up-fill"></i> Simpan</button>
                </div>
            </div>
            <div class="col-12">
                <table id="form-table" class="table" aria-describedby="table edit arsip">
                    <tr>
                        <th>Kode</th>
                        <td>
                            <input type="text" name="kode" class="form-control form-control-sm" value="{{ $klasifikasi->kode }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>
                            <textarea name="nama" id="" class="form-control form-control-sm">{{ $klasifikasi->nama }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            <textarea name="deskripsi" id="" class="form-control form-control-sm">{{ $klasifikasi->deskripsi }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Arsip</h2>
                <div>
                    <a href="{{ route('arsip.create').'?klasifikasi_id='.$klasifikasi->id.'&redirect=klasifikasi.show' }}">
                        <button class="btn btn-success text-white"><i class="bi bi-cloud-plus-fill"></i> Unggah Baru</button>
                    </a>
                </div>
            </div>
            <div class="col-12">
                <form id="filter-form" class="row mb-4">
                    <div class="col-12 col-md-3">
                        <label for="search-table">Cari</label>
                        <input id="search-table" class="form-control" type="text" name="search" value="{{ $search }}" placeholder="Cari">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="status-table">Status</label>
                        <select name="status" id="status-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="1" @if($status==1) selected @endif>Draft</option>
                            <option value="2" @if($status==2) selected @endif>Terpublikasi</option>
                            <option value="3" @if($status==3) selected @endif>Dihapus</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="level-table">Level</label>
                        <select name="level" id="level-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="2" @if($level==2) selected @endif>Publik</option>
                            <option value="1" @if($level==1) selected @endif>Rahasia</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="sort-table">Urutkan</label>
                        <select name="sort" id="sort-table" class="form-control">
                            <option value="baru-diupload" @if($sort=='baru-diupload') selected @endif>
                                Baru Diupload
                            </option>
                            <option value="terbaru" @if($sort=='terbaru' ) selected @endif>
                                Terbaru
                            </option>
                            <option value="terlama" @if($sort=='terlama' ) selected @endif>
                                Terlama
                            </option>
                            <option value="terpopuler" @if($sort=='terpopuler' ) selected @endif>
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
                            <a href="{{ route('arsip') }}">
                                <button class="btn btn-light" type="button"><i class="bi bi-arrow-clockwise">
                                    </i> Reset
                                </button>
                            </a>
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
                            @forelse($arsips as $key => $arsip)
                            <tr>
                                <td>
                                    <div class="mb-2">
                                        <a class="text-primary" href="{{ route('arsip.show', ['arsip' => $arsip->id]) }}">
                                            <span class="d-inline-block">
                                                {{ $arsip->nomor }}. {{ $arsip->short_informasi }}
                                            </span>
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        @if($arsip->klasifikasi)
                                        <a href="{{ route('klasifikasi.show', ['klasifikasi' => $arsip->klasifikasi]) }}" class="badge bg-dark text-light text-truncate me-2">
                                            <small>
                                                {{ $arsip->klasifikasi->kode.'. '.$arsip->klasifikasi->short_nama }}
                                            </small>
                                        </a>
                                        @endif
                                        <span class="me-2">
                                            {!! $arsip->level_badge !!}
                                        </span>
                                        {!! $arsip->status_badge !!}
                                    </div>
                                </td>
                                <td>
                                    @if($arsip->admin)
                                    <a class="text-primary" href="{{ route('admin.show', ['admin' => $arsip->admin_id]) }}">
                                        {{ $arsip->admin->name }}
                                    </a>
                                    @endif
                                </td>
                                <td>{{ $arsip->pencipta }}</td>
                                <td><i class="bi bi-calendar2-event-fill me-1"></i>{{ $arsip->tanggal_formatted }}</td>
                                <td><i class="bi bi-paperclip"></i>{{ $arsip->lampiran_count }}</td>
                                <td><i class="bi bi-eye"></i> <?= number_format($arsip->viewers, 2, ',', '.') ?></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data<i class="bi bi-emoji-neutral ms-1"></i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $arsips->links() }}
            </div>
        </div>
    </div>
</div>

<x-modal.delete-klasifikasi :klasifikasiID="$klasifikasi->id"/>
@endsection

@section('script')
<script>
    $('#delete-klasifikasi').on('click', function() {
        $('#delete-klasifikasi-modal').modal('show')
    })
</script>
@endsection
