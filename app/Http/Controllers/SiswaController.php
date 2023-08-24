<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas = Siswa::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view(
            'admin.siswa.index',
            [

                'siswas' => $siswas,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.siswa.create', [
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'foto' => 'nullable|image|file|max:2024',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'status' => 'required'
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto-siswa', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Siswa::create($validatedData);
        return redirect('/siswa')->with('success', 'postingan anda berhasil ditambahkan');
    }

    public function show($id)
    {
        //
        $siswas = Siswa::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.siswa.show', [
            'siswas' => $siswas,
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function edit($id)
    {

        //
        $siswas = Siswa::find($id);
        //---Menampilkan Data ------//
        return view('admin.siswa.edit', [
            'siswas' => $siswas,
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $siswas = Siswa::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'foto' => 'nullable|image|file|max:2024',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'status' => 'required'
        ]);
        //---- Image delete --------//
        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto'] = $request->file('foto')->store('foto-siswa', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Siswa::where('id', $siswas->id)->update($validatedData);
        return redirect('/siswa')->with('success', 'postingan anda berhasil diupdate');
    }

    public function destroy($id)
    {
        $siswas = Siswa::find($id);
        //---Image Delete---//
        if ($siswas->foto) {
            Storage::delete($siswas->foto);
        }
        //----------------//
        Siswa::destroy($siswas->id);
        return redirect('/siswa')->with('destroy', 'Data Berhasil di hapus');
    }


    public function siswaexportexcel()
    {

        $data = Siswa::select(
            'id',
            'nama_lengkap',
            'alamat',
            'nik',
            'no_hp',
            'tempat_lahir',
            'tgl_lahir',
            'jenis_kelamin',
            'ayah',
            'ibu',
            'agama',
            'pekerjaan_ayah',
            'pekerjaan_ibu',
            'status'
        )->get();

        // 

        return Excel::download(new SiswaExport($data), 'laporan-siswa.xlsx');
    }


    public function siswaexportpdf()
    {
        $siswabaru = Siswa::count();
        $data = Siswa::all();
        $viewData = [
            'siswabaru' => $siswabaru,
            'data' => $data,
        ];

        $data = Pdf::loadView('admin.siswa.datasiswa-pdf', $viewData);
        return $data->download('laporan-data-siswa.pdf');
    }
}
