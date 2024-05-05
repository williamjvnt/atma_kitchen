@extends('MO.navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pengeluaran Lain</h1>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="content" id="add">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pengeluaranLain.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Jenis Pengeluaran</label>
                                    <input type="text" class="form-control @error('jenis_pengeluaran') is-invalid @enderror" name="jenis_pengeluaran" value="{{ old('jenis_pengeluaran') }}" placeholder="Masukkan Jenis Pengeluaran" required>
                                    @error('jenis_pengeluaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nominal Pengeluaran</label>
                                    <input type="number" class="form-control @error('nominal_pengeluaran') is-invalid @enderror" name="nominal_pengeluaran" value="{{ old('nominal_pengeluaran') }}" placeholder="Masukkan Nominal Pengeluaran" required>
                                    @error('nominal_pengeluaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md " style="background-color: #813C3F; border-color:#813C3F; color:white">SIMPAN</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection