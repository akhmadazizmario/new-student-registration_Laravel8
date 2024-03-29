<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class FrontPrestasikuController extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        $searchQuery = request('search');

        // Lakukan pencarian berdasarkan judul blog yang mengandung kata kunci tertentu
        $prestasiku = Prestasi::where('nama_prestasi', 'like', '%' . $searchQuery . '%')
            ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%')
            ->get();
        return view(
            'front.prestasiku',
            [
                'pengaturan' => $dataPengaturan,
                'prestasiku' => $prestasiku,
            ]
        );
    }

    public function show($id)
    {
        $prestasiku = Prestasi::find($id);
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.lihatprestasiku',
            [
                'pengaturan' => $dataPengaturan,
                'prestasiku' => $prestasiku,
            ]
        );
    }
}
