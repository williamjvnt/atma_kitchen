@extends ('/customer/changePassCust')
@section('content')
<html>
    <head>
        <title>Ganti Password Customer</title>
        <style>
            .card{
                height: 400px;
                weight: 600px;
                border-radius: 7px;
                box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
                background: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-header" style="font-size: 18px; font-weight: bold; margin-top: 1rem">
                <p>Ganti Password Customer</p>
            </div>
            <div class="w-75 rounded form-control-sm">
                <label for="exampleFormControlInput" class="form-label">Masukkan Password Baru</label>
                <input type="password" class="form-control" id="exampleFormControlInput" placeholder="Masukkan password">
            </div>
            <div class="w-75 rounded form-control-sm">
                <label for="exampleFormControlInput" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="exampleFormControlInput" placeholder="Konfirmasi password">
            </div>
        </div>
        <button type="button" class="btn btn-primary col-6 mb-3" style="background-color: #813C3F; border-color:#813C3F">Ganti Password</button>
    </body>
</html>
@endsection