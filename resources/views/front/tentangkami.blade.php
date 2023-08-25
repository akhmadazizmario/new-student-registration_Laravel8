@extends('front.layout.main')

@section('container')
    <main id="main"> <br><br><br>
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6  d-flex justify-content-center align-items-stretch position-relative">
                        @foreach ($pengaturan as $p)
                            <div class="mt-2">
                                <div class="text-center">
                                    @if ($p->foto_kplsekolah)
                                        <img src="{{ asset('storage/' . $p->foto_kplsekolah) }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                    @else
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    @endif
                                    <h5 class="my-3">{{ $p->kepala_sekolah }}</h5>
                                    <p class="text-muted mb-1">Kepala Sekolah</p>
                                    <p class="text-muted mb-4">Sekolahku negeri tegal</p>
                                </div>
                            </div>
                        
                    </div>
                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Tentang Sekolah</h3>
                        <p style="text-align: justify;">{!! $p->tentang_sekolah !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section><!-- End About Section -->
    </main>
@endsection
