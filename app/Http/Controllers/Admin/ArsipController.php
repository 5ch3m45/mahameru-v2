<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Arsip;
use App\Klasifikasi;
use App\Lampiran;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $arsips = Arsip::query();

        if ($request->search) {
            $arsips = $arsips->where('informasi', 'like', '%'.$request->search.'%');
        }
        
        if ($request->status) {
            $arsips = $arsips->where('status', $request->status);
        } else {
            $arsips = $arsips->where('status', 2);
        }

        if (auth()->user()->handle_semua_arsip) {
            if ($request->level) {
                $arsips = $arsips->where('level', $request->level);
            }
        } else {
            $arsips = $arsips->where('level', 2);
        }

        if (in_array($request->sort, ['terbaru', 'terlama', 'terpopuler', 'baru-diupload'])) {
            if ($request->sort == 'terbaru') {
                $arsips = $arsips->orderByDesc('tanggal');
            }
            if ($request->sort == 'terlama') {
                $arsips = $arsips->orderBy('tanggal');
            }
            if ($request->sort == 'terpopuler') {
                $arsips = $arsips->orderByDesc('viewers');
            }
            if ($request->sort == 'baru-diupload') {
                $arsips = $arsips->orderByDesc('created_at');
            }
        } else {
            $arsips = $arsips->orderByDesc('created_at');
        }
        
        $arsips = $arsips->paginate(10)->withQueryString();
        return view('pages.admin.arsip.index', [
            'arsips' => $arsips,
            'search' => $request->search,
            'status' => $request->status ?? 2,
            'level' => $request->level,
            'sort' => $request->sort ?? 'baru-diupload',
            'stats_dipublikasi' => Arsip::where('status', 2)->count(),
            'stats_draft' => Arsip::where('status', 1)->count(),
            'stats_publik' => Arsip::where('level', 2)->whereIn('status', [1, 2])->count(),
            'stats_rahasia' => Arsip::where('level', 1)->whereIn('status', [1, 2])->count(),
        ]);
    }

    public function create(Request $request)
    {
        $lastArsip = Arsip::orderByDesc('nomor')->first();
        $klasifikasis = Klasifikasi::orderBy('kode')->get();

        return view('pages.admin.arsip.create', [
            'klasifikasis' => $klasifikasis,
            'lastArsip' => $lastArsip,
            'klasifikasiID' => $request->klasifikasi_id
        ]);
    }

    public function store(Request $request)
    {
        $arsip = Arsip::create($request->all());

        if ($request->redirect && $request->redirect == 'klasifikasi.show') {
            return redirect()->to(route('klasifikasi.show', ['klasifikasi' => $request->klasifikasi_id]))->with('success', 'Arsip berhasil disimpan');
        }

        return redirect()->to(route('arsip.show', ['arsip' => $arsip->id]))->with('success', 'Arsip berhasil disimpan');
    }


    public function show(Arsip $arsip, Request $request)
    {
        if (!auth()->user()->handle_semua_arsip && $arsip->level == 1) {
            return redirect()->to(route('arsip'));
        }
        $klasifikasis = Klasifikasi::orderBy('kode')->get();

        return view('pages.admin.arsip.show', [
            'arsip' => $arsip,
            'klasifikasis' => $klasifikasis
        ]);
    }

    public function update(Arsip $arsip, Request $request)
    {
        $arsip->update($request->all());

        return redirect()->back()->with('success', 'Arsip berhasil diupdate.');
    }

    public function lampiranStore(Arsip $arsip, Request $request)
    {
        if ($request->hasFile('files')) {
            $request->validate([
                'files.*' => 'required|mimes:jpeg,jpg,png,pdf',
            ]);
            foreach ($request->file('files') as $file) {
                $name = $file->getClientOriginalName().\Str::random(8).'.'.$file->getClientOriginalExtension();
                
                
                $thumb = \Image::make($file);
                // save thumbnail
                $thumb->resize(360, 360, function ($constraint) { // https://image.intervention.io/v2/api/resize
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('assets/thumbnails/'.$name); // https://image.intervention.io/v2/api/save

                // save origin using watermark
                $img = \Image::make($file);
                $watermark = \Image::make('assets/images/wm_.png');
                $img->resize(1920, 1920, function ($constraint) { // https://image.intervention.io/v2/api/resize
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->insert($watermark, 'center') // https://image.intervention.io/v2/api/insert
                ->save('assets/uploads/'.$name); // https://image.intervention.io/v2/api/save
                
                $arsip->lampirans()->create([
                    'type' => $file->getClientMimeType(),
                    'url' => '/uploads/'.$name,
                    'thumb' => '/thumbnails/'.$name,
                    'arsip_id' => $arsip->id,
                    'admin_id' => 1,
                    'created_at' => date('c'),
                    'updated_at' => date('c'),
                ]);
            }

            return redirect()->back()->with('success', 'Lampiran berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat upload lampiran.');
    }

    public function lampiranDestroy(Arsip $arsip, Lampiran $lampiran, Request $request)
    {
        if (\Storage::exists($lampiran->url)) {
            \Storage::delete($lampiran->url);
        }

        $lampiran->delete();

        return redirect()->back()->with('success', 'Lampiran berhasil dihapus.');
    }
}
