@extends('/admin/navbarMODashboard')
@section('content')
<div class="container">
    <h1>Atma Kitchen - Edit Pengeluaran Lain-Lain</h1>
    <form method="POST" action="{{ route('pengeluaranLain.update', $pengeluaranLain->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="jenis">Jenis Pengeluaran</label>
            <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $pengeluaranLain->jenisPengeluaran }}">
        </div>
        <div class="form-group">
            <label for="nominal">Nominal Pengeluaran</label>
            <input type="text" class="form-control" id="nominal" name="nominal" value="{{ $pengeluaranLain->nominal }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="submit" class="btn btn-danger">Batal</button>
    </form>
</div>
@endsection