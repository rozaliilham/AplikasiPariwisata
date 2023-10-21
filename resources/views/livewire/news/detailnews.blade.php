<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail News</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail News</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-9">

                            <div class="blog-view">
                                <div class="blog-single-post">
                                    <a href="{{ route('news') }}" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt=""
                                                src="{{ asset('storage/'.$news->image) }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{$news->title}}</h3>
                                    <div class="blog-info">
                                        <div class="post-list">
                                            <ul>
                                                <li>
                                                    <div class="post-author">
                                                        <a><img src="{{ asset('pria.png') }}" alt="Post Author">
                                                            <span>by {{ $news->user->name }} </span></a>
                                                    </div>
                                                </li>
                                                <li><i class="feather-clock"></i> {{ $news->created_at->diffForHumans() }}</li>
                                                <li><i class="feather-eye"></i> {{ $news->views }} Views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <p>
                                            {{ $news->body }}
                                        </p>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
