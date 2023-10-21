<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit HomeStay</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit HomeStay</li>
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
                                        <td>Nama HomeStay</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Judul HomeStay" class="form-control"
                                                wire:model='name'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Homestay</td>
                                        <td colspan="3">
                                            <input type="number" placeholder="Harga HomeStay" class="form-control"
                                                wire:model='price'>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Fasilitas Homestay</td>
                                        <td colspan="3">
                                            <div wire:ignore>
                                                <select wire:model='fasilitasName' id="fasilitasAll"
                                                    class="form-control multiple" multiple>
                                                    @foreach ($fasilitas as $row)
                                                       @if($row->fasilitas == $fasilitasName)
                                                       <option selected value="{{ $row->fasilitas }}">{{ $row->fasilitas }}
                                                    </option>
                                                       @else
                                                       <option value="{{ $row->fasilitas }}">{{ $row->fasilitas }}
                                                    </option>
                                                       @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No.HP</td>
                                        <td colspan="3">
                                            <input type="number" placeholder="No.HP HomeStay" class="form-control"
                                                wire:model='telp'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Lokasi HomeStay" class="form-control"
                                                wire:model='location'>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Keterangan / Deskripsi</td>
                                        <td colspan="3">
                                            <textarea class="form-control" placeholder="Keterangan / Deskripsi" wire:model='description'></textarea>
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
                                            <a href="{{ route('homestay') }}" class="btn btn-warning"><i
                                                    class="fa fa-sync-alt"></i>
                                                Kembali</a>
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

    </div>





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

@push('scripts')
<script>
    $(document).ready(function() {

        $('#fasilitasAll').select2();
        // $(".multiple").on('change', function(e) {
        //     let data = $(this).val();
        //     @this.set("fasilitasName", data);
        // })
        $('#fasilitasAll').on('change', function (e) {
                let data = $(this).val();
                 @this.set('fasilitasName', data);
            });
            window.livewire.on('productStore', () => {
                $('#fasilitasAll').select2();
            });
    });
</script>

@endpush
