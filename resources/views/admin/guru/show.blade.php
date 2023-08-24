@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bapak/Ibu {{ $gurus->nama_lengkap }}</strong>
                        <a class="btn btn-sm btn-danger float-right" href="/guru"> <i class="fa fa-arrow-left"></i> kembali </a>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <h4>Data Guru</h4>
                            <hr>
                            <table id="bootstrap-data-table-export" class="table table-sm table-hover table-borderless">
                                <tr>
                                    <th width="150px">Foto</th>
                                    <td> : </td>
                                     <td>{{--<img src="{{ asset('storage/' . $gurus->foto) }}" alt="" width="80px"> --}}
                                        @if ($gurus->foto)
                                                <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $gurus->foto) }}" alt="gambar"
                                                        class="img-fluid mt-3">
                                                </div>
                                            @else
                                                <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                                    class="img-fluid mt-3">
                                            @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Nama Lengkap</th>
                                    <td> : </td>
                                    <td>{{ $gurus->nama_lengkap }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Nik</th>
                                    <td> : </td>
                                    <td>{{ $gurus->nik }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">email</th>
                                    <td> : </td>
                                    <td>{{ $gurus->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">alamat</th>
                                    <td> : </td>
                                    <td>{!! $gurus->alamat !!}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">no hp</th>
                                    <td> : </td>
                                    <td>{{ $gurus->no_hp }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">jenjang</th>
                                    <td> : </td>
                                    <td>{{ $gurus->jenjang }}
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
