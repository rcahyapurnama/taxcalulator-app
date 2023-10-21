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
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col card1-23">
            <div class="card" id="card23">
                <h5 class=" card-header text-bg-primary ">
                    Komponen Data
                </h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak23">

                                    <option value="1">PPH 22 Atas Dividen, Bunga, Royalti Dan Hadiah</option>
                                    <option value="2">PPH 22 Atas Sewa Dan Jasa</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status NPWP</label>
                            <div class="col-sm-auto">
                                <select class="form-select  border border-secondary shadow" id="npwp_kertas">

                                    <option value="1" selected>NPWP</option>
                                    <option value="2">Non-NPWP</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dasar Pengenaan Pajak (DPP)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow mataUang" id="harga_barang_dpp" inputmode="numeric">
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col card2">
            <div class="card" id="pph22card2">
                <h5 class="card-header text-bg-primary ">
                    Perhitungan
                </h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Dasar Pengenaan Pajak (DPP) </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="dpp" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label "> Tarif Pajak Penghasilan Pasal 23 </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="tarif_pph" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Nilai Pajak Penghasilan Pasal 23</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="nilaipph" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col note mt-3">

                <b>Catatan</b>
                <p class=" ms-3" style="font-size: small;"><i> * Besar tarif pajak penghasilan pasal 23 yang diterapkan kepada wajib pajak yang tidak memiliki Nomor Pokok Wajib Pajak atau NPWP akan lebih tinggi 100% (seratus persen) daripada tarif yang di terapkan kepada wajib pajak yang memiliki Nomor Pokok Wajib Pajak</i></p>
            </div>
        </div>
    </div>
</div>
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
</script>
<?php include("footer.php") ?>