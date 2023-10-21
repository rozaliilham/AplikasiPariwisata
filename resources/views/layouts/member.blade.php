@foreach ($setting as $row)
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{ $row->web }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="{{ asset('storage/' . $row->logo) }}">
        <meta content="{{ $row->keyword }}" name="description">

        <meta content="{{ $row->keyword }}" name="keywords">


        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">

        <!-- Template Main CSS File -->
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
            integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
            crossorigin="">
        <livewire:styles />
        <livewire:scripts />
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
            integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
            crossorigin="" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
            integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
            crossorigin=""></script>

        <!-- Load Esri Leaflet from CDN -->
        <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
            integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
            crossorigin=""></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
        <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">


        <style>
            /* width */
            ::-webkit-scrollbar {
                width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 5px grey;
                border-radius: 5px;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: grey;
                border-radius: 5px;
            }
        </style>


    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

                <a href="{{ route('member-home') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                    <span>{{ $row->web }}</span>
                </a>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto {{ request()->segment(1) == '/' ? 'active' : '' }}"
                                href="{{ route('member-home') }}">Beranda</a></li>
                        <li><a class="nav-link scrollto {{ request()->segment(1) == 'member-homestay' ? 'active' : '' }}"
                                href="{{ route('member-homestay') }}">Homestay</a></li>
                        <li><a class="nav-link scrollto {{ request()->segment(1) == 'member-booking' ? 'active' : '' }}"
                                href="{{ route('member-booking') }}">Reservasi Saya</a></li>
                        @if (auth()->user()->level == 'Pedagang')
                            <li><a class="nav-link scrollto {{ request()->segment(1) == 'member.penjualan' ? 'active' : '' }}"
                                    href="{{ route('member.penjualan') }}">Data Penjualan</a></li>
                        @endif
                        {{-- <li class="dropdown"><a href="#"><span>Lainnya</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('member-booking') }}">Reservasi Saya</a></li>
                                <li><a href="{{ route('member-pembelian') }}">Data Pembelian</a></li>
                            </ul>
                        </li> --}}

                        <li>
                            <form action="{{ route('logout-member') }}" method="post">
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin keluar?')"
                                    style="color: #013289; font-weight: 700;"
                                    class="nav-link scrollto border-0   btn-link btn">Logout</button>
                            </form>
                        <li><a class="getstarted scrollto">{{ auth()->user()->name }}</a></li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        @yield('member')
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-md-12 footer-info">
                            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                                <img src="{{ asset('storage/' . $row->logo) }}" alt="">
                                <span>{{ $row->web }}</span>
                            </a>
                            <p>Website ini menyediakan informasi tentang wisata
                                didaerah sekitar
                                <br>
                                <br>
                                <a href="{{ route('home') }}" class="img-fluid d-flex  align-items-center">
                                    <div class="row">
                                        <img src="{{ asset('icnew.jpg') }}" width="80" class="img img-fluid mr-3 "
                                            alt="">
                                        &nbsp;&nbsp;&nbsp;
                                        <p style="color: black">Institut Pemerintahan Dalam Negeri Sumatera Barat
                                            Fakultas Manajemen Pemerintahan
                                            Program Studi Teknologi Rekayasa Informasi Pemerintahan</p>
                                    </div>
                                </a>


                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a
                                        href="{{ route('member-home') }}">Beranda</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a
                                        href="{{ route('member-homestay') }}">Homestay</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="{{ route('berita') }}">Reservasi
                                        Saya</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-2 col-6 footer-links">
                            {{-- <h4>Our Services</h4> --}}
                            {{-- <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul> --}}
                        </div>

                        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                            <h4>Contact Us</h4>
                            <p>
                                {{ $row->alamat }}<br>
                                <br>
                                <strong>Phone:</strong> {{ $row->telp }}<br>
                                <strong>Email:</strong> {{ $row->email }}<br>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{ $row->web }}</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <link rel="stylesheet" href="{{ asset('assets/plugins//toastr/toatr.css') }}">
        <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>

        <script src="{{ asset('frontend/vendor/purecounter/purecounter.js') }}"></script>
        <script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>


    </body>

    </html>
@endforeach

<script>
    $(function() {
        $(document).ready(function() {
            //datatables
            table = $('#dt').DataTable({

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
                "aLengthMenu": [
                    [5, 10, 30, 50, 100],
                    [5, 10, 30, 50, 100]
                ],
                "language": {
                    zeroRecords: "Maaf data tidak ditemukan",
                    info: "_START_ s/d _END_ dari _TOTAL_ data",
                    infoEmpty: "0 sampai 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    searchPlaceholder: 'Cari...',
                    search: '',
                    lengthMenu: '_MENU_ Item/Halaman',
                },

            });

        });
    });
</script>
