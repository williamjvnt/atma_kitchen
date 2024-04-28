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
            <p>THIS PAGE IS FOR OUR EMPLOYEE!</p>
        </div>
        <div class="w-75 rounded form-control-sm">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

            @endif
            <form class="form" method="post" action="{{route ('dashboardEmployee')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="employee id">
                    <label for="floatingInput">Employee ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3 d-grid">
                    <button type="submit" class="btn btn-primary col-6 mb-3 mt-4 mx-auto" style="background-color: #813C3F; border-color:#813C3F;">Login</button>

                </div>
            </form>

        </div>


    </main>
</div>

@endsection