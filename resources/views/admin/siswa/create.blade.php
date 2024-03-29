@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Created Data Siswa</strong>
                <a class="btn btn-sm btn-danger float-right rounded" href="/siswa"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/siswa" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">nama lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                @error('nama_lengkap') is-invalid @enderror required autofocus
                                value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">nik</label>
                            <input type="number" class="form-control" id="nik" name="nik"
                                @error('nik') is-invalid @enderror required autofocus value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">tempat lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                @error('tempat_lahir') is-invalid @enderror required autofocus value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">tgl_lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                @error('tgl_lahir') is-invalid @enderror required autofocus value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">alamat</label>
                            @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="alamat" type="hidden" name="alamat" value="{{ old('alamat') }}">
                            <trix-editor class="bg-white" input="alamat"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="ayah" class="form-label">nama ayah</label>
                            <input type="text" class="form-control" id="ayah" name="ayah"
                                @error('ayah') is-invalid @enderror required autofocus value="{{ old('ayah') }}">
                            @error('ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ibu" class="form-label">nama ibu</label>
                            <input type="text" class="form-control" id="ibu" name="ibu"
                                @error('ibu') is-invalid @enderror required autofocus value="{{ old('ibu') }}">
                            @error('ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan_ayah" class="form-label">pekerjaan ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                @error('pekerjaan_ayah') is-invalid @enderror required autofocus value="{{ old('pekerjaan_ayah') }}">
                            @error('pekerjaan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan_ibu" class="form-label">pekerjaan_ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                @error('pekerjaan_ibu') is-invalid @enderror required autofocus value="{{ old('pekerjaan_ibu') }}">
                            @error('pekerjaan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">no hp</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                @error('no_hp') is-invalid @enderror required autofocus value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="">:: Pilih Agama ::</option>
                                <option value="islam">islam</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">:: Pilih Jenis Kelamin ::</option>
                                <option value="L">laki-laki</option>
                                <option value="P">perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"></label>
                            <input type="hidden" class="form-control" id="status" name="status"
                                 value="diproses">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">upload foto</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control" type="file" id="foto" name="foto"
                                @error('foto') is-invalid @enderror onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Tambah Data Siswa</button>
                            <a href="/guru" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
