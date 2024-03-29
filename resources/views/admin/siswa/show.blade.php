@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">siswa {{ $siswas->nama_lengkap }}</strong>
                        <a class="btn btn-sm btn-danger float-right" href="/siswa"> <i class="fa fa-arrow-left"></i> Kembali </a>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <h4>Data Siswa</h4>
                            <hr>
                            <table id="bootstrap-data-table-export" class="table table-sm table-hover table-borderless">
                                <tr>
                                    <th width="150px">Foto</th>
                                    <td> : </td>
                                    <td>{{-- <imgsrc="asset('storage/'.$siswas->foto) " alt="" width="80px"> --}}
                                        @if ($siswas->foto)
                                            <div style="max-height: 100px;width:100px; overflow:hidden;">
                                                <img src="{{ asset('storage/' . $siswas->foto) }}" alt="gambar"
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
                                    <td>{{ $siswas->nama_lengkap }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Nik</th>
                                    <td> : </td>
                                    <td>{{ $siswas->nik }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Tempat,Tanggal Lahir</th>
                                    <td> : </td>
                                    <td>{{ $siswas->tempat_lahir }}, {{ $siswas->tgl_lahir }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">alamat</th>
                                    <td> : </td>
                                    <td>{!! $siswas->alamat !!}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">no hp</th>
                                    <td> : </td>
                                    <td>{{ $siswas->no_hp }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">jenis kelamin</th>
                                    <td> : </td>
                                    <td>{{ $siswas->jenis_kelamin }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">nama ayah</th>
                                    <td> : </td>
                                    <td>{{ $siswas->ayah }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">nama ibu</th>
                                    <td> : </td>
                                    <td>{{ $siswas->ibu }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">pekerjaan ayah</th>
                                    <td> : </td>
                                    <td>{{ $siswas->pekerjaan_ayah }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">pekerjaan ibu</th>
                                    <td> : </td>
                                    <td>{{ $siswas->pekerjaan_ibu }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">agama</th>
                                    <td> : </td>
                                    <td>{{ $siswas->agama }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="150px">Tanggal Daftar</th>
                                    <td>:</td>
                                    <td>{{ $siswas->created_at }}</td>
                                </tr>
                                <tr>
                                    <th width="150px">tgl_observasi</th>
                                    <td>:</td>

                                    <td>{{ $siswas->tgl_observasi }}</td>
                                </tr>

                                <tr>
                                    <th width="150px">status</th>
                                    <td> : </td>
                                    <td>{{ $siswas->status }}
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
