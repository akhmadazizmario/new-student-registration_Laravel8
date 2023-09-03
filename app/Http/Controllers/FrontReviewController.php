<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontReviewController extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.reviewku',
            [
                'pengaturan' => $dataPengaturan,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        $dataPengaturan = Pengaturan::all();
        return view('front.reviewku', [
            'pengaturan' => $dataPengaturan,
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'sebagai' => 'required',
            'deskripsi' => 'required',
        ]);

        $validatedData['user_id'] = 1;

        Review::create($validatedData);
        return redirect('/reviewku/show')->with('success', 'Data berhasil ditambahkan');
    }

    public function show()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.thanksyou',
            [
                'pengaturan' => $dataPengaturan,
            ]
        );
    }

}
