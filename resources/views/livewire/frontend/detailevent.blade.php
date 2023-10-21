<div>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('eventfront') }}">Agenda</a></li>
                    <li>Detail Agenda</li>
                </ol>
                <h2>Detail Agenda</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ asset('storage/'.$event->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ route('detail-eventfront',Crypt::encrypt($event->id)) }}">{{ $event->judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="{{ route('detail-eventfront',Crypt::encrypt($event->id)) }}">{{
                                            $event->user->name
                                            }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('detail-eventfront',Crypt::encrypt($event->id)) }}"><time
                                                datetime="2020-01-01">{{
                                                Carbon\Carbon::parse($event->created_at)->format("d F, Y") }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                            href="{{ route('detail-eventfront',Crypt::encrypt($event->id)) }}">{{ $event->views }}
                                            Views</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
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
                                </table>
                                <br>
                                <p>
                                    {{ $event->ket }}
                                </p>


                            </div>


                        </article><!-- End blog entry -->

                        <div class="blog-author d-flex align-items-center">
                            <img src="{{ asset('pria.png') }}" class="rounded-circle float-left" alt="">
                            <div>
                                <h4>{{ $event->user->name }}</h4>
                            </div>
                        </div><!-- End blog author bio -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recent as $x)
                                <div class="post-item clearfix">
                                    <img src="{{ asset('storage/'.$x->image) }}" alt="">
                                    <h4><a href="{{ route('detail-eventfront',Crypt::encrypt($event->id)) }}">{{ $x->judul }}</a></h4>
                                    <time datetime="2020-01-01">{{ $x->created_at->diffForHumans() }}</time>
                                </div>

                                @endforeach
                            </div><!-- End sidebar recent posts-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->
                    <div class="card">
                        <div class="card-body">
                            <div id="gmap" class="img-thumbnail" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->

    @if (session()->has('message'))
    <script>
        toastr.success(
                "{{ session('message') }}",
                "Informasi!",
                { positionClass: "toast-top-right" }
            );
    </script>
    @endif
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

</div>
