@extends('/admin/navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1>Atma Kitchen - Penitip</h1>
        <div class="row mb-3">
            <div class="col">
                <form action="{{ route('penitip.search') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <input type="text" name="search" class="form-control" placeholder="Cari penitip">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
        <a href="{{ route('penitip.create') }}" class="btn btn-primary mb-3">Tambah Penitip</a>
        <table>
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama Penitip</th>
                    <th class="text-center">Tanggal Titip</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penitip as $item)
                <tr>
                    <td class="text-center">{{ $item->ID }}</td>
                    <td class="text-center">{{ $item->namaPenitip }}</td>
                    <td class="text-center">{{ $item->tanggalTitip }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda yakin?');" action="{{ route('penitip.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('penitip.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data penitip masih kosong
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection