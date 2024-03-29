@extends('front.layout.main')

@section('container')
    <main id="main">
        <!-- Begin Page Content -->
        <br><br><br>
        <section class="services mt-5">
            <div class="container">
                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-dark">
                            <strong class="card-title text-white">Pendaftaran Siswa Baru</strong>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @foreach ($pengaturan as $p)
                                    <form method="post" action="/daftarsiswa" class="mb-5" enctype="multipart/form-data">
                                        @csrf
                                        @php
                                            $startRegistration = \Carbon\Carbon::parse($p->tgl_pendaftaran_awal);
                                            $endRegistration = \Carbon\Carbon::parse($p->tgl_pendaftaran_akhir);
                                            $currentDate = \Carbon\Carbon::now();
                                        @endphp
                                        @if ($currentDate->between($startRegistration, $endRegistration))
                                            <div class="mb-3">
                                                <label for="nama_lengkap" class="form-label">nama lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap" @error('nama_lengkap') is-invalid @enderror required
                                                    autofocus value="{{ old('nama_lengkap') }}">
                                                @error('nama_lengkap')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="nik" class="form-label">nik</label>
                                                <input type="number" class="form-control" id="nik" name="nik"
                                                    @error('nik') is-invalid @enderror required autofocus
                                                    value="{{ old('nik') }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">tempat lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    placeholder="contoh: Tegal" name="tempat_lahir"
                                                    @error('tempat_lahir') is-invalid @enderror required autofocus
                                                    value="{{ old('tempat_lahir') }}">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="tgl_lahir" class="form-label">tgl_lahir</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                    @error('tgl_lahir') is-invalid @enderror required autofocus
                                                    value="{{ old('tgl_lahir') }}">
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
                                                <input id="alamat" type="hidden" name="alamat"
                                                    value="{{ old('alamat') }}">
                                                <trix-editor class="bg-white" input="alamat"></trix-editor>
                                            </div>

                                            <div class="mb-3">
                                                <label for="ayah" class="form-label">nama ayah</label>
                                                <input type="text" class="form-control" id="ayah" name="ayah"
                                                    @error('ayah') is-invalid @enderror required autofocus
                                                    value="{{ old('ayah') }}">
                                                @error('ayah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="ibu" class="form-label">nama ibu</label>
                                                <input type="text" class="form-control" id="ibu" name="ibu"
                                                    @error('nik') is-invalid @enderror required autofocus
                                                    value="{{ old('ibu') }}">
                                                @error('ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="pekerjaan_ayah" class="form-label">pekerjaan ayah</label>
                                                <input type="text" class="form-control" id="pekerjaan_ayah"
                                                    name="pekerjaan_ayah" @error('pekerjaan_ayah') is-invalid @enderror
                                                    required autofocus value="{{ old('pekerjaan_ayah') }}">
                                                @error('pekerjaan_ayah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="pekerjaan_ibu" class="form-label">pekerjaan_ibu</label>
                                                <input type="text" class="form-control" id="pekerjaan_ibu"
                                                    name="pekerjaan_ibu" @error('pekerjaan_ibu') is-invalid @enderror
                                                    required autofocus value="{{ old('pekerjaan_ibu') }}">
                                                @error('pekerjaan_ibu')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_hp" class="form-label">no hp (whatsapp)</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                    @error('no_hp') is-invalid @enderror required autofocus
                                                    value="{{ old('no_hp') }}" oninput="formatPhoneNumber()">
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
                                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                                    required>
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

                                            <hr>
                                            <div class="mt-5">
                                                <button type="submit" class="btn btn-primary text-white">Daftar</button>
                                                <a href="/" class="btn btn-danger">Kembali</a>
                                            </div>
                                        @else
                                            <h2 class="mt-5 mb-5 text-center"><strong>Maaf, pendaftaran Sudah
                                                    ditutup.</strong></h2>
                                        @endif

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

<!--- Tampil Gambar Javascript---->
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
        let inputNohp = document.getElementById('no_hp');
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
