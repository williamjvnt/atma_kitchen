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
        height: 400px;
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
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>
                <a href="#" style="display: inline; color:blue; margin-left: 11rem;">Forget Password</a>
            </div>
        </div>
        <button type="button" class="btn btn-primary col-6 mb-3" style="background-color: #813C3F; border-color:#813C3F">Login</button>

    </main>
</div>

@endsection