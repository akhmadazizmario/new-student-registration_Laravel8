<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontDaftarController extends Controller
{
    
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.selamat',
            [
                'pengaturan' => $dataPengaturan,
            ]
        );
    }
    
    public function create()
    {
        // menambahkan
        $dataPengaturan = Pengaturan::all();
        return view('front.daftarsiswa', [
            'pengaturan' => $dataPengaturan,
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
        return redirect('/daftarsiswa')->with('success', 'postingan anda berhasil ditambahkan');
    }
}
