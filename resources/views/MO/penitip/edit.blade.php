@extends('/admin/navbarMODashboard')
@section('content')
<div class="container">
    <h1>Atma Kitchen - Edit Penitip</h1>
    <form method="POST" action="{{ route('penitip.update', $penitip->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="namapenitip">Nama Penitip</label>
            <input type="text" class="form-control" id="namapenitip" name="namapenitip" value="{{ $penitip->namaPenitip }}">
        </div>
        <div class="form-group">
            <label for="tgltitip">Tanggal Titip</label>
            <input type="text" class="form-control" id="tgltitip" name="tgltitip" value="{{ $penitip->tanggalTitip }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="submit" class="btn btn-danger">Batal</button>
    </form>
</div>
@endsection