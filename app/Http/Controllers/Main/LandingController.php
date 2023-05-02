<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Arsip;

class LandingController extends Controller
{
    public function index()
    {
        $todayArsips = Arsip::where('level', 2)
            ->where('status', 2)
            ->where('tanggal', 'like', '%-'.date('m-d', time()))
            ->get();
        return view('pages.main.landing.index', [
            'todayArsips' => $todayArsips
        ]);
    }
}
