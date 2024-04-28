<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Kitchen Daftar Resep</title>
</head>
<body>
    <h1>Atma Kitchen<br>Daftar Resep</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Resep</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 10; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Lapis legit</td> <!-- replace with actual recipe name -->
                    <td>
                        <form action="" method="post">
                            @csrf
                            <button type="button">Details</button>
                            <button type="button">Edit</button>
                            <button type="submit" name="_method" value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
    <div>
        <a href="#">Admin</a>
        <button type="button">Tambah</button>
    </div>
</body>
</html>