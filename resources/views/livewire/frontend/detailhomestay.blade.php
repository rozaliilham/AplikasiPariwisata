<div>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('homestayfront') }}">Home Stay</a></li>
                    <li>Detail Home Stay</li>
                </ol>
                <h2>Detail Home Stay</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a
                                    href="{{ route('detail-homestayfront', Crypt::encrypt($news->id)) }}">{{ $news->name }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>

                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('detail-homestayfront', Crypt::encrypt($news->id)) }}"><time
                                                datetime="2020-01-01">{{ Carbon\Carbon::parse($news->created_at)->format('d F, Y') }}</time></a>
                                    </li>

                                </ul>
                            </div>

                            <div class="entry-content">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>No.HP</td>
                                        <td>
                                            <a href="https://api.whatsapp.com/send?phone={{ $news->telp }}"
                                                target="_blank" class="btn btn-warning"><i class="fa fa-phone"
                                                    aria-hidden="true"></i> Hubungi</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tarif Permalam</td>
                                        <td>
                                            <?php echo number_format($news->price, 0, ',', '.'); ?>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Lokasi</td>
                                        <td>
                                            {{ $news->location }}
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <?php
                                $x = explode(',', $news->fasilitas);

                                ?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Fasilitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($x as $z)
                                            <tr>
                                                <td><i class="fa fa-check mr-3" aria-hidden="true"></i>
                                                    {{ $z }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <p>
                                    {{ $news->description }}
                                </p>

                            </div>
                        </article><!-- End blog entry -->


                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">


                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recent as $x)
                                    <div class="post-item clearfix">
                                        <img src="{{ asset('storage/' . $x->image) }}" alt="">
                                        <h4><a
                                                href="{{ route('detail-homestayfront', Crypt::encrypt($x->id)) }}">{{ $x->name }}</a>
                                        </h4>
                                        <time datetime="2020-01-01">{{ $x->created_at->diffForHumans() }}</time>
                                    </div>
                                @endforeach
                            </div><!-- End sidebar recent posts-->


                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->


</div>
