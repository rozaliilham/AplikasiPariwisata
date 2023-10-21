<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Gallery Foto</li>
                </ol>
                <h2>Gallery Foto</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-header bg-info" style="color:white">
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input type="text" wire:model="search" class="form-control"
                                        placeholder="Cari dengan kata kunci berdasarkan judul.."
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <br>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($gallery as $gal)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/' . $gal->image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $gal->title }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('storage/' . $gal->image) }}" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title="{{ $gal->title }}"><i
                                                class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="d-flex justify-content-center">
                {{ $gallery->links() }}

            </div>

        </section><!-- End Portfolio Section -->


    </main><!-- End #main -->
</div>
