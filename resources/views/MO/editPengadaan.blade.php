@extends('MO.navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pengadaan</h1>
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

                        <form action="{{ route('pengadaan.update', $detail->id_pengadaan)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Harga Bahan Baku</label>
                                    <input type="text" class="form-control @error('harga_bahan_baku') is-invalid @enderror" name="harga_bahan_baku" value="{{ old('class',$detail->pengadaan->harga_bahan_baku) }}" placeholder="Masukkan Harga Bahan Baku" required>
                                    @error('harga_bahan_baku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Jumlah Pengadaan Bahan Baku</label>
                                    <input type="text" class="form-control @error('jumlah_detail_pengadaan') is-invalid @enderror" name="jumlah_detail_pengadaan" value="{{ old('class',$detail->jumlah_detail_pengadaan) }}" placeholder="Masukkan Jumlah Bahan Baku" required>
                                    @error('jumlah_detail_pengadaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Bahan Baku</label>
                                    <select class="form-control @error('id') is-invalid @enderror" name="nama_bahan_baku" required>
                                        <option selected value="">Pilih bahan baku</option>
                                        @foreach($bahan_baku as $b)
                                        @php
                                        $isSelected = ($b->id === $detail->id_bahan_baku) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $b->id }}" {{ $isSelected }}>{{ $b->nama_bahan_baku }}</option>
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