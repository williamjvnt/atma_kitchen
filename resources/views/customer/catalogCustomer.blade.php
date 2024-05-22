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
        height: fit-content;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }

    #nav .nav-item {
        margin-right: 1rem;

        background-color: #4B270F;

        /* border-color: #FFC436; */
        border-radius: 7px;
    }

    #nav .nav-item:hover {
        background-color: #FFC436;
        cursor: pointer;
    }

    #nav .nav-link {
        color: #ffffff;
    }


    #nav .nav-link.active {
        border-radius: 7px;

        background-color: #FFC436;
        color: #4B270F;
    }

    .content-section {
        display: none;
    }

    .content-section.active {
        display: block;
        margin-bottom: 25px;
    }

    #best {
        width: 20rem;

    }

    #nav {
        margin: 100px;
    }

    .card-body {
        height: 200px;
    }

    .preorder {
        background-color: #813C3F;
        border: 1px solid #813C3F;
        color: #fff;
        border-radius: 7px;
        cursor: pointer;


    }

    .preorder:hover {
        background-color: #FFC436;
        border: 1px solid #FFC436;
        color: #000;
    }

    .preorderHampers {
        background-color: #813C3F;
        border: 1px solid #813C3F;
        color: #fff;
        border-radius: 7px;
        cursor: pointer;


    }

    .preorderHampers:hover {
        background-color: #FFC436;
        border: 1px solid #FFC436;
        color: #000;
    }

    #order {
        color: #813C3F;
    }

    #order:hover {
        color: #FFC436;
    }
