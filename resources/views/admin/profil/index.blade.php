@extends('admin.layout.main')

@section('container')
    <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header h5 arial text-center bg-dark">
                            <strong class="text-white">Profill Admin</strong>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class=" mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 mb-3">
                                        <img src="/assets_admin/img/profil.png" class="card-img-top" alt="profil"
                                            height="100%">

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Email :<font color="blue"> <?= $user['email'] ?></font>
                                            </h5>
                                            <h5 class="card-text">Nama :<font color="blue"> <?= $user['name'] ?></font>
                                            </h5>
                                            <p class="card-text">dibuat pada : <font color="red">
                                                    <?= $user['created_at'] ?></font>
                                            </p>
                                            <div class="btn btn-dark ml-3 my-3">
                                                <a href="/profil/{{ $user->id }}/edit" class="text text-white"><i
                                                        class="fas fa-user-edit"></i>
                                                    UbahProfil</a>
                                            </div> <a class="btn btn-danger"href="/ubahpassword/{{ $user->id }}/edit">Ubah Password</a>
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
