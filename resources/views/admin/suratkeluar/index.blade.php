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
            <a href="/suratkeluarexportexcel" class="btn btn-success mb-3"><i class="bi bi-file-earmark-spreadsheet"></i> Export
                Excel</a>
            <a href="/suratkeluarexportpdf" class="btn btn-danger mb-3"><i class="bi bi-filetype-pdf"></i> Export
                Pdf</a>
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <strong class="card-title text-white">Data surat keluar</strong>
                    <a class="btn btn-sm btn-primary float-right rounded " href="/suratkeluar/create"> <i
                            class="bi bi-person-plus"></i>
                        Tambah surat keluar </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>File</th>
                                    <th>no surat</th>
                                    <th>Pengirim</th>
                                    <th>tujuan</th>
                                    <th>perihal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suratkeluar as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($s->filepdf)
                                                <a href="{{ asset('storage/' . $s->filepdf) }}" class="btn btn-primary"><i class="bi bi-file-earmark-pdf-fill"></i> Lihat File</a>
                                            @else
                                                <p>File kosong</p>
                                            @endif
                                        </td>
                                        <td>{{ $s->no_surat }}</td>
                                        <td>{{ $s->pengirim }}</td>
                                        <td>{{ $s->tujuan }}</td>
                                        <td>{{ $s->perihal }}</td>
                                        <td>
                                            <center>
                                                <a href="/suratkeluar/{{ $s->id }}/edit"
                                                    class="btn btn-warning text-decoration-none text-white">
                                                    <i class="bi bi-pencil-square"></i> edit</a>

                                                <form action="/suratkeluar/{{ $s->id }}" method="post" class="d-inline">
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
