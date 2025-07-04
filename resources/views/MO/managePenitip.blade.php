@extends ('MO.navbarMODashboard')
@section('content')
<div class="container-details">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="d-flex pb-3" role="search" action="{{ route('penitip.show')}}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama_penitip">
                            <button class="btn" type="submit" style="background-color: #813C3F; border-color:#813C3F; color:white">Search</button>
                        </form>
                        <a href="{{route('penitip.add') }}" class="btn btn-md mb-3 " style="background-color: #813C3F; border-color:#813C3F; color:white">TAMBAH PENITIP</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Penitip</th>
                                        <th class="text-center">Tanggal Menitip</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($penitip)
                                    @forelse($penitip as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->nama_penitip}}</td>
                                        <td class="text-center align-middle">{{ $item->tanggal_menitip }}</td>
                                        <td class="text-center align-middle" style="border-top: 1px solid #dee2e6;">
                                            <form action="{{ route('penitip.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('penitip.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Penitip belum tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Tidak ada data Penitip yang ditemukan.
                                            </div>
                                        </td>
                                    </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


@endsection