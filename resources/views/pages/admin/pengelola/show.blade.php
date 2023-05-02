@extends('layouts.app')

@section('title', $pengelola->name)

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
                            <a href="{{ route('pengelola') }}" class="link">Pengelola</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pengelola->name }}</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">
                        {{ $pengelola->name }}
                        @if($pengelola->active == 0)
                        <span class="badge bg-danger" style="transform: translateY(-5px)">Nonaktif</span>
                        @endif
                    </h1>
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
                        <th>Nama</th>
                        <td>
                            <input type="text" readonly name="" class="form-control form-control-sm" value="{{ $pengelola->name }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" readonly name="" class="form-control form-control-sm" value="{{ $pengelola->email }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>
                            <input type="text" readonly name="" class="form-control form-control-sm" value="{{ $pengelola->phone }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Unit/Dinas</th>
                        <td>
                            <input type="text" readonly name="" class="form-control form-control-sm" value="{{ $pengelola->company }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Hak Akses</th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="1" id="kelola-admin-check" @if($pengelola->handle_admin) checked @endif>
                                <label class="form-check-label" for="kelola-admin-check">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="3" id="kelola-arsip-publik-check" @if($pengelola->handle_arsip_publik || $pengelola->handle_semua_arsip) checked @endif>
                                <label class="form-check-label" for="kelola-arsip-publik-check">
                                    Arsip Publik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="2" id="kelola-arsip-rahasia-check" @if($pengelola->handle_semua_arsip) checked @endif>
                                <label class="form-check-label" for="kelola-arsip-rahasia-check">
                                    Arsip Rahasia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="5" id="kelola-klasifikasi-check" @if($pengelola->handle_klasifikasi) checked @endif>
                                <label class="form-check-label" for="kelola-klasifikasi-check">
                                    Klasifikasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="groups[]" type="checkbox" value="4" id="kelola-aduan-check" @if($pengelola->handle_aduan) checked @endif>
                                <label class="form-check-label" for="kelola-aduan-check">
                                    Aduan
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select name="active" id="" class="form-control form-control-sm">
                                <option @if($pengelola->active == 1) selected @endif value="1">✅ Aktif</option>
                                <option @if($pengelola->active == 0) selected @endif value="0">❌ Nonaktif</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Arsip Dikelola</h2>
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
                                <td>{{ $arsip->pencipta }}</td>
                                <td><i class="bi bi-calendar2-event-fill me-1"></i>{{ $arsip->tanggal_formatted }}</td>
                                <td><i class="bi bi-paperclip"></i>{{ $arsip->lampiran_count }}</td>
                                <td><i class="bi bi-eye"></i> <?= number_format($arsip->viewers, 0, ',', '.') ?></td>
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
@endsection

@section('script')
    <script>
        $('#kelola-arsip-rahasia-check').on('click', function() {
            if($(this).is(':checked')) {
                $('#kelola-arsip-publik-check').prop('checked', true);
            }
        })
    </script>
@endsection
