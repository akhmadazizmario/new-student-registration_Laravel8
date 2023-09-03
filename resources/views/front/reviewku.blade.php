@extends('front.layout.main')

@section('container')
    <br><br><br>
    <main id="main">
        <section class="services mt-5">
            <div class="container">
                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-dark">
                            <strong class="card-title text-white">Review</strong>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @foreach ($pengaturan as $p)
                                    <form method="post" action="/reviewku" class="mb-5" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">nama lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                @error('nama') is-invalid @enderror required autofocus
                                                value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="sebagai" class="form-label">Review Sebagai ?</label>
                                            <select class="form-control" name="sebagai" id="sebagai" required>
                                                <option value="">:: Pilih ::</option>
                                                <option value="orang tua siswa">Orang Tua Siswa</option>
                                                <option value="masyarakat">Masyarakat</option>
                                                <option value="guru">Guru</option>
                                                <option value="other">other</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="deskripri" class="form-label">Review</label>
                                            @error('deskripsi')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input id="deskripsi" type="hidden" name="deskripsi"
                                                value="{{ old('deskripsi') }}">
                                            <trix-editor class="bg-white" input="deskripsi"></trix-editor>
                                        </div>

                                        <hr>
                                        <div class="mt-5">
                                            <button type="submit" class="btn btn-primary text-white">Review</button>
                                            <a href="/" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
