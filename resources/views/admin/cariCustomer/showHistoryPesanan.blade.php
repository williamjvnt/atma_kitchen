@extends('/customer/navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="content-fluid">
        <h1>History Pesanan Customer</h1>

        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pesan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->ID }}</td>
                        <td>{{ $transaction->namaCust }}</td>
                        <td>{{ $transaction->tglPesan }}</td>
                        <td>{{ $transaction->totalHarga }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection