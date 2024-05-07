@extends ('/navbarDashboard')
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
        height: 700px;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }
</style>

<div class="content">
    <main>

        <div style="font-size: 18px ; font-weight: bold; margin-top: 1rem">
            <p>Welcome To Atma Kitchen (^_^) </p>
        </div>
        <div class="w-75 rounded form-control-sm">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

            @endif

            @if (Session::has('message'))
            <div class="alert alert-danger">
                <b>Oops!</b> {{session('message')}}
            </div>
            @endif
            <form class="form" method="post" action="{{route('registerCust')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nama_customer" placeholder="nama customer" required>
                    <label for="floatingInput">Nama Customer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="tanggal_lahir_customer" placeholder="Tanggal Lahir" required>
                    <label for="floatingInput">Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="no_telepon_customer" placeholder="Nomor HP Customer" required>
                    <label for="floatingInput">Nomor HP Customer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email_customer" placeholder="Email Customer" required>
                    <label for="floatingInput">Email Customer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" placeholder="username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>




                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember Me
                    </label>
                    <a href="#" style="display: inline; color:blue; margin-left: 11rem;">Forget Password</a>
                </div>

                <div class="form-floating mb-3 d-grid">
                    <button type="submit" class="btn btn-primary col-6 mb-3 mt-4 mx-auto" style="background-color: #813C3F; border-color:#813C3F;">Daftar</button>
                </div>
            </form>
        </div>
    </main>
</div>

@endsection