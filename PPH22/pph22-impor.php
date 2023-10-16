<?php include("../index.html") ?>

<div class="container">
    <div class="row text-center p-4 mt-5 ">
        <div class="col judul">
            <h3> KALKULATOR PAJAK PENGHASILAN PASAL 22

                ATAS BARANG IMPOR

            </h3>
        </div>
    </div>
</div>

<div class="container" id="pph22">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col card1">
            <div class="card" id="pph22card1">
                <h5 class=" card-header text-bg-primary ">
                    Komponen Data
                </h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Pajak</label>
                            <div class="col-sm-auto">
                                <select class="form-select border border-secondary shadow" id="jenispajak">

                                    <option value="pph22-impor.php" selected>pph 22 Atas Barang Impor</option>
                                    <option value="pph22-pemerintah.php">pph 22 Atas Penjualan Barang Kepada Pemerintah</option>
                                    <option value="pph22-kertas.php">pph 22 Atas Penjualan Kertas Dalam Negeri</option>
                                    <option value="pph22-semen.php">pph 22 Atas Penjualan Semen Dalam Negeri</option>
                                    <option value="pph22-baja.php">pph 22 Atas Penjualan Baja Dalam Negeri</option>
                                    <option value="pph22-rokok.php">pph 22 Atas Penjualan Rokok Dalam Negeri</option>
                                    <option value="pph22-otomotif.php">pph 22 Atas Penjualan Otomotif Dalam Negeri</option>
                                    <option value="pph22-minyak.php">pph 22 Atas Penjualan Penjualan Minyak Tanah / Gas LPG, Pelumas</option>
                                    <option value="pph22-bumn.php">pph 22 Atas Penjualan Barang Kepada BUMN yang dibayar dengan APBN maupun Non-APBN</option>
                                    <option value="pph22-kehutanan.php">pph 22 Atas Pembelian bahan-bahan sektor perhutanan, perkebunan, pertanian, dan perikanan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Kurs Hari ini (Rp)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow mataUang" id="kurs">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Faktur / <i> Cost </i> (US$)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow dolar" id="cost">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Asuransi / <i> Insurance </i> (%)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow " id="insurance">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Angkut <i>Freight</i> (%)</label>
                            <div class="col-sm-auto">
                                <input type="text" class="form-control border border-secondary shadow" id="freight">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total CIF (US$)</label>
                            <div class="col-sm-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai Total CIF (US$) dihasilkan dari Cost + (Cost x insurance %) + (Cost US$ x freight %)" onclick="makeItalic(this)" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input class="form-control border border-secondary-subtle shadow" type="text" id="cifusd" disabled>
                                </div>
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
                            <label class="col-sm-6 col-form-label"> Total CIF (Cost,Insurance, Freight) dalam Rupiah </label>
                            <div class="col-sm-5 ms-auto">
                                <input type="text" class="form-control shadow" id="cifrp" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Bea Masuk (%)</label>
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary-subtle" id="persenmasuk" value="10">
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-4" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai Bea Masuk dihasilkan dari CIF dalam Rupiah x Bea Masuk (%)" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="beamasuk" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label ">Bea Tambahan Lainnya (%)</label>
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary-subtle" id="persentambah" value="6">
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-4" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-5 ms-auto">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <a tabindex="0" class="input-group-text icon-link-hover text-warning-emphasis border border-secondary-subtle" id="popover-icon" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-title="Informasi." data-bs-content="Nilai JKK dihasilkan dari Gaji Pokok x JKK%" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                        <input class="form-control border border-secondary-subtle shadow" type=" text" id="beatambah" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label">Nilai Impor</label>
                            <div class="col-sm-5 ms-auto mb-4">
                                <input type="text" class="form-control shadow" id="Nimpor" disabled>
                            </div>
                        </div>
                        <div class="row container ">
                            <span class=" border-top border-secondary ms-2 mb-5"></span>
                        </div>
                        <div class="row mb-3">
                            <h5 class="col-sm-12 ">Perhitungan Pajak Penghasilan Pasal 22 Jika Importir Memiliki API</h5>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <div class="col-auto">
                                    <input type="text" class="  form-control  border border-secondary-subtle" id="labelimpor" value="2.5%" disabled>
                                </div>
                            </div>
                            <label class="col-sm-1 col-form-label ms-3 "><i class="bi bi-x-lg"></i></label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control border border-secondary-subtle" id="nilaimpor" value="0" disabled>
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-3" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class=" col-sm-4 ms-auto">
                                <div class="col-auto">
                                    <div class="col-auto">
                                        <input type="text" class="form-control border border-secondary-subtle" id="hasilakhir" value="0" disabled>
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
                                    <input type="text" class="form-control  border border-secondary-subtle" id="labelimpor1" value="7.5%" disabled>
                                </div>
                            </div>
                            <label class="col-sm-1 col-form-label ms-3 "><i class="bi bi-x-lg"></i></label>
                            <div class="col-sm-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control  border border-secondary-subtle" id="nilaimpor1" value="0" disabled>
                                </div>
                            </div>
                            <label class="col-1 col-form-label ms-3" style="font-size: 25px; margin-top:-8px;"> = </label>
                            <div class="col-sm-4 ms-auto">
                                <div class="col-auto">
                                    <div class="col-auto">
                                        <input type="text" class="form-control border border-secondary-subtle" id="hasilakhir1" value="0" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>
            // Mendapatkan elemen select
            const selectElement = document.getElementById("jenispajak");

            // Menangani peristiwa saat salah satu opsi dipilih
            selectElement.addEventListener("change", function() {
                const selectedValue = this.value;
                if (selectedValue) {
                    window.location.href = selectedValue; // Arahkan ke URL yang dipilih
                }
            });

            $(document).ready(function() {
                // elemen pph impor
                $("#cost, #insurance, #freight").on("input", function() {
                    totalcif();
                });
                $(".mataUang").on("input", function() {
                    formatRupiah(this);
                })

                $(".dolar").on("input", function() {
                    formatDolar(this);

                });
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
                var value = input.value.replace(/[^\d.]/g, ''); // Hapus semua karakter non-angka dan titik
                var value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-angka dan titik

                var formattedValue = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                    useGrouping: true
                }).format(value);

                input.value = formattedValue;
            }

            function totalcif() {
                var kursStr = document.getElementById('kurs').value;
                var kurs = kursStr.split(".").join("").split("Rp").join("");
                var cost = parseFloat($("#cost").val().replace(/[^\d.]/g, '')) || 0;
                var insurance = parseFloat($("#insurance").val()) || 0;
                var freight = parseFloat($("#freight").val().replace(/[^\d.]/g, '')) || 0;
                var beamasuk = Number($("#persenmasuk").val()) || 0;
                var beatambah = Number($("#persentambah").val()) || 0;

                var cifusd = parseFloat(cost) + (parseFloat(cost) * parseFloat(insurance) / 100) + (parseFloat(cost) * parseFloat(freight) / 100);

                var cifRp = cifusd * kurs;

                var masuk = beamasuk * cifRp / 100;
                var tambah = beatambah * cifRp / 100;

                var impor = (parseFloat(cifRp) + parseFloat(masuk) + parseFloat(tambah));

                var hasil = impor * 2.5 / 100;
                var hasil1 = impor * 7.5 / 100;

                $("#cifusd").val(new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(cifusd));

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
            }
        </script>

        <?php include("../footer.php") ?>