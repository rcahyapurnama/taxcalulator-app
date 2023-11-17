<?php
$pageTitle = "PPH 21";
include("navbar.php") ?>
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
    <form method="post" action="cetak/cetak_pph21.php" target="_blank">
        <div class="row row-cols-1 row-cols-lg-2 g-3 p-2">
            <div class="col">
                <div class="card shadow">
                    <h5 class="card-header text-bg-primary ">A. Personal</h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Status NPWP</label>
                            <div class="col-lg-5 ms-auto">
                                <select class="form-select border border-secondary-subtle shadow " id="npwp" name="npwp">

                                    <option value="NPWP">NPWP</option>
                                    <option value="Non-NPWP">Non-NPWP</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Status Kawin/Tanggungan</label>
                            <div class="col-lg-5 ms-auto">
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
                            <label class="col-lg-6 col-form-label">Penghasilan Tidak Kena Pajak</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow" name="ptkp" id="ptkp" readonly>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-3">
                    <h5 class="card-header text-bg-primary ">B. Pendapatan</h5>
                    <div class="card-body">

                        <div class="row">
                            <label class="col-lg-6 col-form-label">Gaji Pokok</label>
                            <div class="col-lg-5 ms-auto mb-3">
                                <input type="int" class="mataUang form-control  border border-secondary-subtle shadow" id="gaji" name='gaji' inputmode="numeric">
                            </div>
                        </div>

                        <div class=" row mb-3">
                            <label class="col-lg-6 col-form-label">Tunjangan</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class="mataUang form-control border border-secondary-subtle shadow" id="tunjangan" name="tunjangan" inputmode="numeric">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Jumlah Tunjangan JKK + JKM </label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="jumlahjkkjkm" name="jumlahjkkjkm" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Jumlah Tunjangan BPJSKES</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="jumlahbpjskes" name="jumlahbpjskes" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Jumah Penghasilan Bruto</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow" id="bruto" name="bruto" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow mt-3">
                    <h5 class="card-header text-bg-primary ">C. BPJS Yang Di Bayar Perusahaan</h5>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label class="dropdown-toggle col-lg-2 col-form-label" data-bs-toggle="dropdown" aria-expanded="false" id="pilihjkk">
                                JKK (%)
                            </label>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="persen">Satuan (%)</a></li>
                                <li><a class="dropdown-item" id="rupiah">Satuan (Rp)</a></li>
                            </ul>
                            <div class="col-lg-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjkk" value="0.24" inputmode="numeric">
                                </div>
                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="custom-popover" data-bs-placement="right" data-bs-title="Informasi." data-bs-content="Nilai JKK dihasilkan dari Gaji Pokok x JKK%" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="hasiljkk" name="hasiljkk" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label " id="pilihjkm"> JKM (%)</label>
                            <div class="col-lg-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjkm" value="0.30" inputmode="numeric">
                                </div>
                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="custom-popover" data-bs-placement="right" data-bs-title="Informasi." data-bs-content="Nilai JKM dihasilkan dari Gaji Pokok x JKM%" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="hasiljkm" name="hasiljkm" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-lg-2 col-form-label " id="pilihbpjskes"> BPJSKES (%)</label>
                            <div class="col-lg-3">
                                <input type="text" class="col-2 form-control  border border-secondary-subtle text-end" id="persenbpjs" value="4" inputmode="numeric">
                            </div>

                            <label class="col-auto col-form-label ms-4 "> = </label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="custom-popover" data-bs-placement="right" data-bs-title="Informasi." data-bs-content="Nilai BPJS Kesehatan dihasilkan dari Gaji Pokok x BPJSKES% dengan kriteria maksimal Gaji Pokok Rp. 12.000.000" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>

                                        <input type="text" class="form-control border border-secondary-subtle shadow" id="hasilbpjs" name="hasilbpjs" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



            <div class="col">
                <div class="card shadow ">
                    <h5 class="card-header text-bg-primary">D. Pengurangan</h5>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-lg-6 col-form-label">Biaya Jabatan</label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info mb-3" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="custom-popover" data-bs-placement="right" data-bs-title="Informasi." data-bs-content="Nilai biaya jabatan dihasilkan dari 5% Gaji Pokok dan nilai maksimal biaya jabatan adalah 500,000." style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input type="text" class="form-control  border border-secondary-subtle shadow mb-3" id="jabatan" name="jabatan" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label" id="pilihjht"> JHT (%)</label>
                            <div class="col-lg-3">
                                <div class="col-auto">

                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjht" value="2" inputmode="numeric">

                                </div>

                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class="form-control shadow border border-secondary-subtle" id="hasiljht" name="hasiljht" readonly>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-2 col-form-label" id="pilihjp"> JP (%)</label>
                            <div class="col-lg-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control text-end border border-secondary-subtle" id="persenjp" value="1" inputmode="numeric">
                                </div>
                            </div>
                            <label class="col-auto col-form-label ms-4"> = </label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="custom-popover" data-bs-placement="right" data-bs-title="Informasi." data-bs-content="Nilai JP dihasilkan dari Gaji Pokok x JP% dengan kriteria maksimal Gaji Pokok Rp. 9,559,600" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle" type=" text" id="hasiljp" name="hasiljp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <label class="col-lg-6 mb-2 col-form-label">Jumlah Pengurangan</label>
                            <div class="col-lg-5 ms-auto">
                                <div class="col-auto">

                                    <input type=" text" class="form-control  border border-secondary-subtle shadow mb-3" id="jumlah_pengurangan" name="jumlah_pengurangan">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow mt-3">
                    <h5 class="card-header text-bg-primary">E. Perhitungan PPH 21</h5>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Penghasilan Netto</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="netto" name="netto" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Penghasilan Netto Disetahunkan </label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control  border border-secondary-subtle shadow" id="nettosetahun" name="nettosetahun" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Penghasilan Kena Pajak</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pkp" name="pkp" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">PPH 21 Terutang Dalam Setahun</label>
                            <div class="col-lg-5 ms-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" id="infopph" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input type="text" class=" form-control  border border-secondary-subtle shadow" id="pphsetahun" name="pphsetahun" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">PPH 21 Atas Gaji Bulan Ini</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pphsebulan" name="pphsebulan" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow mt-3">
                    <h5 class="card-header text-bg-primary">F. Hasil</h5>
                    <div class="card-body">

                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">Penghasilan Netto</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="gajibersih" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">PPH 21 Atas Gaji Bulan Ini</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class=" form-control border border-secondary-subtle shadow" id="pph21sebulan1" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-lg-6 col-form-label">Total Gaji Bersih Bulan ini</label>
                            <div class="col-lg-5 ms-auto">
                                <input type="text" class="form-control border border-secondary-subtle shadow mb-4" id="hasil_akhir" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row row-cols-1 row-cols-lg-1 g-3 p-2">
            <div class="col">
                <div class="card shadow">
                    <h5 class="card-header  text-bg-primary d-flex justify-content-center ">Aksi</h5>
                    <div class="card-body">
                        <div class="col d-flex gap-3 justify-content-center">

                            <button class="btn btn-warning col-5" type="button" onclick="resetInput()">Reset</button>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary col-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Cetak
                            </button>
                        </div>
                        <!-- Modal Info perhitungan PPH 21 -->
                        <div class="modal fade" id="staticBackdrop2" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Langkah perhitungan mencari nilai PPH 21.
                                        <div class="table-responsive mt-4">
                                            <table class="table table-bordered " id="pphTable">
                                                <thead>
                                                    <tr class="align-middle">
                                                        <th class="text-center">Langkah</th>
                                                        <th class="text-center">Nilai Turunan</th>
                                                        <th class="text-center">Hasil Turunan</th>
                                                        <th class="text-center">Tarif</th>
                                                        <th class="text-center">Tarif Denda</th>
                                                        <th class="text-center">Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Placeholder row for new entries -->
                                                    <tr id="newRowTemplate">
                                                        <td class="text-center  align-middle"></td>
                                                        <td class="nilaiTurunan" colspan="2"></td>
                                                        <td class="hasilTurunan"></td>
                                                        <td class="tarif" colspan="2"></td>
                                                        <td class="tarifdenda"></td>
                                                        <td class="hasil"></td>

                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr id="baristotal">
                                                        <td colspan="5" class="text-end fs-4">Total</td>
                                                        <td class="total">hasil</td>

                                                </tfoot>
                                            </table>
                                            <small id="pkpError" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</div>

