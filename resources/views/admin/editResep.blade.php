@extends('admin.navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Resep</h1>
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
                        <form action="{{ route('resep.update', $resep->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Resep</label>
                                    <input type="text" class="form-control @error('nama_resep') is-invalid @enderror" name="nama_resep" value="{{ old('class',$resep->nama_resep) }}" placeholder="Masukkan Nama Produk" required>
                                    @error('nama_resep')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Produk</label>
                                    <select class="form-control @error('id') is-invalid @enderror" name="id_produk" required>
                                        <option selected value="">Pilih Nama Produk</option>
                                        @foreach($produk as $k)
                                        @php
                                        $isSelected = (old('id',$resep->id_produk) === $k->id) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $k->id }}" {{ $isSelected }}>{{ $k->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                    @error('id')
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