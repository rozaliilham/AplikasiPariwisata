<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('member-home') }}">Beranda</a></li>
                    <li>Produk</li>
                </ol>
                <h2>Produk</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="blog" class="blog">
            <div class="container">

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" wire:model="search" class="form-control"
                                placeholder="Cari dengan kata kunci berdasarkan nama produk.."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($x as $row)
                        <div class="col-lg-4 ">
                            <div class="card rounded-3">
                                <img src="{{ asset('storage/' . $row->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row->produk }}</h5>
                                    <p class="card-text">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <td>Nama Usaha</td>
                                            <td>{{ $row->nama_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik</td>
                                            <td>{{ $row->nama_pemilik }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>
                                    </p>
                                    <a href="{{ route('member-product-detail', Crypt::encrypt($row->id)) }}"
                                        class="btn btn-primary">Info Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <br>
                <div class="d-flex justify-content-center">
                    {{ $x->links() }}

                </div>
            </div>
        </section><!-- End Blog Section -->

    </main>
</div>
