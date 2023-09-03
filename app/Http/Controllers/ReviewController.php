<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view(
            'admin.review.index',
            [
                'review' => $review,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.review.create', [
            'user' => User::where('id', Auth::user()->id)->first()
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

        $validatedData['user_id'] = auth()->user()->id;

        Review::create($validatedData);
        return redirect('/review')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $review = Review::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.review.show', [
            'review' => $review,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function destroy($id)
    {
        $review = Review::find($id);

        //----------------//
        Review::destroy($review->id);
        return redirect('/review')->with('destroy', 'Data Berhasil di hapus');
    }
}
