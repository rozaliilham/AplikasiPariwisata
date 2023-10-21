<div>
    @foreach ($sambutan as $row)

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Struktur Organisasi</li>
                </ol>
                <h2>Struktur Organisasi</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <center>

                        <div class="col-lg-8 entries">

                            <article class="entry entry-single">

                                <div class="entry-img">
                                    <img src="{{ asset('storage/'.$row->image) }}" alt="" class="img-fluid">
                                </div>

                            </article><!-- End blog entry -->
                        </div><!-- End blog entries list -->
                    </center>
                </div>

            </div>
        </section><!-- End Blog Single Section -->
    </main><!-- End #main -->
    @endforeach
</div>
