<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            min-height: min-content;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
        }

        p {
            color: #ffffff;
        }



        .list-group-item.custom-bg-color {
            color: #ffffff;
            background-color: #813C3F;
            /* transition: background-color 0.3s; */
        }

        .list-group-item.custom-bg-color:hover {
            background-color: #D3A9AD;
            text-decoration: none;
            color: inherit;
        }

        .list-group-item.custom-bg-color:active {
            background-color: #FFD700;
        }

        .brand-nav {
            margin: 0;
            font-weight: bold;
            font-size: 20px;
        }

        .list-group-item {
            border: none;
        }

        .logo {
            width: 4rem;
        }

        .container-fluid {
            font-family: 'Poppins', sans-serif;
        }

        /* Responsive */
        @media screen and (max-width: 412px) {
            .brand-nav {
                margin: 0;
                font-weight: bold;
                font-size: 14px;
            }

            .logo {
                width: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end fixed-sidebar" style="background-color: #813C3F" id="sidebar-wrapper">
            <div class="d-flex sidebar-heading border-bottom gap-3 p-4" style="background-color: #4B270F;">
                <img src="{{ asset('images/bgLogin.jpg') }}" alt="logo" class="img-fluid rounded-4" style="width: 4rem">
                <div class="text-white fw-bold d-flex flex-column justify-content-center align-items-start">
                    <p class="mb-0" style="font-size: 16px">Admin</p>
                    <p class="mb-0" style="font-size: 12px">{{ session('active_karyawan_id') }}</p>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{route('manageProduk')}}"><i class="fa-brands fa-product-hunt"></i>
                    <span style="margin-left: 10px">Manage Data Produk</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fa-solid fa-file-invoice fa-lg"></i></fa-solid>
                    <span style="margin-left: 10px">Manage Resep</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fa-solid fa-bars-progress"></i>
                    <span style="margin-left: 9px">Manage Bahan Baku</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{route('manageHampers')}}"><i class="fa-solid fa-bars-progress"></i>
                    <span style="margin-left: 9px">Manage Hampers</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{url('loginEmployee')}}"><i class="fas fa-right-from-bracket"></i>
                    <span style="margin-left: 9px">Logout</span></a>

            </div>

        </div>
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg border-bottom" style="background-color: #4B270F;">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle" style="color: #ffffff; background-color: #4B270F"><i class="fas fa-bars"></i></button>
                    <div>
                        <div class="d-flex align-items-center ms-auto mt-2 mt-lg-0 gap-3">
                            <p class="brand-nav">Atma Kitchen</p>
                            <!-- <img class="logo" src="{{ asset('img/logosekolah.png') }}" alt="logo_sekolah"> -->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>