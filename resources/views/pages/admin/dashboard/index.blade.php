@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1> 
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form class="row" method="GET">
                            <div class="col-12">
                                <h4 class="card-title">Filter statistik</h4>
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="">Tanggal awal</label>
                                <input type="date" name="start" id="start-date-input" value="{{ $start }}" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="">Tanggal akhir</label>
                                <input type="date" name="end" id="end-date-input" value="{{ $end }}" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="" class="d-none d-lg-block">&nbsp;</label>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-funnel-fill"></i> Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Pengunjung Arsip</h4>
                        <h1>{{ $total_viewers }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Jumlah Pengunjung Arsip</h4>
                            </div>
                            <div class="ms-auto d-flex no-block align-items-center">
                                <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                    <li class="list-inline-item d-flex align-items-center text-info">
                                        <i class="fa fa-circle font-10 me-1"></i> Pengunjung
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="chartPengunjung" class="amp-pxl mt-4" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Top Arsip</h4>
                        <h6 class="card-subtitle">Arsip dengan Kunjungan Terbanyak</h6>
                        <div id="arsip-top5" class="">
                            @foreach($top_arsip as $arsip)
                            <div class="pb-3">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('arsip.show', ['arsip' => $arsip->id]) }}">
                                            <h5 class="mb-0 fw-bold">#{{ $arsip->nomor }}</h5>
                                            <small class="text-muted">{{ $arsip->short_informasi }}</small>
                                        </a>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted"><i class="bi bi-eye"></i> {{ $arsip->viewers }}</span>
                                    </div>
                                </div>
                                <small class="text-dark">Oleh: {{ $arsip->pencipta }}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Jumlah Arsip Dipublikasi</h4>
                            </div>
                            <div class="ms-auto d-flex no-block align-items-center">
                                <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                    <li class="list-inline-item d-flex align-items-center text-success">
                                        <i class="fa fa-circle font-10 me-1"></i> Arsip
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="chartPublikasi" class="arsip-dilihat-chart mt-4" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Klasifikasi Terbanyak</h4>
                        <h6 class="card-subtitle">Klasifikasi dengan Arsip Dipublikasi Terbanyak</h6>
                        <div id="klasifikasi-top5" class="">
                            @foreach($top_klasifikasi as $klasifikasi)
                            <div class="py-3 d-flex align-items-center">
                                <div>
                                    <a href="{{ route('klasifikasi.show', ['klasifikasi' => $klasifikasi->klasifikasi_id]) }}">
                                        <h5 class="mb-0 fw-bold">{{ $klasifikasi->kode }}.</h5>
                                        <small class="text-muted">{{ $klasifikasi->nama }}</small>
                                    </a>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge bg-light text-muted"><i class="bi bi-archive"></i> {{ $klasifikasi->jumlah_arsip }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Arsip Terakhir Ditambahkan</h4>
                                <h5 class="card-subtitle">5 Arsip Terakhir Ditambahkan</h5>
                            </div>
                        </div>
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
                                    @forelse($last_arsip as $key => $arsip)
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
                    </div>
                </div>
            </div>
        </div>
        <?php if(false) { ?>
        <div class="row">
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Catatan Terbaru</h4>
                    </div>
                    <div class="comment-widgets scrollable">
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2"><img src="<?= 'assets_url'() ?>images/users/1.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Hani Kusmawati</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                    and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">April 14, 2021</span> 
                                    <span
                                        class="action-icons">
                                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i> Edit</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="<?= 'assets_url'() ?>images/users/4.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Julia Rahimah</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                    and type setting industry. </span>
                                <div class="comment-footer ">
                                    <span class="text-muted float-end">April 14, 2021</span>
                                    
                                    <span class="action-icons">
                                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i> Edit</a>
                                    
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Row -->
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2"><img src="<?= 'assets_url'() ?>images/users/5.jpg" alt="user" width="50"
                                    class="rounded-circle"></div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Harja Budiman</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                    and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-end">April 14, 2021</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i> Edit</a>
                                    
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Aktivitas Terbaru</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="http://mahameru.test/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100 d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Harja Budiman</div>
                                            <span class="badge bg-warning">Mengubah</span> arsip #366
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="http://mahameru.test/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100 d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Rusman Marbun</div>
                                            <span class="badge bg-info">Mengunggah</span> lampiran arsip #444
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="http://mahameru.test/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100 d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Lalita Uyainah</div>
                                            <span class="badge bg-success">Menambah</span> arsip #123
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="http://mahameru.test/assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100 d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Lalita Uyainah</div>
                                            <span class="badge bg-danger">Menghapus</span> arsip #543
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var options1 = {
            series: [{
                name: 'Pengunjung',
                data: @json(collect($pengunjung_arsip)->pluck('viewers'))
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json(collect($pengunjung_arsip)->pluck('formatted_date')),
            },
            yaxis: {
                title: {
                    text: 'Pengunjung'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart1 = new ApexCharts(document.querySelector("#chartPengunjung"), options1);
        chart1.render();

        var options2 = {
            colors : ['#39cb7f'],
            series: [{
                name: 'Arsip dipublikasi',
                data: @json(collect($publikasi_arsip)->pluck('count'))
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json(collect($publikasi_arsip)->pluck('formatted_date')),
            },
            yaxis: {
                title: {
                    text: 'Arsip'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart2 = new ApexCharts(document.querySelector("#chartPublikasi"), options2);
        chart2.render();
    })
</script>
@endsection