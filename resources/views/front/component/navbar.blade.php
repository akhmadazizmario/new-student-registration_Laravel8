 <!-- ======= Top Bar ======= -->
 @foreach ($pengaturan as $p)
     <div id="topbar" class="d-flex align-items-center fixed-top">
         <div class="container d-flex justify-content-between">
             <div class="contact-info d-flex align-items-center">
                 <a href="{{ $p->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                 <a href="{{ $p->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                 <a href="{{ $p->youtube }}" class="facebook"><i class="bi bi-youtube"></i></a>
                 <i class="bi bi-phone"></i> {{ $p->nohp }}
             </div>
         </div>
     </div>


     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top">
         <div class="container d-flex align-items-center">

             <h1 class="logo me-auto"><a href="/">
                     @if ($p->logo_sekolah)
                         <img src="{{ asset('storage/' . $p->logo_sekolah) }}" style="height: 80px;" alt="gambar"
                             class="img-fluid mt-3">
                     @else
                         <img src="/assets_admin/img/profil.png" style="height: 80px;" alt="gambar"
                             class="img-fluid mt-3">
                     @endif
                 </a></h1>
             <!-- Uncomment below if you prefer to use an image logo -->
             <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

             <nav id="navbar" class="navbar order-last order-lg-0">
                 <ul>
                     <li><a class="nav-link scrollto" href="/">Home</a></li>
                     <li><a class="nav-link scrollto" href="/tentangkami">Tentang Kami</a></li>
                     <li><a class="nav-link scrollto" href="/daftarsiswa/create">Pendaftaran</a></li>
                     <li class="dropdown"><a href="#"><span>Media</span> <i class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a href="/blogku">Blog Sekolah</a></li>
                             <li><a href="/galeriku">Galery Sekolah</a></li>
                         </ul>
                     </li>
                     <li><a class="nav-link scrollto" href="/quran">Membaca Al-Qur'an</a></li>
                     <li><a class="nav-link scrollto" href="/prestasiku">Prestasi</a></li>
                     <li><a class="nav-link scrollto" href="/eskulku">Ekstrakulikuler</a></li>
                     {{-- <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a href="/login">Administrator</a></li>
                         </ul>
                     </li> --}}

                     {{-- @auth
                         <li><a href="/dashboard" class="nav-link"><strong>MyDashboard</strong>
                         </li>
                     @else
                         <li class="dropdown"><a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                             <ul>
                                 <li><a href="/login">Administrator</a></li>
                             </ul>
                         </li>
                     @endauth --}}
                     @guest <!-- Menampilkan menu Admin saat belum login -->
                         <li class="dropdown">
                             <a href="#"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                             <ul>
                                 <li><a href="/login">Administrator</a></li>
                             </ul>
                         </li>
                     @endguest

                     @auth <!-- Menampilkan menu MyDashboard saat sudah login -->
                         <li><a href="/dashboard" class="nav-link"><strong>My Dashboard</strong></a></li>
                     @endauth
                 </ul>
                 <i class="bi bi-list mobile-nav-toggle"></i>
             </nav><!-- .navbar -->

         </div>
     </header><!-- End Header -->
 @endforeach
