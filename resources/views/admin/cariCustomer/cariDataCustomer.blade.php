@extends('/customer/navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="content-fluid">
        <h1>Cari Data Customer</h1>

        <form method="GET" action="{{ route('customers.search') }}">
            @csrf
            <input type="text" name="cariCustomer" placeholder="Cari data customer">
            <button type="submit">Search</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID Customer</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Poin</th>
                    <th>Tanggal Lahir</th>
                    <th>Jumlah Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->ID }}</td>
                    <td>{{ $customer->namaCust }}</td>
                    <td>{{ $customer->noTelp }}</td>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->password }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->poin }}</td>
                    <td>{{ $customer->tglLahir }}</td>
                    <td>{{ $customer->saldo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection