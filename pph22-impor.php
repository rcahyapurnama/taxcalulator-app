<?php
$pageTitle = "PPH 22 - Atas Barang Impor";
include("navbar.php") ?>

<div class="container">
    <div class="row text-center p-4 mt-5 ">
        <div class="col judul">
            <h3> KALKULATOR PAJAK PENGHASILAN PASAL 22

                ATAS BARANG IMPOR

            </h3>
        </div>
    </div>
</div>
<form method="post" action="cetak/cetak_pph22-impor.php" target="_blank">
    <div class="container" id="pph22">
        <div class="row row-cols-1 row-cols-lg-1 g-3 p-2">
            <div class="col card1">
                <div class="card" id="pph22card1">
                    <h5 class=" card-header text-bg-primary ">
                        Komponen Data
                    </h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary" id="jenispajak">

                                    <option value="pph22-impor.php" selected>PPH 22 Atas Barang Impor</option>
                                    <option value="pph22-pemerintah.php">PPH 22 Atas Penjualan Barang Kepada Pemerintah</option>
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
                            <label class="form-label">Harga Kurs Hari ini (Rp)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary  text-end mataUang" id="kurs" name="kurs" inputmode="numeric">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Faktur / <i> Cost </i> (US$)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary  text-end dolar" id="cost" name="cost" inputmode="numeric">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm dropdown-toggle form-label" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="labelasuransi">Biaya Asuransi / <i> Insurance </i> (%)</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="persen">Satuan Persen (%)</a></li>
                                <li><a class="dropdown-item" id="dolar">Satuan Dolar ($)</a></li>
                            </ul>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary text-end " id="insurance" name="insurance" inputmode="numeric">
                                <input type="text" class="form-control border border-secondary shadow " id="inputasuransi" name="inputasuransi" value="Biaya Asuransi /  Insurance (%)" hidden>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" id="labelangkut">Biaya Angkut <i>Freight</i> (%)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary  text-end" id="freight" name="freight" inputmode="numeric">
                                <input type="text" class="form-control border border-secondary shadow" id="inputangkut" name="inputangkut" value="Biaya Angkut /  Freight (%)" hidden>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total CIF (US$)</label>
                            <div class="col-sm-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover text-info-emphasis border border-secondary" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai Total CIF (US$) dihasilkan dari Cost + (Cost x insurance %) + (Cost US$ x freight %)" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input class="form-control border border-secondary shadow text-end bg-secondary-subtle" type="text" id="cifusd" name="cifusd" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col card2">
                <div class="card" id="pph22card2">
                    <h5 class="card-header text-bg-primary ">
                        Perhitungan
                    </h5>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Total CIF (Cost,Insurance, Freight) dalam Rupiah </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow text-end bg-secondary-subtle" id="cifrp" name="cifrp" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Bea Masuk (%)</label>
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary " id="persenmasuk" value="10" name="persenmasuk" inputmode="numeric">
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-4" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text  border border-secondary shadow icon-link-hover text-black bg-info " id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai Bea Masuk dihasilkan dari (CIF dalam Rupiah x Bea Masuk (%))" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg "></i></a>
                                        <input class="form-control  border-start-0 border-secondary shadow text-end bg-secondary-subtle " type=" text" id="beamasuk" name="beamasuk" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Bea Tambahan Lainnya (%)</label>
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control border border-secondary" id="persentambah" name="persentambah" value="6" inputmode="numeric">
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-4" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text border border-secondary shadow icon-link-hover text-black bg-info " id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai Bea Tambahan dihasilkan dari ( CIF dalam Rupiah x Bea Tambahan Lainnya (%) )" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border-start-0 border-secondary shadow text-end bg-secondary-subtle" type=" text" id="beatambah" name="beatambah" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Nilai Impor</label>
                            <div class="col-sm-5 ms-auto mb-4">
                                <input type="text" class="form-control border border-secondary shadow text-end bg-secondary-subtle" id="Nimpor" name="Nimpor" readonly>
                            </div>
                        </div>
                        <div class="row container ">
                            <span class=" border-top border border-secondary ms-2 mb-5"></span>
                        </div>
                        <div class="row mb-3">
                            <h5 class="col-sm-12 ">Perhitungan Pajak Penghasilan Pasal 22 Jika Importir Memiliki API</h5>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="  form-control border border-secondary bg-secondary-subtle shadow" id="labelimpor" name="labelimpor" value="2.5%" readonly>
                                </div>
                            </div>
                            <label class="col-sm-1 col-form-label ms-3 "><i class="bi bi-x-lg"></i></label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control border border-secondary text-end bg-secondary-subtle shadow" id="nilaimpor" readonly>
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-3" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class=" col-sm-4 ms-auto">
                                <div class="col-auto">
                                    <div class="col-auto">
                                        <input type="text" class="form-control border border-secondary text-end bg-secondary-subtle shadow" id="hasilakhir" name="hasilakhir" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <h5 class="col-sm-12 ">Perhitungan Pajak Penghasilan Pasal 22 Jika Importir Tidak Memiliki API</h5>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary bg-secondary-subtle shadow" id="labelimpor1" name="labelimpor1" value="7.5%" readonly>
                                </div>
                            </div>
                            <label class="col-sm-1 col-form-label ms-3 "><i class="bi bi-x-lg"></i></label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary text-end bg-secondary-subtle shadow" id="nilaimpor1" readonly>
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-3" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-4 ms-auto">
                                <div class="col-auto">
                                    <div class="col-auto">
                                        <input type="text" class="form-control border border-secondary text-end bg-secondary-subtle shadow" id="hasilakhir1" name="hasilakhir1" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" row row-cols-1 row-cols-lg-1 g-3 p-2">
            <div class="col">
                <div class="card shadow">
                    <h5 class="card-header  text-bg-primary d-flex justify-content-center ">Aksi</h5>
                    <div class="card-body">
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
                                                <label class="col-form-label">Nama :</label>
                                                <input type="text" class="form-control border border-secondary-subtle" id="nama" name="nama">
                                                <small id="namaError" class="form-text text-danger"></small>
                                            </div>
                                            <hr>
                                            <div class="mb-3">
                                                <label class="col-form-label">Nomor API :</label>
                                                <input type="text" class="form-control border border-secondary-subtle" id="noApi" name="noApi" placeholder="Jika tidak memiliki API isi mengunakan simbol strip (-)">
                                                <small id="noApiError" class="form-text text-danger"></small>
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
        </div>
