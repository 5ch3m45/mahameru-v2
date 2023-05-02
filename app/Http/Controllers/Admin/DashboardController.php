<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Arsip;
use App\ArsipViewer;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        
        // logic start end query
        if($start && $end) {
            $start = date('Y-m-d', strtotime($request->start));
            $end = date('Y-m-d', strtotime($request->end));
        } else if($start && !$end) {
            $start = date('Y-m-d', strtotime($request->start));
            $end = date('Y-m-d', strtotime('now'));
        } else if(!$start && $end) {
            $start = date('Y-m-d', strtotime('-14 days', $request->end));
            $end = date('Y-m-d', strtotime($request->end));
        } else {
            $start = date('Y-m-d', strtotime('-14 days'));
            $end = date('Y-m-d', strtotime('now'));
        }

        $topArsip = Arsip::orderByDesc('viewers')->limit(5)->get();
        
        $topKlasifikasi = Arsip::select(\DB::raw('klasifikasi_id, COUNT(tbl_arsip.klasifikasi_id) as jumlah_arsip, kode, nama'))
            ->leftJoin('tbl_klasifikasi', 'tbl_klasifikasi.id', 'tbl_arsip.klasifikasi_id')
            ->groupBy('klasifikasi_id')
            ->orderByDesc('jumlah_arsip')
            ->limit(5)
            ->get();

        $lastArsip = Arsip::where('status', '<', 3);
        if(!auth()->user()->handle_semua_arsip) {
            $lastArsip = $lastArsip->where('level', 2);
        }
        $lastArsip = $lastArsip->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('pages.admin.dashboard.index', [
            'start' => $start,
            'end' => $end,
            'pengunjung_arsip' => $this->generateViewersData($start, $end),
            'publikasi_arsip' => $this->generatePublicationData($start, $end),
            'total_viewers' => Arsip::sum('viewers'),
            'top_arsip' => $topArsip,
            'top_klasifikasi' => $topKlasifikasi,
            'last_arsip' => $lastArsip
        ]);
    }

    public function generatePeriode($start, $end)
    {
        $startDate = new \DateTime($start);
        $end = new \DateTime(date('Y-m-d', strtotime("+1 day", strtotime($end))));
        $interval = \DateInterval::createFromDateString('1 day');
        $periode = new \DatePeriod($startDate, $interval, $end);
        
        return $periode;
    }

    public function generateViewersData($start, $end)
    {
        $periode = $this->generatePeriode($start, $end);
        $pengunjungArsip = ArsipViewer::select(\DB::raw('date, SUM(viewers) as viewers'))
            ->where('date', '<=', $end)
            ->where('date', '>=', $start)
            ->groupBy('date')
            ->get();

        $pengunjungArsipData = [];
        foreach ($periode as $key => $date) {
            $currentDate = $date->format('Y-m-d');
            $getViewer = @(collect($pengunjungArsip)->where('date', $currentDate)->first())->viewers;
            array_push($pengunjungArsipData, [
                'date' => $currentDate,
                'formatted_date' => $date->format('d/m'),
                'viewers' => $getViewer ?? 0
            ]);
        }
        
        return $pengunjungArsipData;
    }

    public function generatePublicationData($start, $end)
    {
        $periode = $this->generatePeriode($start, $end);
        $publikasiArsip = Arsip::select(\DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date, COUNT(id) as arsip_id_count'))
            ->where('created_at', '<=', $end)
            ->where('created_at', '>=', $start)
            ->groupBy('date')
            ->get();

        $publikasiArsipData = [];
        foreach ($periode as $key => $date) {
            $currentDate = $date->format('Y-m-d');
            $getCount = @(collect($publikasiArsip)->where('date', $currentDate)->first())->arsip_id_count;
            array_push($publikasiArsipData, [
                'date' => $currentDate,
                'formatted_date' => $date->format('d/m'),
                'count' => $getCount ?? 0
            ]);
        }

        return $publikasiArsipData;
    }

    public function generateTotalViewData($start, $end)
    {
        $periode = $this->generatePeriode($start, $end);
        $totalView = Arsip::query()
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->sum('viewers');
        return $totalView;
    }
}
