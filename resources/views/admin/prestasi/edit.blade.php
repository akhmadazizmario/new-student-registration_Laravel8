@extends('admin.layout.main')

@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Edit Prestasi</strong>
                <a class="btn btn-sm btn-warning float-right rounded" href="/prestasi"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/prestasi/{{ $prestasi->id }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_prestasi" class="form-label">nama_prestasi</label>
                            <input type="text" class="form-control" id="nama_prestasi" name="nama_prestasi"
                                @error('nama_prestasi') is-invalid @enderror required autofocus
                                value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}">
                            @error('nama_prestasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">nama peraih</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                @error('nama_lengkap') is-invalid @enderror required autofocus
                                value="{{ old('nama_lengkap', $prestasi->nama_lengkap) }}">
                            @error('nama_lengkap')
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
                                value="{{ old('deskripsi', $prestasi->deskripsi) }}">
                            <trix-editor class="bg-white" input="deskripsi"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="foto_prestasi" class="form-label">Edit Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $prestasi->foto_prestasi }}">
                            @if ($prestasi->foto_prestasi)
                                <img src="{{ asset('storage/' . $prestasi->foto_prestasi) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto_prestasi" name="foto_prestasi"
                                @error('foto_prestasi') is-invalid @enderror onchange="previewImage()">
                            @error('foto_prestasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit </button>
                            <a href="/guru" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
