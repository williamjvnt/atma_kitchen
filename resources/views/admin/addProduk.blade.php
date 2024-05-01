@extends('admin.navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Produk</h1>
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
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan Nama Produk" required>
                                    @error('nama_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Harga Produk</label>
                                    <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" name="harga_produk" value="{{ old('harga_produk') }}" placeholder="Masukkan Harga Produk" required>
                                    @error('harga_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Satuan Produk</label>
                                    <input type="text" class="form-control @error('satuan_produk') is-invalid @enderror" name="satuan_produk" value="{{ old('satuan_produk') }}" placeholder="Masukkan satuan Produk" required>
                                    @error('satuan_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Stok Produk</label>
                                    <input type="number" class="form-control @error('stok_produk') is-invalid @enderror" name="stok_produk" value="{{ old('stok_produk') }}" placeholder="Masukkan Harga Produk" required>
                                    @error('stok_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Kategori</label>
                                    <select class="form-control @error('id') is-invalid @enderror" name="id_kategori" required>
                                        <option value="">Pilih Kategori</option>

                                        @foreach($kategori as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">penitip</label>
                                    <select class="form-control @error('id') is-invalid @enderror" name="id_penitip">
                                        <option value="">Pilih penitip</option>

                                        @foreach($penitip as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penitip}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_penitip')
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