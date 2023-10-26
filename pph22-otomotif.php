<?php
$pageTitle = "PPH 22 -  Atas Penjualan Otomotif";
include("navbar.php") ?>
<script src="assets/js/javascriptpph22.js"></script>
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
    <form method="post" action="cetak/cetak_pph22_otomotif.php" target="_blank">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col card1-pem">
                <div class="card">
                    <h5 class=" card-header text-bg-primary ">
                        Komponen Data
                    </h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak">
                                    <option value="pph22-impor.php">PPH 22 Atas Barang Impor</option>
                                    <option value="pph22-pemerintah.php">PPH 22 Atas Penjualan Barang Kepada Pemerintah</option>
                                    <option value="pph22-kertas.php">PPH 22 Atas Penjualan Kertas Dalam Negeri</option>
                                    <option value="pph22-semen.php">PPH 22 Atas Penjualan Semen Dalam Negeri</option>
                                    <option value="pph22-baja.php">PPH 22 Atas Penjualan Baja Dalam Negeri</option>
                                    <option value="pph22-rokok.php">PPH 22 Atas Penjualan Rokok Dalam Negeri</option>
                                    <option value="pph22-otomotif.php" selected>PPH 22 Atas Penjualan Otomotif Dalam Negeri</option>
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
                            <label class="col-sm-6 col-form-label "> Tarif Pajak Penghasilan Pasal 22 </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="tarif_pph" name="tarif_pph" value="0.45%" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label"> Nilai Pajak Penghasilan Pasal 22</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="nilaipph" name="nilaipph" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col note mt-3">
                    <div class="col d-flex gap-3 justify-content-center">

                        <button class="btn btn-warning col-4" type="button" onclick="resetInput()">Reset</button>
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



<?php include("footer.php") ?>