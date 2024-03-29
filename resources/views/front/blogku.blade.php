@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Blog</h2>
                </div>
                <form action="/blogku">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari postingan...." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search-heart"></i> Cari</button>
                    </div>
                </form>

                <div class="container-fluid mt-4">
                    <div class="row">
                        @foreach ($blogku as $article)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="shadow d-flex align-items-stretch">
                                    <div class="thumbnail">
                                        <div class="container">
                                            @if ($article->foto_blog)
                                                <img src="{{ asset('storage/' . $article->foto_blog) }}" alt=""
                                                width="100%" height="200px">
                                            @endif
                                            <div class="caption">
                                                <h3 class="mt-3">{{ Str::limit($article->judul, 17, '...') }}</h3>
                                                {{-- @php
                                                    $words = str_word_count($article->deskripsi, 1); // Mengubah teks menjadi array kata-kata
                                                    $limitedWords = implode(' ', array_slice($words, 0, 100)); // Mengambil 100 kata pertama dan menggabungkannya kembali
                                                @endphp
                                                <p>{!! $limitedWords !!}</p> --}}

                                                <p class="mt-3" style="text-align: justify">{!! implode(' ', array_slice(str_word_count(strip_tags($article->deskripsi), 1), 0, 30)) !!}</p>
                                                <p><a href="/blogku/{{ $article->id }}" class="btn btn-primary"
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
