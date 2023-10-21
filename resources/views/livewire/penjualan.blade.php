<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Data Penjualan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Penjualan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Data  Penjualan
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-bordered" id="dt">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Pembeli</th>
                                        <th>Qty</th>
                                        <th>Total Bayar</th>
                                        <th>Payment Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($e as $row)
                                        <tr>
                                            <td scope="row">{{ $no }}</td>
                                            <td scope="row">{{ $row->checkoutproduct->produk->produk }}</td>
                                            <td scope="row">{{ $row->nama }}</td>
                                            <td scope="row">{{ $row->checkoutproduct->qty }}</td>
                                            <td scope="row">{{ "Rp. ".number_format($row->total, 0, ',', '.') }}</td>
                                            <td scope="row">{{ $row->payment_status }}</td>
                                            <td>
                                                <a href="{{ route('detail-penjualan',$row->id) }}" class="btn text-light btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                {{-- @if($row->confirm_status == 'Menunggu konfirmasi admin')
                                                <a href="{{ route('konfirmasi-penjualan',$row->id) }}" class="btn btn-info text-light" onclick="return confirm('Konfirmasi pemblian?')"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                @endif --}}
                                            </td>

                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('triggerDelete', id => {
                    Swal.fire({
                        title: 'Hapus data ini?',
                        text: "Data yang sudah dihapus tidak dapat kembali!",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('delete', id)
                            Swal.fire(
                                'Informasi',
                                'Data berhasil dihapus.',
                                'success'
                            )
                        }

                    });
                });
            })
        </script>
    @endpush

    @if (session()->has('hapus'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('hapus') }}",
                "success"
            );
        </script>
    @endif

    @if (session()->has('insert'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('insert') }}",
                "success"
            );
        </script>
    @endif
    @if (session()->has('confirm'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('confirm') }}",
                "success"
            );
        </script>
    @endif
