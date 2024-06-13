@extends('front.layout.main')

@section('container')
    {{-- ----CSSS --}}
    <style class="text/css">
        .hidden-button {
            display: none;
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
    </style>

    {{-- --- CODING --- --}}
    <p class="mt-5"></p>
    <br><br><br>

    <div class="container mt-5">
        <div class="row">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body judul-surat">

                    </div>
                </div>
                <div class="search-container mb-3">
                    <input type="text" id="searchInput" placeholder="Cari Ayat berapa..." class="form-control">
                    <i class="fas fa-search"></i>
                </div>
                <hr>
                {{-- <div class="input-group mb-3">
                    <input type="text" id="searchInput" placeholder="Cari Ayat berapa... <i class='fas fa-search'></i>"
                        class="form-control mb-3"> <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <hr> --}}

                <div class="card-isi-surat mb-5">

                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/surat.js') }}"></script>
@endsection