</style>
<div class="content">
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan Tanggal Pengambilan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" action="{{route('transaksi.store')}}">
                        @csrf
                        <input type="hidden" name="produk_id" value="">
                        <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="caller_id" value="">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="tanggal_pengambilan" placeholder="Tanggal Pengambilan" required>
                            <label for="floatingInput">Tanggal Pengambilan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="jumlah_produk" placeholder="Jumlah Produk" required>
                            <label for="floatingInput">Jumlah Produk</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Masukan ke Keranjang</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- modal hampers -->
    <div class="modal fade" id="staticBackdropHampers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukkan Tanggal Pengambilan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form class="form" method="post" action="{{route('transaksi.store')}}">
                        @csrf
                        <input type="hidden" name="hampers_id" value="">
                        <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="caller_id" value="">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="tanggal_pengambilan" placeholder="Tanggal Pengambilan" required>
                            <label for="floatingInput">Tanggal Pengambilan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="jumlah_produk" placeholder="Jumlah Produk" required>
                            <label for="floatingInput">Jumlah Hampers</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Masukan ke Keranjang</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <main>
        <!-- toast -->
        @if(Session::has('error'))
        <div class="alert alert-danger">
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Bootstrap</strong>
                        <small>{{ now()->diffForHumans() }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ Session::get('error') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        <ul class="nav justify-content-center " id="nav">

            <li class="nav-item">
                <a class="nav-link" onclick="showSection('cake')">Cake</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showSection('roti')">Roti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showSection('minuman')">Minuman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showSection('titipan')">Titipan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showSection('hampers')">Hampers</a>
            </li>
        </ul>
        <div id="cake" class="content-section">
            <h2>Catalog Cake</h2>
            <div class="row">
                @isset($produk)
                @foreach ($produk as $index => $item)
                @if ($item->id_kategori === 1)
                @if ($index % 4 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3">
                        <img src="{{$item->gambar_produk}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_produk}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_produk}}</p>
                            <div style="display: flex; justify-content: space-between;">
                                <p>Stok: {{$item->stok_produk}}</p>
                                <p>Kuota: {{$item->kuota}}</p>
                            </div>
                            <div style="display: flex; justify-content:flex-end; align-items: center">
                                @if($item->stok_produk > 0)
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>

                                <form method="POST" action="{{ route('transaksi.store') }}">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{$item->id}}">
                                    <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="caller_id" value="2">
                                    <button type="submit" style="background:none; border:none; padding:0; margin:0;">
                                        <i class="fa-solid fa-cart-shopping fa-xl" style="margin-left:5px; color:#813C3F" data-caller-id="2"></i>
                                    </button>
                                </form>
                                @else
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endisset
            </div>
        </div>


        <div id="roti" class="content-section">
            <h2>Catalog Roti</h2>
            <div class="row">
                @isset($produk)
                @foreach ($produk as $index => $item)
                @if ($item->id_kategori === 2)
                @if ($index % 5 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3">
                        <img src="{{$item->gambar_produk}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_produk}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_produk}}</p>
                            <div style="display: flex; justify-content: space-between;">
                                <p>Stok: {{$item->stok_produk}}</p>
                                <p>Kuota: {{$item->kuota}}</p>
                            </div>
                            <div style="display: flex; justify-content:flex-end; align-items: center">

                                @if($item->stok_produk > 0)
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>
                                <form method="POST" action="{{ route('transaksi.store') }}">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{$item->id}}">
                                    <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="caller_id" value="2">
                                    <button type="submit" style="background:none; border:none; padding:0; margin:0;">
                                        <i class="fa-solid fa-cart-shopping fa-xl" style="margin-left:5px; color:#813C3F" data-caller-id="2"></i>
                                    </button>
                                </form>

                                @else
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endisset
            </div>
        </div>
        <div id="minuman" class="content-section">
            <h2>Catalog Minuman</h2>
            <div class="row">
                @isset($produk)
                @foreach ($produk as $index => $item)
                @if ($item->id_kategori === 4)
                @if ($index % 5 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3">
                        <img src="{{$item->gambar_produk}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_produk}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_produk}}</p>
                            <div style="display: flex; justify-content: space-between;">
                                <p>Stok: {{$item->stok_produk}}</p>
                                <p>Kuota: {{$item->kuota}}</p>
                            </div>
                            <div style="display: flex; justify-content:flex-end; align-items: center">

                                @if($item->stok_produk > 0)
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>
                                <form method="POST" action="{{ route('transaksi.store') }}">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{$item->id}}">
                                    <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="caller_id" value="2">
                                    <button type="submit" style="background:none; border:none; padding:0; margin:0;">
                                        <i class="fa-solid fa-cart-shopping fa-xl" style="margin-left:5px; color:#813C3F" data-caller-id="2"></i>
                                    </button>
                                </form>

                                @else
                                <button class="preorder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk-id="{{ $item->id }}" data-caller-id="1">Pre-Order</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endisset
            </div>
        </div>
        <div id="titipan" class="content-section">
            <h2>Catalog Titipan</h2>
            <div class="row">
                @isset($produk)
                @foreach ($produk as $index => $item)
                @if ($item->id_kategori === 3)
                @if ($index % 5 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3">
                        <img src="{{$item->gambar_produk}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body" style="height: 8rem">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_produk}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_produk}}</p>
                            <div style="display: flex; justify-content: space-between; align-content: center;">
                                <p>Stok: {{$item->stok_produk}}</p>
                                <div style="display: flex; justify-content:flex-end; align-items: center">
                                    <form method="POST" action="{{ route('transaksi.store') }}">
                                        <input type="hidden" name="produk_id" value="{{$item->id}}">
                                        <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="caller_id" value="2">
                                        @csrf
                                        <button type="submit" style="background:none; border:none; padding:0; margin:0;">
                                            <i class="fa-solid fa-cart-shopping fa-xl" style="margin-left:5px; color:#813C3F" data-caller-id="2"></i>
                                        </button>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endisset
            </div>
        </div>
        <div id="hampers" class="content-section">
            <h2>Catalog Hampers</h2>
            @isset($hampers)
            <div class="row">
                @foreach ($hampers as $index => $item)
                @if ($index % 5 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3" style="width: 100%;">
                        <img src="{{$item->gambar_hampers}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_hampers}}</b>
                            <p style="color: #4b2713; margin-bottom: 5px">Rp. {{$item->harga_hampers}}</p>
                            <p style="margin-bottom: 2px">Deskripsi Hampers:</p>
                            <div>
                                @foreach($detail as $i)
                                @if($i->id_hampers == $item->id)
                                <p style="font-size: 12px; padding-bottom: 2px; margin-bottom: 0">- {{$i->produk->nama_produk}}</p>
                                @endif
                                @endforeach
                            </div>
                            <div>
                                @php
                                $a = array();
                                $b = 0;
                                @endphp
                                @foreach ($detail as $i)
                                @if($i->id_hampers == $item->id)
                                @php
                                $a[$b] = $i->produk->stok_produk;
                                $b++;
                                @endphp
                                @endif
                                @endforeach

                                @php
                                $c = $a[0];
                                $d = $a[1];

                                @endphp
                                @if($c == 0 || $d == 0)
                                <div style="display: flex; justify-content:flex-end; align-items: center">
                                    <button class="preorderHampers" data-bs-toggle="modal" data-bs-target="#staticBackdropHampers" data-hampers-id="{{ $item->id }} " data-caller-id="3">Pre-Order</button>
                                </div>

                                @else
                                @if($c>$d)
                                @php
                                $e = $d
                                @endphp
                                @else
                                @php
                                $e = $c
                                @endphp
                                @endif

                                <div style=" display: flex; justify-content:space-between; align-items: center ; ">
                                    <p style=" margin-bottom: 0px; margin-top: 5px">Stok: {{$e}}</p>
                                    <div style="display: flex; justify-content:flex-end; align-items: center">
                                        <button class="preorderHampers" data-bs-toggle="modal" data-bs-target="#staticBackdropHampers" data-hampers-id="{{ $item->id }}" data-caller-id="3">Pre-Order</button>
                                        <form method="POST" action="{{ route('transaksi.store') }}">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{$item->id}}">
                                            <input type="hidden" name="id_customer" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="caller_id" value="4">
                                            <button type="submit" style="background:none; border:none; padding:0; margin:0;">
                                                <i class="fa-solid fa-cart-shopping fa-xl" style="margin-left:5px; color:#813C3F" data-caller-id="4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endisset
        </div>

    </main>
