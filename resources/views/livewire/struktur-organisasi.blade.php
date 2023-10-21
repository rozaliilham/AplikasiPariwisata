<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Struktur Organisasi</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Struktur Organisasi</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                                @endif
                                <br>
                        <form wire:submit.prevent='update'>
                            @csrf
                            <table class="table">
                                <tr>
                                    <td>Foto Lama</td>
                                    <td> <img src="{{ asset('storage/'.$imagenew) }}" width="250"
                                        class="img mb-3 img-fluid img-thumbnail " alt=""></td>
                                </tr>
                                <tr>
                                    <td>Foto/Gambar</td>
                                    <td>
                                        @if ($image)
                                        <center>
                                            <img src="{{$image->temporaryUrl()}}" width="250"
                                                class="img mb-3 img-fluid img-thumbnail " alt="">
                                        </center>
                                        @endif
                                        <input type="file" wire:model='image' class="custom-file-input"
                                            id="customFile">
                                        <br>
                                        <span class="badge bg-warning text-dark">Kosongkan jika tidak diubah..</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary ">
                                            <div wire:loading wire:target="update" wire:key="update"><i
                                                    class="fa fa-spinner fa-spin"></i></div> Simpan
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <br>
    <br>
    @error('image')
    {{ $message }}
    <script>
        toastr.warning(
                "{{ $message }}",
                "Informasi!",
                { positionClass: "toast-top-right" }
            );
    </script>
    @enderror
