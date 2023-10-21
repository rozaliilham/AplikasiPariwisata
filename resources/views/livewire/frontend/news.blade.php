<div>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Berita</li>
                </ol>
                <h2>Berita</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" >

                <div class="row">

                    <div class="col-lg-8 entries">
                        @if($news->count() > 0)
                        @foreach ($news as $row)
                        <article class="entry">

                            <div class="entry-img">
                                <img src="{{ asset('storage/'.$row->image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ route('detail-berita',Crypt::encrypt($row->id)) }}">{{ $row->title }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="{{ route('detail-berita',Crypt::encrypt($row->id)) }}">{{ $row->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="{{ route('detail-berita',Crypt::encrypt($row->id)) }}"><time datetime="2020-01-01">{{ Carbon\Carbon::parse($row->created_at)->format("d F, Y") }}</time></a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                            href="{{ route('detail-berita',Crypt::encrypt($row->id)) }}">{{ $row->views }} Views</a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>
                                    {{ Str::substr($row->body, 0, 310) }}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('detail-berita',Crypt::encrypt($row->id)) }}">Read More</a>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                        @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                <strong>Informasi!</strong> Berita tidak ditemukan..
                            </div>
                        @endif

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                {{ $news->links() }}

                            </ul>
                        </div>

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                    <input type="text" wire:model="search" class="form-control">
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach ($kategori as $cat)
                                    <li><a href="{{ route('bycategory',['category_id' => Crypt::encrypt($cat->id)] ) }}">{{ $cat->title }} </a></li>
                                    @endforeach

                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recent as $x)
                                <div class="post-item clearfix">
                                    <img src="{{ asset('storage/'.$x->image) }}" alt="">
                                    <h4><a href="{{ route('detail-berita',Crypt::encrypt($x->id)) }}">{{ $x->title }}</a></h4>
                                    <time datetime="2020-01-01">{{ $x->created_at->diffForHumans() }}</time>
                                </div>

                                @endforeach
                            </div><!-- End sidebar recent posts-->

                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @foreach ($kategori as $cat)
                                    <li><a href="{{ route('bycategory',['category_id' => Crypt::encrypt($cat->id)] ) }}">{{ $cat->title }} </a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
</div>