</div>

<script>
    document.querySelectorAll('.preorder').forEach(button => {
        button.addEventListener('click', (event) => {
            const produkId = button.getAttribute('data-produk-id');
            const produkNama = button.getAttribute('data-produk-nama');
            const produkHarga = button.getAttribute('data-produk-harga');
            const callerId = button.getAttribute('data-caller-id');
            // const callerId = button.id;
            // Set hidden inputs in the modal form
            const modalForm = document.querySelector('#staticBackdrop form');
            modalForm.querySelector('input[name="produk_id"]').value = produkId;
            modalForm.querySelector('input[name="caller_id"]').value = callerId;
            // You can add more hidden inputs if needed and set their values here
        });
    });

    document.querySelectorAll('.preorderHampers').forEach(button => {
        button.addEventListener('click', (event) => {
            const hampersId = button.getAttribute('data-hampers-id');
            const hampersNama = button.getAttribute('data-hampers-nama');
            const hampersHarga = button.getAttribute('data-hampers-harga');
            const callerId = button.getAttribute('data-caller-id');
            // const callerId = button.id;
            // Set hidden inputs in the modal form
            document.querySelector('#staticBackdropHampers input[name="hampers_id"]').value = hampersId;
            document.querySelector('#staticBackdropHampers input[name="caller_id"]').value = callerId;
            // You can add more hidden inputs if needed and set their values here
        });
    });
    document.querySelectorAll('#order').forEach(orderButton => {
        orderButton.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            // Select the basket icon element
            const basketIcon = document.getElementById('basket-icon');

            // Add the bounce class to the basket icon
            basketIcon.classList.add('fa-bounce');
            basketIcon.style.color = '#FFC436';
            // Optional: Remove the bounce class after animation completes
            // Assuming the bounce animation duration is 1 second (adjust if necessary)

        });
    });

    function showSection(sectionId) {
        // Hide all sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active');
        });
        // Remove active class from all nav links
        document.querySelectorAll('#nav .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        // Show the selected section
        document.getElementById(sectionId).classList.add('active');
        // Add active class to the clicked nav link
        event.target.classList.add('active');
    }

    // On page load, check if any section is active, if not, set the default section (cake)
    document.addEventListener('DOMContentLoaded', (event) => {
        let activeSection = document.querySelector('.content-section.active');
        if (!activeSection) {
            showSection('cake');
        }
    });
</script>

@endsection