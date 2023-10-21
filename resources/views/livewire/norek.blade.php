<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Data Nomor Rekening Pedagang</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Nomor Rekening Pedagang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Form  Nomor Rekening Pedagang
                        </div>
                        <div class="card-body table-responsive">
                            <form wire:submit.prevent="upload">
                                <table class="table">
                                <tr>
                                    <td>Atas Nama</td>
                                    <td><input type="text" wire:model="name" required id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td><input type="text" wire:model="bank" required id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td><input type="text" wire:model="bank_number" required id="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button></td>
                                </tr>
                            </table>
                           </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Data  Nomor Rekening Pedagang
                        </div>
                        <div class="card-body table-responsive">
                            <div class="input-group mb-3">
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Cari dengan kata kunci berdasarkan nama.."
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <br>

                            <table class="table table-hover table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atas Nama</th>
                                        <th>Bank</th>
                                        <th>Norek</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($e as $row)
                                        <tr>
                                            <td scope="row">{{ $no }}</td>
                                            <td scope="row">{{ $row->name }}</td>
                                            <td scope="row">{{ $row->bank }}</td>
                                            <td scope="row">{{ $row->bank_number }}</td>
                                            <td>
                                                <a wire:click="$emit('triggerDelete',{{ $row->id }})" class="btn btn-danger"><i
                                                    class="feather-trash-2 me-1"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach

                                </tbody>
                            </table>
                            <br>
                            <div class="d-flex justify-content-center">
                                {{ $e->links() }}

                            </div>

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
