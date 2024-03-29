<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class FrontBlogController extends Controller
{
    //
    public function index()
    {
        $dataPengaturan = Pengaturan::all();
        $searchQuery = request('search');

        // Lakukan pencarian berdasarkan judul blog yang mengandung kata kunci tertentu
        $blog = Blog::where('judul', 'like', '%' . $searchQuery . '%')
            ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%')
            ->get();
        return view(
            'front.blogku',
            [
                'pengaturan' => $dataPengaturan,
                'blogku' => $blog,
            ]
        );
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        $dataPengaturan = Pengaturan::all();
        return view(
            'front.lihatblogku',
            [
                'pengaturan' => $dataPengaturan,
                'blogku' => $blog,
            ]
        );
    }
}
