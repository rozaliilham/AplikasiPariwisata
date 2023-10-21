<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">My Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 ">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                            My Profile
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td align="center" colspan="2">
                                        <img src="{{ asset('pria.png') }}" class="img rounded-circle" width="120"
                                            alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td>ALamat Email</td>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <td>No.HP</td>
                                    <td>{{ auth()->user()->telp }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Dibuat</td>
                                    <td>{{ auth()->user()->created_at->diffForHumans() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                            Edit Profile
                        </div>
                        <div class="card-body table-responsive">
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <form wire:submit.prevent='updateProfile'>
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td>Nama </td>
                                        <td><input type="text" wire:model='name' id="" class="form-control"
                                                placeholder="Masukan nama anda" autofocus
                                                value="{{ auth()->user()->name }}"></td>
                                    </tr>
                                    <tr>
                                        <td>No.HP</td>
                                        <td><input type="tel" wire:model='telp' id="" class="form-control"
                                                placeholder="Masukan nomor hp aktif anda" autofocus
                                                value="{{ auth()->user()->telp }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td><input type="email" wire:model='email' id="" class="form-control"
                                                placeholder="Masukan email anda" autofocus
                                                value="{{ auth()->user()->email }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Password </td>
                                        <td><input type="password" wire:model='password' id="" class="form-control"
                                                placeholder="Kosongkan jika tidak diubah.." autofocus></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"
                                                    aria-hidden="true"></i> Simpan</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
