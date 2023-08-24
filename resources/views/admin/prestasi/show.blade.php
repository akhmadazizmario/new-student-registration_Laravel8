@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Peraih prestasi {{ $prestasi->nama_lengkap }}</strong>
                        <a class="btn btn-sm btn-danger float-right" href="/prestasi"> <i class="fa fa-arrow-left"></i> kembali </a>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <h4>Data Prestasi</h4>
                            <hr>
                            <table id="bootstrap-data-table-export" class="table table-sm table-hover table-borderless">
                                <tr>
                                    <th width="150px">Foto</th>
                                    <td> : </td>
                                     <td>{{--<img src="{{ asset('storage/' . $gurus->foto) }}" alt="" width="80px"> --}}
                                        @if ($prestasi->foto_prestasi)
                                                <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $prestasi->foto_prestasi) }}" alt="gambar"
                                                        class="img-fluid mt-3">
                                                </div>
                                            @else
                                                <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                                    class="img-fluid mt-3">
                                            @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Nama Prestasi</th>
                                    <td> : </td>
                                    <td>{{ $prestasi->nama_prestasi }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Nama Peraih</th>
                                    <td> : </td>
                                    <td>{{ $prestasi->nama_lengkap }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">deskripsi</th>
                                    <td> : </td>
                                    <td>{!! $prestasi->deskripsi !!}
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
