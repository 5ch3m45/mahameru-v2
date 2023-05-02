@extends('layouts.app')

@section('title', 'Aduan #'.$aduan->kode)

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
                            <a href="{{ route('aduan') }}" class="link">
                                Aduan
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">#{{ $aduan->kode }}</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Aduan #{{ $aduan->kode }}</h1>
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

        <div class="row mb-5">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h2><span class="text-primary">#</span> Informasi</h2>
            </div>
            <div class="col-12">
                <table id="form-table" class="table" aria-describedby="table edit arsip">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <input type="text" readonly name="" class="form-control form-control-sm" value="{{ $aduan->nama }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="text" readonly name="" class="form-control form-control-sm" value="{{ $aduan->email }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Aduan</th>
                        <td>
                            <textarea name="" readonly id="" class="form-control form-control-sm">{{ $aduan->aduan }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <div class="d-flex">
                                <form method="POST" action="{{ route('aduan.update', ['aduan' => $aduan, 'status' => 1]) }}">
                                    @csrf
                                    <button @if($aduan->status >= 1) disabled type="button" style="cursor: not-allowed" @else type="submit" @endif class="btn btn-danger text-white me-2">Diterima</button>
                                </form>
                                <form method="POST" action="{{ route('aduan.update', ['aduan' => $aduan, 'status' => 2]) }}">
                                    @csrf
                                    <button @if($aduan->status >= 2) disabled type="button" style="cursor: not-allowed" @else type="submit" @endif class="btn btn-warning text-white me-2">Dibaca</button>
                                </form>
                                <form method="POST" action="{{ route('aduan.update', ['aduan' => $aduan, 'status' => 3]) }}">
                                    @csrf
                                    <button @if($aduan->status >= 3) disabled type="button" style="cursor: not-allowed" @else type="submit" @endif class="btn btn-success text-white me-2">Ditindaklanjuti</button>
                                </form>
                                <form method="POST" action="{{ route('aduan.update', ['aduan' => $aduan, 'status' => 4]) }}">
                                    @csrf
                                    <button @if($aduan->status >= 4) disabled type="button" style="cursor: not-allowed" @else type="submit" @endif class="btn btn-primary text-white">Selesai</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h2><span class="text-primary">#</span> Timeline</h2>
            </div>
            <div class="col-12">
                <ul class="timeline">
                    @foreach ($aduan->timeline as $event)
                    <li>
                        <a href="#" class="float-right">{{ date('d M Y H:i:s', strtotime($event->created_at)) }}</a>
                        <p>{!! $event->status_badge !!}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
