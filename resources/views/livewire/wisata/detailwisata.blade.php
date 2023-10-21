<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Wisata</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Wisata</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-9">

                            <div class="blog-view">
                                <div class="blog-single-post">
                                    <a href="{{ route('wisata') }}" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt=""
                                                src="{{ asset('storage/'.$wisata->image) }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{$wisata->name}}</h3>
                                    <div class="blog-info">
                                        <div class="post-list">
                                            <ul>
                                                <li>
                                                    <div class="post-author">
                                                        <a><img src="{{ asset('pria.png') }}" alt="Post Author">
                                                            <span>by {{ $wisata->user->name }} </span></a>
                                                    </div>
                                                </li>
                                                <li><i class="feather-clock"></i> {{ $wisata->created_at->diffForHumans()
                                                    }}</li>
                                                <li><i class="feather-eye"></i> {{ $wisata->views }} Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>Tarif</td>
                                                <td>
                                                    <?php echo number_format($wisata->tarif,0,',','.') ?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Jenis Usaha</td>
                                                <td>
                                                    {{ $wisata->jenis_usaha }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td>
                                                    {{ $wisata->provinsi }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kabupaten</td>
                                                <td>
                                                    {{ $wisata->kabupaten->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>
                                                    {{ $wisata->kecamatan->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>
                                                    {{ $wisata->category->title }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>
                                                    {{ $wisata->lokasi }}
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <p>
                                            {{ $wisata->ket }}
                                        </p>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="gmap" class="img-thumbnail" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<script>
    var map = L.map("gmap", {
    center: [{{ $wisata->lat }},{{ $wisata->lng }}],
    zoom: 12,
    zoomControl: false,
    layers: [],
});
var GoogleSatelliteHybrid = L.tileLayer('https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
    // maxZoom: 12,
    attribution: ""
}).addTo(map);
var marker = L.marker([{{ $wisata->lat }},{{ $wisata->lng }}]).addTo(map)
    .bindPopup('<center><b>{{ $wisata->name }}</b> <br> <br> {{ $wisata->lokasi }} </center>').openPopup();
</script>
