<?php

namespace App\Http\Controllers;

use View;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Exports\GuruExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class GuruController extends Controller
{
    //
    public function index()
    {
        $gurus = Guru::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();


        return view(
            'admin.guru.index',
            [
                // 'gurus' => Guru::all(),
                'gurus' => $gurus,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.guru.create', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required',
            'nik' => 'required',
            'foto' => 'nullable|image|file|max:2024',
            'jenjang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-guru', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Guru::create($validatedData);
        return redirect('/guru')->with('success', 'postingan anda berhasil ditambahkan');
    }

    public function show($id)
    {
        $gurus = Guru::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.guru.show', [
            'gurus' => $gurus,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function edit($id)
    {
        $gurus = Guru::find($id);
        //---Menampilkan Data ------//
        return view('admin.guru.edit', [
            'gurus' => $gurus,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $gurus = Guru::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required',
            'nik' => 'required',
            'foto' => 'image|file|max:2024',
            'jenjang' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        //---- Image delete --------//
        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto'] = $request->file('foto')->store('foto-guru', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Guru::where('id', $gurus->id)->update($validatedData);
        return redirect('/guru')->with('success', 'postingan anda berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);
        //---Image Delete---//
        if ($guru->foto) {
            Storage::delete($guru->foto);
        }
        //----------------//
        Guru::destroy($guru->id);
        return redirect('/guru')->with('destroy', 'Data Berhasil di hapus');
    }



    public function guruexportexcel()
    {

        $data = Guru::select('id', 'nama_lengkap', 'alamat', 'email', 'nik', 'no_hp', 'jenjang') // Contoh filter berdasarkan jenis kelamin Laki-laki
            ->get();

        // $data = Guru::all(); // Ganti dengan query data guru Anda

        return Excel::download(new GuruExport($data), 'laporan-guru.xlsx');
    }


    // public function guruexportpdf() {
    //     $data = Guru::all();

    //     view()->share('data', $data);

    //     $pdf = PDF::loadview('admin.guru.dataguru-pdf');

    //     return $pdf->download('dataguru.pdf');

    // }

    public function guruexportpdf()
    {
        $data = Guru::all();
        // view()->share('data', $data);

        $data = Pdf::loadView('admin.guru.dataguru-pdf', compact('data'));
        return $data->download('laporan-data-guru.pdf');
    }
}
