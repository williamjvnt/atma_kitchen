<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        .text-center {
            text-align: center;
        }

        .align-middle {
            vertical-align: middle;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            /* Red */
            color: white;
        }

        .alert-danger {
            background-color: #f44336;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h1>ATMA KITCHEN</h1>
                        <h2>Jl. Centralpark No. 10 Yogyakarta</h2><br>
                        <h2><u>LAPORAN Stok Bahan Baku</u></h2>
                        @php
                        $date = date('d-M-Y')
                        @endphp
                        <h3>Tanggal Cetak: {{$date}}</h3>
                        <div class="card-body" style="display:flex; align-items: center;">

                            <div class="table-responsive p-0">
                                <table class="table table-hover text-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Bahan Baku</th>
                                            <th class="text-center">Satuan Bahan Baku</th>
                                            <th class="text-center">Stok Bahan Baku</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($bahan)
                                        @forelse($bahan as $item)
                                        <tr>
                                            <td class="text-center align-middle">{{ $item->nama_bahan_baku }}</td>
                                            <td class="text-center align-middle">{{ $item->satuan_bahan_baku }}</td>
                                            <td class="text-center align-middle">{{ $item->stok_bahan_baku }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="alert alert-danger">
                                                    Data Bahan Baku belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <div class="alert alert-danger">
                                                    Tidak ada data Bahan Baku yang ditemukan.
                                                </div>
                                            </td>
                                        </tr>

                                        @endisset
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</body>

</html>