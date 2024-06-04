<div class="content">
    <div class="container">
        <div class="header">
            <h2>List Pesanan Harian</h2>
            <p style="color: #4b2713">Tanggal: 18/02/2024</p>
        </div>
        <div class="content">
            <div class="left-panel">
                <div class="section">
                    <h3>List Pesanan</h3>
                    <ul>
                        @foreach ($transaksi as $t)
                        @php
                        $date = date('y.m.d');
                        $dateParts = explode('.', $date);
                        $dateParts[2] = $t->id + 100;
                        $newDate = implode('.', $dateParts);

                        // Pastikan $t->tanggal_ambil adalah instance dari DateTime atau Carbon
                        $time = (new DateTime($t->tanggal_ambil))->format('H:i');
                        @endphp
                        <li>No Nota: {{$newDate}}<br>Nama: {{$t->nama_customer}}<br>Jam: {{$time}}<br>
                            @foreach ($detail->where('id_transaksi', $t->id) as $d)
                            {{ $d->id_hampers == null ? $d->produk->nama_produk : $d->hampers->nama_hampers }}<br>
                            @endforeach
                        </li>
                        @endforeach

                    </ul>
                </div>
                <div class="section">
                    <h3>Bahan:</h3>
                    <ul>
                        @foreach ($detail as $d)

                        <li>
                            @if($d->id_hampers == null)
                        <li><b>{{$d->produk->nama_produk}}</b></li>
                        @foreach ($many as $m)
                        <li>{{$m->bahan_baku->nama_bahan_baku}} {{$m->jumlah_bahan}} {{$m->bahan_baku->satuan_bahan_baku}} </li>
                        @endforeach
                        @else
                        <li><b>{{$d->hampers->nama_hampers}}</b></li>
                        @foreach ($dr as $item)
                        <li>{{$item->bahan_baku->nama_bahan_baku}} {{$item->jumlah_bahan}} {{$item->bahan_baku->satuan_bahan_baku}}</li>
                        @endforeach
                        @endif
                        </li><br>

                        @endforeach



                    </ul>
                </div>

            </div>
            <div class="right-panel">

                <div class="section">
                    <h3>Rekap</h3>
                    <ul>
                        @foreach ($detail as $d)
                        @if($d->id_hampers == null)
                        <li>{{$d->jumlah_produk}} ({{$d->produk->satuan_produk}}) {{$d->produk->nama_produk}}</li>
                        @else

                        @foreach ($detail_hampers as $dh)
                        <li>1 ({{$dh->produk->satuan_produk}}){{$dh->produk->nama_produk}}</li>

                        @endforeach
                        @endif
                        @endforeach()
                        <!-- <li>1 Brownies ½ Loyang</li>
                        <li>1 Lapis Legit ½ Loyang</li>
                        <li>1 Lapis Surabaya ½ Loyang</li>
                        <li>1 Lapis Surabaya 1 Loyang</li> -->
                    </ul>
                </div>
                <div class="section">
                    <h3>Yang Perlu Dibuat</h3>
                    <ul>
                        @foreach ($detail as $d)
                        @if($d->id_hampers == null)
                        <li>{{$d->jumlah_produk}} ({{$d->produk->satuan_produk}}) {{$d->produk->nama_produk}}</li>
                        @else

                        @foreach ($detail_hampers as $dh)
                        <li>1 ({{$dh->produk->satuan_produk}}){{$dh->produk->nama_produk}}</li>

                        @endforeach
                        @endif
                        @endforeach()
                    </ul>
                </div>
                <div class="section">
                    <h3>Rekap Bahan:</h3>
                    @php
                    $cant = false;
                    @endphp
                    <ul>
                        @foreach($g as $item)
                        @php
                        $id = $item['id_bahan_baku'];
                        $nama = $bahan->where('id', $id)->first();
                        @endphp
                        <li>{{$nama->nama_bahan_baku}} {{$item['total_jumlah_bahan']}} {{$nama->satuan_bahan_baku}}
                            @php
                            $temp = $bahan->where('id', $item['id_bahan_baku'])->first();
                            $barrier = $temp->stok_bahan_baku;
                            if ($barrier < $item['total_jumlah_bahan']) { $cant=true; } @endphp @if($barrier <$item['total_jumlah_bahan']) <span style="color:red">WARNING: STOk {{$barrier}} {{$temp->satuan_bahan_baku}}</span>
                                @endif
                        </li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
    </div>

</div>
