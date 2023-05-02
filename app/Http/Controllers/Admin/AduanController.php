<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aduan;
use App\AduanTimeline;

class AduanController extends Controller
{
    public function index(Request $request)
    {
        $aduans = Aduan::query();

        if($request->search) {
            $aduans = $aduans->where(function($q) use($request) {
                $q->where('kode', $request->search)
                    ->orWhere('nama', 'like', '%'.$request->search.'%')
                    ->orWhere('email', $request->search);
            });
        }

        if($request->status) {
            $aduans = $aduans->where('status', $request->status);
        }

        $aduans = $aduans->paginate(20)->withQueryString();

        return view('pages.admin.aduan.index', [
            'aduans' => $aduans,
            'search' => $request->search,
            'status' => $request->status
        ]);
    }

    public function show(Aduan $aduan) {
        return view('pages.admin.aduan.show', [
            'aduan' => $aduan
        ]);
    }

    public function update(Aduan $aduan, $status, Request $request)
    {
        $now_status = $aduan->status;
        if($status < $now_status) {
            return redirect()->back()->with('error', 'Tidak dapat mengembalikan status aduan.');
        }

        if(!in_array((int)$status, [1, 2, 3, 4])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $aduan->update([
            'status' => $status
        ]);

        for ($i=1; $i <= $status; $i++) { 
            AduanTimeline::updateOrCreate([
                'aduan_id' => $aduan->id,
                'status' => $status
            ], [
                'updated_at' => date('c')
            ]);
        }

        return redirect()->back()->with('success', 'Aduan berhasil diperbarui.');
    }
}
