<?php

namespace App\Http\Controllers;

use App\Exports\SuratMasukExport;
use App\Models\User;
use App\Models\SuratMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    //
    //
    public function index()
    {
        $suratmasuk = SuratMasuk::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view(
            'admin.suratmasuk.index',
            [

                'suratmasuk' => $suratmasuk,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.suratmasuk.create', [
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'filepdf' => 'nullable|mimes:pdf|file|max:2024',
            'penerima' => 'required',
            'perihal' => 'required',
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('filepdf')) {
            $validatedData['filepdf'] = $request->file('filepdf')->store('file-surat-masuk', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SuratMasuk::create($validatedData);
        return redirect('/suratmasuk')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {

        //
        $suratmasuk = SuratMasuk::find($id);
        //---Menampilkan Data ------//
        return view('admin.suratmasuk.edit', [
            'suratmasuk' => $suratmasuk,
            'user' => User::where('id', Auth::user()->id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratmasuk = SuratMasuk::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'pengirim' => 'required',
            'filepdf' => 'nullable|mimes:pdf|file|max:2024',
            'penerima' => 'required',
            'perihal' => 'required',
        ]);
        //---- Image delete --------//
        if ($request->file('filepdf')) {
            if ($request->oldPdf) {
                Storage::delete($request->oldPdf);
            }
            //--- mengupdate gambar ---//
            $validatedData['filepdf'] = $request->file('filepdf')->store('file-surat-masuk', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        SuratMasuk::where('id', $suratmasuk->id)->update($validatedData);
        return redirect('/suratmasuk')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $suratmasuk = SuratMasuk::find($id);
        //---Image Delete---//
        if ($suratmasuk->filepdf) {
            Storage::delete($suratmasuk->filepdf);
        }
        //----------------//
        SuratMasuk::destroy($suratmasuk->id);
        return redirect('/suratmasuk')->with('destroy', 'Data Berhasil di hapus');
    }

    public function suratmasukexportpdf()
    {
        $suratmasuk = SuratMasuk::count();
        $data = SuratMasuk::all();
        $viewData = [
            'suratmasuk' => $suratmasuk,
            'data' => $data,
        ];

        $data = Pdf::loadView('admin.suratmasuk.datasuratmasuk-pdf', $viewData);
        return $data->download('laporan-data-suratmasuk.pdf');
    }

    public function suratmasukexportexcel()
    {

        $data = SuratMasuk::select(
            'id',
            'no_surat',
            'pengirim',
            'penerima',
            'perihal',
            'created_at'
        )->get();

        // 

        return Excel::download(new SuratMasukExport($data), 'laporan-surat-masuk.xlsx');
    }

}
