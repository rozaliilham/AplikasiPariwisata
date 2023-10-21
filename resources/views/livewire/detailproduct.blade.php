<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Product</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Product</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-9">

                            <div class="blog-view">
                                <div class="blog-single-post">
                                    <a href="{{ route('product') }}" class="back-btn"><i
                                            class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt=""
                                                src="{{ asset('storage/' . $row->image) }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{ $row->produk }}</h3>

                                    <div class="blog-content">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>Nama Pemilik</td>
                                                <td>
                                                    {{ $row->user->name }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Nama Usaha</td>
                                                <td>
                                                    {{ $row->nama_usaha }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Jenis Usaha</td>
                                                <td>
                                                    {{ $row->jenis_usaha }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>
                                                    {{ $row->alamat }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Merk / Brand</td>
                                                <td>
                                                    {{ $row->merk }}
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>No.HP</td>
                                                <td>
                                                    <a href="https://api.whatsapp.com/send?phone={{ $row->telp }}"
                                                        target="_blank" class="btn btn-warning"><i class="fa fa-phone"
                                                            aria-hidden="true"></i> Hubungi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td>
                                                    <?php echo number_format($row->harga, 0, ',', '.'); ?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>
                                                    @if($row->stok >= 10)
                                                        <span class="badge bg-info">{{ $row->stok }}</span>
                                                        @elseif($row->stok <= 10)
                                                        <span class="badge bg-warning">{{ $row->stok }}</span>
                                                        @elseif($row->stok == 0)
                                                        <span class="badge bg-danger">{{ $row->stok }}</span>
                                                    @endif
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>Status Produk</td>
                                                @if($row->status == "Tersedia")
                                                <td class="bg bg-success">
                                                    {{ $row->status }}
                                                </td>
                                                @else
                                                <td class="bg bg-danger">
                                                    {{ $row->status }}
                                                </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Date Created</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($row->created_at)->format('d F Y H:i') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date Updated</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($row->updated_at)->format('d F Y H:i') }}
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <table class="table table-bordered table-hover">
                                            <tr align="center">
                                                <td colspan="2" class="bg-info">Informasi Pembayaran</td>
                                            </tr>
                                            <tr>
                                                <td>Atas Nama</td>
                                                <td>
                                                    {{ $row->nomorrekening->name }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Bank</td>
                                                <td>
                                                    {{ $row->nomorrekening->bank }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Nomor Rekening</td>
                                                <td>
                                                    {{ $row->nomorrekening->bank_number }}
                                                </td>

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
<br>
<br>
<br>
<br>
<br>
