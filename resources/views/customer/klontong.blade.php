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
        place-items: start;
        width: 80rem;
        height: fit-content;
        padding: 1rem;
        border-radius: 7px;
        box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
        background: #ffffff;
    }

    #isi {
        width: 350px;
        height: fit-content;
        border: 2px solid #FFC436;
        border-radius: 7px;
        padding: 15px 15px;
        margin-bottom: 10px;
    }

    #up {
        text-decoration: none;
        background-color: #FFC436;
        color: #fff;
        width: 100px;
        height: 30px;
        align-items: center;
        justify-content: center;
        display: flex;
        border-radius: 7px;
    }

    #up:hover {
        background-color: #4B270F;

    }
</style>
<div class="content">
    <main>
        <table>

            <tr>
                <h1 style="margin-bottom: 2rem;">Nota</h1>
                @php

                $count = $hasil3->count(); // Asumsikan $count diambil dari jumlah item dalam $hasil3
                @endphp
                @for ($i = 0; $i < $count; $i++) <div id="isi" style="margin-bottom: 2rem;">
                    @php

                    $date = date('y.m.d');
                    $dateParts = explode('.', $date);
                    $dateParts[2] = $hasil3[$i]->id_customer+100;
                    $newDate = implode('.', $dateParts);
                    @endphp
                    <a href="">Cetak PDF</a>
                    <h2>Atma Kitchen</h2>
                    <p>Jl. Centralpark No. 10 Yogyakarta</p>
                    <p>No. Nota: {{$newDate}}</p>
                    <p>Tanggal Pesan: {{$hasil3[$i]->tanggal_pesan}}</p>
                    <p>Lunas Pada: {{$hasil3[$i]->tanggal_pesan}}</p>
                    <p>Tanggal Ambil: {{$hasil3[$i]->tanggal_ambil}}</p>

                    <p>Customer: {{$hasil3[$i]->customer->nama_customer}}/{{$hasil3[$i]->customer->email_customer}}</p>
                    <p>Total: {{$hasil3[$i]->jumlah_transaksi_produk}}</p>

                    <p>Poin Dari Transaksi: {{$hasil3[$i]->jumlah_poin_transaksi}}</p>
</div>
@endfor

</tr>
<tr>
    <h1 style="margin-bottom: 2rem;">Pre-Order</h1>
</tr>

@foreach ($hasil2 as $data)
<tr>
    @if($data->id_produk == null)
    <div id="isi">
        <b>{{$data->hampers->nama_hampers}}</b>
        <p style="margin-bottom: 0;">Rp. {{$data->total_transaksi_produk}}</p>
        <p style="margin-bottom: 0;">Jumlah: {{$data->jumlah_produk}}X</p>
        <div style="display: flex; justify-content: end;">
            <form action="{{route ('transaksi.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_produk" value="{{$data->id_hampers}}">
                <input type="hidden" name="id_transaksi" value="{{$data->id_transaksi}}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
    @else
    <div id="isi">
        <b>{{$data->produk->nama_produk}}</b>
        <p style="margin-bottom: 0;">Rp. {{$data->total_transaksi_produk}}</p>
        <p style="margin-bottom: 0;">Jumlah: {{$data->jumlah_produk}}X</p>
        <p style="margin-bottom: 0">Stok:{{$data->produk->stok_produk}}</p>
        <p style="margin-bottom: 0">Kuota:{{$data->produk->kuota}}</p>
        <div style="display: flex; justify-content: end;">
            <form action="{{route ('transaksi.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_produk" value="{{$data->id_produk}}">
                <input type="hidden" name="id_transaksi" value="{{$data->id_transaksi}}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>

    @endif
</tr>

@endforeach

<tr>
    <h1 style="margin-bottom: 2rem;">Ready Stock</h1>
</tr>
@foreach ($hasil as $data)
<tr>
    @if($data->id_produk == null)

    <div id="isi">
        <b>{{$data->hampers->nama_hampers}}</b>
        <p style="margin-bottom: 0;">Rp. {{$data->total_transaksi_produk}}</p>
        <p style="margin-bottom: 0;">Jumlah: {{$data->jumlah_produk}}X</p>

        <div style="display: flex; justify-content: end;">
            <form action="{{route ('transaksi.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_produk" value="{{$data->id_hampers}}">
                <input type="hidden" name="id_transaksi" value="{{$data->id_transaksi}}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
    @else
    <div id="isi">
        <b>{{$data->produk->nama_produk}}</b>
        <p style="margin-bottom: 0;">Rp. {{$data->total_transaksi_produk}}</p>
        <p style="margin-bottom: 0;">Jumlah: {{$data->jumlah_produk}}X</p>
        <p style="margin-bottom: 0">Stok:{{$data->produk->stok_produk}}</p>
        <p style="margin-bottom: 0">Kuota:{{$data->produk->kuota}}</p>
        <div style="display: flex; justify-content: end;">
            <form action="{{route ('transaksi.destroy')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_produk" value="{{$data->id_produk}}">
                <input type="hidden" name="id_transaksi" value="{{$data->id_transaksi}}">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>

    @endif

</tr>
@endforeach
@if($klontongB !== null || $klontongP !== null)

<div style="display: flex; justify-content: end; width: 78rem ; align-items: center">
    @php
    if($klontongB === null){
        $total =0+$klontongP->jumlah_transaksi_produk;
    }else if($klontongP === null){
        $total = $klontongB->jumlah_transaksi_produk+0;
    }else{
        $total = $klontongB->jumlah_transaksi_produk+$klontongP->jumlah_transaksi_produk;
    }
    @endphp
    <p style="margin-right: 1rem ; margin-bottom: 0">Total: Rp.{{$total}}</p>
    <a href="{{url('uploadBukti')}}" id="up">Beli</a>
</div>
@endif

</table>
</main>

</div>

@endsection