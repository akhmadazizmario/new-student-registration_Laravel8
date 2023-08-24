@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    @if (session()->has('success'))
                        <div class="alert alert-primary col-lg-8">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('destroy'))
                        <div class="alert alert-success col-lg-8">
                            {{ session('destroy') }}
                        </div>
                    @endif
                </div>
                <h1>Selamat kamu sudah terdaftar</h1>
            </div>
        </section>
    </main>
@endsection
