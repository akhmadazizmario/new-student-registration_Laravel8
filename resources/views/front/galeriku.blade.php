@extends('front.layout.main')

@section('container')
    <main id="main"><br><br><br>
        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">
                <div class="section-title">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row g-0">
                    @foreach ($galeri as $g)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="gallery-item">
                                @if ($g->foto_galeri)
                                    <a href="{{ asset('storage/' . $g->foto_galeri) }}" class="galelry-lightbox">
                                        <img src="{{ asset('storage/' . $g->foto_galeri) }}" alt="" width="100%">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Gallery Section -->
    </main>
@endsection
