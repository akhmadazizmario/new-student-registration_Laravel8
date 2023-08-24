<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
    public function index() {
        $blog = Blog::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view(
            'admin.blog.index', [
                'blog' => $blog,
                'user' => $user,
            ]
        );
    }

    public function create()
    {
        // menambahkan
        return view('admin.blog.create', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'foto' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',
        ]);

        //--- create image ke folder post-images--///
        if ($request->file('foto_blog')) {
            $validatedData['foto_blog'] = $request->file('foto_blog')->store('foto-blog', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Blog::create($validatedData);
        return redirect('/blog')->with('success', 'postingan anda berhasil ditambahkan');
    }

    public function show($id)
    {
        $blog = Blog::find($id); // eloquent find
        //Menampilkan Data
        return view('admin.blog.show', [
            'blog' => $blog,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        //---Menampilkan Data ------//
        return view('admin.blog.edit', [
            'blog' => $blog,
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        //-- Eksekusi update ---//
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'foto' => 'nullable|image|file|max:2024',
            'deskripsi' => 'required',
        ]);
        //---- Image delete --------//
        if ($request->file('foto_blog')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            //--- mengupdate gambar ---//
            $validatedData['foto_blog'] = $request->file('foto_blog')->store('foto-blog', 'public');
        }
        ////-----------------///
        $validatedData['user_id'] = auth()->user()->id;

        Blog::where('id', $blog->id)->update($validatedData);
        return redirect('/blog')->with('success', 'postingan anda berhasil diupdate');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        //---Image Delete---//
        if ($blog->foto) {
            Storage::delete($blog->foto);
        }
        //----------------//
        Blog::destroy($blog->id);
        return redirect('/blog')->with('destroy', 'Data Berhasil di hapus');
    }

}
