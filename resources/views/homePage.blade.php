@extends ('/navbarDashboard')
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

    .content-extend {
        margin-top: 5rem;
        margin-bottom: 12rem;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    main {
        display: grid;
        place-items: center;
        width: 70rem;
        height: 40rem;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }

    #title {
        color: #000000;
        font-size: 18px;
    }

    #desc {
        padding: 0;
        height: 6px;
        font-size: 3rem;
        color: #FFC436;
    }

    #button {
        text-align: start;

    }

    #button a {
        display: inline-block;
        margin-right: 5px;
        padding: 10px 20px;
        text-decoration: none;
        color: white;
        background-color: #4B270F;
        border-color: #4B270F;
        border-radius: 5px;

    }

    #button a:hover {
        background-color: #FFC436;

    }

    #picture img {
        display: block;
        margin: auto;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        object-fit: cover;

    }

    #scrollButton {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        color: #4b2713;
        border: 2px solid #4b2713;
        border-radius: 50%;
        /* cursor: pointer; */
        transition: background-color 0.3s, color 0.3s;
    }

    #scrollButton:hover {
        background-color: #4b2713;
        color: #ffffff !important;
    }

    #target {
        display: grid;
        place-items: center;
        width: 70rem;
        height: 40rem;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }

    #best {
        padding-right: 20px;
    }
</style>

<div class="content">
    <main>
        <table>
            <tr>
                <td id="title">Atma Kitchen by Kazuha~</td>
                <td rowspan="4" id="picture" style="padding-left: 4rem"><img src="{{ asset('images/bread.jpg') }}"> </td>
            </tr>
            <tr>
                <td id="desc"><b>FOR A BETTER </b></td>
            </tr>
            <tr>
                <td id="desc"><b>EXPERIENCE OF PASTRY</b></td>
            </tr>
            <tr>
                <td id="button">
                    <a href="#">See Our Product</a>
                    <a href="{{ url('login') }}">Login</a>
                </td>
            </tr>
        </table>
        <div id="button-container">
            <!-- <button id="scrollButton">Scroll Down</button> -->
            <i id="scrollButton" class="fa-solid fa-arrow-down" style="color: #4b2713;"></i>
        </div>



    </main>
</div>
<div class="content-extend">
    @isset($produk)

    <div id="target">
        <h2 id="title" style="color: #FFC436">OUR SIGNATURE PRODUCT</h2>
        <table>
            @if ($produk = $produk->where('id', 29)->first())
            <td id="best">
                <div class="card" style="width: 18rem;">
                    <img src="{{$produk->gambar_produk}}" class="card-img-top" style="width:17.93rem ;height:220px" alt="...">
                    <div class="card-body">
                        <b class="card-title" style="color: #FFC436">{{$produk->nama_produk}}</b>
                        <p style="color: #4b2713">Rp. {{$produk->harga_produk}}</p>

                    </div>
                </div>
            </td>
            @endif

            @if ($produk = $produk->where('id', 27)->first())
            <td id="best">
                <div class="card" style="width: 18rem;">
                    <img src="{{$produk->gambar_produk}}" class="card-img-top" style="width:17.93rem ;height:220px" alt="...">
                    <div class="card-body">
                        <b class="card-title" style="color: #FFC436">{{$produk->nama_produk}}</b>
                        <p style="color: #4b2713">Rp. {{$produk->harga_produk}}</p>


                    </div>
                </div>
            </td>
            @endif

            @if ($produk = $produk->where('id', 28)->first())
            <td id="best">
                <div class="card" style="width: 18rem;">
                    <img src="{{$produk->gambar_produk}}" class="card-img-top" style="width:17.93rem ;height:220px" alt="...">
                    <div class="card-body">
                        <b class="card-title" style="color: #FFC436">{{$produk->nama_produk}}</b>
                        <p style="color: #4b2713">Rp. {{$produk->harga_produk}}</p>


                    </div>
                </div>
            </td>
            @endif
        </table>
    </div>

    @endisset

</div>

<script>
    document.getElementById('scrollButton').addEventListener('click', function() {
        window.scrollTo({
            top: 950,
            behavior: 'smooth'
        });
    });
</script>
@endsection