<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //
    public function index()
    {
        return view(
            'admin.profil.index',
            [
                'user' => User::where('id', Auth::user()->id)->first()
            ]
        );
    }

    public function edit()
    {
        //---Menampilkan Data ------//
        return view('admin.profil.ubahprofil', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, User $user)
    {
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            // 'image' => 'image|file|max:2024',
        ]);

        //---- Image delete --------//
        // if ($request->file('image')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     //--- mengupdate gambar ---//
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }
        ////-----------------///
        $validatedData['id'] = auth()->user()->id;

        User::where('id', Auth::user()->id)->first()->update($validatedData);
        return redirect('/profil')->with('success', 'profil anda berhasil diupdate');
    }

    public function ubahpassword()
    {
        //--menampilkan Data ------//
        return view('admin.profil.ubahpassword', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }
}
