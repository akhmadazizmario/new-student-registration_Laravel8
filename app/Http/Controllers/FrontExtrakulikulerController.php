<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class FrontExtrakulikulerController extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        $eskulku =  Eskul::all();
        return view(
            'front.ekstrakulikulerku',
            [
                'pengaturan' => $dataPengaturan,
                'eskulku' => $eskulku,
            ]
        );
    }

    public function show($id)
    {
        $eskulku = Eskul::find($id);
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.lihateskulku',
            [
                'pengaturan' => $dataPengaturan,
                'eskulku' => $eskulku,
            ]
        );
    }
}
