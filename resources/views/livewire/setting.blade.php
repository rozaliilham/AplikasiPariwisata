@foreach($setting as $row)

<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Konfigurasi Website</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Konfigurasi Website</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info " style='color:white'>
                    Website Information
                </div>
                <div class="card-body table-responsive">
                    <center>
                        <a href="javascript:void(0);"><img alt="" src="{{ asset('storage/'.$old_image) }}" width="150"
                                class="img-fluid"></a>
                    </center>
                    <table class="table table-bordered">
                        @foreach ($setting as $setting)

                        <tr>
                            <td>Nama Website</td>
                            <td>{{ $setting->web }}</td>
                            <td>Keyword</td>
                            <td>{{ $setting->keyword }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Email</td>
                            <td>{{ $setting->email }}</td>
                            <td>No.HP</td>
                            <td>{{ $setting->telp }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>{{ $setting->alamat }}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-info " style='color:white'>
                            Konfigurasi Logo Website
                        </div>
                        <div class="card-body table-responsive">
                            @error('photo')<div class="alert alert-danger">
                                {{ $message }}
                            </div> @enderror
                            @if (session()->has('msg'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('msg') }}</strong>
                            </div>

                            @endif
                            <br>

                            <form wire:submit.prevent='update'>
                                @csrf
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td colspan="4">
                                                @if ($new_image)
                                                <center>
                                                    <img src="{{$new_image->temporaryUrl()}}" width="250"
                                                        class="img mb-3 img-fluid img-thumbnail " alt="">
                                                </center>

                                                @endif
                                                <input type="file" wire:model='new_image' class="form-control"
                                                    id="customFile">
                                                <br>
                                                <span class="badge bg-warning text-dark">Kosongkan jika tidak
                                                    diubah..</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                    <div wire:loading  wire:target="update" wire:key="update"><i
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

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-info " style='color:white'>
                            Konfigurasi Website
                        </div>
                        <div class="card-body table-responsive">

                            <form wire:submit.prevent='store'>
                                @csrf
                                @if (session()->has('ubah'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('ubah') }}</strong>
                                </div>
                                @endif
                                <br>
                                <div id="notif"></div>
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td>Nama Website</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" wire:model='web' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keywords</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" wire:model='keyword' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" wire:model='telp' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Email</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" wire:model='email'
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea wire:model='alamat' id="" cols="30" rows="2"
                                                        class="form-control">{{ $alamat }}</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                    <div wire:loading  wire:target="store" wire:key="store"><i
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

            <div class="card">
                <div class="card-header bg-info " style='color:white'>
                    Konfigurasi Titik Lokasi Website
                </div>
                <div class="card-body table-responsive">
                    <br>
                    <div id="map" wire:ignore class="img-thumbnail" style="width: 100%; height: 350px;"></div>
                    <form method="POST" action="{{ route('changeLatLng') }}">
                        @csrf
                        <table class="table">
                            <tr>
                            <tr>
                                <td>
                                    Lattitude
                                </td>
                                <td>
                                    <input name="lat" value="{{ $row->lat }}" id="Latitude" type="text"
                                        class="form-control" placeholder="Latitude">
                                </td>
                                <td>
                                    Longitude
                                </td>
                                <td>
                                    <input name="lng" value="{{ $row->lng }}" id="Longitude" type="text"
                                        class="form-control" placeholder="Longitude">
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary "><i class="fa fa-paper-plane"></i>
                                        Simpan</button>

                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>




        @if (session()->has('titik'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('titik') }}",
                "success"
            );
        </script>

        @endif

















    </div>


    @if (session()->has('successlogo'))
    <script>
        toastr.success(
                "{{ session('successlogo') }}",
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
        var curLocation = [0, 0];
        if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [{{ $row->lat }},{{ $row->lng }}];
        }

        var map = L.map("map", {
        center: [{{ $row->lat }},{{ $row->lng }}],
        zoom: 12,
        zoomControl: false,
        layers: [],
        fullscreenControl: true,
        fullscreenControlOptions: { // optional
            title: "Show me the fullscreen !",
            titleCancel: "Exit fullscreen mode"
        }
        });
        var GoogleSatelliteHybrid = L.tileLayer('https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
        // maxZoom: 12,
        attribution: "{{ $row->web }}"
        }).addTo(map);

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
        draggable: 'true'
        });

        marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
        });

        map.addLayer(marker);
    </script>

    @endforeach

