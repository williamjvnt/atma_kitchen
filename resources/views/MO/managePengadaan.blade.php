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
                        <form class="d-flex pb-3" role="search" action="{{ route('pengadaan.show')}}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tanggal_pengadaan">
                            <button class="btn" type="submit" style="background-color: #813C3F; border-color:#813C3F; color:white">Search</button>
                        </form>
                        <a href="{{route('pengadaan.add') }}" class="btn btn-md mb-3 " style="background-color: #813C3F; border-color:#813C3F; color:white">TAMBAH PENGADAAN</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tanggal Pengadaan</th>
                                        <th class="text-center">Harga Bahan Baku</th>
                                        <th class="text-center">jumlah Pengadaan Bahan Baku</th>
                                        <th class="text-center">Total Harga Pengadaan</th>
                                        <th class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($detail)
                                    @forelse($detail as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->Pengadaan->tanggal_pengadaan}}</td>
                                        <td class="text-center align-middle">Rp. {{ $item->pengadaan->harga_bahan_baku }}</td>
                                        <td class="text-center align-middle">{{ $item->jumlah_detail_pengadaan }}</td>
                                        <td class="text-center align-middle">{{ $item->subTotal_detail_pengadaan }}</td>
                                        <td class="text-center align-middle" style="border-top: 1px solid #dee2e6;">
                                            <form action="{{ route('pengadaan.destroy', $item->Pengadaan->id) }}" method="POST">
                                                <a href="{{ route('pengadaan.edit', $item->Pengadaan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                                                Data Pengadaan belum tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Tidak ada data Pengadaan yang ditemukan.
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