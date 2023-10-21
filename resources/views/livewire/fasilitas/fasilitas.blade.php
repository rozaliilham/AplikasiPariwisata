<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Fasilitas Homestay</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Fasilitas Homestay</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Form Fasilitas Homestay
                        </div>
                        <div class="card-body table-responsive">

                            <form wire:submit.prevent="store">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Fasilitas </label>
                                    <div class="col-md-10">
                                        <input type="text" wire:model="name" class="form-control"
                                            placeholder="Fasilitas Homestay" required>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <label class="col-form-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"
                                                aria-hidden="true"></i>
                                            Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Data Fasilitas Homestay
                        </div>
                        <div class="card-body table-responsive">
                            <div class="input-group mb-3">
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Cari dengan kata kunci berdasarkan kategori.."
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fasilitas </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fasilitas as $row)
                                        <tr>
                                            <td scope="row">{{ $row->fasilitas }}</td>
                                            <td scope="row">
                                                <button wire:click="$emit('triggerDelete',{{ $row->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                            {{-- <td></td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <br>
                            <div class="d-flex justify-content-center">
                                {{ $fasilitas->links() }}

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
