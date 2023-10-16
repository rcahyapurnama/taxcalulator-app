<?php include("../index.html") ?>
<script src="assets/js/javascript.js"></script>

<!-- awal judul -->
<div class="container">
    <div class="row text-center p-4 mt-5">
        <div class="col judul">
            <h3>Kalkulator Pajak Penghasilan Pasal 21</h3>
        </div>
    </div>

    <!-- akhir judul -->

    <!-- awal card -->
    <div class="row row-cols-1 row-cols-md-2 g-3 p-2">
        <div class="col">
            <div class="card shadow">
                <h5 class="card-header text-bg-primary ">A. Personal</h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Status NPWP</label>
                            <div class="col-sm-5 ms-auto">
                                <select class="form-select border border-secondary-subtle shadow" id="npwp">

                                    <option value="1">NPWP</option>
                                    <option value="2">Non-NPWP</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Status Kawin/Tanggungan</label>
                            <div class="col-sm-5 ms-auto">
                                <select class="form-select border border-secondary-subtle shadow" id="status" name="status">

                                    <option value="TK/0">TK/0</option>
                                    <option value="TK/1">TK/1</option>
                                    <option value="TK/2">TK/2</option>
                                    <option value="TK/3">TK/3</option>
                                    <option value="K/0">K/0</option>
                                    <option value="K/1">K/1</option>
                                    <option value="K/2">K/2</option>
                                    <option value="K/3">K/3</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Penghasilan Tidak Kena Pajak</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow" id="ptkp" name="ptkp" disabled>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mt-3">
                <h5 class="card-header text-bg-primary ">B. Pendapatan</h5>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <label class="col-sm-6 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-5 ms-auto mb-3">
                                <input type="text" class="mataUang form-control  border border-secondary-subtle shadow" id="gaji">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label class="col-sm-6 col-form-label">Tunjangan</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="mataUang form-control border border-secondary-subtle shadow" id="tunjangan">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Jumlah Tunjangan JKK + JKM </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="jumlahjkkjkm" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Jumlah Tunjangan BPJSKES</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="jumlahbpjskes" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Jumah Penghasilan Bruto</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow" id="bruto" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mt-3">
                <h5 class="card-header text-bg-primary ">C. BPJS</h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label "> JKK (%)</label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjkk" value="0.24">
                                </div>
                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai JKK dihasilkan dari Gaji Pokok x JKK%" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="hasiljkk" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label "> JKM (%)</label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjkm" value="0.30">
                                </div>
                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai JKM dihasilkan dari Gaji Pokok x JKM%" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="hasiljkm" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label "> BPJSKES (%)</label>
                            <div class="col-sm-3">
                                <input type="text" class="col-2 form-control  border border-secondary-subtle text-end" id="persenbpjs" value="4">
                            </div>

                            <label class="col-auto col-form-label ms-4 "> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai BPJS Kesehatan dihasilkan dari Gaji Pokok x BPJSKES% dengan kriteria maksimal Gaji Pokok Rp. 12.000.000" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>

                                        <input type="text" class="form-control border border-secondary-subtle shadow" id="hasilbpjs" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="col">
            <div class="card shadow ">
                <h5 class="card-header text-bg-primary">D. Pengurangan</h5>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-6 mb-2 col-form-label">Biaya Jabatan</label>
                        <div class="col-sm-5 ms-auto">
                            <div class="col-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis mb-3" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai biaya jabatan dihasilkan dari 5% Gaji Pokok dan nilai maksimal biaya jabatan adalah 500,000." style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input type=" text" class="form-control  border border-secondary-subtle shadow mb-3" id="jabatan" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label "> JHT (%)</label>
                        <div class="col-sm-3">
                            <div class="col-auto">

                                <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjht" value="2">

                            </div>

                        </div>
                        <label class="col-auto col-form-label ms-4"> = </label>
                        <div class="col-sm-5 ms-auto">
                            <input type="text" class="form-control shadow border border-secondary-subtle" id="hasiljht" disabled>
                        </div>
                        </form>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label "> JP (%)</label>
                        <div class="col-sm-3">
                            <div class="col-auto">
                                <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjp" value="1">
                            </div>
                        </div>
                        <label class="col-auto col-form-label ms-4"> = </label>
                        <div class="col-sm-5 ms-auto">
                            <div class="col-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai JP dihasilkan dari Gaji Pokok x JP% dengan kriteria maksimal Gaji Pokok Rp. 9,559,600" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input class="form-control border border-secondary-subtle" type=" text" id="hasiljp" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mt-3">
                <h5 class="card-header text-bg-primary">E. Perhitungan PPH 21</h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Penghasilan Netto</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="netto" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Penghasilan Netto Disetahunkan </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control  border border-secondary-subtle shadow" id="nettosetahun" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Penghasilan Kena Pajak</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pkp" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">PPH 21 Terutang Dalam Setahun</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control  border border-secondary-subtle shadow" id="pphsetahun" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">PPH 21 Atas Gaji Bulan Ini</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pphsebulan" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mt-3">
                <h5 class="card-header text-bg-primary">F. Hasil</h5>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Penghasilan Netto</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="gajibersih" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">PPH 21 Atas Gaji Bulan Ini</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pph21sebulan1" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-6 col-form-label">Total Gaji Bersih Bulan ini</label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow mb-4" id="hasil_akhir" disabled>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- akhir card -->
</p>
<!-- Script PTKP -->


<?php include("../footer.php") ?>