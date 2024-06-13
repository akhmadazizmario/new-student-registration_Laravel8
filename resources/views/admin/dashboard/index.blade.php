@extends('admin.layout.main2')

@section('container')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="/pengaturan" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="bi bi-gear"></i> Pengaturan</a>
            <hr>
        </div>

        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: rgb(3, 87, 3);">
                                    Data Siswa </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_siswa }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Data Guru</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_guru }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Postingan Blog</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_blog }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Data Prestasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_prestasi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trophy fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Jumlah Surat Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_suratmasuk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Jumlah Surat Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_suratkeluar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark">
                        <h6 class="m-0 font-weight-bold text-white ">DAFTAR SISWA TERBARU</h6>
                        <a href="/siswa" class="btn btn-primary"><i class="bi bi-bag-heart"></i> Lihat</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nama lengkap</th>
                                    {{-- <th scope="col">alamat</th> --}}
                                    <th scope="col">no hp</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa_baru as $s)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $s->nama_lengkap }}</td>
                                        {{-- <td>{!! $s->alamat !!}</td> --}}
                                        <td>{{ $s->no_hp }}</td>
                                        <td>
                                            @if ($s['status'] == 'diproses')
                                                <a href="" title="Klik untuk merubah"><span
                                                        class="badge badge-warning">diproses</span></a>
                                            @elseif ($s['status'] == 'aktif')
                                                <a href="" title="Klik untuk merubah"><span
                                                        class="badge badge-primary">Aktif</span></a>
                                            @elseif ($s['status'] == 'tidak aktif')
                                                <a href="" title="Klik untuk merubah"><span
                                                        class="badge badge-danger">tidak Aktif</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-black">
                        <h6 class="m-0 font-weight-bold text-white">Grafik Data Siswa Baru</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark">
                        <h6 class="m-0 font-weight-bold text-white ">REVIEW TERBARU</h6>
                        <a href="/review" class="btn btn-primary"><i class="bi bi-bag-heart"></i> Lihat</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nama lengkap</th>
                                    <th scope="col">sebagai</th>
                                    <th scope="col">deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review_baru as $rb)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $rb->nama }}</td>
                                        <td>
                                            @if ($rb['sebagai'] == 'orang tua siswa')
                                                <p>Orang Tua Siswa</p>
                                            @elseif ($rb['sebagai'] == 'guru')
                                                <p>Guru</p>
                                            @elseif ($rb['sebagai'] == 'alumni')
                                                <p>alumni</p>
                                            @endif
                                        </td>
                                        @php
                                            $words = str_word_count(strip_tags($rb->deskripsi), 1); // Menghapus tag HTML sebelum memisahkan kata-kata
                                            $limitedWords = implode(' ', array_slice($words, 0, 10)); // Mengambil 20 kata pertama dan menggabungkannya kembali
                                        @endphp
                                        <td>{!! $limitedWords !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
