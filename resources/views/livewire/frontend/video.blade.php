<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Gallery Video</li>
                </ol>
                <h2>Gallery Video</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container ">

                <div class="row" data-aos-delay="100">

                    <div class="row gy-4 portfolio-container rounded-4" data-aos-delay="200">

                        @foreach ($gallery as $gal)
                            <div class="col-lg-4 col-md-6 ">
                                <a href="{{ $gal->src }}" target="_blank"><iframe class="img-fluid img-thumbnail"
                                        src="{{ $gal->src }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen alt="img"></iframe></a>
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
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
        </section><!-- End Portfolio Section -->



    </main><!-- End #main -->
</div>