</form>
<script>
    $(document).ready(function() {

        $("#cost, #insurance, #freight, #persenmasuk, #persentambah").on("input", function() {
            calculateCif();
        });

        $(".mataUang").on("input", function() {
            formatRupiah(this);
        })

        $(".dolar").on("input", function() {
            formatDolar(this);

        });



    });

    let pilihandropdown = 'persen'; // Menyimpan status pilihan saat ini

    function changeDropdownText(text, elementSelector) {
        document.querySelector(elementSelector).innerHTML = text;
    }

    // Event listener untuk "(%)" pada Biaya Asuransi / Insurance
    $(document).on('click', '#persen', function() {
        changeDropdownText('Biaya Asuransi / <i>Insurance</i> (%)', '#labelasuransi');
        changeDropdownText('Biaya Angkut / <i>Freight</i> (%)', '#labelangkut');



        document.querySelector('#insurance').value = '';
        document.querySelector('#freight').value = '';
        document.querySelector('#cifusd').value = '';
        document.querySelector('#inputasuransi').value = 'Biaya Asuransi / Insurance (%)';
        document.querySelector('#inputangkut').value = 'Biaya Angkut / Freight (%)';

        pilihandropdown = 'persen'; // Mengubah status pilihan saat ini


    });
    // Event listener untuk "US$" pada Biaya Asuransi / Insurance
    $(document).on('click', '#dolar', function() {
        changeDropdownText('Biaya Asuransi / <i>Insurance</i> ($)', '#labelasuransi');
        changeDropdownText('Biaya Angkut / <i>Freight</i> ($)', '#labelangkut');


        document.querySelector('#insurance').value = '';
        document.querySelector('#freight').value = '';
        document.querySelector('#cifusd').value = '';
        document.querySelector('#inputasuransi').value = 'Biaya Asuransi / Insurance ($)';
        document.querySelector('#inputangkut').value = 'Biaya Angkut / Freight ($)';


        pilihandropdown = 'dolar'; // Mengubah status pilihan saat ini



    });

    // Event listener untuk input pada Biaya Asuransi / Insurance
    $(document).on('input', '#insurance', function() {

        if (pilihandropdown === 'dolar') {
            formatDolar(this);
        } else if (pilihandropdown === 'persen') {
            formatpersen(this);
        }


        calculateCif();
    });
    // Event listener untuk input pada Biaya Angkut / Freight
    $(document).on('input', '#freight', function() {

        if (pilihandropdown === 'dolar') {
            formatDolar(this);
        } else if (pilihandropdown === 'persen') {
            formatpersen(this);
        }
        calculateCif();
    });
    // Menggunakan JavaScript untuk membuka tab baru saat tombol diklik
    document.getElementById('submitButton').addEventListener('click', function() {
        document.forms[0].submit();

    });

    var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    var popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    // Mendapatkan elemen select
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
            maximumFractionDigits: 0
        }).format(value);
        input.value = formattedValue;
    }


    function formatDolar(input) {
        // Menghapus semua karakter non-angka dan titik kecuali satu titik di antara angka
        var value = input.value.replace(/[^\d.]/g, '');

        // Mengkonversi string menjadi angka float
        var floatValue = parseFloat(value);

        // Memeriksa apakah nilai adalah angka yang valid
        if (!isNaN(floatValue)) {
            // Format sebagai mata uang USD dengan dua digit desimal
            var formattedValue = floatValue.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2,
            });

            // Menetapkan nilai yang diformat kembali ke input
            input.value = formattedValue;
        } else {
            // Jika nilai tidak valid, kosongkan input
            input.value = '';
        }
    }

    function formatpersen(input) {
        var value = input.value.replace(/[^\d.]/g, ''); // Hapus semua karakter non-angka dan titik
        input.value = value;
    }

    function calculateCif() {
        var kursStr = document.getElementById('kurs').value;
        var kurs = kursStr.split(".").join("").split("Rp").join("") || 0;
        var cost = parseFloat($("#cost").val().replace(/[^\d.]/g, '')) || 0;
        var insuranceCrc = document.getElementById('insurance').value;
        var freightCrc = document.getElementById('freight').value;
        var beamasuk = Number($("#persenmasuk").val()) || 0;
        var beatambah = Number($("#persentambah").val()) || 0;

        // Mendefinisikan cifusd
        var cifusd;
        var insurance;
        var freight;


        // Memeriksa nilai dropdown dan menjalankan logika yang sesuai
        if (insuranceCrc.includes("$") || freightCrc.includes("$")) {
            insurance = parseFloat($("#insurance").val().replace(/[^\d.]/g, '')) || 0;
            freight = parseFloat($("#freight").val().replace(/[^\d.]/g, '')) || 0;

            cifusd = cost + insurance + freight;

            $("#cifusd").val(new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(cifusd));

        } else {
            insurancepersen = parseFloat($("#insurance").val().replace(/[^\d.]/g, '')) || 0;
            freightpersen = parseFloat($("#freight").val().replace(/[^\d.]/g, '')) || 0;

            cifusd = parseFloat(cost) + (parseFloat(cost) * parseFloat(insurancepersen) / 100) + (parseFloat(cost) * parseFloat(freightpersen) / 100);

            $("#cifusd").val(new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(cifusd));

        }

        // Lanjutan kode perhitungan Anda

        var cifRp = cifusd * kurs;
        var masuk = beamasuk * cifRp / 100;
        var tambah = beatambah * cifRp / 100;

        var impor = (parseFloat(cifRp) + parseFloat(masuk) + parseFloat(tambah));

        var hasil = impor * 2.5 / 100;
        var hasil1 = impor * 7.5 / 100;


        $("#cifrp").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(cifRp));
        $("#beamasuk").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(masuk));
        $("#beatambah").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(tambah));
        $("#Nimpor").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(impor));

        $("#nilaimpor").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(impor));
        $("#hasilakhir").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(hasil));
        $("#nilaimpor1").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(impor));
        $("#hasilakhir1").val(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(hasil1));
        // Menambahkan event listener untuk dropdown

    }




    function resetInput() {

        document.getElementById("kurs").value = "";
        document.getElementById("cost").value = "";
        document.getElementById("insurance").value = "";
        document.getElementById("freight").value = "";
        document.getElementById("cifusd").value = "";
        document.getElementById("cifrp").value = "";
        document.getElementById("beamasuk").value = "";
        document.getElementById("beatambah").value = "";
        document.getElementById("Nimpor").value = "";
        document.getElementById("nilaimpor").value = "";
        document.getElementById("hasilakhir").value = "";
        document.getElementById("nilaimpor1").value = "";
        document.getElementById("hasilakhir1").value = "";

    }

    nama.addEventListener('input', validateInputs);
    noApi.addEventListener('input', validateInputs);

    function validateInputs() {
        const nama = document.getElementById('nama');
        const noApi = document.getElementById('noApi');
        const noNpwpError = document.getElementById('noNpwpError');
        const submitButton = document.getElementById('submitButton');
        if (nama.value.trim() !== '' && noApi.value.trim() !== '') {
            submitButton.disabled = false;

        } else {
            submitButton.disabled = true;
        }
        // Validasi "Nama"
        if (nama.value.trim() === '') {
            namaError.textContent = 'Nama harus diisi!';
        } else {
            namaError.textContent = '';
        }

        // Validasi "NIK"
        if (noApi.value.trim() === '') {
            noApiError.textContent = 'Nomor API harus diisi!';
        } else {
            noApiError.textContent = '';
        }

    }

    function submitAndClear() {
        var nama = document.getElementById("nama");
        var noApi = document.getElementById("noApi");


        var dataToSend = {
            nama: nama.value,
            noApi: noApi.value,

        };

        $.ajax({
            type: 'POST',
            url: 'cetak/cetak_pph22-impor.php',
            data: dataToSend,
            success: function(response) {
                // Data berhasil dikirim, tindakan setelah pengiriman
                nama.value = '';
                noApi.value = '';
                validateInputs();
            }
        });
    }
</script>
</p>
<?php include("footer.php") ?>