<div>
    @foreach ($setting as $row)
        <!-- ======= Hero Section ======= -->

        <section id="hero" class="hero d-flex align-items-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Selamat datang di {{ $row->web }}</h1>
                        <h2 data-aos="fade-up" data-aos-delay="400">Pilih Homestay kesukaan anda yang ada di
                            {{ $row->web }}!</h2>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <div class="text-center text-lg-start">
                                <a href="{{ route('member-homestay') }}"
                                    class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Lihat Homestay</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('storage/' . $homestayslider[0]->image) }}"
                                        class="d-block w-100 rounded-3 img-fluid" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $homestayslider[0]->title }}</h5>
                                    </div>
                                </div>
                                @foreach ($homestayslider->skip(1) as $xassd)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $xassd->image) }}"
                                            class="d-block w-100 rounded-3 img-fluid" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $xassd->title }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= Values Section ======= -->
            <!-- ======= Counts Section ======= -->

            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">

                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <p>Galleri Terbaru</p>
                    </header>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">

                    </div>

                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                        @foreach ($datagallery as $gal)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="{{ asset('storage/' . $gal->image) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ $gal->title }}</h4>
                                        <div class="portfolio-links">
                                            <a href="{{ asset('storage/' . $gal->image) }}"
                                                data-gallery="portfolioGallery" class="portfokio-lightbox"
                                                title="{{ $gal->title }}"><i class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

            </section><!-- End Portfolio Section -->


            <!-- ======= Recent Blog Posts Section ======= -->
            <section id="recent-blog-posts" class="recent-blog-posts">

                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <p>Homestay Terbaru</p>
                    </header>
                    <div class="row">
                        @foreach ($homestay as $wisata)
                            <div class="col-lg-4">
                                <div class="post-box">
                                    <div class="post-img"><img src="{{ asset('storage/' . $wisata->image) }}"
                                            class="img-fluid" alt=""></div>
                                    <span class="post-date">{{ $wisata->created_at->diffForHumans() }}</span>
                                    <h3 class="post-title">{{ $wisata->name }}
                                    </h3>
                                    <a href="{{ route('detail-homestaymember', Crypt::encrypt($wisata->id)) }}"
                                        class="readmore stretched-link mt-auto"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </section><!-- End Recent Blog Posts Section -->
            <!-- ======= Recent Blog Posts Section ======= -->
            {{-- <section id="recent-blog-posts" class="recent-blog-posts">

                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <p>Produk Terbaru</p>
                    </header>
                    <div class="row">
                        @foreach ($produk as $pr)
                            <div class="col-lg-4">
                                <div class="post-box">
                                    <div class="post-img"><img src="{{ asset('storage/' . $pr->image) }}"
                                            class="img-fluid" alt=""></div>
                                    <span class="post-date">{{ $pr->created_at->diffForHumans() }}</span>
                                    <h3 class="post-title">{{ $pr->produk }}
                                    </h3>
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <td>Nama Usaha</td>
                                            <td>{{ $pr->nama_usaha }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik</td>
                                            <td>{{ $pr->nama_pemilik }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Rp. {{ number_format($pr->harga,0,',','.') }}</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <a href="{{ route('detail-product-front', Crypt::encrypt($pr->id)) }}"
                                        class="readmore stretched-link mt-auto"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </section><!-- End Recent Blog Posts Section --> --}}


            <!-- ======= Recent Blog Posts Section ======= -->
            <section id="testimonials" class="testimonials">

                <div class="container" data-aos="fade-up">

                    <header class="section-header">
                        <p>Lokasi Maps {{ $row->web }}</p>
                    </header>

                    <div class="row">
                        <div id="ggmap" class="img-thumbnail" style="width: 100%; height: 400px;"></div>

                    </div>

                </div>

            </section><!-- End Recent Blog Posts Section -->


        </main><!-- End #main -->
        <script>
            var map = L.map("ggmap", {
                center: [{{ $row->lat }}, {{ $row->lng }}],
                zoom: 12,
                zoomControl: false,
                layers: [],
            });
            var GoogleSatelliteHybrid = L.tileLayer(
                'https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
                    attribution: "{{ $row->web }}"
                }).addTo(map);
            var marker = L.marker([{{ $row->lat }}, {{ $row->lng }}]).addTo(map)
                .bindPopup(
                    '<table class="table table-striped table-bordered"><tr><td colspan="2" align="center"><img src="{{ asset('storage/' . $row->logo) }}" width="120" alt="" class="img img-fluid img-thumbnail"></td></tr><tr><td>Nama Dinas</td><td>{{ $row->web }}</td></tr><tr><td>Alamat</td><td>{{ $row->alamat }}</td></tr><tr><td align="center" colspan="2"><a href="https://maps.google.com/maps?q={{ $row->lat }},{{ $row->lng }}" target="_blank" class="btn btn-info text-light">More Information</a></td></tr></table>'
                ).openPopup();
        </script>
    @endforeach
</div>
