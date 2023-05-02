@extends('layouts.app')

@section('title', 'Arsip #'.$arsip->nomor)

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
                            <a href="{{ route('arsip') }}" class="link">Arsip</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">#{{ $arsip->nomor }}</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between">
                    <h1 class="mb-0 fw-bold">Arsip #{{ $arsip->nomor }}</h1>
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
                        <th>Nomor</th>
                        <td>
                            <input type="number" name="nomor" class="form-control form-control-sm" value="{{ $arsip->nomor }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kode Klasifikasi
                            @if($arsip->klasifikasi_id)
                            <div>
                                <a href="{{ route('klasifikasi.show', ['klasifikasi' => $arsip->klasifikasi_id]) }}">Lihat</a>
                            </div>
                            @endif
                        </th>   
                        <td>
                            <select name="klasifikasi_id" id="" class="form-control form-control-sm">
                                @foreach($klasifikasis as $klasifikasi)
                                <option @if($klasifikasi->id == $arsip->klasifikasi_id) selected @endif value="{{ $klasifikasi->id }}">
                                    {{ $klasifikasi->kode }}. {{ $klasifikasi->nama }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Informasi</th>
                        <td>
                            <textarea name="informasi" id="" class="form-control form-control-sm">{{ $arsip->informasi }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Pencipta</th>
                        <td>
                            <input type="text" name="pencipta" class="form-control form-control-sm" value="{{ $arsip->pencipta }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Arsip</th>
                        <td>
                            <input type="date" name="tanggal" class="form-control form-control-sm" value="{{ $arsip->tanggal }}">
                        </td>
                    </tr>
                    <tr>
                        <th>Keterangan Fisik</th>
                        <td>
                            <textarea name="keterangan_fisik" id="" class="form-control form-control-sm">{{ $arsip->keterangan_fisik }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <select name="status" id="" class="form-control form-control-sm">
                                <option @if($arsip->status == 1) selected @endif value="1">📝 Draft</option>
                                <option @if($arsip->status == 2) selected @endif value="2">✅ Terpublikasi</option>
                                <option @if($arsip->status == 3) selected @endif value="3">⛔ Dihapus</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>
                            <select name="level" id="" class="form-control form-control-sm">
                                <option @if($arsip->level == 2) selected @endif value="2">👁️ Publik</option>
                                <option @if($arsip->level == 1) selected @endif value="1">🚫 Rahasia</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pengolah
                            @if($arsip->admin_id)
                            <div>
                                <a href="{{ route('admin.show', ['admin' => $arsip->admin_id]) }}">Lihat</a>
                            </div>
                            @endif
                        </th>
                        <td>
                            <input type="text" readonly class="form-control form-control-sm" style="cursor: not-allowed" value="{{ $arsip->admin->name }}">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-4">
                <h2><span class="text-primary">#</span> Lampiran</h2>
                <div>
                    <button id="upload-lampiran" class="btn btn-success text-white"><i class="bi bi-cloud-plus-fill"></i> Unggah Baru</button>
                </div>
            </div>
            <div class="col-12">
                <div class="grid">
                    <div class="grid-sizer"></div>
                    @foreach($arsip->lampirans as $lampiran)
                    @if(in_array($lampiran->type, ['image/jpeg', 'image/png', 'image/jpg']))
                    <div class="grid-item p-1">
                        <a href="{{ asset($lampiran->url) }}" target="_blank">
                            <img src="{{ asset($lampiran->thumb ?? $lampiran->url) }}" alt="{{ $lampiran->id }}" onerror="this.onerror=null;this.src='/assets/images/broken.jpeg';">
                        </a>
                        <button class="btn btn-danger text-white btn-delete-lampiran" data-arsip-id="{{ $arsip->id }}" data-lampiran-id="{{ $lampiran->id }}" style="position: absolute; top: 10px; right: 10px"><i class="bi bi-trash"></i></button>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<x-modal.upload-lampiran :arsipID="$arsip->id"/>
<x-modal.delete-lampiran/>
@endsection

@section('script')
    <script>
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
        });

        $grid.imagesLoaded().progress( function() {
            $grid.masonry();
        });

        $('#upload-lampiran').on('click', function() {
            $('#upload-lampiran-modal').modal('show');
        })

        $(document).on('click', '.btn-delete-lampiran', function() {
            $('#delete-lampiran-form').attr('action', '/dashboard/arsip/show/'+$(this).data('arsip-id')+'/lampiran/'+$(this).data('lampiran-id'));
            $('#delete-lampiran-modal').modal('show');
        });
    </script>
@endsection
