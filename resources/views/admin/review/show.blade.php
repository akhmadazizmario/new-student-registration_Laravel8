@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Review dari {{ $review->nama }}</strong>
                        <a class="btn btn-sm btn-danger float-right" href="/review"> <i class="fa fa-arrow-left"></i> kembali </a>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <h4>Data Review</h4>
                            <hr>
                            <table id="bootstrap-data-table-export" class="table table-sm table-hover table-borderless">
            

                                <tr>
                                    <th width="150px">Nama Lengkap</th>
                                    <td> : </td>
                                    <td>{{ $review->nama }}
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">Sebagai</th>
                                    <td> : </td>
                                    <td>@if ($review['sebagai'] == 'orang tua siswa')
                                        <p>orang tua siswa</p>
                                    @elseif ($review['sebagai'] == 'guru')
                                        <p>Guru</p>
                                    @elseif ($review['sebagai'] == 'masyarakat')
                                        <p>Masyarakat</p>
                                    @elseif ($review['sebagai'] == 'other')
                                        <p>other</p>
                                    @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th width="150px">deskripsi</th>
                                    <td> : </td>
                                    <td>{!! $review->deskripsi !!}
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
