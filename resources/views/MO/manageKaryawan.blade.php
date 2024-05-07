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
                        <form class="d-flex pb-3" role="search" action="{{ route('karyawan.show')}}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama_karyawan">
                            <button class="btn" type="submit" style="background-color: #813C3F; border-color:#813C3F; color:white">Search</button>
                        </form>
                        <a href="{{route('karyawan.add') }}" class="btn btn-md mb-3 " style="background-color: #813C3F; border-color:#813C3F; color:white">TAMBAH KARYAWAAN</a>
                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Karyawaan</th>
                                        <th class="text-center">Alamat karyawan</th>
                                        <th class="text-center">Tanggal Lahir Karyawan</th>
                                        <th class="text-center">NO HP Karyawan</th>
                                        <th class="text-center">Total Gaji</th>
                                        <th class="text-center">Jumlah Presensi</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($karyawan)
                                    @forelse($karyawan as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->nama_karyawan}}</td>
                                        <td class="text-center align-middle">{{ $item->alamat_karyawan }}</td>
                                        <td class="text-center align-middle">{{ $item->tanggal_lahir_karyawan }}</td>
                                        <td class="text-center align-middle">{{ $item->no_hp_karyawan }}</td>
                                        <td class="text-center align-middle">{{ $item->total_gaji }}</td>
                                        <td class="text-center align-middle">{{ $item->presensi->jumlah_presensi }}</td>
                                        <td class="text-center align-middle">{{ $item->role->nama_role }}</td>
                                        <td class="text-center align-middle" style="border-top: 1px solid #dee2e6;">
                                            <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST">
                                                <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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