@extends ('customer.navbarCustomerDashboard')
@section('content')


<style>
    body {
        background-image: url("{{ asset('images/bgLogin.jpg') }}");
        background-size: cover;
    }

    .content {
        margin-top: 10rem;
        margin-bottom: 10rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    main {
        display: grid;
        place-items: center;
        background: #FFC436;
        width: 600px;
        height: 400px;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }
</style>

<div class="content">
    <main>

        <div class="w-75 rounded align-items-center">
            <p class="text-center">COMING SOON</p>

        </div>


    </main>
</div>

@endsection