@extends('navbarDashboard')
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
        height: 150px;
    }
</style>
<div class="content">
    <main>
        <ul class="nav justify-content-center" id="nav">
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
                        <div class="card-body">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_produk}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_produk}}</p>
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
            <div class="row">
                @isset($hampers)
                @foreach ($hampers as $index => $item)

                @if ($index % 5 == 0 && $index != 0)
            </div>
            <div class="row">
                @endif
                <div class="col-md-3" id="best">
                    <div class="card mb-3" style="width: 100%;">
                        <img src="{{$item->gambar_hampers}}" class="card-img-top" style="width:100%; height:220px" alt="...">
                        <div class="card-body" style="height: fit-content">
                            <b class="card-title" style="color: #FFC436">{{$item->nama_hampers}}</b>
                            <p style="color: #4b2713">Rp. {{$item->harga_hampers}}</p>
                            <p style="margin-bottom: 2px">Deskripsi Hampers:</p>
                            <div>
                                @foreach($detail as $i)
                                @if($i->id_hampers == $item->id)
                                <p style="font-size: 12px; padding-bottom: 2px; margin-bottom: 0">- {{$i->produk->nama_produk}}</p>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @endisset
            </div>
        </div>
    </main>
</div>
<script>
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