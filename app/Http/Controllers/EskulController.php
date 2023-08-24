<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EskulController extends Controller
{
    //
    public function index() {
        $eskul = Eskul::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.eskul.index', [
                'eskul' => $eskul,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.eskul.create', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_eskul' => 'required|max:255',
            'foto_eskul' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',

        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto_eskul')) {
            $validatedData['foto_eskul'] = $request->file('foto_eskul')->store('foto-eskul', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Eskul::create($validatedData);
        return redirect('/eskul')->with('success', 'postingan anda berhasil ditambahkan');
    }

    public function show($id)
    {
        $eskul = Eskul::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.eskul.show', [
            'eskul' => $eskul,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function edit($id)
    {
        $eskul = Eskul::find($id);
        //---Menampilkan Data ------//
        return view('admin.eskul.edit', [
            'eskul' => $eskul,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $eskul = Eskul::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'nama_eskul' => 'required|max:255',
            'foto_eskul' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',
        ]);
        //---- Image delete --------//
        if ($request->file('foto_eskul')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto_eskul'] = $request->file('foto_eskul')->store('foto-eskul', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Eskul::where('id', $eskul->id)->update($validatedData);
        return redirect('/eskul')->with('success', 'postingan anda berhasil diupdate');
    }

    public function destroy($id)
    {
        $eskul = Eskul::find($id);
        //---Image Delete---//
        if ($eskul->foto) {
            Storage::delete($eskul->foto);
        }
        //----------------//
        Eskul::destroy($eskul->id);
        return redirect('/eskul')->with('destroy', 'Data Berhasil di hapus');
    }
}
