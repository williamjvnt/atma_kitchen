@extends('admin.navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Bahan Baku</h1>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('bahanBaku.update', $bahan->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Bahan Baku</label>
                                    <input type="text" class="form-control @error('nama_bahan_baku') is-invalid @enderror" name="nama_bahan_baku" value="{{ old('class',$bahan->nama_bahan_baku) }}" placeholder="Masukkan Nama Bahan Baku" required>
                                    @error('nama_bahan_baku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Stok Bahan Baku</label>
                                    <input type="text" class="form-control @error('stok_bahan_baku') is-invalid @enderror" name="stok_bahan_baku" value="{{ old('class',$bahan->stok_bahan_baku) }}" placeholder="Masukkan Stok Bahan Baku" required>
                                    @error('stok_bahan_baku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Minimal Stok Bahan Baku</label>
                                    <input type="text" class="form-control @error('min_stok_bahan_baku') is-invalid @enderror" name="min_stok_bahan_baku" value="{{ old('class',$bahan->min_stok_bahan_baku) }}" placeholder="Masukkan Minimal Stok Bahan Baku" required>
                                    @error('min_stok_bahan_baku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Satuan Bahan Baku</label>
                                    <input type="text" class="form-control @error('satuan_bahan_baku') is-invalid @enderror" name="satuan_bahan_baku" value="{{ old('class',$bahan->satuan_bahan_baku) }}" placeholder="Masukkan Satuan Bahan Baku" required>
                                    @error('satuan_bahan_baku')
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