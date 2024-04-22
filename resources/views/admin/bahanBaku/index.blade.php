@extends('/admin/navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1>Atma Kitchen - Bahan Baku</h1>
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