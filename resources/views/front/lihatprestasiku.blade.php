@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container-fluid mt-4">
                <div class="row">
                    @if ($prestasiku->foto_prestasi)
                        <div style="text-align: center">
                            <img src="{{ asset('storage/' . $prestasiku->foto_prestasi) }}" alt="gambar"
                                class="img-fluid mt-3" width="50%">
                        </div>
                    @else
                        <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar" class="img-fluid mt-3">
                    @endif


                    <div class="container">
                        <h2 class="mt-3" style="text-align: center">{{ $prestasiku->nama_prestasi }}</h2>
                        <p style="text-align: center">Penerima : {{ $prestasiku->nama_lengkap }}</p>

                        <div class="container">
                            <div class="row">
                                <article class="my-3 fs-5" style="text-align: justify">
                                    {!! $prestasiku->deskripsi !!}
                                </article>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </section>
    </main>
@endsection
