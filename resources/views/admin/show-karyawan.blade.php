<div class="container">
    <h1>Atma Kitchen - Detail Karyawan</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $karyawan->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $karyawan->nama }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $karyawan->role }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $ekaryawan->nomor_telpon }}</td>
            </tr>
            <tr>
                <th>Aksi</th>
                <td>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>