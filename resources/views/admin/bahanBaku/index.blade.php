@extends('/admin/navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1>Atma Kitchen - Bahan Baku</h1>
        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('bahanBaku.search') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <input type="text" name="search" class="form-control" placeholder="Cari bahan baku">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
        <a href="{{ route('bahanBaku.create') }}" class="btn btn-primary mb-3">Tambah Bahan Baku</a>
        <table>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Minimum Stok</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bahanBaku as $item)
                <tr>
                    <td class="text-center">{{ $item->ID }}</td>
                    <td class="text-center">{{ $item->namaBahan }}</td>
                    <td class="text-center">{{ $item->minStok }}</td>
                    <td class="text-center">{{ $item->stok }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{ route('bahanBaku.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('bahanBaku.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data bahan baku masih kosong
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection