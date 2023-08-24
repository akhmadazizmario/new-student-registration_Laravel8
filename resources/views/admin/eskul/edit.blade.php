@extends('admin.layout.main')

@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Edit Ekstrakulikuler</strong>
                <a class="btn btn-sm btn-warning float-right rounded" href="/eskul"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/eskul/{{ $eskul->id }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_eskul" class="form-label">nama_eskul</label>
                            <input type="text" class="form-control" id="nama_eskul" name="nama_eskul"
                                @error('nama_eskul') is-invalid @enderror required autofocus
                                value="{{ old('nama_eskul', $eskul->nama_eskul) }}">
                            @error('nama_eskul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">deskripsi</label>
                            @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="deskripsi" type="hidden" name="deskripsi"
                                value="{{ old('deskripsi', $eskul->deskripsi) }}">
                            <trix-editor class="bg-white" input="deskripsi"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="foto_eskul" class="form-label">Edit Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $eskul->foto_eskul }}">
                            @if ($eskul->foto_eskul)
                                <img src="{{ asset('storage/' . $eskul->foto_eskul) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto_eskul" name="foto_eskul"
                                @error('foto_eskul') is-invalid @enderror onchange="previewImage()">
                            @error('foto_eskul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit </button>
                            <a href="/eskul" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
