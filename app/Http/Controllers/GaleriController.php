<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    //
    public function index() {
        $galeri = Galeri::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.galeri.index', [
                'galeri' => $galeri,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.galeri.create', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'foto' => 'nullable|image|file|max:2024',
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto_galeri')) {
            $validatedData['foto_galeri'] = $request->file('foto_galeri')->store('foto-galeri', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Galeri::create($validatedData);
        return redirect('/galeri')->with('success', 'postingan anda berhasil ditambahkan');
    }

    public function show($id)
    {
        $galeri = Galeri::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.galeri.show', [
            'galeri' => $galeri,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function edit($id)
    {
        $galeri = Galeri::find($id);
        //---Menampilkan Data ------//
        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'foto' => 'nullable|image|file|max:2024',
        ]);
        //---- Image delete --------//
        if ($request->file('foto_galeri')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto_galeri'] = $request->file('foto_galeri')->store('foto-galeri', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Galeri::where('id', $galeri->id)->update($validatedData);
        return redirect('/galeri')->with('success', 'postingan anda berhasil diupdate');
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        //---Image Delete---//
        if ($galeri->foto) {
            Storage::delete($galeri->foto);
        }
        //----------------//
        Galeri::destroy($galeri->id);
        return redirect('/galeri')->with('destroy', 'Data Berhasil di hapus');
    }
}
