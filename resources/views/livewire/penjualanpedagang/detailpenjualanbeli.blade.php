<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('member-home') }}">Beranda</a></li>
                    <li>Detail Produk Terjual</li>
                </ol>
                <h2>Detail Produk Terjual</h2>

            </div>
        </section><!-- End Breadcrumbs -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
             <center>
                <div class="col-lg-10 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ asset('storage/' . $row->produk->image) }}" alt=""
                                class="img-fluid w-100">
                        </div>
                        <h2 class="entry-title">
                            <a
                                href="{{ route('member-product-detail', Crypt::encrypt($row->id)) }}">{{ $row->produk->produk }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>

                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="{{ route('member-product-detail', Crypt::encrypt($row->id)) }}"><time
                                            datetime="2020-01-01">{{ Carbon\Carbon::parse($row->created_at)->format('d F, Y') }}</time></a>
                                </li>

                            </ul>
                        </div>

                        <div class="entry-content">
                            <div class="row mb-5">
                                <div class="col-lg-6">
                                    <table class="table table-hover table-bordered">
                                        <tr align="center" class="bg-info text-light">
                                            <td colspan="2">Informasi Pembeli</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>{{ $row->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>No.HP</td>
                                            <td>{{ $row->telp }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 mb-5">
                                    <table class="table table-hover table-bordered">
                                        <tr align="center" class="bg-info text-light">
                                            <td colspan="2">Payment Information</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik</td>
                                            <td>
                                                {{ $row->checkoutproduct->produk->user->name }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Nama Usaha</td>
                                            <td>
                                                {{ $row->checkoutproduct->produk->nama_usaha }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Jenis Usaha</td>
                                            <td>
                                                {{ $row->checkoutproduct->produk->jenis_usaha }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>
                                                {{ $row->checkoutproduct->produk->alamat }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Merk / Brand</td>
                                            <td>
                                                {{ $row->checkoutproduct->produk->merk }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>
                                                Rp. <?php echo number_format($row->checkoutproduct->produk->harga, 0, ',', '.'); ?>
                                            </td>

                                        </tr>
                                    </table>
                                </div>

                                <div class="col-lg-12">
                                    <table class="table table-hover table-bordered">
                                        <tr align="center" class="bg-info text-light">
                                            <td colspan="2">Data pembayaran</td>
                                        </tr>
                                        <tr>
                                            <td>Bukti Bayar</td>
                                            <td><img alt=""
                                                src="{{ asset('bukti-bayar/' . $row->bukti_tf) }}" width="320"
                                                class="img-fluid img img-thumbnail"></td>
                                        </tr>
                                        <tr>
                                            <td>Qty</td>
                                            <td>{{ $row->checkoutproduct->qty }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah dibayarkan</td>
                                            <td>{{ 'Rp. ' . number_format($row->total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td>{{ $row->payment_status }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Beli</td>
                                            <td>{{ date('j F Y H:i', strtotime($row->created_at)) }}</td>
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

    </main>
</div>
