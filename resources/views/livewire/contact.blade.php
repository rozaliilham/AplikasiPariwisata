<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Kontak Masuk</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kontak Masuk</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info text-light">
                        </div>
                        <div class="card-body table-responsive">
                            <div class="input-group mb-3">
                                <input type="text" wire:model="search" class="form-control"
                                    placeholder="Cari dengan kata kunci berdasarkan nama.."
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $no = 0; ?>
                                    @foreach ($komentar as $row)
                                    <?php $no++; ?>
                                    <tr>
                                        <td scope="row">
                                            <?php echo $no ?>
                                        </td>
                                        <td scope="row">{{ $row->name }}</td>
                                        <td scope="row">{{ $row->email }}</td>
                                        <td scope="row">{{ $row->subject }}</td>
                                        <td scope="row">{{ Str::substr($row->message, 0, 70) }}</td>
                                        <td scope="row">{{ $row->created_at->diffForHumans() }}</td>
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
                                {{ $komentar->links() }}

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
