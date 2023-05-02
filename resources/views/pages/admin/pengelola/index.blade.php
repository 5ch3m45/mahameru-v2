@extends('layouts.app')

@section('title', 'Pengelola')

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
                        <li class="breadcrumb-item active" aria-current="page">Pengelola</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Pengelola</h1>
                    <a href="{{ route('pengelola.create') }}">
                        <button class="btn btn-primary rounded-corner">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Pengelola Baru
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if(false)
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
        @endif
        <div class="row">
            <div class="col-12 mb-4">
                <h2><span class="text-primary">#</span> Data Table</h2>
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
                            <option value="semua" @if($status=='semua') selected @endif>Semua</option>
                            <option value="2" @if(!$status || $status==2) selected @endif>✅ Aktif</option>
                            <option value="1" @if($status==1) selected @endif>❌ Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="sort-table">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i> Cari
                            </button>
                            <a href="{{ route('pengelola') }}">
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
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Dinas/Unit</th>
                                <th class="border-top-0">Arsip Dikelola</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Login Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengelolas as $key => $pengelola)
                            <tr>
                                <td>
                                    <a href="{{ route('pengelola.show', compact('pengelola')) }}">{{ $pengelola->name }}</a> @if(auth()->id() == $pengelola->id) (saya) @endif
                                </td>
                                <td>
                                    <a href="mailto:{{ $pengelola->email }}">{{ $pengelola->email }}</a>
                                </td>
                                <td>{{ $pengelola->company }}</td>
                                <td><i class="bi bi-archive"></i> {{ number_format($pengelola->arsips->count(), 0, ',', '.') }}</td>
                                <td>{!! $pengelola->status_badge !!}</td>
                                <td><i class="bi bi-calendar-event"></i> {{ $pengelola->last_login ? date('d M Y H:i:s', strtotime($pengelola->last_login)) : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data<i class="bi bi-emoji-neutral ms-1"></i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $pengelolas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
