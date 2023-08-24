@extends('admin.layout.main')

@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Edit Data Guru {{ $gurus->nama_lengkap }}</strong>
                <a class="btn btn-sm btn-warning float-right rounded" href="/guru"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/guru/{{ $gurus->id }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">nama lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                @error('nama_lengkap') is-invalid @enderror required autofocus
                                value="{{ old('nama_lengkap', $gurus->nama_lengkap) }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                @error('email') is-invalid @enderror required autofocus
                                value="{{ old('email', $gurus->email) }}">
                            @error('email')
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
                            <input id="alamat" type="hidden" name="alamat" value="{{ old('alamat', $gurus->alamat) }}">
                            <trix-editor class="bg-white" input="alamat"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Edit Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $gurus->foto }}">
                            @if ($gurus->foto)
                                <img src="{{ asset('storage/' . $gurus->foto) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto" name="foto"
                                @error('foto') is-invalid @enderror onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="nik" class="form-label">nik</label>
                            <input type="number" class="form-control" id="nik" name="nik"
                                @error('nik') is-invalid @enderror required autofocus
                                value="{{ old('nik', $gurus->nik) }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">no hp</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                @error('no_hp') is-invalid @enderror required autofocus
                                value="{{ old('no_hp', $gurus->no_hp) }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenjang" class="form-label">Jenjang</label>
                            <select class="form-control" name="jenjang" id="jenjang" required>
                                <option value="{{ $gurus->jenjang }}">{{ $gurus->jenjang }}</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit Data Guru</button>
                            <a href="/guru" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document: addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
