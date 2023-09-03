@extends('front.layout.main')

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="col-lg-6 shadow p-3 mb-5 card rounded" style="background-color: rgba(255, 255, 255, 0.5);">
                @foreach ($pengaturan as $p)
                    <h1 style="color: black;">{{ $p->nama_sekolah }}</h1>
                @endforeach
                <h3 style="color: black;">Website sistem informasi sekolah resmi</h3>
                <div class="mb-1">
                    <a href="/daftarsiswa/create" class="btn-get-started scrollto">Pendaftaran</a>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            @foreach ($pengaturan as $p )
                                
                            <h3>Kenapa Harus <br> {{ $p->nama_sekolah }}</h3>
                            <p>
                                Sekolah yang mengedepankan akademik siswa, membimbing, Mengembangkan dan
                                melaksanakan model pembelajaran Aktif, Inovatif, Kreatif, Efektif Serta menyenangkan.
                                mempersiapkan generasi sekarang yang tangguh dan berkualitas serta berwawasan aktual.
                            </p>
                            <div class="text-center">
                                <a href="/tentangkami" class="more-btn">Tentang Sekolah <i
                                        class="bx bx-chevron-right"></i></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Fasilitas Pendidikan</h4>
                                        <p>memberikan ruang kelas, perpustakaan, 
                                            laboratorium, ruang olahraga, dan area bermain yang aman dan nyaman</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-user"></i>
                                        <h4>Tenaga Pendidik</h4>
                                        <p>pengajar dan guru yang berkualitas serta terlatih dalam bidang pendidikan anak usia dini.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        @foreach ($pengaturan as $p)
                                            <i class="bx bx-receipt"></i>
                                            <h4>Informasi Pendaftaran</h4>
                                            <p>dibuka pendaftaran :
                                                <br> {{ $p->tgl_pendaftaran_awal }} <br> sampai
                                                {{ $p->tgl_pendaftaran_akhir }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">
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
                                    <p class="text-muted mb-4">{{ $p->nama_sekolah }}</p>
                                </div>
                            </div>
                    </div>
                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Sambutan</h3>
                        <p style="text-align: justify;">{!! $p->sambutan !!}</p>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <section id="about" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-lg-6  d-flex justify-content-center align-items-stretch position-relative">
                        <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                            <h5>VISI</h5>
                            <p class="fst-italic" style="text-align: justify;">
                                Mewujudkan siswa yang bertaqwa, berprestasi, berbudaya, dan berjiwa nasionalis.
                            </p><br>
                            <h5>MISI</h5>
                            <p style="text-align: justify;">
                                <li style="text-align: justify;">
                                    Menumbuhkembangkan penghayatan dan pengamalan ajaran agama
                                    yang
                                    dianut peserta didik.
                                </li>
                                <li style="text-align: justify;"> Mengembangkan dan melaksanakan model pembelajaran Aktif,
                                    Inovatif, Kreatif, Efektif Serta menyenangkan. </li>
                                <li style="text-align: justify;"> Mengembangkan budaya kompetitif dikalangan peserta didik
                                    dalam
                                    upaya meningkatkan prestasi. </li>
                                <li style="text-align: justify;"> Menanamkan budaya tertib, budaya bersih, budaya membaca
                                    dan
                                    budaya belajar. </li>
                                <li style="text-align: justify;"> Melestarikan dan mengembangkan seni budaya daerah. </li>
                                <li style="text-align: justify;"> Mengembangkan pribadi yang cinta tanah air. </li>
                            </p>
                        </div>
                    </div>
                    <div
                        class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        @if ($p->foto_brosur)
                            <a href="{{ asset('storage/' . $p->foto_brosur) }}" class="galelry-lightbox">
                                <img src="{{ asset('storage/' . $p->foto_brosur) }}" alt="" width="100%">
                            </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">
                <div class="section-title">
                    <h2>Prestasi</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row g-0">
                    @foreach ($prestasi as $pres)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="gallery-item">
                                @if ($pres->foto_prestasi)
                                    <a href="{{ asset('storage/' . $pres->foto_prestasi) }}" class="galelry-lightbox">
                                        <img src="{{ asset('storage/' . $pres->foto_prestasi) }}" alt=""
                                            width="100%">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Gallery Section -->

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
                                        <img src="{{ asset('storage/' . $g->foto_galeri) }}" alt=""
                                            width="100%">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Blog</h2>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        @foreach ($blog as $article)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="shadow d-flex align-items-stretch">
                                    <div class="thumbnail">
                                        <div class="container">
                                            @if ($article->foto_blog)
                                                <img src="{{ asset('storage/' . $article->foto_blog) }}" alt=""
                                                    width="100%">
                                            @endif
                                            <div class="caption">
                                                <h3 class="mt-3">{{ $article->judul }}</h3>
                                                @php
                                                    $words = str_word_count($article->deskripsi, 1); // Mengubah teks menjadi array kata-kata
                                                    $limitedWords = implode(' ', array_slice($words, 0, 100)); // Mengambil 100 kata pertama dan menggabungkannya kembali
                                                @endphp
                                                <p>{!! $limitedWords !!}</p>
                                                <p><a href="" class="btn btn-primary" role="button">Lihat</a></p>
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

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                    <p>ketika mengalami kendala berikut adalah pertanyaan yang sering diajukan, dan berikut untuk
                        mempermudah pengetahuan tentang website ini.</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Mengalami Kendala ketika mendaftar? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Jika mengalami kendala tidak mendaftar, anda bisa mengirim pesan kepada kami bisa melalui
                                    whatsap ataupun email yang tertera di website. untuk mengirim pesan lewat whatsapp bisa klik tombol 
                                    whatsapp di kanan samping.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Apakah Pendaftarannya Berbayar?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Pendaftaranya tentu saja gratis yah bapak/ibu, hati-hati jika ada yang memungut 
                                    pembayaran itu bukan dari kami. pendaftaran di sini seluruhnya gratis.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Ketika Mendaftar Jaringan Terputus?
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Jika mengalami kendala jaringan, bisa ganti provider lain yang jaringanya stabil yah bapak/ibu.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Ada kesalahan ketika menginput data? 
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    ketika ada kesalahan ketika menginput data pendaftaran, secepatnya harus menghubungi kami bapak/ibu, 
                                    karena data yang anda input akan dicatat di kementrian pendidikan sebagai siswa. dan kami akan
                                    cek secara berkala untuk menghindari kesalahan data.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="400">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-5" class="collapsed">Pengumuman Pendaftaran kapan yah? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    untuk pengumuman pendafataran akan kami sampaikan melalui whatsapp/grup whatsapp yang disediakan 
                                    ketika mendaftar.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($review as $r)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src="/assets_admin/img/profil.jpg" class="testimonial-img" alt="">
                                        <h3>{{ $r->nama }}</h3>
                                        {{-- <h4>{{ $r->sebagai }}</h4> --}}
                                        <h4>
                                            @if ($r['sebagai'] == 'orang tua siswa')
                                                <p>orang tua siswa</p>
                                            @elseif ($r['sebagai'] == 'guru')
                                                <p>Guru</p>
                                            @elseif ($r['sebagai'] == 'masyarakat')
                                                <p>Masyarakat</p>
                                            @elseif ($r['sebagai'] == 'other')
                                                <p>other</p>
                                            @endif
                                        </h4>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {!! $r->deskripsi !!}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Location</h2>
                </div>
            </div>

            <div>
                @foreach ($pengaturan as $p)
                    <iframe width="100%"
                        height="400" 
                        frameborder="0" 
                        style="border:0" 
                        src="{{ $p->maps }}" 
                        allowfullscreen> <!-- Izinkan untuk tampilan penuh -->
                    </iframe>
                    {{-- <iframe style="border:0; width: 100%; height: 350px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                        frameborder="0" allowfullscreen></iframe> --}}
                @endforeach
            </div>
        </section><!-- End Contact Section -->




    </main>
@endsection
