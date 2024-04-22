@extends('/admin/navbarMODashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="container">
            <h1>Atma Kitchen - Tambah Penitip</h1>
            <form method="POST" action="{{ route('penitip.store') }}">
                @csrf
                <div class="form-group">
                    <label for="idpenitip">ID Penitip</label>
                    <input type="text" class="form-control" id="idpenitip" name="idpenitip" required>
                </div>
                <div class="form-group">
                    <label for="namabahan">Nama Penitip</label>
                    <input type="text" class="form-control" id="namapenitip" name="namapenitip" required>
                </div>
                <div class="form-group">
                    <label for="tgltitip">Tanggal Titip</label>
                    <input type="text" class="form-control" id="tgltitip" name="tgltitip" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection