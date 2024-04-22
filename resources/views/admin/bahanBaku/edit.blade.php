@extends('/admin/navbarAdminDashboard')
@section('content')
<div class="container">
    <h1>Atma Kitchen - Edit Bahan Baku</h1>
    <form method="POST" action="{{ route('bahanBaku.update', $bahanBaku->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="namabahan">Nama Bahan Baku</label>
            <input type="text" class="form-control" id="namabahan" name="namabahan" value="{{ $bahanBaku->namaBahan }}">
        </div>
        <div class="form-group">
            <label for="stok">Stok Bahan Baku</label>
            <input type="text" class="form-control" id="stok" name="stok" value="{{ $bahanBaku->stok }}">
        </div>
        <div class="form-group">
            <label for="minstok">Minimal Stok Bahan Baku</label>
            <input type="text" class="form-control" id="minstok" name="minstok" value="{{ $bahanBaku->minStok }}">
        </div>
        <div class="form-group">
            <label for="satuan">Satuan Bahan Baku</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $bahanBaku->satuan }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="submit" class="btn btn-danger">Batal</button>
    </form>
</div>
@endsection