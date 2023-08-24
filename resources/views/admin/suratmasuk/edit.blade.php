@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Edit Surat Masuk {{ $suratmasuk->pengirim }}</strong>
                <a class="btn btn-sm btn-danger float-right rounded" href="/suratmasuk"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/suratmasuk/{{ $suratmasuk->id }}" class="mb-5"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="no_surat" class="form-label">nomor surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                @error('no_surat') is-invalid @enderror required autofocus
                                value="{{ $suratmasuk->no_surat }}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Nama Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                @error('pengirim') is-invalid @enderror required autofocus
                                value="{{ $suratmasuk->pengirim }}">
                            @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="penerima" class="form-label">nama penerima</label>
                            <input type="text" class="form-control" id="penerima" name="penerima"
                                @error('penerima') is-invalid @enderror required autofocus
                                value="{{ $suratmasuk->penerima }}">
                            @error('penerima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"
                                @error('perihal') is-invalid @enderror required autofocus
                                value="{{ $suratmasuk->perihal }}">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="filepdf" class="form-label">Upload File PDF</label>
                            <input class="form-control" type="file" id="filepdf" name="filepdf" accept=".pdf"
                                @error('filepdf') is-invalid @enderror onchange="previewPDF()">
                            @error('filepdf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div id="pdf-preview" class="mb-3">
                            <!-- Tempatkan tampilan PDF di sini -->
                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit Surat Masuk</button>
                            <a href="/suratmasuk" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
