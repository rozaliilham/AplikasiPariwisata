<div>

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
                <strong>Time : </strong>
                <?php
                if (function_exists('date_default_timezone_set')) {
                    date_default_timezone_set('Asia/Jakarta');
                }
                ?> <span id="clock">&nbsp;</span>
                <strong>Ip Address : </strong><span id="">{{ request()->ip() }}</span>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total User</h6>
                                    <h3>{{ $user->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fa fa-user" style="color: blue"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Berita</h6>
                                    <h3>{{ $berita->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Wisata</h6>
                                    <h3>{{ $wisata->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/student-icon-01.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Agenda/Event</h6>
                                    <h3>{{ $agenda->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/student-icon-01.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div id="berita"></div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                        Peta sebaran data wisata
                    </div>
                    <div class="card-body ">
                        <div id="ggmap" class="img-thumbnail" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br>
<br>
<br>
</div>

<script>
    @foreach ($setting as $row)

        var map = L.map("ggmap", {
            center: [{{ $row->lat }}, {{ $row->lng }}],
            zoom: 9,
            zoomControl: false,
            layers: [],
        });
        var GoogleSatelliteHybrid = L.tileLayer(
            'https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
                // maxZoom: 12,
                attribution: ""
            }).addTo(map);
        @foreach ($wisata as $x)

            L.marker([{{ $x->lat }}, {{ $x->lng }}]).addTo(map)
            .bindPopup(
            '<table class="table table-striped table-bordered"><tr><td colspan="2" align="center"><img src="{{ asset('storage/' . $x->image) }}" alt="" class="img img-fluid img-thumbnail"></td></tr><tr><td>Nama</td><td>{{ $x->name }}</td></tr><tr><td>Jenis Usaha</td><td>{{ $x->jenis_usaha }}</td></tr><tr><td>Lokasi</td><td>{{ $x->lokasi }}</td></tr><tr><td>Tarif</td><td>{{ number_format($x->tarif, 0, ',', '.') }}</td></tr><tr><td align="center" colspan="2"><a href="https://maps.google.com/maps?q={{ $x->lat }},{{ $x->lng }}" target="_blank" class="btn btn-info text-light">More Information</a></td></tr></table>'
            );
        @endforeach
    @endforeach
    var d = new Date();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var hari = d.getDay();
    var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    hariIni = namaHari[hari];
    var tanggal = ("0" + d.getDate()).slice(-2);
    var month = new Array();
    month[0] = "Januari";
    month[1] = "Februari";
    month[2] = "Maret";
    month[3] = "April";
    month[4] = "Mei";
    month[5] = "Juni";
    month[6] = "Juli";
    month[7] = "Agustus";
    month[8] = "September";
    month[9] = "Oktober";
    month[10] = "Nopember";
    month[11] = "Desember";
    var bulan = month[d.getMonth()];
    var tahun = d.getFullYear();
    var date = Date.now(),
        second = 1000;

    function pad(num) {
        return ('0' + num).slice(-2);
    }

    function updateClock() {
        var clockEl = document.getElementById('clock'),
            dateObj;
        date += second;
        dateObj = new Date(date);
        clockEl.innerHTML = '' + hariIni + ',  ' + tanggal + ' ' + bulan + ' ' + tahun + ' | ' + pad(dateObj
        .getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
    }
    setInterval(updateClock, second);

   </script>
