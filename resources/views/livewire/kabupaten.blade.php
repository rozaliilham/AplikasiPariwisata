<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Kabupaten</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kabupaten</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header bg-info text-light">
                            Form Kabupaten
                        </div>
                        <div class="card-body table-responsive">
                            <form wire:submit.prevent="store">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Kabupaten</label>
                                    <div class="col-md-10">
                                        <input type="text" wire:model="name" class="form-control"
                                            placeholder="Kabupaten" required>
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
                            Data Kabupaten
                        </div>
                        <div class="card-body table-responsive">

                            <div class="input-group mb-3">
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Cari dengan kata kunci berdasarkan kabupaten.."
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <br>
                            <table id="" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kabupaten</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0 ?>
                                    @foreach ($kat as $row)
                                    <?php $no++; ?>
                                    <tr>
                                        <td scope="row">{{ $no }}</td>
                                        <td scope="row">{{ $row->name }}</td>
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
                                {{ $kat->links() }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    @push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
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
            @this.call('delete',id)
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
