<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('member-home') }}">Beranda</a></li>
                    <li>Data Produk {{ auth()->user()->name }}</li>
                </ol>
                <h2>Data Produk {{ auth()->user()->name }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container table-responsive">
                <table class="table table-hover table-bordered" id="dt">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($row as $row)
                            <tr>
                                <td>{{ $no }}</td>
                                <td><strong>{{ $row->produk }}</strong></td>
                                @if ($row->stok >= 10)
                                    <td class="bg-info"><strong>{{ $row->stok }}</strong></td>
                                @elseif($row->stok <= 10)
                                    <td class="bg-warning"><strong>{{ $row->stok }}</strong></td>
                                @elseif($row->stok == 0)
                                    <td class="bg-danger"><strong>{{ $row->stok }}</strong></td>
                                @endif
                                </td>
                                <td><strong>{{ 'Rp. ' . number_format($row->harga, 0, ',', '.') }}</strong></td>
                                <td>
                                    <a href="{{ route('member.penjualan.detail', $row->id) }}" class="btn btn-info text-light"><i
                                            class="fa fa-eye " style="margin-right: 5px" aria-hidden="true"></i> Cek Penjualan
                                    </a>
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
