    <div>
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <section class="breadcrumbs">
                <div class="container">

                    <ol>
                        <li><a href="{{ route('member-home') }}">Beranda</a></li>
                        <li>Reservasi Saya</li>
                    </ol>
                    <h2>Reservasi Saya</h2>

                </div>
            </section><!-- End Breadcrumbs -->

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container table-responsive">

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penginapan</th>
                                <th>Check In - Check Out</th>
                                <th>Total</th>
                                <th>Status Pembayaran</th>
                                <th>Status Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($reservasi as $row)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td><strong>{{ $row->checkout->homeStay->name }}</strong></td>
                                    <td><strong>{{ $row->checkout->check_in . ' / ' . $row->checkout->check_out }}</strong>
                                    </td>
                                    <td><strong>{{ 'Rp. ' . number_format($row->total, 0, ',', '.') }}</strong></td>
                                    <td>
                                        @if ($row->payment_status == 'paid')
                                            <span class="badge rounded-pill bg-primary">Sudah Bayar</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning">Belum Bayar</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->confirm_status == 'Menunggu konfirmasi admin')
                                            <span class="badge rounded-pill bg-danger">Menunggu konfirmasi admin</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">Sudah dikonfirmasi admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="https:wa.me/{{ $row->homeStay->telp }}" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp " style="margin-right: 5px" aria-hidden="true"></i> Contact Owner</a>
                                        <a href="{{ route('invoice',$row->id) }}"  class="btn btn-info text-light"><i class="fa fa-eye " style="margin-right: 5px" aria-hidden="true"></i> Detail </a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </section><!-- End Blog Section -->

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
