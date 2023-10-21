<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact</li>
                </ol>
                <h2>Contact</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->
        <section id="contact" class="contact">

            <div class="container">

                <header class="section-header">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>{{ $setting[0]->alamat }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Nomor Telepon</h3>
                                    <p>
                                        <a href="https://wa.me/{{ $setting[0]->telp }}" target="_blank"
                                            class="btn btn-info">Hubungi</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>{{ $setting[0]->email }}</p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-6">
                        @if (session()->has('message'))
                            <div class="alert alert-primary d-flex align-items-center" role="alert">
                                <i class="fas fa-thumbs-up mr-3"></i>
                                <div>
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif

                        <form wire:submit.prevent='store' method="post" class="php-email-form">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" wire:model='name' class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" wire:model='email'
                                        placeholder="Your Email" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" wire:model='subject'
                                        placeholder="Subject" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" wire:model='message' rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit">
                                        <div wire:loading wire:target="uploadImage" wire:key="uploadImage"><i
                                                class="fa fa-spinner fa-spin"></i></div> Send Message
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->
        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Lokasi Maps {{ $setting[0]->web }}</p>
                </header>

                <div class="row">
                    <div id="ggmap" class="img-thumbnail" style="width: 100%; height: 400px;"></div>

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
</div>
<script>
    var map = L.map("ggmap", {
        center: [{{ $setting[0]->lat }}, {{ $setting[0]->lng }}],
        zoom: 12,
        zoomControl: false,
        layers: [],
    });
    var GoogleSatelliteHybrid = L.tileLayer(
        'https://mt0.google.com/vt/lyrs=m@221097413,traffic,transit,bike&x={x}&y={y}&z={z}', {
            attribution: "{{ $setting[0]->web }}"
        }).addTo(map);
    var marker = L.marker([{{ $setting[0]->lat }}, {{ $setting[0]->lng }}]).addTo(map)
        .bindPopup(
            '<table class="table table-striped table-bordered"><tr><td colspan="2" align="center"><img src="{{ asset('storage/' . $setting[0]->logo) }}" width="120" alt="" class="img img-fluid img-thumbnail"></td></tr><tr><td>Nama Dinas</td><td>{{ $setting[0]->web }}</td></tr><tr><td>Alamat</td><td>{{ $setting[0]->alamat }}</td></tr><tr><td align="center" colspan="2"><a href="https://maps.google.com/maps?q={{ $setting[0]->lat }},{{ $setting[0]->lng }}" target="_blank" class="btn btn-info">More Information</a></td></tr></table>'
            ).openPopup();
</script>
