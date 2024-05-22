@extends('customer.navbarCustomerDashboard')
@section('content')
<style>
    body {
        background-image: url("{{ asset('images/bgLogin.jpg') }}");
        background-size: cover;
    }

    .content {
        margin-top: 5rem;
        margin-bottom: 12rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    main {
        display: grid;
        place-items: center;
        width: 85rem;
        height: 30rem;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }
</style>
<div class="content">
    <main>
        <p>Keranjang Anda Kosong >_< </p>
    </main>

</div>

@endsection