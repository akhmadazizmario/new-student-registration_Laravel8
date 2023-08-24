@extends('admin.layout.main')

@section('container')
    <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                @if (session()->has('success'))
                    <div class="alert alert-primary col-lg-8">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('destroy'))
                    <div class="alert alert-success col-lg-8">
                        {{ session('destroy') }}
                    </div>
                @endif
            </div>
            <a href="/siswaexportexcel" class="btn btn-success mb-3"><i class="bi bi-file-earmark-spreadsheet"></i> Export
                Excel</a>
            <a href="/siswaexportpdf" class="btn btn-danger mb-3"><i class="bi bi-filetype-pdf"></i> Export
                Pdf</a>
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <strong class="card-title text-white">Data Siswa Baru</strong>
                    <a class="btn btn-sm btn-primary float-right rounded " href="/siswa/create"> <i
                            class="bi bi-person-plus"></i>
                        Tambah Data Siswa </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Nik</th>
                                    <th>Tempat, Tgl Lahir</th>
                                    <th>No Hp</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($s->foto)
                                                <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $s->foto) }}" alt="gambar"
                                                        class="img-fluid mt-3">
                                                </div>
                                            @else
                                                <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                                    class="img-fluid mt-3">
                                            @endif
                                        </td>
                                        <td>{{ $s->nama_lengkap }}</td>
                                        <td>{{ $s->nik }}</td>
                                        <td>{{ $s->tempat_lahir }}, {{ $s->tgl_lahir }}</td>
                                        <td>{{ $s->no_hp }}</td>
                                        {{-- <td>{{ $s->status }}</td> --}}
                                        <td>
                                            @if ($s['status'] == 'diproses')
                                                <a href="{{ $s->status }}" title="Klik untuk merubah"><span
                                                        class="badge badge-warning">diproses</span></a>
                                            @elseif ($s['status'] == 'aktif')
                                                <a href="{{ $s->status }}" title="Klik untuk merubah"><span
                                                        class="badge badge-primary">Aktif</span></a>
                                            @elseif ($s['status'] == 'tidak aktif')
                                                <a href="{{ $s->status }}" title="Klik untuk merubah"><span
                                                        class="badge badge-danger">tidak Aktif</span></a>
                                            @endif

                                        </td>
                                        <td>
                                            <center>
                                                <a href="/siswa/{{ $s->id }}"
                                                    class="btn btn-info text-decoration-none text-white">
                                                    <i class="bi bi-eyeglasses"></i> lihat</a>
                                                <a href="/siswa/{{ $s->id }}/edit"
                                                    class="btn btn-warning text-decoration-none text-white">
                                                    <i class="bi bi-pencil-square"></i> edit</a>

                                                <form action="/siswa/{{ $s->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger border-0"
                                                        onclick="return confirm('apakah kamu serius untuk menghapus?')">
                                                        <i class="bi bi-trash3"></i>
                                                        Hapus</button>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
