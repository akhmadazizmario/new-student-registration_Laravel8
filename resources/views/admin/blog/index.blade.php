@extends('admin.layout.main')

@section('container')
    <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                @if (session()->has('success'))
                    <div class="alert alert-primary col-lg-8">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('destroy'))
                    <div class="alert alert-success col-lg-8">
                        {{ session('destroy') }}
                    </div>
                @endif
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <strong class="card-title text-white">Data Blog</strong>
                    <a class="btn btn-sm btn-primary float-right rounded " href="/blog/create"> <i
                            class="bi bi-person-plus"></i>
                        Tambah Data Blog </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>judul</th>
                                    <th>dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blog as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($b->foto_blog)
                                                <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $b->foto_blog) }}" alt="gambar"
                                                        class="img-fluid mt-3">
                                                </div>
                                            @else
                                                <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                                    class="img-fluid mt-3">
                                            @endif
                                        </td>
                                        <td>{{ $b->judul }}</td>
                                        <td>{!! $b->created_at !!}</td>
                                        <td>
                                            <center>
                                                <a href="/blog/{{ $b->id }}"
                                                    class="btn btn-info text-decoration-none text-white">
                                                    <i class="bi bi-eyeglasses"></i> lihat</a>
                                                <a href="/blog/{{ $b->id }}/edit"
                                                    class="btn btn-warning text-decoration-none text-white">
                                                    <i class="bi bi-pencil-square"></i> edit</a>

                                                <form action="/blog/{{ $b->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0"
                                                        onclick="return confirm('apakah kamu serius untuk menghapus?')">
                                                        <i class="bi bi-trash3"></i>
                                                        Hapus</button>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
