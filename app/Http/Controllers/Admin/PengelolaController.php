<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Arsip;
use App\User;
use App\UserGroup;

class PengelolaController extends Controller
{
    public function index(Request $request)
    {
        $pengelolas = User::query();

        if ($request->search) {
            $pengelolas = $pengelolas->where(function ($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->status && in_array($request->status, [1, 2])) {
            $pengelolas = $pengelolas->where('active', $request->status-1);
        } elseif ($request->status && $request->status == 'semua') {
            // default
        } else {
            $pengelolas = $pengelolas->where('active', 1);
        }

        return view('pages.admin.pengelola.index', [
            'pengelolas' => $pengelolas->orderBy('name')->paginate(10)->withQueryString(),
            'search' => $request->search,
            'status' => $request->status,
            'role' => $request->role
        ]);
    }
    
    public function create()
    {
        return view('pages.admin.pengelola.create');
    }

    public function store(Request $request)
    {
        $pengelola = User::create($request->only([
            'name', 'email', 'password', 'phone', 'company'
        ]));

        // update user group
        if ($request->groups) {
            foreach ($request->groups as $group) {
                if ($group == 2) {
                    UserGroup::updateOrCreate([
                        'user_id' => $pengelola->id,
                        'group_id' => 3
                    ], [
                        'updated_at' => date('c')
                    ]);
                }
                UserGroup::updateOrCreate([
                    'user_id' => $pengelola->id,
                    'group_id' => $group
                ], [
                    'updated_at' => date('c')
                ]);
            }
        }

        return redirect()->to(route('pengelola.show', compact('pengelola')))
            ->with('success', 'Pengelola berhasil diupdate.');
    }

    public function show(User $pengelola, Request $request)
    {
        $arsips = Arsip::where('admin_id', $pengelola->id);

        if ($request->search) {
            $arsips = $arsips->where('informasi', 'like', '%'.$request->search.'%');
        }
        
        if ($request->status) {
            $arsips = $arsips->where('status', $request->status);
        } else {
            $arsips = $arsips->where('status', 2);
        }

        if ($request->level) {
            $arsips = $arsips->where('level', $request->level);
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

        return view('pages.admin.pengelola.show', [
            'pengelola' => $pengelola,
            'arsips' => $arsips->paginate(10)->withQueryString(),
            'search' => $request->search,
            'status' => $request->status ?? 2,
            'level' => $request->level,
            'sort' => $request->sort ?? 'baru-diupload',
        ]);
    }

    public function update(User $pengelola, Request $request)
    {
        $pengelola->update($request->only('active'));

        // update user group
        UserGroup::where('user_id', $pengelola->id)->delete();
        if ($request->groups) {
            foreach ($request->groups as $group) {
                if ($group == 2) {
                    UserGroup::updateOrCreate([
                        'user_id' => $pengelola->id,
                        'group_id' => 3
                    ], [
                        'updated_at' => date('c')
                    ]);
                }
                UserGroup::updateOrCreate([
                    'user_id' => $pengelola->id,
                    'group_id' => $group
                ], [
                    'updated_at' => date('c')
                ]);
            }
        }

        return redirect()->back()->with('success', 'Pengelola berhasil diupdate.');
    }
}
