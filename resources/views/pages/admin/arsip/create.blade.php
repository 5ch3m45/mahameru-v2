@extends('layouts.app')

@section('title', 'Arsip Baru')

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
                        <li class="breadcrumb-item" href="{{ route('arsip') }}">Arsip</li>
                        <li class="breadcrumb-item active" aria-current="page">Baru</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Arsip Baru</h1>
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
            <input type="hidden" name="admin_id" value="{{ auth()->id() }}">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h2><span class="text-primary">#</span> Informasi</h2>
                <div>
                    <button type="submit" class="btn btn-success text-white"><i class="bi bi-cloud-arrow-up-fill"></i> Simpan</button>
                </div>
            </div>
            <div class="col-12">
                <table id="form-table" class="table" aria-describedby="table edit arsip">
                    <tr>
                        <th>Nomor</th>
                        <td>
                            <input type="number" name="nomor" class="form-control form-control-sm" value="{{ $lastArsip->nomor+1 }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Kode Klasifikasi</th>
                        <td>
                            <select name="klasifikasi_id" id="" class="form-control form-control-sm">
                                <option value="">Pilih Klasifikasi</option>
                                @foreach($klasifikasis as $klasifikasi)
                                <option @if($klasifikasiID == $klasifikasi->id) selected @endif  value="{{ $klasifikasi->id }}">
                                    {{ $klasifikasi->kode }}. {{ $klasifikasi->nama }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Informasi</th>
                        <td>
                            <textarea name="informasi" id="" class="form-control form-control-sm"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Pencipta</th>
                        <td>
                            <input type="text" name="pencipta" class="form-control form-control-sm">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Arsip</th>
                        <td>
                            <input type="date" name="tanggal" class="form-control form-control-sm">
                        </td>
                    </tr>
                    <tr>
                        <th>Keterangan Fisik</th>
                        <td>
                            <textarea name="keterangan_fisik" id="" class="form-control form-control-sm"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select name="status" id="" class="form-control form-control-sm">
                                <option selected value="1">📝 Draft</option>
                                <option value="2">✅ Terpublikasi</option>
                                <option value="3">⛔ Dihapus</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>
                            <select name="level" id="" class="form-control form-control-sm">
                                <option selected value="2">👁️ Publik</option>
                                <option value="1">🚫 Rahasia</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Lampiran</h2>
            </div>
            <div class="col-12"></div>
        </div>
    </div>
</div>
@endsection