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
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $news->image) }}" alt=""
                                    class="img-fluid w-100">
                            </div>
                            <h2 class="entry-title">
                                <a
                                    href="{{ route('member-product-detail', Crypt::encrypt($news->id)) }}">{{ $news->produk }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>

                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('member-product-detail', Crypt::encrypt($news->id)) }}"><time
                                                datetime="2020-01-01">{{ Carbon\Carbon::parse($news->created_at)->format('d F, Y') }}</time></a>
                                    </li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>Nama Pemilik</td>
                                        <td>
                                            {{ $news->nama_pemilik }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Nama Usaha</td>
                                        <td>
                                            {{ $news->nama_usaha }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Jenis Usaha</td>
                                        <td>
                                            {{ $news->jenis_usaha }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            {{ $news->alamat }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Merk / Brand</td>
                                        <td>
                                            {{ $news->merk }}
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>No.HP</td>
                                        <td>
                                            <a href="https://api.whatsapp.com/send?phone={{ $news->telp }}"
                                                target="_blank" class="btn btn-warning"><i class="fa fa-phone"
                                                    aria-hidden="true"></i> Hubungi</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>
                                            Rp. <?php echo number_format($news->harga, 0, ',', '.'); ?>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </article><!-- End blog entry -->

                        <div class="blog-author  rounded-3">
                            <div>
                                <h2>Beli Produk Ini</h2>
                                <form action="{{ route('checkout') }}" method="post">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td>Qty</td>
                                            <td><input type="number" min="0"
                                                    placeholder="Qty / jumlah pembelian..." name="qty"
                                                    id="" class="form-control">
                                                    <input type="hidden" value="{{ $news->id }}" name="product_id"
                                                    id="" class="form-control">
                                                <input type="hidden" value="{{ $news->harga }}" name="price"
                                                    id="" class="form-control">
                                                <input type="hidden" value="Produk" name="type"
                                                    id="" class="form-control">
                                                </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-money-bill-alt    "></i> Lanjut
                                                    Pembayaran</button></td>

                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div><!-- End blog author bio -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">


                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recent as $x)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('storage/' . $x->image) }}" alt="">
                                        <h4><a
                                                href="{{ route('member-product-detail', Crypt::encrypt($x->id)) }}">{{ $x->produk }}</a>
                                        </h4>
                                        <time datetime="2020-01-01">{{ $x->created_at->diffForHumans() }}</time>
                                    </div>
                                @endforeach
                            </div><!-- End sidebar recent posts-->


                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main>
</div>
