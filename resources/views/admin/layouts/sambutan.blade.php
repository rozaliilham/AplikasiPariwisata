@extends('admin.layouts.main')
@section('content')
@foreach ($sambutan as $row)

<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Kata Sambutan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kata Sambutan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-info " style='color:white'>
                            Ubah Gambar/Foto Kata Sambutan
                        </div>
                        <div class="card-body table-responsive">
                            @error('photo')<div class="alert alert-danger">
                                {{ $message }}
                            </div> @enderror
                            @if (session()->has('gambar'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('gambar') }}</strong>
                            </div>

                            @endif
                            <br>

                            <form method="POST" enctype="multipart/form-data" action="{{ route('updateSambutan') }}">
                                @csrf
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td colspan="4">
                                                <center> <img id="blah" class='img-fluid img-thumbnail mb-3' width='280' src="{{ asset('storage/'.$row->image) }}" alt="your image" /></center>
                                                <input type="file" required  name="image" class="form-control mb-3" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                                                <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input
                                                    Gambar Hanya Bisa Bertype JPG,JPEG,PNG Dan Maksimal 5mb !</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                  <i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-info " style='color:white'>
                            Kata Sambutan
                        </div>
                        <div class="card-body table-responsive">

                            <form action="{{ route('newBody') }}" method="POST">
                                @csrf
                                @if (session()->has('msg'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ session('msg') }}</strong>
                                </div>
                                @endif
                                <br>
                                <div id="notif"></div>
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td>Body</td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea name="body" id="" cols="40" rows="20" class="form-control">{{ $row->body }}</textarea>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan
                                                </button>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>



        </div>




    </div>


    @if (session()->has('successlogo'))
    <script>
        toastr.success(
                "{{ session('successlogo') }}",
                "Informasi!",
                { positionClass: "toast-top-right" }
            );
    </script>
    @endif

    @error('image')
    {{ $message }}
    <script>
        toastr.warning(
                "{{ $message }}",
                "Informasi!",
                { positionClass: "toast-top-right" }
            );
    </script>
    @enderror


<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endforeach
    @endsection

