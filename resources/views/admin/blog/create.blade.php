@extends('admin.layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <strong class="card-title text-white">Created Blog</strong>
                <a class="btn btn-sm btn-danger float-right rounded" href="/blog"> <i class="fa fa-plus-square-o"></i>
                    Kembali </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="/blog" class="mb-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                @error('judul') is-invalid @enderror required autofocus
                                value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">deskripsi</label>
                            @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                            <trix-editor class="bg-white" input="deskripsi"></trix-editor>
                        </div>

                        <div class="mb-3">
                            <label for="foto_blog" class="form-label">upload foto</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control" type="file" id="foto_blog" name="foto_blog"
                                @error('foto_blog') is-invalid @enderror onchange="previewImage()">
                            @error('foto_blog')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <hr>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary text-white">Publish</button>
                            <a href="/blog" class="btn btn-danger">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection