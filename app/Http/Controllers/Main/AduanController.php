<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aduan;

class AduanController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'captcha' => 'required|captcha',
            'name' => 'required',
            'email' => 'required|email',
            'aduan' => 'required|max:1000'
        ];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'error' => 'Verifikasi salah.',
                'error_ref' => 'modal',
            ]);
        }

        $kode = time().rand(1000, 9999);
        $aduan = Aduan::create([
            'kode' => $kode,
            'nama' => $request->name,
            'email' => $request->email,
            'aduan' => $request->aduan,
            'status' => 1
        ]);

        return redirect()->to(route('main.aduan.show', ['aduan' => $aduan]))
            ->with('success', 'Pesan berhasil dikirimkan');
    }

    public function show(Aduan $aduan, Request $request)
    {
        return view('pages.main.aduan.show', [
            'aduan' => $aduan
        ]);
    }
}
