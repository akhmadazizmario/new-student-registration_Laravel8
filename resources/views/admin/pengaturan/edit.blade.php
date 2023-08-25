@extends('admin.layout.main')

@section('container')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Pengaturan</strong>
                <a class="btn btn-sm btn-warning float-right rounded" href="/pengaturan"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/pengaturan/{{ $pengaturan->id }}" class="mb-5"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="kepala_sekolah" class="form-label">nama Kepala Sekolah</label>
                            <input type="text" class="form-control" id="kepala_sekolah" name="kepala_sekolah"
                                @error('kepala_sekolah') is-invalid @enderror required autofocus
                                value="{{ old('kepala_sekolah', $pengaturan->kepala_sekolah) }}">
                            @error('kepala_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                @error('email') is-invalid @enderror required autofocus
                                value="{{ old('email', $pengaturan->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sambutan" class="form-label">Sambutan kepala Sekolah</label>
                            @error('sambutan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="sambutan" type="hidden" name="sambutan"
                                value="{{ old('sambutan', $pengaturan->sambutan) }}">
                            <trix-editor class="bg-white" input="sambutan"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="tentang_sekolah" class="form-label">Tentang/Sejarah Sekolah</label>
                            @error('tentang_sekolah')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="tentang_sekolah" type="hidden" name="tentang_sekolah"
                                value="{{ old('tentang_sekolah', $pengaturan->tentang_sekolah) }}">
                            <trix-editor class="bg-white" input="tentang_sekolah"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="foto_kplsekolah" class="form-label">foto kepala sekolah</label>
                            <input type="hidden" name="oldImage_kplsekolah" value="{{ $pengaturan->foto_kplsekolah }}">
                            @if ($pengaturan->foto_kplsekolah)
                                <img src="{{ asset('storage/' . $pengaturan->foto_kplsekolah) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto_kplsekolah" name="foto_kplsekolah"
                                @error('foto_kplsekolah') is-invalid @enderror onchange="previewImage()">
                            @error('foto_kplsekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="foto_brosur" class="form-label">foto Brosur</label>
                            <input type="hidden" name="oldImage_kplsekolah" value="{{ $pengaturan->foto_brosur }}">
                            @if ($pengaturan->foto_brosur)
                                <img src="{{ asset('storage/' . $pengaturan->foto_brosur) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="foto_brosur" name="foto_brosur"
                                @error('foto_brosur') is-invalid @enderror onchange="previewImage()">
                            @error('foto_brosur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="logo_sekolah" class="form-label">Logo sekolah</label>
                            <input type="hidden" name="oldImage_logosekolah" value="{{ $pengaturan->logo_sekolah }}">
                            @if ($pengaturan->logo_sekolah)
                                <img src="{{ asset('storage/' . $pengaturan->logo_sekolah) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="logo_sekolah" name="logo_sekolah"
                                @error('logo_sekolah') is-invalid @enderror onchange="previewImage()">
                            @error('logo_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="grup_wa" class="form-label">link Group Wa Siswa Baru</label>
                            <input type="text" class="form-control" id="grup_wa" name="grup_wa"
                                @error('grup_wa') is-invalid @enderror required autofocus
                                value="{{ old('grup_wa', $pengaturan->grup_wa) }}">
                            @error('grup_wa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                @error('nama_sekolah') is-invalid @enderror required autofocus
                                value="{{ old('nama_sekolah', $pengaturan->nama_sekolah) }}">
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="maps" class="form-label">Link Google Maps</label>
                            <input type="text" class="form-control" id="maps" name="maps"
                                @error('maps') is-invalid @enderror required autofocus
                                value="{{ old('maps', $pengaturan->maps) }}">
                            @error('maps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nohp" class="form-label">no hp/telp Sekolah</label>
                            <input type="text" class="form-control" id="nohp" name="nohp"
                                @error('nohp') is-invalid @enderror required autofocus
                                value="{{ old('nohp', $pengaturan->nohp) }}" oninput="formatPhoneNumber()">
                            @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tgl_pendaftaran_awal" class="form-label">tgl pembukaan pendaftaran siswa baru
                            </label>
                            <input type="date" class="form-control" id="tgl_pendaftaran_awal" name="tgl_pendaftaran_awal"
                                @error('tgl_pendaftaran_awal') is-invalid @enderror required autofocus
                                value="{{ old('tgl_pendaftaran_awal', $pengaturan->tgl_pendaftaran_awal) }}">
                            @error('tgl_pendaftaran_awal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tgl_pendaftaran_akhir" class="form-label">tgl pembukaan pendaftaran siswa baru
                            </label>
                            <input type="date" class="form-control" id="tgl_pendaftaran_akhir"
                                name="tgl_pendaftaran_akhir" @error('tgl_pendaftaran_akhir') is-invalid @enderror required
                                autofocus value="{{ old('tgl_pendaftaran_akhir', $pengaturan->tgl_pendaftaran_akhir) }}">
                            @error('tgl_pendaftaran_akhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Link instagram sekolah</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                @error('instagram') is-invalid @enderror required autofocus
                                value="{{ old('instagram', $pengaturan->instagram) }}">
                            @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="form-label">link facebook sekolah</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                @error('facebook') is-invalid @enderror required autofocus
                                value="{{ old('facebook', $pengaturan->facebook) }}">
                            @error('facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="youtube" class="form-label">link youtube sekolah</label>
                            <input type="text" class="form-control" id="youtube" name="youtube"
                                @error('youtube') is-invalid @enderror required autofocus
                                value="{{ old('youtube', $pengaturan->youtube) }}">
                            @error('youtube')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Edit</button>
                            <a href="/pengaturan" class="btn btn-danger">Kembali</a>
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

<script>
    function formatPhoneNumber() {
        let inputNohp = document.getElementById('nohp');
        let nohpValue = inputNohp.value;

        // Hapus semua karakter non-angka dari nomor telepon
        nohpValue = nohpValue.replace(/\D/g, '');

        // Jika nomor telepon dimulai dengan '0', hapus awalan '0'
        if (nohpValue.startsWith('0')) {
            nohpValue = nohpValue.substring(1);
        }

        // Jika nomor telepon tidak diawali dengan "62", tambahkan "62" pada awal nomor telepon
        if (!nohpValue.startsWith('62')) {
            nohpValue = '62' + nohpValue;
        }

        // Set nilai input nomor telepon dengan nilai yang sudah diubah
        inputNohp.value = nohpValue;
    }
</script>
