<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    //
    public function index() {
        $prestasi = Prestasi::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.prestasi.index', [
                'prestasi' => $prestasi,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.prestasi.create', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_prestasi' => 'required|max:255',
            'nama_lengkap' => 'required|max:255',
            'foto_prestasi' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto_prestasi')) {
            $validatedData['foto_prestasi'] = $request->file('foto_prestasi')->store('foto-prestasi', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Prestasi::create($validatedData);
        return redirect('/prestasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $prestasi = Prestasi::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.prestasi.show', [
            'prestasi' => $prestasi,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function edit($id)
    {
        $prestasi = Prestasi::find($id);
        //---Menampilkan Data ------//
        return view('admin.prestasi.edit', [
            'prestasi' => $prestasi,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'nama_prestasi' => 'required|max:255',
            'nama_lengkap' => 'required|max:255',
            'foto_prestasi' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',
        ]);
        //---- Image delete --------//
        if ($request->file('foto_prestasi')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto_prestasi'] = $request->file('foto_prestasi')->store('foto-prestasi', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Prestasi::where('id', $prestasi->id)->update($validatedData);
        return redirect('/prestasi')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        //---Image Delete---//
        if ($prestasi->foto) {
            Storage::delete($prestasi->foto);
        }
        //----------------//
        Prestasi::destroy($prestasi->id);
        return redirect('/prestasi')->with('destroy', 'Data Berhasil di hapus');
    }
}
