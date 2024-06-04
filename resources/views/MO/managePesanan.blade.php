@extends ('MO.navbarMODashboard')
@section('content')
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .content {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .left-panel,
    .right-panel {
        width: 48%;
    }

    .section {
        margin-bottom: 20px;
    }

    .section h3 {
        margin-bottom: 10px;
        border-bottom: 1px solid #000;
        padding-bottom: 5px;
    }

    .section ul {
        list-style: none;
        padding: 0;
    }

    .section ul li {
        margin-bottom: 5px;
    }

    .note {
        font-size: 12px;
        color: blue;
    }

    .warning {
        color: red;
    }
</style>
<!-- <div class="container-details">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-details">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive p-0">
                        <table class="table table-hover text-no-wrap">
                            <thead>
                                <tr>
                                    <th class="text-center">Pilih</th>
                                    <th class="text-center">ID Transaksi</th>
                                    <th class="text-center">Nama Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                <tr>
                                    <th class="text-center align-middle">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck1_{{ $item->id }}">
                                        </div>
                                    </th>

                                    <th class="text-center align-middle">{{$item->id}}</th>
                                    <th class="text-center align-middle">{{$item->customer->nama_customer}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="display: flex ;justify-content: flex-end; margin-right: 20px">


                            <button id="processBtn" class="btn" type="submit" route="{{ route('processPesanan') }}" style="background-color: #813C3F; border-color:#813C3F; color:white;">Process</button>

                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-success" id="exampleModalLabel">Berhasil Memproses Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showSuccessModal(message) {

        document.getElementById('successMessage').innerText = message;

        $('#successModal').modal('show');
    }


    var successMessage = '<?php echo session("success"); ?>';
    if (successMessage) {

        showSuccessModal(successMessage);
    }
    $(document).ready(function() {

        function checkIfAnyChecked() {
            var anyChecked = false;
            $('.form-check-input').each(function() {
                if ($(this).is(':checked')) {
                    anyChecked = true;
                    return false;
                }
            });
            return anyChecked;
        }

        // Check checkboxes on load
        $('#processBtn').prop('disabled', !checkIfAnyChecked());

        // Check checkboxes on change
        $('.form-check-input').change(function() {
            $('#processBtn').prop('disabled', !checkIfAnyChecked());
        });

        // Process button click event
        $('#processBtn').click(function() {
            var checkedIds = []; // Array to store checked IDs
            $('.form-check-input:checked').each(function() {
                checkedIds.push($(this).val()); // Push checked ID to the array
            });
            // Redirect to route with checked IDs as query parameters
            var route = $(this).attr('route') + '?ids=' + checkedIds.join(',');
            window.location.href = route;
        });
    });
</script>


@endsection