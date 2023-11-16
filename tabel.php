<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPH 21 Calculation</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">


    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h2>PPH 21 Calculation Table</h2>

    <table id="exampleTable">
        <thead>
            <tr>
                <th>Langkah</th>
                <th>Nilai Turunan</th>
                <th>Tarif</th>
                <th>Hasil</th>
                <th>pphsetahun</th>
            </tr>
        </thead>
        <tbody>
            <!-- Placeholder row for new entries -->
            <tr id="newRowTemplate" style="display: none;">
                <td class="langkah"></td>
                <td class="nilaiTurunan"></td>
                <td class="tarif"></td>
                <td class="hasil"></td>
                <td class="pphsetahun"></td>
            </tr>
        </tbody>
    </table>

    <!-- Example Input Element -->
    <input type="text" id="pkp" value="">
    <button class="btn btn-primary" onclick="tambahbaris()">Tambah Baris</button>

    <!-- Script -->
    <script>
        function tambahbaris() {
            var tabel = document.getElementById('exampleTable');
            var newRowTemplate = document.getElementById('newRowTemplate');
            var newRow = tabel.insertRow(tabel.rows.length);
            var cells = newRowTemplate.cells;

            // Set nilai turunan berdasarkan PKPInputCrc
            var PKPInputCrc = document.getElementById('pkp').value;

            if (parseFloat(PKPInputCrc) <= 60000000) {
                // Format nilai turunan sebagai mata uang
                var formattedNilaiTurunan = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(parseFloat(PKPInputCrc));

                // Set nilai turunan untuk baris baru
                cells[0].textContent = 'Langkah 1';
                cells[1].textContent = formattedNilaiTurunan;
                cells[2].textContent = 'Tarif 1'; // Sesuaikan dengan kebutuhan
                cells[3].textContent = 'Hasil 1'; // Sesuaikan dengan kebutuhan
                cells[4].textContent = 'pphsetahun 1'; // Sesuaikan dengan kebutuhan
            } else if (parseFloat(PKPInputCrc) > 60000000 && parseFloat(PKPInputCrc) <= 250000000) {
                // Jika nilai PKPInputCrc berada di antara 60000000 dan 250000000
                // Set nilai tarif turunan sebesar 60000000 pada baris baru
                var tarifTurunan = 60000000;
                var formattedTarifTurunan = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(tarifTurunan);

                // Set nilai turunan untuk baris baru
                cells[0].textContent = 'Langkah 1';
                cells[1].textContent = formattedTarifTurunan;
                cells[2].textContent = 'Tarif 1'; // Sesuaikan dengan kebutuhan
                cells[3].textContent = 'Hasil 1'; // Sesuaikan dengan kebutuhan
                cells[4].textContent = 'pphsetahun 1'; // Sesuaikan dengan kebutuhan

                // Tambahkan baris baru untuk nilai turunan (PKPInput - 60000000)
                var newRow2 = tabel.insertRow(tabel.rows.length); // Tambahkan baris baru di bawah
                newRow2.innerHTML = newRowTemplate.innerHTML; // Salin elemen HTML dari template row

                var cells2 = newRow2.cells;
                cells2[0].textContent = 'Langkah 2'; // Sesuaikan dengan kebutuhan
                var nilaiTurunan = parseFloat(PKPInputCrc) - tarifTurunan;
                var formattedNilaiTurunan = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(nilaiTurunan);
                cells2[1].textContent = formattedNilaiTurunan; // Set nilai turunan untuk baris kedua
                cells2[2].textContent = 'Tarif 2'; // Sesuaikan dengan kebutuhan
                cells2[3].textContent = 'Hasil 2'; // Sesuaikan dengan kebutuhan
                cells2[4].textContent = 'pphsetahun 2'; // Sesuaikan dengan kebutuhan

            } else {
                // Set nilai turunan ke nilai PKPInputCrc
                cells[1].textContent = PKPInputCrc;
                cells[2].textContent = 'Tarif';
                cells[3].textContent = 'Hasil';
                cells[4].textContent = 'pphsetahun';
            }
        }
    </script>

</body>

</html>