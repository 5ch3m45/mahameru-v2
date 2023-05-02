<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Arsip;
use App\ArsipViewer;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.main.arsip.index', [
            'request' => $request
        ]);
    }

    public function indexAPI(Request $request)
    {
        $arsips = Arsip::with(['klasifikasi', 'lampirans'])
            ->where([
                'level' => 2,
                'status' => 2,
            ]);

        if ($request->search) {
            $arsips = $arsips->where(function ($q) use ($request) {
                $q->where('informasi', 'like', '%'.$request->search.'%')
                    ->orWhere('pencipta', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->type == 1 && $request->start) {
            $arsips = $arsips->where('tanggal', '<=', $request->start);
        } else if ($request->type == 2 && $request->start) {
            $arsips = $arsips->where('tanggal', '>=', $request->start);
        } else if ($request->type == 3 && $request->start && $request->end) {
            $arsips = $arsips->where('tanggal', '>=', $request->start)
                ->where('tanggal', '<=', $request->end);
        }

        $arsips = $arsips->paginate(10)->withQueryString();

        return response()->json([
            'success' => true,
            'data' => $arsips
        ]);
    }

    public function show(Arsip $arsip, Request $request)
    {
        if(time() - $arsip->last_viewer_update > 1) {
            $arsip->update([
                'viewers' => $arsip->viewers+1,
                'last_viewer_update' => time()
            ]);
            
            $arsipViewer = ArsipViewer::where([
                'arsip_id' => $arsip->id,
                'date' => date('Y-m-d')
            ])->first();
            if($arsipViewer) {
                $arsipViewer->update([
                    'viewers' => $arsipViewer->viewers+1,
                ]);
            } else {
                $arsipViewer = ArsipViewer::create([
                    'date' => date('Y-m-d'),
                    'arsip_id' => $arsip->id,
                    'viewers' => 1
                ]);
            }
        }
        return view('pages.main.arsip.show', [
            'arsip' => $arsip
        ]);
    }
}
