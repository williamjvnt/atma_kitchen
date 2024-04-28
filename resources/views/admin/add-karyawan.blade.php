
<div class="container">
    <h1>Atma Kitchen - Tambah Karyawan</h1>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" required>
        </div>
        <div class="form-group">
            <label for="phone_number">No Telepon</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>