</form>
</div>
<!-- akhir card -->
</p>
<script>
    // Menggunakan JavaScript untuk membuka tab baru saat tombol diklik
    document.getElementById('submitButton').addEventListener('click', function() {
        document.forms[0].submit();
    });

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
        statusNpwp.value = 'NPWP'; // Mengatur nilai 'NPWP' pada saat halaman dimuat
        noNpwpError.textContent = 'No NPWP harus diisi, karena anda memilh Status NPWP sebagai NPWP';
        noNpwp.addEventListener('input', validateNoNpwp);
        noNpwp.removeAttribute('readonly');
        validateInputs();
    });

    nama.addEventListener('input', validateInputs);
    nik.addEventListener('input', validateInputs);
    statusNpwp.addEventListener('change', validateInputs);

    function validateInputs() {
        if (nama.value.trim() !== '' && nik.value.trim() !== '' && statusNpwp.value !== '' && (statusNpwp.value !== 'NPWP' || (statusNpwp.value === 'NPWP' && noNpwp.value.trim() !== '' && noNpwpError.textContent === ''))) {
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
        if (statusNpwp.value === 'NPWP') {
            noNpwp.value = '';
            noNpwpError.textContent = 'No NPWP harus diisi, karena anda memilih Status NPWP sebagai NPWP';
            noNpwp.addEventListener('input', validateNoNpwp);
            noNpwp.removeAttribute('readonly');
        } else if (statusNpwp.value === 'Non-NPWP') {
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
</script>





<?php include("footer.php") ?>