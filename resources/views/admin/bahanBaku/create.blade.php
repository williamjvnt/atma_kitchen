@extends('/admin/navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="container">
            <h1>Atma Kitchen - Tambah Bahan Baku</h1>
            <form method="POST" action="{{ route('bahanBaku.store') }}">
                @csrf
                <div class="form-group">
                    <label for="idbahanbaku">ID Bahan Baku</label>
                    <input type="text" class="form-control" id="idbahanbaku" name="idbahanbaku" required>
                </div>
                <div class="form-group">
                    <label for="namabahan">Nama Bahan Baku</label>
                    <input type="text" class="form-control" id="namabahan" name="namabahan" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Bahan Baku</label>
                    <input type="text" class="form-control" id="stok" name="stok" required>
                </div>
                <div class="form-group">
                    <label for="minstok">Minimal Stok Bahan Baku</label>
                    <input type="text" class="form-control" id="minstok" name="minstok" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan Bahan Baku</label>
                    <input type="text" class="form-control" id="satuan" name="satuan" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection