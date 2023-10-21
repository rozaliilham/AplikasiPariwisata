<div>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Data User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info" style="color:white">
                        Management User
                    </div>
                    <div class="card-body table-responsive">

                        <table id="dt" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat Email</th>
                                    <th>No.HP</th>
                                    <th>Level</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($user as $row)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->telp }}</td>
                                        <td>
                                            @if($row->level == "Member")
                                                <span class="badge badge-success">{{ $row->level }}</span>
                                                @else
                                                <span class="badge badge-info">{{ $row->level }}</span>

                                            @endif
                                        </td>
                                        <td>{{ auth()->user()->created_at->diffForHumans() }}</td>
                                        {{-- <td>
                                        <a href="/deluser/{{ $row->id }}" class="btn btn-danger"
                                            onclick="return confirm('Hapus data {{ $row->name }}?')"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
