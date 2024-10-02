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
                        <h2><u>LAPORAN PENJUALAN BULANAN</u></h2>

                        @php
                        $date = date('d-M-Y');
                        $bulan = date('M', strtotime($date));
                        $tahun = date('Y', strtotime($date));
                        @endphp
                        <h3>Bulan: {{$bulan}}</h3>
                        <h3>Tahun: {{$tahun}}</h3>
                        <h3>Tanggal Cetak: {{$date}}</h3>
                        <div class="card-body" style="display:flex; align-items: center;">

                            <div class="table-responsive p-0">
                                <table class="table table-hover text-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Kuantitas</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Jumlah Uang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($x as $item)
                                        @php
                                        $id = $item['id_produk'];
                                        $nama = $produk->where('id', $id)->first();
                                        @endphp
                                        <tr>
                                            <td class="text-center align-middle">{{ $nama->nama_produk }}</td>
                                            <td class="text-center align-middle">{{ $item['kuantitas'] }}</td>
                                            <td class="text-center align-middle">{{ $item['harga_produk'] }}</td>
                                            <td class="text-center align-middle">{{ $item['total_jumlah'] }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <div class="alert alert-danger">
                                                    Data Produk belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse

                                        @forelse($y as $item)
                                        @php
                                        $id = $item['id_hampers'];
                                        $nama = $hampers->where('id', $id)->first();
                                        @endphp
                                        <tr>
                                            <td class="text-center align-middle">{{ $nama->nama_hampers }}</td>
                                            <td class="text-center align-middle">{{ $item['kuantitas'] }}</td>
                                            <td class="text-center align-middle">{{ $item['harga_hampers'] }}</td>
                                            <td class="text-center align-middle">{{ $item['total_jumlah'] }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <div class="alert alert-danger">
                                                    Data Hampers belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
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