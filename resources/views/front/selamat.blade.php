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
                <div class="shadow-lg p-3 mb-2 rounded mt-5 text-center"
                    style="background-color: rgb(92, 154, 0);color:white;">
                    <strong>Selamat Anda Sudah Terdaftar Di Sistem Kami</strong>
                </div>

                <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <h5 class="text-center">Untuk proses selanjutnya diharapkan bergabung kedalam
                        grup whatsapp dibawah agar tidak ketinggalan informasi
                    </h5>
                    <p class="text-center mt-3"> Berikut grup whatsapp Calon Siswa Baru :</p>
                    @foreach ($pengaturan as $p)
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="https://wa.me/{{ $p->grup_wa }}" class="btn btn-success "><i
                                    class="bi bi-whatsapp"></i> Grup Calon Siswa Baru
                            </a>
                        </div>

                        <div class="d-flex justify-content-center mt-3 align-items-center">
                            <p>atau Masuk Lewat Tautan dibawah ini :</p>
                        </div>

                        <center>
                            <a href="https://wa.me/{{ $p->grup_wa }}">{{ $p->grup_wa }}
                            </a>
                        </center>
                    @endforeach

                </div>
                <div class="mt-3">
                    <a href="/reviewku" class="btn btn-primary shadow"><i class="bi bi-chat-left-quote"></i> Review Pelayanan Sistem Kami</a>
                </div>
            </div>
        </section>
    </main>
@endsection
