<?php
$pageTitle = "PPH 22 -  Atas Penjualan Barang Kepada Pemerintah";
include("navbar.php") ?>
<div class="container">
    <div class="row text-center p-4 mt-5 ">
        <div class="col judul">
            <h3> KALKULATOR PAJAK PENGHASILAN PASAL 22

                <P> ATAS PENJUALAN BARANG KEPADA PEMERINTAH</p>

            </h3>
        </div>
    </div>
</div>

<div class="container" id="pph22">
    <form method="post" action="cetak/cetak_pph22-pemerintah.php" target="_blank">
        <div class="row row-cols-2 row-cols-md-2 g-4">
            <div class="col card1-pem">
                <div class="card mb-3">
                    <h5 class=" card-header text-bg-primary ">
                        Komponen Data
                    </h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak">

                                    <option value="pph22-impor.php">PPH 22 Atas Barang Impor</option>
                                    <option value="pph22-pemerintah.php" selected>PPH 22 Atas Penjualan Barang Kepada Pemerintah</option>
                                    <option value="pph22-kertas.php">PPH 22 Atas Penjualan Kertas Dalam Negeri</option>
                                    <option value="pph22-semen.php">PPH 22 Atas Penjualan Semen Dalam Negeri</option>
                                    <option value="pph22-baja.php">PPH 22 Atas Penjualan Baja Dalam Negeri</option>
                                    <option value="pph22-rokok.php">PPH 22 Atas Penjualan Rokok Dalam Negeri</option>
                                    <option value="pph22-otomotif.php">PPH 22 Atas Penjualan Otomotif Dalam Negeri</option>
                                    <option value="pph22-minyak.php">PPH 22 Atas Penjualan Penjualan Minyak Tanah / Gas LPG, Pelumas</option>
                                    <option value="pph22-bumn.php">PPH 22 Atas Penjualan Barang Kepada BUMN yang dibayar dengan APBN maupun Non-APBN</option>
                                    <option value="pph22-kehutanan.php">PPH 22 Atas Pembelian bahan-bahan sektor perhutanan, perkebunan, pertanian, dan perikanan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status NPWP</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="npwp" name="npwp">

                                    <option value="1">NPWP</option>
                                    <option value="2">Non-NPWP</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Barang</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow mataUang" id="harga_barang" name="harga_barang" inputmode="numeric">
                            </div>
                        </div>
                        <div class="col d-flex gap-3 justify-content-center">

                            <button class="btn btn-warning col-5" type="button" onclick="resetInput()">Reset</button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary col-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="validateInputs()">
                                Cetak
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered myModal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <label class="col-form-label">Nama:</label>
                                                <input type="text" class="form-control border border-secondary-subtle" id="nama" name="nama">
                                                <small id="namaError" class="form-text text-danger"></small>
                                            </div>
                                            <hr>
                                            <div class="mb-3">
                                                <label class="col-form-label">NIK:</label>
                                                <input type="text" class="form-control border border-secondary-subtle " id="nik" name="nik">
                                                <small id="nikError" class="form-text text-danger"></small>
                                            </div>
                                            <hr>
                                            <div class="mb-3">
                                                <label class="col-form-label">Nomor NPWP:</label>
                                                <input type="text" class="form-control border border-secondary-subtle" id="no_npwp" name="no_npwp">
                                                <small id="noNpwpError" class="form-text text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary col-5 " type="submit" id="submitButton" data-bs-dismiss="modal" onclick="submitAndClear()" disabled>Cetak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col card2 mb-5">
                <div class="card" id="pph22card2">
                    <h5 class="card-header text-bg-primary ">
                        Perhitungan
                    </h5>
                    <div class="card-body">

                        <div class="accordion shadow" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        1. Harga barang tidak termasuk PPn dan PPnBM
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Harga Barang </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control  border border-secondary shadow " id="harga_barang1" name="harga_barang1" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Pajak Penghasilan Pasal 22 <span class="ubahLabel" id="label1" name="label1">(1.5%)</span> </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="persen_pph1" name="persen_pph1" readonly>
                                                <input type="hidden" class="ubahLabel shadow " id="persen_pph_hidden" name="persen_pph_hidden" value="1.5%" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Jumlah uang yang diterima </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="uang_diterima" name="uang_diterima" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        2. Harga barang termasuk PPN (11%) Bukan Barang Mewah
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Harga barang termasuk PPN (11%) </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="harga_barang2" name="harga_barang2" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> PPN (11%) </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="ppn1" name="ppn1" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Harga barang tidak termasuk PPN (11%) / DPP</label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="harga_barang_tidak_termasuk" name="harga_barang_tidak_termasuk" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Pajak Penghasilan Pasal 22 <span class="ubahLabel" id="label1" name="label1">(1.5%)</span> </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="persen_pph2" name="persen_pph2" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Jumlah uang yang diterima </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="uang_diterima2" name="uang_diterima2" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                        3. Harga barang termasuk PPN (11%) dan PPnBM (20%)
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Harga barang termasuk PPN (11%) dan PPnBM (20%) </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="harga_barang3" name="harga_barang3" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> PPN (11%) </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="ppn3" name="ppn3" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> PPnBM (20%) </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="ppnbm" name="ppnbm" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Harga barang tidak termasuk PPN dan PPnBM </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="harga_barang_tidak_termasuk2" name="harga_barang_tidak_termasuk2" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Pajak Penghasilan Pasal 22 <span class="ubahLabel" id="label1">(1.5%)</span> </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="persen_pph3" name="persen_pph3" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-6 col-form-label"> Jumlah uang yang diterima </label>
                                            <div class="col-sm-5 ms-auto">
                                                <input type="text" class="form-control border border-secondary shadow " id="uang_diterima3" name="uang_diterima3" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    const selectElement = document.getElementById("jenispajak");
    // Menangani peristiwa saat salah satu opsi dipilih
    selectElement.addEventListener("change", function() {
        const selectedValue = this.value;
        if (selectedValue) {
            window.location.href = selectedValue; // Arahkan ke URL yang dipilih
        }
    });

    function formatRupiah(input) {
        var value = input.value.replace(/[^\d.]/g, ''); // Hapus semua karakter non-angka dan titik
        var value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-angka dan titik

        var formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
            useGrouping: true
        }).format(value);

        input.value = formattedValue;
    }
    $(document).ready(function() {
        function ubahTarif() {
            // Tangkap elemen select dengan ID "npwp"
            var npwpSelect = document.getElementById("npwp");
            // Tangkap semua elemen dengan class "ubahLabel"
            var labels = document.querySelectorAll(".ubahLabel");
            var persen_pph = document.getElementById("persen_pph_hidden");

            // Tambahkan event listener ke elemen select
            npwpSelect.addEventListener("change", function() {
                // Periksa nilai yang dipilih dalam elemen select
                if (npwpSelect.value === "2") {
                    // Jika value adalah "2", ubah teks pada semua elemen dengan class "ubahLabel"
                    labels.forEach(function(label) {
                        label.textContent = "(3%)";
                    });
                    persen_pph.value = "3%";
                } else {
                    // Jika value bukan "2", kembalikan teks ke nilai default
                    labels.forEach(function(label) {
                        label.textContent = "(1.5%)";
                    });
                    persen_pph.value = "1.5%";
                }
                hitung_pph_pemerintah()
            });
        }

        function hitung_pph_pemerintah() {

            var hargaCrc = document.getElementById('harga_barang').value;
            var harga1 = hargaCrc.split(".").join("").split("Rp").join("");
            var harga = parseFloat((harga1).replace(/[^\d.]/g, '')) || 0;
            var NPWPInput = document.getElementById('npwp').value;
            var labelElement = document.getElementById('label1');
            var labelText = labelElement.textContent;
            var labelValue = parseFloat(labelText.match(/\d+(\.\d+)?/)[0]); // Mengambil angka desimal dari teks


            // hitung  1. Harga barang tidak termasuk PPn dan PPnBM
            var getharga1 = parseFloat(harga);
            var hitung_persen = getharga1 * labelValue / 100;

            var hitung_uang_diterima = getharga1 - parseFloat(hitung_persen);

            // hitung   2. Harga barang termasuk PPN (11%) Bukan Barang Mewah
            var getharga2 = parseFloat(harga);
            var hitung_ppn1 = getharga2 * 11 / 111;
            var hitung_barang_tidak_termasuk = getharga2 - parseFloat(hitung_ppn1);

            var hitung_persen2 = parseFloat(hitung_barang_tidak_termasuk) * labelValue / 100;


            var hitung_uang_diterima2 = parseFloat(hitung_barang_tidak_termasuk) - parseFloat(hitung_persen2);

            // hitung 3. Harga barang termasuk PPN (11%) dan PPnBM (20%)
            var getharga3 = parseFloat(harga);
            var hitung_ppn2 = getharga3 * 11 / 130;
            var hitung_ppnbm = getharga3 * 20 / 130;
            var hitung_barang_tidak_termasuk2 = getharga3 - hitung_ppn2 - hitung_ppnbm;

            var hitung_persen3 = hitung_barang_tidak_termasuk2 * labelValue / 100;


            var hitung_uang_diterima3 = hitung_barang_tidak_termasuk2 - hitung_persen3;

            //format 1. Harga barang tidak termasuk PPn dan PPnBM
            $("#harga_barang1").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(getharga1));
            $("#persen_pph1").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_persen));
            $("#uang_diterima").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_uang_diterima));

            //format 2. Harga barang termasuk PPN (11%) Bukan Barang Mewah

            $("#harga_barang2").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(getharga2));
            $("#ppn1").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_ppn1));
            $("#harga_barang_tidak_termasuk").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_barang_tidak_termasuk));
            $("#persen_pph2").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_persen2));
            $("#uang_diterima2").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_uang_diterima2));

            //format  3. Harga barang termasuk PPN (11%) dan PPnBM (20%)

            $("#harga_barang3").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(getharga3));
            $("#ppn3").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_ppn2));
            $("#ppnbm").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_ppnbm));
            $("#harga_barang_tidak_termasuk2").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_barang_tidak_termasuk2));
            $("#persen_pph3").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_persen3));
            $("#uang_diterima3").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_uang_diterima3));

        }

        $("#harga_barang, #npwp").on("input change", function() {
            ubahTarif();
            hitung_pph_pemerintah();
        });
        $(".mataUang").on("input", function() {
            formatRupiah(this);

        });

    });

    function resetInput() {


        document.getElementById("harga_barang").value = "";
        document.getElementById("harga_barang1").value = "";
        document.getElementById("persen_pph1").value = "";
        document.getElementById("uang_diterima").value = "";
        document.getElementById("harga_barang2").value = "";
        document.getElementById("ppn1").value = "";
        document.getElementById("harga_barang_tidak_termasuk").value = "";
        document.getElementById("persen_pph2").value = "";
        document.getElementById("uang_diterima2").value = "";
        document.getElementById("harga_barang3").value = "";
        document.getElementById("ppn3").value = "";
        document.getElementById("ppnbm").value = "";
        document.getElementById("harga_barang_tidak_termasuk2").value = "";
        document.getElementById("persen_pph3").value = "";
        document.getElementById("uang_diterima3").value = "";


    }

    const nama = document.getElementById('nama');
    const nik = document.getElementById('nik');
    const namaError = document.getElementById('namaError');
    const nikError = document.getElementById('nikError');
    const statusNpwp = document.getElementById('npwp');
    const noNpwp = document.getElementById('no_npwp');
    const noNpwpError = document.getElementById('noNpwpError');
    const submitButton = document.getElementById('submitButton');
    // Fungsi untuk mengatur nilai dan memicu perubahan saat halaman dimuat
    window.addEventListener('load', function() {
        statusNpwp.value = '1'; // Mengatur nilai 'NPWP' pada saat halaman dimuat
        noNpwpError.textContent = 'No NPWP harus diisi, karena anda memilh Status NPWP sebagai NPWP';
        noNpwp.addEventListener('input', validateNoNpwp);
        noNpwp.removeAttribute('readonly');
        validateInputs();
    });

    nama.addEventListener('input', validateInputs);
    nik.addEventListener('input', validateInputs);
    statusNpwp.addEventListener('change', validateInputs);

    function validateInputs() {
        if (nama.value.trim() !== '' && nik.value.trim() !== '' && statusNpwp.value !== '' && (statusNpwp.value !== '1' || (statusNpwp.value === '1' && noNpwp.value.trim() !== '' && noNpwpError.textContent === ''))) {
            submitButton.disabled = false;

        } else {
            submitButton.disabled = true;
        }
        // Validasi "Nama"
        if (nama.value.trim() === '') {
            namaError.textContent = 'Nama harus diisi';
        } else {
            namaError.textContent = '';
        }

        // Validasi "NIK"
        if (nik.value.trim() === '') {
            nikError.textContent = 'NIK harus diisi';
        } else {
            nikError.textContent = '';
        }

    }


    statusNpwp.addEventListener('change', function() {
        if (statusNpwp.value === '1') {
            noNpwp.value = '';
            noNpwpError.textContent = 'No NPWP harus diisi, karena anda memilih Status NPWP sebagai NPWP';
            noNpwp.addEventListener('input', validateNoNpwp);
            noNpwp.removeAttribute('readonly');
        } else if (statusNpwp.value === '2') {
            noNpwp.value = '-';
            noNpwp.setAttribute('readonly', true);
            noNpwpError.textContent = 'Anda Memilih Status NPWP sebagai Non-NPWP maka Input Otomatis bernilai Strip (-)';
            noNpwp.removeEventListener('input', validateNoNpwp);
        } else {
            noNpwpError.textContent = '';
            noNpwp.removeAttribute('readonly');
            noNpwp.removeEventListener('input', validateNoNpwp);
        }
        validateInputs();
    });

    function validateNoNpwp() {
        if (noNpwp.value.trim() === '') {
            noNpwpError.textContent = 'No NPWP harus diisi, karena anda memilh Status NPWP sebagai NPWP';

        } else {
            noNpwpError.textContent = '';

        }
        validateInputs();
    }

    function submitAndClear() {
        var nama = document.getElementById("nama");
        var nik = document.getElementById("nik");
        var no_npwp = document.getElementById("no_npwp");


        var dataToSend = {
            nama: nama.value,
            nik: nik.value,
            no_npwp: no_npwp.value,

        };

        $.ajax({
            type: 'POST',
            url: 'cetak/cetak_pph22-impor.php', // Gantilah dengan URL atau skrip yang sesuai
            data: dataToSend,
            success: function(response) {
                // Data berhasil dikirim, tindakan setelah pengiriman
                nama.value = '';
                nik.value = '';

                validateInputs();
                validateNoNpwp();


            }
        });
    }
</script>
<?php include("footer.php") ?>