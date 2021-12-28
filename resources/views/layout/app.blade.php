<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    @yield('css_before')

    <title>BookingHotel | {{ $judul }}</title>
</head>

<body>

    <div class="navigation">
        @include('partials.navbar')

        <div class="container">
            <h1 class="mt-3 text-center">@yield('header')</h1>
            @yield('contents')
        </div>

        @include('partials.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="js/script.js">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <!-- Datepicker Script-->
    <script>
        $(function() {
            $("#datepicker1").datepicker();
            $("#format").on("change", function() {
                $("#datepicker1").datepicker("option", "dateFormat", $(this).val());
            });
        });

        $(function() {
            $("#datepicker2").datepicker();
            $("#format").on("change", function() {
                $("#datepicker2").datepicker("option", "dateFormat", $(this).val());
            });
        });
    </script>

    <!-- Quantity Counter Script-->
    <script>
        $(document).ready(function() {

            $('.increment-btn').click(function(e) {
                e.preventDefault();
                // quantity_max = $(this).find('#quantity_max').val();
                quantity_max = document.getElementById("quantity_max").value;
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, quantity_max);
                value = isNaN(value) ? 0 : value;
                if (value < quantity_max) {
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }

            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                quantity_max = document.getElementById("quantity_max").value;
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, quantity_max);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

        });
    </script>
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')
            var tipe = button.getAttribute('data-bs-tipe')
            var tanggal_mulai = button.getAttribute('data-bs-tanggal_mulai')
            var tanggal_akhir = button.getAttribute('data-bs-tanggal_akhir')
            var quantity = button.getAttribute('data-bs-quantity')
            var harga = button.getAttribute('data-bs-harga')
            var total_transaksi = button.getAttribute('data-bs-total-transaksi')
            var bukti_transfer = "/images/bukti/" + button.getAttribute('data-bs-bukti-transfer')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalBodyInput = exampleModal.querySelector('#booking_id')
            var modalBodyInputTipe = exampleModal.querySelector('#booking-tipe')
            var modalBodyInputTanggalMulai = exampleModal.querySelector('#booking-tanggal-mulai')
            var modalBodyInputTanggalAkhir = exampleModal.querySelector('#booking-tanggal-akhir')
            var modalBodyInputQuantity = exampleModal.querySelector('#booking-quantity')
            var modalBodyInputHarga = exampleModal.querySelector('#booking-harga')
            var modalBodyInputTotaltransaksi = exampleModal.querySelector('#booking-total-transaksi')
            var modalBodyImageBuktiTransfer = exampleModal.querySelector('#bukti-transfer')
            modalBodyInput.value = id
            modalBodyInputTipe.textContent = tipe
            modalBodyInputTanggalMulai.textContent = tanggal_mulai
            modalBodyInputTanggalAkhir.textContent = tanggal_akhir
            modalBodyInputQuantity.textContent = quantity
            modalBodyInputHarga.textContent = harga
            modalBodyInputTotaltransaksi.textContent = total_transaksi

            var modalBodyInputs = exampleModal.querySelector('#booking_ids')
            var modalBodyLinkBuktiTransfer = exampleModal.querySelector('#link-bukti-transfer')
            var link_bukti_transfer = "/images/bukti/" + button.getAttribute('data-bs-bukti-transfer')
            modalBodyInputs.value = id
            modalBodyImageBuktiTransfer.src = bukti_transfer
            modalBodyLinkBuktiTransfer.href = link_bukti_transfer
        })
    </script>
    <script>
        var exampleModalRiwayat = document.getElementById('exampleModalRiwayat')
        exampleModalRiwayat.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var buttonRiwayat = event.relatedTarget
            // Extract info from data-bs-* attributes
            var riwayat_id = buttonRiwayat.getAttribute('data-bs-id')
            var riwayat_tipe = buttonRiwayat.getAttribute('data-bs-tipe')
            var riwayat_tanggal_mulai = buttonRiwayat.getAttribute('data-bs-tanggal_mulai')
            var riwayat_tanggal_akhir = buttonRiwayat.getAttribute('data-bs-tanggal_akhir')
            var riwayat_quantity = buttonRiwayat.getAttribute('data-bs-quantity')
            var riwayat_harga = buttonRiwayat.getAttribute('data-bs-harga')
            var riwayat_total_transaksi = buttonRiwayat.getAttribute('data-bs-total-transaksi')
            var riwayat_bukti_transfer = "/images/bukti/" + buttonRiwayat.getAttribute('data-bs-bukti-transfer')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var riwayat_modalBodyInputTipe = exampleModalRiwayat.querySelector('#riwayat-tipe')
            var riwayat_modalBodyInputTanggalMulai = exampleModalRiwayat.querySelector('#riwayat-tanggal-mulai')
            var riwayat_modalBodyInputTanggalAkhir = exampleModalRiwayat.querySelector('#riwayat-tanggal-akhir')
            var riwayat_modalBodyInputQuantity = exampleModalRiwayat.querySelector('#riwayat-quantity')
            var riwayat_modalBodyInputHarga = exampleModalRiwayat.querySelector('#riwayat-harga')
            var riwayat_modalBodyInputTotaltransaksi = exampleModalRiwayat.querySelector('#riwayat-total-transaksi')
            var riwayat_modalBodyImageBuktiTransfer = exampleModalRiwayat.querySelector('#riwayat-bukti-transfer')
            riwayat_modalBodyInputTipe.textContent = riwayat_tipe
            riwayat_modalBodyInputTanggalMulai.textContent = riwayat_tanggal_mulai
            riwayat_modalBodyInputTanggalAkhir.textContent = riwayat_tanggal_akhir
            riwayat_modalBodyInputQuantity.textContent = riwayat_quantity
            riwayat_modalBodyInputHarga.textContent = riwayat_harga
            riwayat_modalBodyInputTotaltransaksi.textContent = riwayat_total_transaksi
            var riwayat_modalBodyLinkBuktiTransfer = exampleModalRiwayat.querySelector(
                '#link-riwayat-bukti-transfer')
            var riwayat_link_bukti_transfer = "/images/bukti/" + buttonRiwayat.getAttribute(
                'data-bs-bukti-transfer')
            riwayat_modalBodyImageBuktiTransfer.src = riwayat_bukti_transfer
            riwayat_modalBodyLinkBuktiTransfer.href = riwayat_link_bukti_transfer
        })
    </script>
</body>
@yield('js_after')
</html>
