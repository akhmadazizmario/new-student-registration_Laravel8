<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class Frontquran extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'quran.index',
            [
                'pengaturan' => $dataPengaturan
            ]
        );
    }

    public function show()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'quran.surat',
            [
                'pengaturan' => $dataPengaturan,
            ]
        );
    }
}
