<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @foreach ($pengaturan as $p)
        <title>Website Resmi {{ $p->nama_sekolah }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->

        <link href="{{ asset('storage/' . $p->logo_sekolah) }}" rel="icon">
        <link href="{{ asset('storage/' . $p->logo_sekolah) }}" rel="apple-touch-icon">
    @endforeach

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!--- Form edit body --->
    <link rel="stylesheet" type="text/css" href="/assets_admin/trix.css">
    <script type="text/javascript" src="/assets_admin/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>



    <!-- =======================================================
  * Template Name: Medilab
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('front.component.navbar')
    <!---memanggil navbar yang ada di folder partials-->

    @yield('container')

    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-md-6 footer-contact">
                        @foreach ($pengaturan as $p)
                            <h3>{{ $p->nama_sekolah }}</h3>

                            <p>
                                memberikan pelayanan pendidikan kepada masyarakat yang mudah <br><br>
                                <strong>Phone:</strong> {{ $p->nohp }}<br>
                                <strong>Email:</strong> {{ $p->email }}<br>
                            </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Beranda</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/tentangkami">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/pendaftaran">Pendaftaran</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/login">Login</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Media</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/blogku">Blog</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/galeriku">Galeri</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/prestasiku">Prestasi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/eskulku">Ekstrakulikuler</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">


                        @if ($p->logo_sekolah)
                            <img src="{{ asset('storage/' . $p->logo_sekolah) }}" style="height: 120px;" alt="gambar"
                                class="img-fluid mt-3">
                        @else
                            <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                                class="img-fluid mt-3">
                        @endif
                    </div>

                </div>
            </div>
        </div>


        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    <strong><span>copyright@
                            <script type="text/javascript">
                                var creditsyear = new Date();
                                document.write(creditsyear.getFullYear());
                            </script>
                        </span></strong>. All Rights Reserved</span></strong>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                    Designed by {{ $p->nama_sekolah }}
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="{{ $p->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="{{ $p->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="{{ $p->youtube }}" class="google-plus"><i class="bx bxl-youtube"></i></a>
            </div>
        </div>

    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="https://wa.me/{{ $p->nohp }}"
        class="back-to-top d-flex align-items-center justify-content-center bg-success"><i
            class="bi bi-whatsapp"></i></a>
    @endforeach
    <!-- Vendor JS Files -->
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
</body>

</html>
