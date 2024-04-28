@extends ('admin.navbarAdminDashboard')
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

                        <a href="{{route('produk.add') }}" class="btn btn-md btn-success mb-3 " style="background-color: #813C3F; border-color:#813C3F; color:white">TAMBAH PRODUK</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Harga Produk</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($produk as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->nama_produk }}</td>
                                        <td class="text-center align-middle">{{ $item->harga_produk }}</td>
                                        <td class="text-center align-middle">{{ $item->satuan_produk }}</td>
                                        <td class="text-center align-middle">{{ $item->stok_produk }}</td>
                                        <td class="text-center align-middle">
                                            <form onsubmit="return 
                                                confirm('Apakah Anda Yakin ?');" action="{{ route('produk.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Produk belum tersedia
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
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