@extends('/admin/navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="container">
            <h1>Atma Kitchen - Tambah Pengeluaran Lain</h1>
            <form method="POST" action="{{ route('pengeluaranLain.store') }}">
                @csrf
                <div class="form-group">
                    <label for="idpengeluaran">ID Pengeluaran</label>
                    <input type="text" class="form-control" id="idpengeluaran" name="idpengeluaran" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Pengeluaran</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal Pengeluaran</label>
                    <input type="text" class="form-control" id="nominal" name="nominal" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection