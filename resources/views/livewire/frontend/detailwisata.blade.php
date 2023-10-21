<div>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('wisatafront') }}">Wisata</a></li>
                    <li>Detail Wisata</li>
                </ol>
                <h2>Detail Wisata</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $wisata->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a
                                    href="{{ route('detail-wisatafront', Crypt::encrypt($wisata->id)) }}">{{ $wisata->name }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="{{ route('detail-wisatafront', Crypt::encrypt($wisata->id)) }}">{{ $wisata->user->name }}</a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('detail-wisatafront', Crypt::encrypt($wisata->id)) }}"><time
                                                datetime="2020-01-01">{{ Carbon\Carbon::parse($wisata->created_at)->format('d F, Y') }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                            href="{{ route('detail-wisatafront', Crypt::encrypt($wisata->id)) }}">{{ $wisata->views }}
                                            Views</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {{ $wisata->ket }}
                                </p>


                            </div>


                        </article><!-- End blog entry -->

                        <div class="blog-author d-flex align-items-center">
                            <img src="{{ asset('pria.png') }}" class="rounded-circle float-left" alt="">
                            <div>
                                <h4>{{ $wisata->user->name }}</h4>
                            </div>
                        </div><!-- End blog author bio -->
                        <div class="blog-comments">

                            <h4 class="comments-count">{{ $comment->count() }} Comments</h4>

                            @foreach ($comment as $wisata)
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="{{ asset('pria.png') }}" alt="">
                                        </div>
                                        <div>
                                            <h5><a href="">{{ $wisata->name }}</a> </h5>
                                            <time
                                                datetime="2020-01-01">{{ $wisata->created_at->diffForHumans() }}</time>
                                            <p>
                                                {{ $wisata->comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End comment #1 -->
                            @endforeach
                            <div class="reply-form">
                                <h4>Leave a Reply</h4>
                                <p>Your email address will not be published. Required fields are marked * </p>
                                <br>
                                @if (session()->has('message'))
                                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                                        <i class="fas fa-thumbs-up"></i>
                                        <div>
                                            {{ session('message') }}
                                        </div>
                                    </div>
                                @endif
                                <br>
                                <form method="POST" wire:submit.prevent='store'>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input wire:model='name' type="text" required class="form-control"
                                                placeholder="Your Name*">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input wire:model='email' type="text" required class="form-control"
                                                placeholder="Your Email*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea wire:model='body' required class="form-control" placeholder="Your Comment*"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <div wire:loading wire:target="uploadImage" wire:key="uploadImage"><i
                                                class="fa fa-spinner fa-spin"></i></div> Post Comment
                                    </button>

                                </form>

                            </div>

                        </div><!-- End blog comments -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach ($kategori as $cat)
                                        <li><a
                                                href="{{ route('bycategory', ['category_id' => Crypt::encrypt($cat->id)]) }}">{{ $cat->title }}
                                            </a></li>
                                    @endforeach

                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recent as $x)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('storage/' . $x->image) }}" alt="">
                                        <h4><a
                                                href="{{ route('detail-wisatafront', Crypt::encrypt($x->id)) }}">{{ $x->name }}</a>
                                        </h4>
                                        <time datetime="2020-01-01">{{ $x->created_at->diffForHumans() }}</time>
                                    </div>
                                @endforeach
                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @foreach ($kategori as $cat)
                                        <li><a
                                                href="{{ route('bycategory', ['category_id' => Crypt::encrypt($cat->id)]) }}">{{ $cat->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar tags-->

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
                "Informasi!", {
                    positionClass: "toast-top-right"
                }
            );
        </script>
    @endif

</div>

<script>
    var map = L.map("gmap", {
        center: [{{ $wisata->lat }}, {{ $wisata->lng }}],
        zoom: 12,
        zoomControl: false,
        layers: [],
    });
    var GoogleSatelliteHybrid = L.tileLayer(
        'https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
            // maxZoom: 12,
            attribution: ""
        }).addTo(map);
    var marker = L.marker([{{ $wisata->lat }}, {{ $wisata->lng }}]).addTo(map)
        .bindPopup(
            '<table class="table table-striped table-bordered"><tr><td colspan="2" align="center"><img src="{{ asset('storage/' . $wisata->image) }}" alt="" class="img img-fluid img-thumbnail"></td></tr><tr><td>Nama</td><td>{{ $wisata->name }}</td></tr><tr><td>Jenis Usaha</td><td>{{ $wisata->jenis_usaha }}</td></tr><tr><td>Lokasi</td><td>{{ $wisata->lokasi }}</td></tr><tr><td>Tarif</td><td>{{ number_format($wisata->tarif, 0, ',', '.') }}</td></tr><tr><td align="center" colspan="2"><a href="https://maps.google.com/maps?q={{ $wisata->lat }},{{ $wisata->lng }}" target="_blank" class="btn btn-info">More Information</a></td></tr></table>'
            )
        .openPopup();
</script>
