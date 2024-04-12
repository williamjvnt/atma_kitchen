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
        html,
        body {
            min-height: min-content;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end fixed-sidebar" style="background-color: #F9A835" id="sidebar-wrapper">
            <div class="d-flex sidebar-heading border-bottom gap-3 p-4" style="background-color: #042F66">
                <img src="{{ asset('images/bgLogin.jpg') }}" alt="logo" class="img-fluid rounded-4" style="width: 4rem">
                <div class="text-white fw-bold d-flex flex-column justify-content-center align-items-start">
                    <p class="mb-0" style="font-size: 16px">Admin</p>
                    <p class="mb-0" style="font-size: 12px">911</p>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-house"></i><span style="margin-left: 12px">Home</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-users"></i><span style="margin-left: 10px">Manage User</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-bars-progress"></i>
                    <span style="margin-left: 10px">Manage Data SPP</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-bars"></i>
                    <span style="margin-left: 10px">Pembayaran SPP</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-calendar"></i>
                    <span style="margin-left: 9px">Manage Jadwal</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="#"><i class="fas fa-right-from-bracket"></i>
                    <span style="margin-left: 9px">Logout</span></a>
            </div>

        </div>
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle" style="color: #042F66"><i class="fas fa-bars"></i></button>

                    <div>
                        <div class="d-flex align-items-center ms-auto mt-2 mt-lg-0 gap-3">
                            <p class="school-nav">Semesta Internasional High School</p>
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
    <script>
        window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {

                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

        });
    </script>

</body>

</html>