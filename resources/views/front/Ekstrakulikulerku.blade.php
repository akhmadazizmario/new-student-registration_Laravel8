@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Ekstrakulikuler</h2>
                </div>

                <div class="container-fluid mt-4">
                    <div class="row">
                        @foreach ($eskulku as $article)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="shadow d-flex align-items-stretch">
                                    <div class="thumbnail">
                                        <div class="container">
                                            <a href="/eskulku/{{ $article->id }}">
                                                @if ($article->foto_eskul)
                                                    <img src="{{ asset('storage/' . $article->foto_eskul) }}" alt=""
                                                        width="100%">
                                                @endif
                                                <div class="caption">
                                                    <h3 class="mt-3 text-center">{{ $article->nama_eskul }}</h3>
                                                </div>
                                            </a>
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
