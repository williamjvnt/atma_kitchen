<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <title>SHIS</title>
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Tai+Heritage+Pro:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ECECEC;
        }

        .list-group-item.custom-bg-color {
            background-color: #F9A835;
            /* transition: background-color 0.3s; */
        }

        .list-group-item.custom-bg-color:hover {
            background-color: #DA9430;
            text-decoration: none;
            color: inherit;
        }

        .list-group-item.custom-bg-color:active {
            background-color: #DA9430;
        }

        .list-group-item {
            border: none;
        }

        .school-nav {
            margin: 0;
            font-weight: bold;
            font-size: 20px;
        }

        .logo {
            width: 4rem;
        }

        /* Responsive */
        @media screen and (max-width: 412px) {
            .school-nav {
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
        <div class="border-end fixed-sidebar" style="background-color: #F9A835" id="sidebar-wrapper">
            <div class="d-flex sidebar-heading border-bottom gap-3 p-4" style="background-color: #042F66">
                <img src="{{ asset('img/admin.jpg') }}" alt="logo" class="img-fluid rounded-4" style="width: 4rem">
                <div class="text-white fw-bold d-flex flex-column justify-content-center align-items-start">
                    <p class="mb-0" style="font-size: 16px">{{ Auth::user()->nama }}</p>
                    <p class="mb-0" style="font-size: 12px">{{ Auth::user()->no_pegawai }}</p>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('admin-home') }}"><i class="fas fa-house"></i><span style="margin-left: 12px">Home</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('manage-user') }}"><i class="fas fa-users"></i><span style="margin-left: 10px">Manage User</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('manage-spp') }}"><i class="fas fa-bars-progress"></i>
                    <span style="margin-left: 10px">Manage Data SPP</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('getAllPayment') }}"><i class="fas fa-bars"></i>
                    <span style="margin-left: 10px">Pembayaran SPP</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('manage-jadwal') }}"><i class="fas fa-calendar"></i>
                    <span style="margin-left: 9px">Manage Jadwal</span></a>
                <a class="list-group-item p-3 custom-bg-color fw-semibold" href="{{ route('admin') }}"><i class="fas fa-right-from-bracket"></i>
                    <span style="margin-left: 9px">Logout</span></a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn" id="sidebarToggle" style="color: #042F66"><i class="fas fa-bars"></i></button>
                    <div class="" id="">
                        <div class="d-flex align-items-center ms-auto mt-2 mt-lg-0 gap-3">
                            <p class="school-nav">Semesta Internasional High School</p>
                            <img class="logo" src="{{ asset('img/logosekolah.png') }}" alt="logo_sekolah">
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
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>

<div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">penitip</label>
                                    <select class="form-control @error('id_penitip') is-invalid @enderror" name="id_penitip">
                                        <option value="">Pilih penitip</option>

                                        @foreach($penitip as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penitip }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_penitip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>