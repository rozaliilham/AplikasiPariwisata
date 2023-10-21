<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Agenda</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Agenda</li>
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
                                    <a href="/event" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt=""
                                                src="{{ asset('storage/'.$event->image) }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{$event->judul}}</h3>
                                    <div class="blog-info">
                                        <div class="post-list">
                                            <ul>
                                                <li>
                                                    <div class="post-author">
                                                        <a><img src="{{ asset('pria.png') }}" alt="Post Author">
                                                            <span>by {{ $event->user->name }} </span></a>
                                                    </div>
                                                </li>
                                                <li><i class="feather-clock"></i> {{ $event->created_at->diffForHumans()
                                                    }}</li>
                                                <li><i class="feather-eye"></i> {{ $event->views }} Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td>Tanggal Mulai</td>
                                                <td>
                                                    <?php echo date("d F Y H:i",strtotime($event->mulai)) ?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Tanggal Selesai</td>
                                                <td>
                                                    <?php echo date("d F Y H:i",strtotime($event->selesai)) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>
                                                    {{ $event->lokasi }}
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Status</td>
                                                <td>
                                                    @if($event->status == "Publish")
                                                    <div class=" inactive-style">
                                                        <a href="javascript:void(0);" class="text-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteNotConfirmModal"><i
                                                                class="feather-eye me-1"></i>
                                                            Publish</a>
                                                    </div>
                                                    @else
                                                    <div class=" inactive-style">
                                                        <a href="javascript:void(0);" class="text-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteNotConfirmModal"><i
                                                                class="feather-eye-off me-1"></i>
                                                            Draft</a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <p>
                                            {{ $event->ket }}
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
    center: [{{ $event->lat }},{{ $event->lng }}],
    zoom: 12,
    zoomControl: false,
    layers: [],
});
var GoogleSatelliteHybrid = L.tileLayer('https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
    // maxZoom: 12,
    attribution: ""
}).addTo(map);
var marker = L.marker([{{ $event->lat }},{{ $event->lng }}]).addTo(map)
    .bindPopup('<b>Lokasi Tempat Agenda {{ $event->judul }}</b> <br> <br> {{ $event->lokasi }} ').openPopup();

</script>
