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
            {{-- <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <strong class="card-title text-white">Data Pengaturan</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Kepala sekolah</th>
                                    <th>kepala sekolah</th>
                                    <th>buka pendaftaran</th>
                                    <th>akhir pendaftaran</th>
                                    <th>Grup_Wa siswa baru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaturan as $g)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($g->foto_kplsekolah)
                                                <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $g->foto_kplsekolah) }}" alt="gambar"
                                                        class="img-fluid mt-3">
                                                </div>
                                            @else
                                                <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                                    class="img-fluid mt-3">
                                            @endif
                                        </td>
                                        <td>{{ $g->kepala_sekolah }}</td>
                                        <td>{{ $g->tgl_pendaftaran_awal }}</td>
                                        <td>{{ $g->tgl_pendaftaran_akhir }}</td>
                                        <td><a href="{{ $g->grup_wa }}" class="btn btn-success"><i
                                                    class="bi bi-whatsapp"></i> Wa grup</a></td>
                                        <td>
                                            <center>
                                                <a href="/pengaturan/{{ $g->id }}/edit"
                                                    class="btn btn-primary text-decoration-none text-white">
                                                    <i class="bi bi-pencil-square"></i> edit</a>
                                            </center>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}

            @foreach ($pengaturan as $g)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="col-md-6">
                                    <h4>Pengaturan </h4>
                                    <hr>
                                    <table id="bootstrap-data-table-export"
                                        class="table table-sm table-hover table-borderless">
                                        <tr>
                                            <th width="150px">Foto Kepala Sekolah</th>
                                            <td> : </td>
                                            <td>{{-- <img src="{{ asset('storage/' . $gurus->foto) }}" alt="" width="80px"> --}}
                                                @if ($g->kplsekolah)
                                                    <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $g->kplsekolah) }}" alt="gambar"
                                                            class="img-fluid mt-3">
                                                    </div>
                                                @else
                                                    <img src="/assets_admin/img/profil.png" style="height: 80px;"
                                                        alt="gambar" class="img-fluid mt-3">
                                                @endif
                                            </td>
                                        </tr>

                                        <tr style="background-color: rgba(210, 247, 252, 0.521);">
                                            <th width="150px">Nama Kepala Sekolah</th>
                                            <td> : </td>
                                            <td>{{ $g->kepala_sekolah }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="150px">Pendaftaran Sekolah</th>
                                            <td> : </td>
                                            <td><strong>{{ $g->tgl_pendaftaran_awal }}</strong> sampai <strong
                                                    style="color:red;">{{ $g->tgl_pendaftaran_akhir }}</strong>
                                            </td>
                                        </tr>

                                        <tr style="background-color: rgba(210, 247, 252, 0.521);">
                                            <th width="150px">Grup Siswa Baru</th>
                                            <td> : </td>
                                            <td><a href="{{ $g->grup_wa }}" class="btn btn-success"><i
                                                        class="bi bi-whatsapp"></i> grup siswa baru</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="150px">Foto Brosur</th>
                                            <td> : </td>
                                            <td>{{-- <img src="{{ asset('storage/' . $gurus->foto) }}" alt="" width="80px"> --}}
                                                @if ($g->foto_brosur)
                                                    <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $g->foto_brosur) }}" alt="gambar"
                                                            class="img-fluid mt-3">
                                                    </div>
                                                @else
                                                    <img src="/assets_admin/img/profil.png" style="height: 80px;"
                                                        alt="gambar" class="img-fluid mt-3">
                                                @endif
                                            </td>
                                        </tr>

                                        <tr style="background-color: rgba(210, 247, 252, 0.521);">
                                            <th width="150px">Email Sekolah</th>
                                            <td> : </td>
                                            <td>{{ $g->email }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="150px">No Telp</th>
                                            <td> : </td>
                                            <td>{{ $g->nohp }}
                                            </td>
                                        </tr>

                                        <tr style="background-color: rgba(210, 247, 252, 0.521);">
                                            <th width="150px">Sambutan Kepala Sekolah</th>
                                            <td> : </td>
                                            @php
                                                $words = str_word_count(strip_tags($g->sambutan), 1); // Menghapus tag HTML sebelum memisahkan kata-kata
                                                $limitedWords = implode(' ', array_slice($words, 0, 20)); // Mengambil 20 kata pertama dan menggabungkannya kembali
                                            @endphp
                                            <td>{!! $limitedWords !!}</td>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="150px">Instagram sekolah</th>
                                            <td> : </td>
                                            <td>{{ $g->instagram }}
                                            </td>
                                        </tr>

                                        <tr style="background-color: rgba(210, 247, 252, 0.521);">
                                            <th width="150px">Facebook sekolah</th>
                                            <td> : </td>
                                            <td>{{ $g->facebook }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th width="150px">Youtube sekolah</th>
                                            <td> : </td>
                                            <td>{{ $g->youtube }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <a href="/pengaturan/{{ $g->id }}/edit"
                                                    class="btn btn-primary text-decoration-none text-white">
                                                    <i class="bi bi-pencil-square"></i> edit</a>
                                            </th>
                                        </tr>
            @endforeach

            </table>
        </div>
        </div>
        </div>
        </div>
        </div>







        </div>

    </section>
@endsection
