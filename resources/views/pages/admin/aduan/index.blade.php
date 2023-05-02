@extends('layouts.app')

@section('title', 'Aduan')

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
                        <li class="breadcrumb-item active" aria-current="page">Aduan</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Aduan</h1>
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
                        <label for="search-table">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1" @if($status == 1) selected @endif>Diterima</option>
                            <option value="2" @if($status == 2) selected @endif>Dibaca</option>
                            <option value="3" @if($status == 3) selected @endif>Ditindaklanjuti</option>
                            <option value="4" @if($status == 4) selected @endif>Selesai</option>
                        </select>
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
                    <table id="aduan-table" class="table mb-4 text-nowrap" aria-describedby="table aduan">
                        <thead>
                            <tr>
                                <th class="border-top-0">Nomor</th>
                                <th class="border-top-0">Aduan</th>
                                <th class="border-top-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aduans as $key => $aduan)
                            <tr>
                                <td>
                                    <div>
                                        <a href="{{ route('aduan.show', compact('aduan')) }}">{{ $aduan->kode }}</a>
                                    </div>
                                    <div>{{ $aduan->nama }}</div>
                                    <div>
                                        <a href="mailto:{{ $aduan->email }}">{{ $aduan->email }}</a>
                                    </div>
                                </td>
                                <td>
                                    <i class="bi bi-chat-dots"></i> {{ $aduan->aduan }}
                                </td>
                                <td>
                                    {!! $aduan->status_badge !!}
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
                {{ $aduans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
