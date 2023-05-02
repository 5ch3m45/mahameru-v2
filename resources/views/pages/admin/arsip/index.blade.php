@extends('layouts.app')

@section('title', 'Arsip')

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
                        <li class="breadcrumb-item active" aria-current="page">Arsip</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Arsip</h1>
                    <a href="{{ route('arsip.create') }}">
                        <button class="btn btn-primary rounded-corner">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Upload Baru
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12 mb-4">
                <h2><span class="text-primary">#</span> Statistik</h2>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <h1>{{ $stats_dipublikasi }}</h1>
                <p><i class="bi bi-display"></i> Arsip dipublikasi</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <h1>{{ $stats_draft }}</h1>
                <p><i class="bi bi-archive"></i> Arsip draft</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <h1>{{ $stats_publik }}</h1>
                <p><i class="bi bi-people"></i> Arsip publik</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
                <h1>{{ $stats_rahasia }}</h1>
                <p><i class="bi bi-incognito"></i> Arsip rahasia</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <h2><span class="text-primary">#</span> Data Table</h2>
            </div>
            <div class="col-12">
                <form id="filter-form" class="row mb-4">
                    <div class="col-12 col-md-3 mb-3">
                        <label for="search-table">Cari</label>
                        <input id="search-table" class="form-control" type="text" name="search" value="{{ $search }}" placeholder="Cari">
                    </div>
                    <div class="col-12 col-md-3 mb-3">
                        <label for="status-table">Status</label>
                        <select name="status" id="status-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="1" @if($status==1) selected @endif>Draft</option>
                            <option value="2" @if($status==2) selected @endif>Terpublikasi</option>
                            <option value="3" @if($status==3) selected @endif>Dihapus</option>
                        </select>
                    </div>
                    @if(auth()->user()->handle_semua_arsip)
                    <div class="col-12 col-md-3 mb-3">
                        <label for="level-table">Level</label>
                        <select name="level" id="level-table" class="form-control">
                            <option value="">Semua</option>
                            <option value="2" @if($level==2) selected @endif>Publik</option>
                            <option value="1" @if($level==1) selected @endif>Rahasia</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-12 col-md-3 mb-3">
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
                    <div class="col-12 col-md-3 mb-3">
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
                                        <a href="{{ route('klasifikasi.show', ['klasifikasi' => $arsip->klasifikasi_id]) }}" class="badge bg-dark text-light text-truncate me-2">
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
                                <td><i class="bi bi-calendar2-event me-1"></i>{{ $arsip->tanggal_formatted }}</td>
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
                <div class="d-lg-flex justify-content-between">
                    <div>
                        {{ $arsips->links() }}
                    </div>
                    <div class="d-flex">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Hal.</span>
                            <select name="custom_page" id="" class="form-control">
                                @for($i = 1; $i < $arsips->lastPage() + 1; $i++)
                                <option value="{{ $i }}" @if($i == $arsips->currentPage()) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let customPage = $('select[name=custom_page]');
    customPage.on('change', function() {
        let url = new URL(location.href);
        url.searchParams.set("page", $(this).val());
        location.href = url.href;
    })
</script>
@endsection