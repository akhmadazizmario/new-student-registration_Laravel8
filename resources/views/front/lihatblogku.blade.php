@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services1" class="services1">
            <div class="container-fluid mt-4">
                <div class="row">
                    @if ($blogku->foto_blog)
                        <div style="text-align: center">
                            <img src="{{ asset('storage/' . $blogku->foto_blog) }}" alt="gambar" class="img-fluid mt-3"
                                width="50%">
                        </div>
                    @else
                        <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar" class="img-fluid mt-3">
                    @endif


                    <div class="container">
                        <h2 class="mt-3" style="text-align: center">{{ $blogku->judul }}</h2>

                        <div class="container">
                            <div class="row">
                                <article class="my-3 fs-5" style="text-align: justify">
                                    {!! $blogku->deskripsi !!}
                                </article>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
