@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Created Data Surat keluar</strong>
                <a class="btn btn-sm btn-danger float-right rounded" href="/suratkeluar"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/suratkeluar" class="mb-5" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="filepdf" class="form-label">Upload File PDF</label>
                            <input type="file" class="form-control" id="filepdf" name="filepdf" accept=".pdf">
                            @error('filepdf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_surat" class="form-label">nomor surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                @error('no_surat') is-invalid @enderror required autofocus
                                value="{{ old('no_surat') }}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pengirim" class="form-label">nama pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                @error('pengirim') is-invalid @enderror required autofocus value="{{ old('pengirim') }}">
                            @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tujuan" class="form-label">tujuan</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan"
                                @error('tujuan') is-invalid @enderror required autofocus value="{{ old('tujuan') }}">
                            @error('tujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"
                                @error('perihal') is-invalid @enderror required autofocus value="{{ old('perihal') }}">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Tambah Data Surat Keluar</button>
                            <a href="/suratkeluar" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection