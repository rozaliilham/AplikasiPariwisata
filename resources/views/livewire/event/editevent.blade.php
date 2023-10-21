<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Agenda</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Agenda</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                            Lokasi (Drag And Drop Marker Untuk Mengambil Coordinat)

                        </div>
                        <div class="card-body table-responsive">
                            <div id="map" class="img-thumbnail" wire:ignore style="height: 400px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                        </div>
                        <div class="card-body table-responsive">
                            <h1>
                            </h1>
                            <form wire:submit.prevent='update({{ $evendId }})'>

                                @csrf
                                <table class="table table-hover">
                                    <tr>
                                        <td>Judul Agenda</td>
                                        <td colspan="3">
                                            <input type="text" placeholder="Judul Agenda" class="form-control"
                                                wire:model='judul'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai</td>
                                        <td>
                                            <input type="datetime-local" class="form-control waktu" wire:model='mulai'>
                                        </td>
                                        <td>Tanggal Selesai</td>
                                        <td>
                                            <input type="datetime-local" class="form-control waktu"
                                                wire:model='selesai'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lattitude
                                        </td>
                                        <td>
                                            <input wire:model.lazy='lat' id="Latitude" type="text" class="form-control"
                                                placeholder="Latitude" required>
                                        </td>
                                        <td>
                                            Longitude
                                        </td>
                                        <td>
                                            <input wire:model.lazy='lng' id="Longitude" type="text" class="form-control"
                                                placeholder="Longitude" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Status</td>
                                        <td colspan="3">
                                            <select wire:model='status' id="" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="Draft">Draft</option>
                                                <option value="Publish">Publish</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Lokasi Agenda</td>
                                        <td colspan="3">
                                            <textarea class="form-control" placeholder="Lokasi agenda"
                                                wire:model='lokasi'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan / Deskripsi</td>
                                        <td colspan="3">
                                            <textarea class="form-control" placeholder="Keterangan / Deskripsi"
                                                wire:model='ket'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td colspan=>Foto/Gambar</td> --}}
                                        <td colspan="4" align="center">
                                            @if ($image)
                                            <center>
                                                <img src="{{$image->temporaryUrl()}}" width="250"
                                                    class="img mb-3 img-fluid img-thumbnail" alt="">
                                            </center>
                                            @endif
                                            <input type="file" wire:model='image' class="form-control" id="customFile">
                                            <br>
                                            <span class="badge bg-warning text-dark">Kosongkan jika tidak diubah..</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td colspan="3">
                                            <a href="{{ route('event') }}" class="btn btn-warning"><i
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





    @if (session()->has('message'))
    <script>
        toastr.success(
                "{{ session('message') }}",
                "Informasi!",
                { positionClass: "toast-top-right" }
            );
    </script>
    @endif
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

    <script>
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    @foreach($row as $row)
    <script>
        document.addEventListener('livewire:load',() =>{
                                            let mapOptions = {
                                                center:[{{ $row->lat }},{{ $row->lng }}],
                                                zoom:10
                                            }
                                            let map = new L.map('map' , mapOptions);
                                            let layer = new L.TileLayer('https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}');
                                            map.addLayer(layer);
                                            let marker = null;
                                            map.on('click', (event)=> {
                                                if(marker !== null){
                                                    map.removeLayer(marker);
                                                }
                                                marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);
                                                document.getElementById('Latitude').value = event.latlng.lat;
                                                document.getElementById('Longitude').value = event.latlng.lng;
                                                @this.lat = document.getElementById('Latitude').value;
                                                @this.lng = document.getElementById('Longitude').value;
                                            })
                                        });
    </script>

    @endforeach
