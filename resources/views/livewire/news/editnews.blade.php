<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit News</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit News</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='update({{ $newsId }})'>
                            @csrf
                            <table class="table">
                                <tr>
                                    <td>Judul</td>
                                    <td><input type="text" wire:model='judul' id="" class="form-control"
                                            placeholder="Masukan judul berita" autofocus required></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select wire:model='category' class="form-control" id="">
                                            <option value="">Pilih</option>
                                            @foreach($category_data as $row)
                                            @if($category == $row->id)
                                            <option value="{{ $row->id }}" selected>{{ $row->title }}</option>

                                            @else
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>

                                            @endif
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto/Gambar</td>
                                    <td>

                                        @if ($new_image)
                                        <center>
                                            <img src="{{$new_image->temporaryUrl()}}" width="250"
                                                class="img mb-3 img-fluid img-thumbnail " alt="">
                                        </center>
                                        @endif
                                        <input type="file" wire:model='new_image' class="custom-file-input"
                                            id="customFile">
                                        <br>
                                        <span class="badge bg-warning text-dark">Kosongkan jika tidak diubah..</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>
                                        <textarea wire:model='body' class="form-control"
                                            placeholder="Masukan keterangan berita.." id="" cols="30"
                                            rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('news') }}" class="btn btn-warning"><i
                                                class="fa fa-sync-alt"></i>
                                            Kembali</a>
                                        <button type="submit" class="btn btn-primary ">
                                            <div wire:loading wire:target="update" wire:key="update"><i
                                                    class="fa fa-spinner fa-spin"></i></div> Simpan
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    @if (session()->has('message'))
    <script>
        toastr.success(
                "{{ session('message') }}",
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
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>/
