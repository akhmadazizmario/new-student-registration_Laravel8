<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UbahPasswordController extends Controller
{
    //
    public function show()
    {
        //Menampilkan Data.......
        return view('admin.profil.ubahpassword', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $post
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //---Menampilkan Data ------//
        return view('admin.profil.ubahpassword', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, User $user)
    {
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'password' => 'required',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::where('id', Auth::user()->id)->first()->update($validatedData);
        return redirect('/profil')->with('success', 'profil anda berhasil diupdate');
    }
}
