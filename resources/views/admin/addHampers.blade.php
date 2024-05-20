@extends('admin.navbarAdminDashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Hampers</h1>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="content" id="add">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('hampers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Gambar Produk Hampers</label>
                                    <input type="file" class="form-control @error('gambar_hampers') is-invalid @enderror" name="gambar_hampers" value="{{ old('gambar_hampers') }}" required>
                                    @error('gambar_hampers')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Nama Hampers</label>
                                    <input type="text" class="form-control @error('nama_hampers') is-invalid @enderror" name="nama_hampers" value="{{ old('nama_hampers') }}" placeholder="Masukkan Nama hampers" required>
                                    @error('nama_hampers')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold">Harga hampers</label>
                                    <input type="text" class="form-control @error('harga_hampers') is-invalid @enderror" name="harga_hampers" value="{{ old('harga_hampers') }}" placeholder="Masukkan Harga hampers" required>
                                    @error('harga_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="produk-area"></div>
                            <input type="hidden" id="product-count" name="jumlah_produk" value="0">
                            <button type="button" class="btn btn-primary" onclick="addProductInput()">Tambah Produk</button>
                            <button type="button" class="btn btn-danger" onclick="removeInput()">Hapus Produk</button>
                            <button type="submit" class="btn btn-md " style="background-color: #813C3F; border-color:#813C3F; color:white">SIMPAN</button>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script>
    let productCount = 0;

    function addProductInput() {
        productCount++;
        const produkArea = document.getElementById('produk-area');
        const newInput = document.createElement('div');
        newInput.classList.add('form-row', 'pb-3');
        newInput.id = `input-row-${productCount}`;
        newInput.innerHTML = `
        <div class="form-group col-md-12">
            <label class="font-weight-bold">Produk ${productCount}</label>
            <select class="form-control @error('id') is-invalid @enderror" name="id_produk[]" required>
                <option value="">Pilih produk</option>
                @foreach($produk as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_produk }}</option>
                @endforeach
            </select>
        </div>
    `;
        produkArea.appendChild(newInput);
        updateProductCount();
    }

    function removeInput() {
        if (productCount > 0) {
            const produkArea = document.getElementById('produk-area');
            const formRow = document.getElementById(`input-row-${productCount}`);
            if (formRow) {
                produkArea.removeChild(formRow);
                productCount--;
                updateProductCount();
            } else {
                console.error(`Element with ID input-row-${productCount} not found.`);
            }
        } else {
            alert("No inputs to remove.");
        }
    }

    function updateProductCount() {
        const productCountInput = document.getElementById('jumlah_produk');
        productCountInput.value = productCount;
    }
</script>
@endsection