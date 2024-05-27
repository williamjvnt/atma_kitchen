<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Bukti Pembayaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: min-content;
            height: 90%;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
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
            width: 40rem;
            height: 30rem;
            border-radius: 7px;
            box-shadow: 0 4px 8px rgba(69, 71, 75, 0.5);
            background: #ffffff;
        }
    </style>
</head>

<body>
    <div class="content">
        <main>
            <div style="text-align: center; color:red">
                <h2>SUMMARY</h2>
                <p>Total Harga Pesanan:Rp. {{$klontong[0]->jumlah_transaksi_produk}}</p>
                <p>Total Poin Pesanan: {{$poin}}</p>
                <p>Jumlah Yang Harus Dibayar: Rp. {{$temp}}</p>
            </div>
            <form action="{{route('transaksi.update', $klontong[0]->id)}}" method="post">
                <p>Upload Bukti Pembayaran</p>
                @csrf
                @method('PUT')
                <input type="hidden" name="poin" value="{{$poin}}">
                <input type="hidden" name="temp" value="{{$temp}}">
                <div class="form-group col-md-12">
                    <label class="font-weight-bold">Bukti Pembayaran</label>
                    <input type="file" class="form-control @error('bukti_transaksi') is-invalid @enderror" name="bukti_transaksi" value="{{ old('bukti_transaksi') }}" required>
                    @error('bukti_transaksi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-row mb-3">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat" required>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <input type="range" id="rangeInput" name="rangeInput" min="0" max="100">
                <span id="rangeValue">0</span>

                <div class="form-floating mb-3 d-grid">
                    <button type="submit" class="btn btn-primary col-6 mb-3 mt-4 mx-auto" style="background-color: #813C3F; border-color:#813C3F;">Kirim</button>
                </div>
            </form>
        </main>
    </div>

</body>
<script>
    const rangeInput = document.getElementById('rangeInput');
    const rangeValue = document.getElementById('rangeValue');

    rangeInput.addEventListener('input', () => {
        rangeValue.textContent = rangeInput.value;
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<html>