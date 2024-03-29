<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Eskul;
use App\Models\Galeri;
use App\Models\Pengaturan;
use App\Models\Prestasi;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        $galeri = Galeri::take(8)->get();
        $blog = Blog::take(4)->get();
        $prestasi = Prestasi::take(8)->get();
        $review = Review::all();
        return view(
            'front.index',
            [
                'pengaturan' => $dataPengaturan,
                'galeri' => $galeri,
                'blog' => $blog,
                'prestasi' => $prestasi,
                'review' => $review,
            ]
        );
    }

    public function tentangkami()
    {
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.tentangkami',
            [
                'pengaturan' => $dataPengaturan,
            ]
        );
    }

    // public function blogku()
    // {
    //     $dataPengaturan = Pengaturan::all();
    //     $searchQuery = request('search');

    //     // Lakukan pencarian berdasarkan judul blog yang mengandung kata kunci tertentu
    //     $blog = Blog::where('judul', 'like', '%' . $searchQuery . '%')
    //         ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%')
    //         ->get();
    //     return view(
    //         'front.blogku',
    //         [
    //             'pengaturan' => $dataPengaturan,
    //             'blogku' => $blog,
    //         ]
    //     );
    // }

    public function galeriku()
    {
        $dataPengaturan = Pengaturan::all();
        $galeriku = Galeri::all();
        return view('front.galeriku', [
            'pengaturan' => $dataPengaturan,
            'galeri' => $galeriku,
        ]);
    }

    // public function prestasiku()
    // {
    //     $dataPengaturan = Pengaturan::all();
    //     $searchQuery = request('search');

    //     // Lakukan pencarian berdasarkan judul blog yang mengandung kata kunci tertentu
    //     $prestasiku = Prestasi::where('nama_prestasi', 'like', '%' . $searchQuery . '%')
    //         ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%')
    //         ->get();
    //     return view(
    //         'front.prestasiku',
    //         [
    //             'pengaturan' => $dataPengaturan,
    //             'prestasiku' => $prestasiku,
    //         ]
    //     );
    // }

    // public function eskulku()
    // {
    //     $dataPengaturan = Pengaturan::all();
    //     $eskulku =  Eskul::all();
    //     return view(
    //         'front.ekstrakulikulerku',
    //         [
    //             'pengaturan' => $dataPengaturan,
    //             'eskulku' => $eskulku,
    //         ]
    //     );
    // }
}
