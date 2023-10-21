<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Penjualan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Penjualan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-9">
                                <div class="blog-view">
                                    <div class="blog-single-post">
                                        <a href="{{ route('data-reservasi') }}" class="back-btn"><i
                                                class="feather-chevron-left"></i> Back</a>
                                        <div class="blog-image">
                                            <a href="javascript:void(0);"><img alt=""
                                                    src="{{ asset('storage/' . $row->checkoutproduct->produk->image) }}"
                                                    class="img-fluid"></a>
                                        </div>
                                        <h3 class="blog-title">{{ $row->checkoutproduct->produk->name }}</h3>

                                        <div class="blog-content">
                                            <div class="row mb-5">
                                                <div class="col-lg-6">
                                                    <table class="table table-hover table-bordered">
                                                        <tr align="center" class="bg-info text-light">
                                                            <td colspan="2">User Information</td>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
