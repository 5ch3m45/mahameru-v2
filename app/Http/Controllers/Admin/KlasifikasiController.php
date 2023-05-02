<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Arsip;
use App\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    public function index(Request $request)
    {
        $klasifikasis = Klasifikasi::query();

        if ($request->search) {
            $klasifikasis = $klasifikasis->where(function ($q) use ($request) {
                $q->where('kode', $request->search)
                    ->orWhere('nama', 'like', '%'.$request->search.'%');
            });
        }

        return view('pages.admin.klasifikasi.index', [
            'klasifikasis' => $klasifikasis->paginate(10)->withQueryString(),
            'search' => $request->search
        ]);
    }

    public function create()
    {
        return view('pages.admin.klasifikasi.create');
    }

    public function store(Request $request)
    {
        $klasifikasi = Klasifikasi::create($request->all());
        return redirect()->to(route('klasifikasi.show', compact('klasifikasi')))
            ->with('success', 'Klasifikasi berhasil disimpan');
    }

    public function show(Klasifikasi $klasifikasi, Request $request)
    {
        $arsips = Arsip::where('klasifikasi_id', $klasifikasi->id);

        return view('pages.admin.klasifikasi.show', [
            'klasifikasi' => $klasifikasi,
            'arsips' => $arsips->paginate(10)->withQueryString(),
            'search' => $request->search,
            'status' => $request->status,
            'level' => $request->level,
            'sort' => $request->sort
        ]);
    }

    public function update(Klasifikasi $klasifikasi, Request $request)
    {
        $klasifikasi->update($request->all());
        return redirect()->back()->with('success', 'Klasifikasi berhasil diperbarui.');
    }

    public function destroy(Klasifikasi $klasifikasi)
    {
        $undeletedArsip = Arsip::where('klasifikasi_id', $klasifikasi->id)
            ->whereIn('status', [1, 2])
            ->count();
        if ($undeletedArsip) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus. Terdapat Arsip aktif.');
        }
        Arsip::where('klasifikasi_id', $klasifikasi->id)
            ->where('status', 3)
            ->delete();
        $klasifikasi->delete();

        return redirect()->to(route('klasifikasi'))->with('success', 'Klasifikasi berhasil dihapus.');
    }
}
