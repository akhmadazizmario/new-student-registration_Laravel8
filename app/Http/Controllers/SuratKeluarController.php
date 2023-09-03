<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SuratKeluarExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    //
    public function index()
    {
        $suratkeluar = SuratKeluar::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view(
            'admin.suratkeluar.index',
            [

                'suratkeluar' => $suratkeluar,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.suratkeluar.create', [
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'filepdf' => 'nullable|mimes:pdf|file|max:5120',
            'tujuan' => 'required',
            'perihal' => 'required',
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('filepdf')) {
            $validatedData['filepdf'] = $request->file('filepdf')->store('file-surat-keluar', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SuratKeluar::create($validatedData);
        return redirect('/suratkeluar')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {

        //
        $suratkeluar = SuratKeluar::find($id);
        //---Menampilkan Data ------//
        return view('admin.suratkeluar.edit', [
            'suratkeluar' => $suratkeluar,
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratkeluar = SuratKeluar::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'filepdf' => 'nullable|mimes:pdf|file|max:5120',
            'tujuan' => 'required',
            'perihal' => 'required',
        ]);
        //---- Image delete --------//
        if ($request->file('filepdf')) {
            if ($request->oldPdf) {
                Storage::delete($request->oldPdf);
            }
            //--- mengupdate gambar ---//
            $validatedData['filepdf'] = $request->file('filepdf')->store('file-surat-keluar', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        SuratKeluar::where('id', $suratkeluar->id)->update($validatedData);
        return redirect('/suratkeluar')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $suratkeluar = SuratKeluar::find($id);
        //---Image Delete---//
        if ($suratkeluar->filepdf) {
            Storage::delete($suratkeluar->filepdf);
        }
        //----------------//
        SuratKeluar::destroy($suratkeluar->id);
        return redirect('/suratkeluar')->with('destroy', 'Data Berhasil di hapus');
    }

    public function suratkeluarexportpdf()
    {
        $suratkeluar = SuratKeluar::count();
        $data = SuratKeluar::all();
        $viewData = [
            'suratkeluar' => $suratkeluar,
            'data' => $data,
        ];

        $data = Pdf::loadView('admin.suratkeluar.datasuratkeluar-pdf', $viewData);
        return $data->download('laporan-data-suratkeluar.pdf');
    }

    public function suratkeluarexportexcel()
    {

        $data = SuratKeluar::select(
            'id',
            'no_surat',
            'pengirim',
            'tujuan',
            'perihal',
            'created_at'
        )->get();

        // 

        return Excel::download(new SuratKeluarExport($data), 'laporan-surat-keluar.xlsx');
    }

}
