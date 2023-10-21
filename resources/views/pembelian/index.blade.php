@extends('layouts.front')
@section('front')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>
    <div>
        <main id="main">
            <section class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('member-home') }}">Beranda</a></li>
                        <li>Lengkapi Pembayaran</li>
                    </ol>
                    <h2>Lengkapi Pembayaran</h2>

                </div>
            </section><!-- End Breadcrumbs -->
            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr align="center" class="bg-info">
                                    <td colspan="2">Info pembayaran</td>
                                </tr>
                                <tr>
                                    <td>Qty</td>
                                    <td>{{ $r->qty }}</td>
                                </tr>

                                <tr>
                                    <td>Jumlah yang harus dibayar</td>
                                    <td>{{ 'Rp. ' . number_format($r->qty * $r->price, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr align="center" class="bg-info">
                                    <td colspan="2">Info Produk</td>
                                </tr>
                                <tr>
                                    <td>Produk</td>
                                    <td>
                                        {{ $r->produk->produk }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>Nama Pemilik</td>
                                    <td>
                                        {{ $r->produk->nama_pemilik }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>Nama Usaha</td>
                                    <td>
                                        {{ $r->produk->nama_usaha }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>Jenis Usaha</td>
                                    <td>
                                        {{ $r->produk->jenis_usaha }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        {{ $r->produk->alamat }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>Merk / Brand</td>
                                    <td>
                                        {{ $r->produk->merk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        Rp. <?php echo number_format($r->produk->harga, 0, ',', '.'); ?>
                                    </td>

                                </tr>


                            </table>
                        </div>
                    </div>

                    <div class="col-lg-12 table-responsive">
                        @error('image')
                            <div class="alert alert-danger mb-1">{{ $message }}</div>
                        @enderror
                        <br>
                        <br>
                        <form action="{{ route('bayar.ngab') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <table class="table table-bordered table-hover">
                                <tr align="center" class="bg-info">
                                    <td colspan="2">Lengkapi pembayaran</td>
                                </tr>
                                <tr>
                                    <td>Nama Pembeli</td>
                                    <td><input type="text" placeholder="Masukan nama lengkap anda..." name="nama"
                                            required class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>No.HP</td>
                                    <td>
                                        <input type="number" min="0" placeholder="Masukan no.hp aktif anda..."
                                            name="telp" required class="form-control">
                                        <input type="hidden" value="{{ $r->produk->id }}" min="0"
                                            placeholder="Masukan no.hp aktif anda..." name="produk_id" required
                                            class="form-control">
                                        <input type="hidden" value="{{ $r->id }}" min="0"
                                            placeholder="Masukan no.hp aktif anda..." name="checkout_id" required
                                            class="form-control">
                                        <input type="hidden" value="{{ $r->qty * $r->price }}" min="0"
                                            placeholder="Masukan no.hp aktif anda..." name="total" required
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bukti Transfer</td>
                                    <td>
                                        <center> <img id="blah" class='img-responsive' width='280'
                                                src="{{ asset('nofoto.jpg') }}" alt="your image" /></center>
                                        <input type="file" required name="image" class="form-control mb-3"
                                            onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                                        <span class="badge bg-warning mb-3"><strong>Informasi</strong> Input
                                            Gambar Hanya Bisa Bertype JPG,JPEG,PNG Dan Maksimal 5mb !</span>


                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary " type="submit"><i class="fa fa-paper-plane"
                                                aria-hidden="true"></i> Bayar</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
