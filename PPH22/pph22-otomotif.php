<?php include("../navbar.php") ?>
<script src="../assets/js/javascriptpph22.js"></script>
<div class="container">
    <div class="row text-center p-4 mt-5 ">
        <div class="col judul">
            <h3> KALKULATOR PAJAK PENGHASILAN PASAL 22

                <P> ATAS PENJUALAN OTOMOTIF DALAM NEGERI</p>

            </h3>
        </div>
    </div>
</div>

<div class="container" id="pph22">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col card1-pem">
            <div class="card">
                <h5 class=" card-header text-bg-primary ">
                    Komponen Data
                </h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak">

                                    <option value="PPH22-impor.php">PPH 22 Atas Barang Impor</option>
                                    <option value="PPH22-pemerintah.php">PPH 22 Atas Penjualan Barang Kepada Pemerintah</option>
                                    <option value="PPH22-kertas.php">PPH 22 Atas Penjualan Kertas Dalam Negeri</option>
                                    <option value="PPH22-semen.php">PPH 22 Atas Penjualan Semen Dalam Negeri</option>
                                    <option value="PPH22-baja.php">PPH 22 Atas Penjualan Baja Dalam Negeri</option>
                                    <option value="PPH22-rokok.php">PPH 22 Atas Penjualan Rokok Dalam Negeri</option>
                                    <option value="PPH22-otomotif.php" selected>PPH 22 Atas Penjualan Otomotif Dalam Negeri</option>
                                    <option value="PPH22-minyak.php">PPH 22 Atas Penjualan Penjualan Minyak Tanah / Gas LPG, Pelumas</option>
                                    <option value="PPH22-bumn.php">PPH 22 Atas Penjualan Barang Kepada BUMN yang dibayar dengan APBN maupun Non-APBN</option>
                                    <option value="PPH22-kehutanan.php">PPH 22 Atas Pembelian bahan-bahan sektor perhutanan, perkebunan, pertanian, dan perikanan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status NPWP</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="npwp_kertas">

                                    <option value="1" selected>NPWP</option>
                                    <option value="2">Non-NPWP</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dasar Pengenaan Pajak (DPP)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow mataUang" id="harga_barang_dpp">
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
                                <input type="text" class="form-control shadow" id="dpp" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label "> Tarif Pajak Penghasilan Pasal 22 </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control shadow" id="tarif_pph" value="0.45%" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Nilai Pajak Penghasilan Pasal 22</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control shadow" id="nilaipph" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col note mt-3">

                <b>Catatan</b>
                <p class=" ms-3" style="font-size: small;"><i> * Besar tarif pajak penghasilan pasal 22 yang diterapkan kepada wajib pajak yang tidak memiliki Nomor Pokok Wajib Pajak atau NPWP akan lebih tinggi 100% (seratus persen) daripada tarif yang di terapkan kepada wajib pajak yang memiliki Nomor Pokok Wajib Pajak</i></p>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    selectElement.addEventListener("change", function() {
        const selectedValue = this.value;
        if (selectedValue) {
            window.location.href = selectedValue; // Arahkan ke URL yang dipilih
        }
    });
</script>

</script>

<?php include("../footer.php") ?>