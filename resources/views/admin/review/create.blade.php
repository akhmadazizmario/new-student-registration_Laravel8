@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Created Review</strong>
                <a class="btn btn-sm btn-danger float-right rounded" href="/review"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/review" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">nama lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                @error('nama') is-invalid @enderror required autofocus value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sebagai" class="form-label">review sebagai</label>
                            <select class="form-control" name="sebagai" id="sebagai" required>
                                <option value="">:: Pilih ::</option>
                                <option value="orang tua siswa">Orang Tua Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="alumni">Alumni</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">:: Pilih ::</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">deskripsi</label>
                            @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                            <trix-editor class="bg-white" input="deskripsi"></trix-editor>
                        </div>


                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Tambah Review</button>
                            <a href="/review" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
