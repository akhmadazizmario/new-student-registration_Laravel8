@extends('admin.layout.main')

@section('container')
    <section>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-header h5 arial text-center bg-dark">
                            <strong class="text-white">Ubah Profil</strong>
                        </div>
                        <!--------->
                        <div class="card-body">
                            <br>
                            <div class="mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form method="post" action="/profil/edit" class="mb-5"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label"><strong>Name</strong>
                                                        <font color="red"></font>
                                                    </label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        @error('name') is-invalid @enderror required autofocus
                                                        value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                            
                                                <div class="mb-3">
                                                    <label for="email" class="form-label"><strong>eMail</strong>
                                                        <font color="red"></font>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        @error('email') is-invalid @enderror id="email" name="email"
                                                        required value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary text-white">Update
                                                    Profile</button>
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
