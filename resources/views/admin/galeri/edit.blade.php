@extends('admin.layout.main')

@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Edit Galeri</strong>
                <a class="btn btn-sm btn-warning float-right rounded" href="/galeri"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/galeri/{{ $galeri->id }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                @error('judul') is-invalid @enderror required autofocus
                                value="{{ old('judul', $galeri->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_galeri" class="form-label">Edit Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $galeri->foto_galeri }}">
                            @if ($galeri->foto_galeri)
                                <img src="{{ asset('storage/' . $galeri->foto_galeri) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto_galeri" name="foto_galeri"
                                @error('foto_galeri') is-invalid @enderror onchange="previewImage()">
                            @error('foto_galeri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit </button>
                            <a href="/galeri" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
