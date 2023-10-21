@extends('layouts.front')
@section('front')
    <div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <section class="breadcrumbs">
                <div class="container">

                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Home Stay</li>
                    </ol>
                    <h2>Home Stay</h2>

                </div>
            </section><!-- End Breadcrumbs -->

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container">

                    <form action="{{ route('homestayfront') }}" method="GET">
                        <div class="input-group mb-5">
                            @csrf
                            <input type="text" name="datea" class="form-control">
                            <input type="text" name="dateb" class="form-control">
                            <button type="submit" class="btn btn-info text-light"><i class="fa fa-search mr-3"
                                    aria-hidden="true"></i> Cari Homestay</button>
                        </div>
                    </form>

                    <div class="row">
                        @foreach ($x as $row)
                            <div class="col-lg-4 ">
                                <div class="card rounded-3">
                                    <img src="{{ asset('storage/' . $row->image) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $row->name }}</h5>
                                        <p class="card-text">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>Harga Permalam</td>
                                                <td>{{ number_format($row->price, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>{{ $row->location }}</td>
                                            </tr>
                                        </table>
                                        <?php
                                        $x = explode(',', $row->fasilitas);

                                        ?>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Fasilitas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($x as $z)
                                                    <tr>
                                                        <td><i class="fa fa-check mr-3" aria-hidden="true"></i>
                                                            {{ $z }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ Str::substr($row->description, 0, 100) }}...
                                        </p>
                                        <a href="{{ route('detail-homestayfront', Crypt::encrypt($row->id)) }}"
                                            class="btn btn-primary">Info Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section><!-- End Blog Section -->

        </main><!-- End #main -->

        <script>
            $(function() {
                $('input[name="datea"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'), 10)
                });
            });
            $(function() {
                $('input[name="dateb"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'), 10)
                });
            });
        </script>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
