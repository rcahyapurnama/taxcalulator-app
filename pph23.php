<?php
$pageTitle = "PPH 23";
include("navbar.php") ?>

<div class="container">
    <div class="row text-center p-4 mt-5 ">
        <div class="col judul">
            <h3> KALKULATOR PAJAK PENGHASILAN PASAL 23

                <P> ATAS DIVIDEN, BUNGA, ROYALTI DAN HADIAH </p>

            </h3>
        </div>
    </div>
</div>

<div class="container" id="pph22">
    <form method="post" action="cetak/cetak_pph23.php" target="_blank">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col card1-23">
                <div class="card" id="card23">
                    <h5 class=" card-header text-bg-primary ">
                        Komponen Data
                    </h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak23" name="jenispajak23">

                                    <option value="1">PPH 22 Atas Dividen, Bunga, Royalti Dan Hadiah</option>
                                    <option value="2">PPH 22 Atas Sewa Dan Jasa</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status NPWP</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="npwp_kertas" name="npwp_kertas">

                                    <option value="1" selected>NPWP</option>
                                    <option value="2">Non-NPWP</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dasar Pengenaan Pajak (DPP)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow mataUang" id="harga_barang_dpp" inputmode="numeric" name="harga_barang_dpp">
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
                            <label class="col-sm-6 col-form-label"> Dasar Pengenaan Pajak (DPP) </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="dpp" name="dpp" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label "> Tarif Pajak Penghasilan Pasal 23 </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="tarif_pph" name="tarif_pph" value="15%" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Nilai Pajak Penghasilan Pasal 23</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="nilaipph" name="nilaipph" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col note mt-3">
                    <div class="col d-flex gap-3 justify-content-center">

                        <button class="btn btn-warning col-4" type="button" onclick="reset()">Reset</button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button class="btn btn-primary col-5 " type="submit" id="submitButton" data-bs-dismiss="modal" onclick="submitAndClear()" readonly>Cetak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <b>Catatan</b>
                    <p class=" ms-3" style="font-size: small;"><i> * Besar tarif pajak penghasilan pasal 22 yang diterapkan kepada wajib pajak yang tidak memiliki Nomor Pokok Wajib Pajak atau NPWP akan lebih tinggi 100% (seratus persen) daripada tarif yang di terapkan kepada wajib pajak yang memiliki Nomor Pokok Wajib Pajak</i></p>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mendapatkan elemen select untuk jenis pajak dan npwp
        const selectJenisPajak = document.getElementById("jenispajak23");
        const selectNpwp = document.getElementById("npwp_kertas");
        const tarifPphElement = document.getElementById("tarif_pph");
        const judulElement = document.querySelector(".judul h3 p");

        // Setel tarif awal dan judul awal saat halaman dimuat
        let tarifPph = "15%";
        let judulPajak = "ATAS DIVIDEN, BUNGA, ROYALTI DAN HADIAH";
        tarifPphElement.value = tarifPph;
        judulElement.textContent = judulPajak;

        // Menangani peristiwa saat salah satu opsi dipilih
        selectJenisPajak.addEventListener("change", updateTarifPph);
        selectNpwp.addEventListener("change", updateTarifPph);

        function updateTarifPph() {
            const jenisPajakValue = selectJenisPajak.value;
            const npwpValue = selectNpwp.value;


            // Periksa kriteria dan perbarui tarif dan judul sesuai dengan kriteria
            if (npwpValue === "1") {
                if (jenisPajakValue === "1") {
                    tarifPph = "15%";
                    judulPajak = "ATAS DIVIDEN, BUNGA, ROYALTI DAN HADIAH";
                } else if (jenisPajakValue === "2") {
                    tarifPph = "2%";
                    judulPajak = "ATAS SEWA DAN JASA";
                }
            } else if (npwpValue === "2") {
                if (jenisPajakValue === "1") {
                    tarifPph = "30%";
                    judulPajak = "ATAS DIVIDEN, BUNGA, ROYALTI DAN HADIAH";
                } else if (jenisPajakValue === "2") {
                    tarifPph = "4%";
                    judulPajak = "ATAS SEWA DAN JASA";
                }
            }

            // Perbarui tampilan tarif dan judul
            tarifPphElement.value = tarifPph;
            judulElement.textContent = judulPajak;
            hitung_pph23()

        }
        $("#harga_barang_dpp").on("input", function() {
            hitung_pph23()

        });
        $(".mataUang").on("input", function() {
            formatMataUang(this);

        });

        function formatMataUang(input) {
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

        function hitung_pph23() {
            var hargaCrc = document.getElementById('harga_barang_dpp').value;
            var harga = hargaCrc.split(".").join("").split("Rp").join("");
            var tarifpercent = document.getElementById('tarif_pph').value;
            var tarif = tarifpercent.split("%").join("");

            getdpp = harga;
            hitung_pph = (getdpp * parseFloat(tarif) / 100)


            $("#dpp").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(getdpp));

            $("#nilaipph").val(new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            }).format(hitung_pph));
        }

    });

    function reset() {


        document.getElementById("harga_barang_dpp").value = "";
        document.getElementById("dpp").value = "";
        document.getElementById("nilaipph").value = "";


    }


    const nama = document.getElementById('nama');
    const nik = document.getElementById('nik');
    const namaError = document.getElementById('namaError');
    const nikError = document.getElementById('nikError');
    const statusNpwp = document.getElementById('npwp_kertas');
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
            url: 'cetak/cetak_pph23.php', // Gantilah dengan URL atau skrip yang sesuai
            data: dataToSend,
            success: function(response) {
                // Data berhasil dikirim, tindakan setelah pengiriman
                nama.value = '';
                nik.value = '';

                validateInputs()
                validateNoNpwp();
            }
        });
    }
</script>
<?php include("footer.php") ?>