@extends('MO.navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Karyawan</h1>
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

                        <form action="{{ route('karyawan.update', $karyawan->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Karyawan</label>
                                    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" name="nama_karyawan" value="{{ old('nama_karyawan',$karyawan->nama_karyawan) }}" placeholder="Masukkan Nama_Karyawan" required>
                                    @error('nama_karyawan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Alamat Karyawan</label>
                                    <input type="text" class="form-control @error('alamat_karyawan') is-invalid @enderror" name="alamat_karyawan" value="{{ old('alamat_karyawan',$karyawan->alamat_karyawan) }}" placeholder="Masukkan alamat_karyawan" required>
                                    @error('alamat_karyawan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Tanggal Lahir Karyawan</label>
                                    <input type="date" class="form-control @error('tanggal_lahir_karyawan') is-invalid @enderror" name="tanggal_lahir_karyawan" value="{{ old('tanggal_lahir_karyawan',$karyawan->tanggal_lahir_karyawan) }}" placeholder="Masukkan Tanggal Lahir Karyawan" required>
                                    @error('tanggal_lahir_karyawan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nomor HP Karyawan</label>
                                    <input type="text" class="form-control @error('no_hp_karyawan') is-invalid @enderror" name="no_hp_karyawan" value="{{ old('no_hp_karyawan',$karyawan->no_hp_karyawan) }}" placeholder="Masukkan Nomor HP Karyawan" required>
                                    @error('no_hp_karyawan')
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