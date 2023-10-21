<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Product</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                        </div>
                        <div class="card-body table-responsive">
                            <h1>
                            </h1>
                            <form wire:submit.prevent="update({{ $idx }})">
                                @csrf
                                <table class="table table-hover">
                                    <tr>
                                        <td>Nama Usaha</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Nama Usaha" class="form-control"
                                                wire:model='nama_usaha'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemilik</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Nama Pemilik" class="form-control"
                                                wire:model='nama_pemilik'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Usaha</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Jenis Usaha" class="form-control"
                                                wire:model='jenis_usaha'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Alamat" class="form-control"
                                                wire:model='alamat'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Produk</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Nama Produk" class="form-control"
                                                wire:model='produk'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Merk / Brand</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Merk / Brand" class="form-control"
                                                wire:model='merk'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td colspan="3">
                                            <input type="number" placeholder="Harga Product" class="form-control"
                                                wire:model='harga'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok Produk</td>
                                        <td colspan="3">
                                            <input type="number" min="0" placeholder="Stok Product" class="form-control"
                                                wire:model='stok'>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No.HP</td>
                                        <td colspan="3">
                                            <input type="number" placeholder="No.HP Product" class="form-control"
                                                wire:model='telp'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pilih Nomor Rekening Pemilik</td>
                                        <td colspan="3">
                                            <div wire:ignore>
                                                <select wire:model='norekid' id="fasilitasAll"
                                                    class="form-control">
                                                    <option value="">Pilih</option>
                                                    @foreach ($getrek as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }} |  {{ $row->bank }} | {{ $row->bank_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        {{-- <td colspan=>Foto/Gambar</td> --}}
                                        <td colspan="4" align="center">
                                            @if ($image)
                                                <center>
                                                    <img src="{{ $image->temporaryUrl() }}" width="250"
                                                        class="img mb-3 img-fluid img-thumbnail" alt="">
                                                </center>
                                            @endif
                                            <input type="file" wire:model='image' class="form-control"
                                                id="customFile">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td colspan="3">
                                            <a href="{{ route('product') }}" class="btn btn-warning"><i
                                                    class="fa fa-sync-alt"></i>
                                                Kembali</a>
                                            <button type="submit" class="btn btn-primary ">
                                                <div wire:loading wire:target="uploadImage" wire:key="uploadImage"><i
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

    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#fasilitasAll').select2();
                $('#fasilitasAll').on('change', function(e) {
                    var data = $('#fasilitasAll').select2("val");
                    @this.set('norekid', data);
                });
            });
        </script>
    @endpush





    @error('image')
        {{ $message }}
        <script>
            toastr.warning(
                "{{ $message }}",
                "Informasi!", {
                    positionClass: "toast-top-right"
                }
            );
        </script>
    @enderror
