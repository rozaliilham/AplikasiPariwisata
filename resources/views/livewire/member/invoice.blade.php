<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('member-home') }}">Beranda</a></li>
                    <li>Detail Pembayaran</li>
                </ol>
                <h2>Detail Pembayaran</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

                <div class="row">

                    <center>
                        <div class="col-lg-8 entries table-responsive">

                            <article class="entry entry-single">

                                <div class="entry-img">
                                    <img src="{{ asset('storage/' . $row->homeStay->image) }}" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a
                                        >{{ $row->homeStay->name }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                >{{ $row->user->name }}</a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                ><time
                                                    datetime="2020-01-01">{{ Carbon\Carbon::parse($row->created_at)->format('d F, Y') }}</time></a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <br>
                                    <br>
                                    <div class="row mb-5">
                                        <div class="col-lg-6">
                                            <table class="table table-hover table-bordered">
                                                <tr align="center" class="bg-info text-light">
                                                    <td colspan="2">User Information</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>{{ $row->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{ $row->user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>No.HP</td>
                                                    <td>{{ $row->user->telp }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>{{ $row->user->alamat }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6 mb-5">
                                            <table class="table table-hover table-bordered">
                                                <tr align="center" class="bg-info text-light">
                                                    <td colspan="2">Payment Information</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Kamar</td>
                                                    <td>{{ $row->checkout->homeStay->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lama Menginap</td>
                                                    <td>{{ $row->user->durasi }} day</td>
                                                </tr>
                                                <tr>
                                                    <td>Check In</td>
                                                    <td>{{ $row->checkout->check_in }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Check Out</td>
                                                    <td>{{ $row->checkout->check_out }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                      <div class="col-lg-12">

                                        <table class="table table-hover table-bordered">
                                            <tr align="center" class="bg-info text-light">
                                                <td colspan="2">Data pembayaran</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah  dibayarkan</td>
                                                <td>{{ 'Rp. ' . number_format($row->total, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Status</td>
                                                <td>{{ $row->payment_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Konfirmasi Admin</td>
                                                <td>{{ $row->confirm_status }}</td>
                                            </tr>
                                        </table>
                                      </div>
                                    </div>

                                </div>


                            </article><!-- End blog entry -->


                        </div><!-- End blog entries list -->

                    </center>

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
