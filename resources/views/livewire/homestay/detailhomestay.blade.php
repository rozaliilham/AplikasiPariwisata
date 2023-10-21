<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Detail Homestay</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Homestay</li>
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
                                    <a href="{{ route('homestay') }}" class="back-btn"><i
                                            class="feather-chevron-left"></i> Back</a>
                                    <div class="blog-image">
                                        <a href="javascript:void(0);"><img alt=""
                                                src="{{ asset('storage/' . $news->image) }}" class="img-fluid"></a>
                                    </div>
                                    <h3 class="blog-title">{{ $news->name }}</h3>

                                    <div class="blog-content">
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
                                            <tr>
                                                <td>Status Booking</td>
                                                <td>
                                                    {{ $news->status }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date Created</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($news->created_at)->format("d F Y") }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Date Updated</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($news->updated_at)->format("d F Y") }}
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
                                                        <td><i class="fa fa-check mr-3" aria-hidden="true"></i>  {{ $z }}</td>
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
<br>
<br>
