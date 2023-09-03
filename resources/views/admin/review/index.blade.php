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

            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <strong class="card-title text-white">Data Review</strong>
                    <a class="btn btn-sm btn-primary float-right rounded " href="/review/create"> <i
                            class="bi bi-person-plus"></i>
                        Tambah Review </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>sebagai</th>
                                    <th>deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $b->nama }}</td>
                                        <td>
                                            @if ($b['sebagai'] == 'orang tua siswa')
                                                <p>Orang Tua Siswa</p>
                                            @elseif ($b['sebagai'] == 'guru')
                                                <p>Guru</p>
                                            @elseif ($b['sebagai'] == 'masyarakat')
                                                <p>Masyarakat</p>
                                            @elseif ($b['sebagai'] == 'other')
                                                <p>other</p>
                                            @endif
                                        </td>
                                        @php
                                            $words = str_word_count(strip_tags($b->deskripsi), 1); // Menghapus tag HTML sebelum memisahkan kata-kata
                                            $limitedWords = implode(' ', array_slice($words, 0, 20)); // Mengambil 20 kata pertama dan menggabungkannya kembali
                                        @endphp
                                        <td>{!! $limitedWords !!}</td>
                                        <td>
                                            <center>
                                                <a href="/review/{{ $b->id }}"
                                                    class="btn btn-info text-decoration-none text-white">
                                                    <i class="bi bi-eyeglasses"></i> lihat</a>

                                                <form action="/review/{{ $b->id }}" method="post" class="d-inline">
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
