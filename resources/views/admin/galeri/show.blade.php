@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-danger float-right" href="/galeri"> <i class="fa fa-arrow-left"></i> kembali </a>
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <h2 class="text-center mb-2">{{ $galeri->judul }}</h2>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        @if ($galeri->foto_galeri)
                            <div style="max-height: 800px;width:800px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $galeri->foto_galeri) }}" alt="gambar" class="img-fluid mt-3">
                            </div>
                        @else
                            <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                class="img-fluid mt-3">
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection