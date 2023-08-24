@extends('admin.layout.main')

@section('container')
    <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-header h5 arial text-center bg-dark">
                            <strong class="text-white">Ubah Password</strong>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form method="post" action="/ubahpassword/edit" class="mb-5"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="password" class="form-label"><strong>Password
                                                            Terbaru</strong>
                                                    </label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password">

                                                </div>

                                                <button type="submit" class="btn btn-primary text-white">Update
                                                    Password</button>
                                                <a href="/profil" class="btn btn-danger">Kembali</a>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
