<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Visi Misi</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Visi Misi</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info " style='color:white'>
                            Konfigurasi Visi Misi
                        </div>
                        <div class="card-body table-responsive">
                            <form wire:submit.prevent='store'>
                                @csrf
                                @if (session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                </div>
                                @endif
                                <br>
                                <div id="notif"></div>
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td>Visi</td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea wire:model='xvisi' id="" cols="30" rows="2"
                                                        class="form-control">{{ $xvisi }}</textarea>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Misi</td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea wire:model='misi' id="" cols="30" rows="2"
                                                        class="form-control">{{ $misi }}</textarea>
                                                </div>
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
