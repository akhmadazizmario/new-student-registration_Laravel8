@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Prestasi</h2>
                </div>
                <form action="/prestasiku">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari prestasi...." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search-heart"></i> Cari</button>
                    </div>
                </form>

                <div class="container-fluid mt-4">
                    <div class="row">
                        @foreach ($prestasiku as $article)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="shadow d-flex align-items-stretch">
                                    <div class="thumbnail">
                                        <div class="container">
                                            @if ($article->foto_prestasi)
                                                <img src="{{ asset('storage/' . $article->foto_prestasi) }}" alt=""
                                                    width="100%">
                                            @endif
                                            <div class="caption">
                                                <h3 class="mt-3">{{ $article->nama_prestasi }}</h3>
                                                <p><strong>peraih: {{ $article->nama_lengkap }}</strong></p>
                                                <p><a href="/prestasiku/{{ $article->id }}" class="btn btn-primary"
                                                        role="button">Lihat</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->
    </main>
@endsection
