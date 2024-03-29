@extends('login.layout.main')

@section('container')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        @endif

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><a
                                        href="/login">x</a></button>
                            </div>
                        @endif
                        @foreach ($pengaturan as $p)
                        <div class="col-lg-6 d-none p-3 mb-5 rounded d-lg-block" style="background-image: url('{{ asset('storage/' . $p->logo_sekolah) }}');height:500px;background-size:cover;"></div>
                        @endforeach
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Admin!</h1>
                                </div>
                                <form action="/login" method="post" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="password" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                                </form>
                                <hr>
                                {{-- <div class="text-center">
                                    <a class="small" href="">Forgot Password?</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
