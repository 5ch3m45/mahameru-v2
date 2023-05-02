<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin.profile.index');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->update($request->only(['name', 'email', 'phone', 'company']));

        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(auth()->id());

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirm' => 'required|same:new_password'
        ]);

        if(!\Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak tepat.');
        }

        $user->update([
            'password' => \Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
