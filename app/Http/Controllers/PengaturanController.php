<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    //
    public function index()
    {
        $pengaturan = Pengaturan::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.pengaturan.index',
            [
                'pengaturan' => $pengaturan,
                'user' => $user,
            ]
        );
    }

    public function edit($id)
    {
        $pengaturan = Pengaturan::find($id);
        //---Menampilkan Data ------//
        return view('admin.pengaturan.edit', [
            'pengaturan' => $pengaturan,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengaturan = Pengaturan::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'kepala_sekolah' => 'required',
            'foto_kplsekolah' => 'nullable|image|file|max:2024',
            'sambutan' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'grup_wa' => 'required',
            'foto_brosur' => 'nullable|image|file|max:2024', // Add the maximum file size here.
            'tgl_pendaftaran_awal' => 'required',
            'tgl_pendaftaran_akhir' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
        ]);

        //---- Image delete for foto_kplsekolah --------//
        if ($request->file('foto_kplsekolah')) {
            if ($request->oldImage_kplsekolah) {
                Storage::delete($request->oldImage_kplsekolah); // Use oldImage_kplsekolah instead of oldImage.
            }
            //--- mengupdate gambar foto_kplsekolah ---//
            $validatedData['foto_kplsekolah'] = $request->file('foto_kplsekolah')->store('foto-kepala_sekolah', 'public');
        }

        //---- Image delete for foto_brosur --------//
        if ($request->file('foto_brosur')) {
            if ($request->oldImage_brosur) {
                Storage::delete($request->oldImage_brosur); // Use oldImage_brosur instead of oldImage.
            }
            //--- mengupdate gambar foto_brosur ---//
            $validatedData['foto_brosur'] = $request->file('foto_brosur')->store('foto-brosur', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Pengaturan::where('id', $pengaturan->id)->update($validatedData);
        return redirect('/pengaturan')->with('success', 'pengaturan anda berhasil diupdate');
    }

    public function show()
    {
        $pengaturan = Pengaturan::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.pengaturan.index',
            [
                'pengaturan' => $pengaturan,
                'user' => $user,
            ]
        );
    }
}
