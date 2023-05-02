@extends('layouts.app')

@section('title', 'Klasifkasi')

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
                        <li class="breadcrumb-item active" aria-current="page">Klasifikasi</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Klasifikasi</h1>
                    <a href="{{ route('klasifikasi.create') }}">
                        <button class="btn btn-primary rounded-corner">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Upload Baru
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                        <label for="sort-table">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-search"></i> Cari
                            </button>
                            <a href="{{ route('klasifikasi') }}">
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
                                <th class="border-top-0">Arsip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($klasifikasis as $key => $klasifikasi)
                            <tr>
                                <td>
                                    <div>
                                        <a class="text-primary" href="{{ route('klasifikasi.show', compact('klasifikasi')) }}">
                                            <span class="d-inline-block">
                                                {{ substr($klasifikasi->kode, -1) == '.' ? $klasifikasi->kode : $klasifikasi->kode.'.' }} {{ strtoupper($klasifikasi->nama) }}
                                            </span>
                                        </a>
                                    </div>
                                    {{ $klasifikasi->deskripsi }}
                                </td>
                                <td>
                                    <i class="bi bi-archive"></i> {{ $klasifikasi->arsips()->count() }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center">Tidak ada data<i class="bi bi-emoji-neutral ms-1"></i></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $klasifikasis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
