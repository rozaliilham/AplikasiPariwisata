<div>
    @foreach ($sambutan as $row)

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Visi Misi</li>
                </ol>
                <h2>Visi Misi</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <center>

                        <div class="col-lg-8 entries">

                            <article class="entry entry-single">


                                <div class="entry-content">
                                    <table class="table table-hover">
                                        <tr class="table-info">
                                            <td>Visi</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>{{ $row->visi }}</p>

                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-hover">
                                        <tr class="table-info">
                                            <td>Misi</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>{{ $row->misi }}</p>
                                            </td>
                                        </tr>
                                    </table>
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
