<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Wisata</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Wisata</li>
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
                            <form wire:submit.prevent='update({{ $wisataId }})' method="POST">
                                @csrf
                            <div ng-controller="studentCtrl">
                                    <table class="table">
                                        <tr>
                                            <td>Nama Wisata</td>
                                            <td colspan="3">
                                                <input type="text" placeholder="Nama Wisata" class="form-control"
                                                    wire:model='name'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tarif Wisata</td>
                                            <td colspan="3">
                                                <input type="number" min="0" placeholder="Tarif Wisata"
                                                    class="form-control" wire:model='tarif'>
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
                                            <td>Lokasi </td>
                                            <td colspan="3">
                                                <input type="text" placeholder="Nama Wisata" class="form-control"
                                                    wire:model='lokasi'>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi </td>
                                            <td colspan="3">
                                                <input type="text" placeholder="Nama Wisata" class="form-control"
                                                    wire:model='provinsi'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Kabupaten
                                            </td>
                                            <td>
                                                <select id="selector" wire:model='kabupaten'
                                                    class="form-control select2">
                                                    <option value="">Pilih</option>
                                                    @foreach($datakabupaten as $kab)
                                                    <option value="<?php echo $kab->id ?>">
                                                        <?php echo $kab->name ?>
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>Kecamatan</td>
                                            <td>
                                                <select id="selector" wire:model='kecamatan'
                                                    class="form-control select2">
                                                    <option value="">Pilih</option>
                                                    @foreach($datakecamatan as $kec)
                                                    <option value="<?php echo $kec->id ?>">
                                                        <?php echo $kec->name ?>
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Lattitude
                                            </td>
                                            <td>
                                                <input wire:model='lat' id="Latitude" type="text" class="form-control"
                                                    placeholder="Latitude" required>
                                            </td>
                                            <td>
                                                Longitude
                                            </td>
                                            <td>
                                                <input wire:model='lng' id="Longitude" type="text" class="form-control"
                                                    placeholder="Longitude" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td colspan="3">
                                                <select id="selector" wire:model='category'
                                                    class="form-control select2">
                                                    <option value="">Pilih</option>
                                                    @foreach($datakategori as $kat)
                                                    <option value="<?php echo $kat->id ?>">
                                                        <?php echo $kat->title ?>
                                                    </option>
                                                    @endforeach
                                                </select>
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
                                                <input type="file" wire:model='image' class="form-control"
                                                    id="customFile">
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                        </div>
                    </div>

                </div>
                <!--  -->
                <div class="card col-lg-12">
                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <td>Keterangan / Deskripsi</td>
                                <td colspan="3">
                                    <textarea class="form-control" wire:model='ket'></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <a href="{{ route('wisata') }}" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary ">
                                        <div wire:loading wire:target="update" wire:key="update"><i
                                                class="fa fa-spinner fa-spin"></i></div> Simpan
                                    </button>
                                </td>
                                <td>
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
