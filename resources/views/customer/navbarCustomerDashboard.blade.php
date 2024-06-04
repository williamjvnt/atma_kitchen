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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        nav {
            font-size: 16px;
            background-color: #4B270F;
        }

        html,
        body {
            min-height: min-content;
            height: 90%;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
        }

        footer {

            padding: 3rem;
            position: auto;
            bottom: 0;
            width: 100%;
            background-color: #4B270F;
            height: 15rem;
            font-size: 12px;
            display: grid;
            place-items: center;
            color: #ffffff;
            font-family: sans-serif;

        }

        .navbar-toggler {
            background-color: #ffffff;
            color: #4B270F;
        }

        #li-nav .nav-link {

            color: #ffffff;
        }

        #li-nav .nav-link:hover {

            color: #813C3F;
        }

        /* #admin {

            color: #ffd700;
        }

        #admin:hover {
            color: #813C3F;
        } */

        #footer-section {
            width: 25rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-teritiary sticky-top">
        <div class="container-fluid">
            <div class="navbar-brand ms-5" style="font-weight: bold; color:#ffffff">Atma Kitchen</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar" style="place-content: center">
                <ul class="navbar-nav ms-auto me-5" id="li-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home')}}">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('catalog')}}">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <!-- id="basket-icon"  -->
                        @if($klontong->isEmpty())
                        <a class="nav-link" href="{{ route('klontongKosong') }}"><i class="fa-solid fa-basket-shopping"></i></a>
                        @else
                        <a class="nav-link" href="{{ route('klontong') }}"><i class="fa-solid fa-basket-shopping fa-bounce" style="color: #FFC436"></i></a>
                        @endif
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="{{ route('actionLogout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--navbar-->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!--footer-->
    <footer class="main-footer ">
        <!-- To the right -->
        <!-- <div class="float-center d-none d-sm-inline">
            Copyright & copy by William Juvent
        </div> -->
        <div class="row justify-content-center">
            <div class="col" id="footer-section">
                <p>Tentang Kami</p>
                <p>Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                    Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book</p>
            </div>

            <div class="col m-0" id="footer-section">
                <p>Kontak Kami</p>
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <i class="fa-brands fa-instagram"></i>
                        <p class="m-0 ms-2">Atma_kitchen</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <i class="fa-solid fa-phone"></i>
                        <p class="m-0 ms-2">+62 8123456789</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <i class="fa-regular fa-envelope"></i>
                        <p class="m-0 ms-2">Atma_kitchen@gmail.com</p>
                    </div>
                </div>
            </div>
            <div id="footer-section">
                <p>Alamat</p>
                <p>Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                    Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book</p>
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>