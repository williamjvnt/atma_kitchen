@extends ('owner.navbarOwnerDashboard')
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

                        <div class="table-responsive p-0">
                            <table class="table table-hover text-no-wrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Bahan Baku</th>
                                        <th class="text-center">Satuan Bahan Baku</th>
                                        <th class="text-center">Stok Bahan Baku</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($bahan)
                                    @forelse($bahan as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->nama_bahan_baku }}</td>
                                        <td class="text-center align-middle">{{ $item->satuan_bahan_baku }}</td>
                                        <td class="text-center align-middle">{{ $item->stok_bahan_baku }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Bahan Baku belum tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Tidak ada data Bahan Baku yang ditemukan.
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