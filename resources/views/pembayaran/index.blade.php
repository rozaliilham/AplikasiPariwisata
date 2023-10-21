@extends('layouts.member')
@section('member')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>
    <div>
        <main id="main">
            <section class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('member-home') }}">Beranda</a></li>
                        <li>Lengkapi Pembayaran</li>
                    </ol>
                    <h2>Lengkapi Pembayaran</h2>

                </div>
            </section><!-- End Breadcrumbs -->

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <table class="table table-hover table-bordered">
                                <tr align="center" class="bg-info">
                                    <td colspan="2">User Information</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $r->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $r->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No.HP</td>
                                    <td>{{ $r->user->telp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $r->user->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-hover table-bordered">
                                <tr align="center" class="bg-info">
                                    <td colspan="2">Payment Information</td>
                                </tr>
                                <tr>
                                    <td>Nama Penginapan</td>
                                    <td>{{ $r->checkout->homeStay->name }}</td>
                                </tr>
                                <tr>
                                    <td>Lama Menginap</td>
                                    <td>{{ $r->user->durasi }} day</td>
                                </tr>
                                <tr>
                                    <td>Check In</td>
                                    <td>{{ $r->checkout->check_in }}</td>
                                </tr>
                                <tr>
                                    <td>Check Out</td>
                                    <td>{{ $r->checkout->check_out }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col lg-12">
                        <table class="table table-hover table-bordered">
                            <tr align="center" class="bg-info">
                                <td colspan="2">Lengkapi pembayaran</td>
                            </tr>
                            <tr>
                                <td>Jumlah yang harus dibayar</td>
                                <td>{{ 'Rp. ' . number_format($r->total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td>{{ $r->payment_status }}</td>
                            </tr>
                            <tr align="center" class="">
                                <td colspan="2">
                                    <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </section><!-- End Blog Section -->

        </main><!-- End #main -->

        <script>
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault();

                snap.pay('{{ $snaptoken }}', {
                    // Optional
                    onSuccess: function(result) {
                        window.location.href = "{{ route('member-booking') }}";
                        console.log(result)
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        console.log(result)
                    }
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
