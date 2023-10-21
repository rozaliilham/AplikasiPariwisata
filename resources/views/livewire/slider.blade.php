<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Slider</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                    </div>
                    <div class="card-body table-responsive">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <br>
                        <form method="post" wire:submit.prevent='store'>
                            @csrf
                            <table class="table">
                                <tr>
                                    <td>Judul</td>
                                    <td><input type="text" placeholder="Judul Slider" class="form-control" required
                                            wire:model='title'></td>
                                </tr>
                                <tr>
                                    <td>Foto/Gambar</td>
                                    <td>
                                        @if ($image)
                                            <center>
                                                <img src="{{ $image->temporaryUrl() }}" width="250"
                                                    class="img mb-3 img-fluid img-thumbnail" alt="">
                                            </center>
                                        @endif
                                        <input type="file" wire:model='image' class="custom-file-input"
                                            id="customFile">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary ">
                                            <div wire:loading wire:target="store" wire:key="store"><i
                                                    class="fa fa-spinner fa-spin"></i></div> Simpan
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                    </div>
                    <div class="card-body table-responsive">
                        <div class="input-group mb-3">
                            <input type="text" wire:model="search" class="form-control"
                                placeholder="Cari dengan kata kunci berdasarkan judul.."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                        </div>
                    </div>
                </div>
            </div>
            @if ($gallery->count() > 0)
                <div class="row">
                    @foreach ($gallery as $row)
                        <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                <div class="blog-image">
                                    <a href="/slider"><img class="img-fluid" src="{{ asset('storage/' . $row->image) }}"
                                            alt="Post Image"></a>
                                    {{-- <div class="blog-views">
                                <i class="feather-eye me-1"></i> 225
                            </div> --}}
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a href="/slider">{{ $row->title }} </a></h3>
                                </div>
                                <br>
                                <center>
                                    <div class="row justify-content-center">
                                        <div class="edit-options">
                                            <div class="edit-delete-btn justify-content-center">
                                                <a wire:click="$emit('triggerDelete',{{ $row->id }})"
                                                    href="#" class="text-danger"><i
                                                        class="feather-trash-2 me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    <strong>No Slider found</strong>
                </div>
            @endif
            <br>
            <br>
            <div class="d-flex justify-content-center">
                {{ $gallery->links() }}

            </div>

            <br>
            <br>

        </div>

    </div>
    @if (session()->has('hapus'))
        <script>
            toastr.success(
                "{{ session('hapus') }}",
                "Informasi!", {
                    positionClass: "toast-top-right"
                }
            );
        </script>
    @endif


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
