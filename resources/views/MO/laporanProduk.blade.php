@extends('MO.navbarMODashboard')
@section('content')
<style>
    .button-container {
        position: fixed;
        top: 60px;
        right: 20px;
        display: flex;
    }

    #up {
        text-decoration: none;
        background-color: #4B270F;
        color: #fff;
        width: 150px;
        height: 37px;
        align-items: center;
        justify-content: center;
        display: flex;
        border-radius: 7px;
    }

    #up:hover {
        color: #000;
        background-color: #FFC436;
    }
</style>
<br>
<br>

<div class="container-details">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
<div class="button-container">
    <div class="dropdown" style="margin-right: 10px;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFC436; border-color:#FFC436" id="bulan-toggle">
            Bulan
        </a>
        <ul class="dropdown-menu" id="bulan-dropdown">
            <li><a class="dropdown-item" href="#" data-value="01">Januari</a></li>
            <li><a class="dropdown-item" href="#" data-value="02">Februari</a></li>
            <li><a class="dropdown-item" href="#" data-value="03">Maret</a></li>
            <li><a class="dropdown-item" href="#" data-value="04">April</a></li>
            <li><a class="dropdown-item" href="#" data-value="05">Mei</a></li>
            <li><a class="dropdown-item" href="#" data-value="06">Juni</a></li>
            <li><a class="dropdown-item" href="#" data-value="07">Juli</a></li>
            <li><a class="dropdown-item" href="#" data-value="08">Agustus</a></li>
            <li><a class="dropdown-item" href="#" data-value="09">September</a></li>
            <li><a class="dropdown-item" href="#" data-value="10">Oktober</a></li>
            <li><a class="dropdown-item" href="#" data-value="11">November</a></li>
            <li><a class="dropdown-item" href="#" data-value="12">Desember</a></li>
        </ul>
    </div>
    <div class="dropdown" style="margin-right: 10px;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#FFC436; border-color:#FFC436" id="tahun-toggle">
            Tahun
        </a>
        <ul class="dropdown-menu" id="tahun-dropdown">
            <li><a class="dropdown-item" href="#" data-value="2022">2022</a></li>
            <li><a class="dropdown-item" href="#" data-value="2023">2023</a></li>
            <li><a class="dropdown-item" href="#" data-value="2024">2024</a></li>
            <li><a class="dropdown-item" href="#" data-value="2025">2025</a></li>
        </ul>
    </div>
    <div>
        <button id="print-laporan" class="btn btn-primary" disabled>Print Laporan</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedBulan = '';
        let selectedTahun = '';

        function checkEnableButton() {
            const printButton = document.getElementById('print-laporan');
            printButton.disabled = !(selectedBulan && selectedTahun);
        }

        document.querySelectorAll('#bulan-dropdown .dropdown-item').forEach(function(item) {
            item.addEventListener('click', function() {
                selectedBulan = this.getAttribute('data-value');
                document.getElementById('bulan-toggle').textContent = this.textContent;
                checkEnableButton();
            });
        });

        document.querySelectorAll('#tahun-dropdown .dropdown-item').forEach(function(item) {
            item.addEventListener('click', function() {
                selectedTahun = this.getAttribute('data-value');
                document.getElementById('tahun-toggle').textContent = this.textContent;
                checkEnableButton();
            });
        });

        document.getElementById('print-laporan').addEventListener('click', function() {
            const url = `{{ route('print') }}?bulan=${selectedBulan}&tahun=${selectedTahun}`;
            window.location.href = url;
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection