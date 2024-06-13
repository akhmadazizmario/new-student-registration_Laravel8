@extends('front.layout.main')

@section('container')
    <main id="main">
        {{-- --- CODING --- --}}
        <p class="mt-5"></p>
        <br><br><br>
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Membaca Al-Qur'an</h2>
                </div>

                <div class="container mt-3">
                    <div class="search-container mb-3">
                        <input type="text" id="searchInput" placeholder="Cari nama surat..." class="form-control mb-3">
                        <i class="fas fa-search"></i>
                    </div>
                    <hr>
                    <div class="row card-surat-list">

                    </div>
                </div>

            </div>
        </section>
    </main>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- ----CSSS --}}
    <style class="text/css">
        .card-surat {
            cursor: pointer;
            transition: 0.8s;
        }

        .card-surat:hover {
            background-color: #caded1;
        }

        .search-container {
            position: relative;
        }

        .search-container input {
            padding-right: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .search-container .fa-search {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        /* #searchInput {
                padding: 10px 20px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border: 1px solid #ddd;
                transition: box-shadow 0.3s ease;
            }

            #searchInput:focus {
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
                border-color: #80bdff;
                outline: none;
            } */
    </style>
@endsection
