<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Form Gallery Video</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Gallery Video</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card">

                    <div class="card-body">
                        <div class="alert alert-info mb-3" role="alert">
                            <strong>Informasi!</strong> untuk memasukan video hanya cukup mencopy source url youtube saja.
                        </div>
                        <form wire:submit.prevent="store">
                            @csrf
                            <table class="table">
                                <tr>
                                    <td>Nama Video</td>
                                    <td>
                                        <input type="text" wire:model='title' class="form-control"
                                            placeholder="Masukan nama video" autofocus>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sumber Video</td>
                                    <td>
                                        <input type="url" wire:model='src' class="form-control"
                                            placeholder="Masukan url video" required autofocus>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('video') }}" class="btn btn-warning"><i
                                                class="fa fa-sync-alt"></i> Kembali</a>
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

        </div>

    </div>

    @if (session()->has('message'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('message') }}",
                "success"
            );
        </script>
    @endif

