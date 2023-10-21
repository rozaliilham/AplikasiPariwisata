<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('member-home') }}">Beranda</a></li>
                    <li>Detail Produk</li>
                </ol>
                <h2>Detail Produk</h2>

            </div>
        </section><!-- End Breadcrumbs -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $produk->image) }}" alt=""
                                    class="img-fluid w-100">
                            </div>
                            <h2 class="entry-title">
                                <a
                                    href="{{ route('member-product-detail', Crypt::encrypt($produk->id)) }}">{{ $produk->produk }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>

                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('member-product-detail', Crypt::encrypt($produk->id)) }}"><time
                                                datetime="2020-01-01">{{ Carbon\Carbon::parse($produk->created_at)->format('d F, Y') }}</time></a>
                                    </li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>Nama Pemilik</td>
                                        <td>
                                            {{ $produk->user->name }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Nama Usaha</td>
                                        <td>
                                            {{ $produk->nama_usaha }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Jenis Usaha</td>
                                        <td>
                                            {{ $produk->jenis_usaha }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            {{ $produk->alamat }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Merk / Brand</td>
                                        <td>
                                            {{ $produk->merk }}
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>No.HP</td>
                                        <td>
                                            <a href="https://api.whatsapp.com/send?phone={{ $produk->telp }}"
                                                target="_blank" class="btn btn-warning"><i class="fa fa-phone"
                                                    aria-hidden="true"></i> Hubungi</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>
                                            Rp. <?php echo number_format($produk->harga, 0, ',', '.'); ?>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </article><!-- End blog entry -->


                    </div><!-- End blog entries list -->

                    <div class="col-lg-6">
                        <div class="blog-author  rounded-3">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dt">
                                    <thead>
                                        <tr align="center">
                                            <th colspan="6" class="bg-info">Data Penjualan</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Tanggal Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($row as $row)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><strong>{{ $row->produk->produk }}</strong></td>
                                                <td><strong>{{ $row->checkoutproduct->qty }}</strong></td>
                                                <td><strong>{{ 'Rp. ' . number_format($row->total, 0, ',', '.') }}</strong></td>
                                                <td><strong>{{ date('j F Y H:i', strtotime($row->created_at)) }}</strong></td>

                                                <td>
                                                    <a href="{{ route('member.penjualan.detail.jual', $row->id) }}" class="btn btn-info text-light"><i
                                                            class="fa fa-eye " style="margin-right: 5px" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div><!-- End blog author bio -->


                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main>
</div>
