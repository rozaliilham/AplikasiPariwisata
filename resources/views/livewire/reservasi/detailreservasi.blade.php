<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Reservasi</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Reservasi</li>
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
                                                    src="{{ asset('storage/' . $row->homeStay->image) }}" class="img-fluid"></a>
                                        </div>
                                        <h3 class="blog-title">{{ $row->homeStay->name }}</h3>

                                        <div class="blog-content">
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
                                                        <td>Jumlah yang harus dibayar</td>
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
                                            <p>
                                                {{ $row->homeStay->description }}
                                            </p>

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
