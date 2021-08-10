<!DOCTYPE html>
<html>

<head>
    <title>Tes OKANEMO - Register Form</title>
</head>

<body>
    <form action="{{ url('/register/submit') }}" id="submit-form" method="POST">
        @csrf
        <center>
            <h2>PT. OKANEMO TEST - Register Form</h2>
            <h3>By Gilang Pangestu</h3>
            <table border="0">
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Nama Perusahaan</td>
                    <td><input type="text" name="company_name" required></td>
                </tr>
                <tr>
                    <td>Nama Bank</td>
                    <td><input type="text" name="bank_name" required></td>
                </tr>
                <tr>
                    <td>Nomor Rekening</td>
                    <td><input type="number" name="norek" required></td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        <!-- <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Rp 1,000,000.00"> -->
                        <input type="text" id="dengan-rupiah" name="amount" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" form="submit-form">
                    </td>
                </tr>
            </table>
        </center>
    </form>
</body>

</html>

<script>
    // var submitForm = document.getElementById("submit-form");
    // submitForm.addEventListener('submit', function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(document.getElementById("submit-form"));
    //     console.log(formData);
    // });
    // document.querySelector('#submit-form').addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     var formData = new FormData(document.getElementById("submit-form"));
    //     console.log(formData);
    // });

    // $('#submit-form').submit(function(event) {
    //     event.preventDefault();
    //     var formData = new FormData(document.getElementById("submit-form"));
    //     $.ajax({
    //         data: formData,
    //         success: function(data) {
    //             console.log(data);
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         }
    //     });
    // });

    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>