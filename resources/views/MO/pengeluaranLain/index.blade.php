@extends('/admin/navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1>Atma Kitchen - Pengeluaran Lain-Lain</h1>
        <table>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Jenis Pengeluaran</th>
                    <th class="text-center">Nominal Pengeluaran</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengeluaranLain as $item)
                <tr>
                    <td class="text-center">{{ $item->ID }}</td>
                    <td class="text-center">{{ $item->jenisPengeluaran }}</td>
                    <td class="text-center">{{ $item->nominal }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{ route('pengeluaranLain.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('pengeluaranLain.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data pengeluaran lain-lain masih kosong
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection