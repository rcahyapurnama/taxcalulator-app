$(document).ready(function () {

    var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    var popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    // Mendapatkan elemen select

    const selectElement = document.getElementById("jenispajak");

    // Menangani peristiwa saat salah satu opsi dipilih
    selectElement.addEventListener("change", function () {
        const selectedValue = this.value;
        if (selectedValue) {
            window.location.href = selectedValue; // Arahkan ke URL yang dipilih
        }
    });

    $(".mataUang").on("input", function () {
        formatRupiah(this);

    });
    $(".dolar").on("input", function () {
        formatDolar(this);
    });
    $("#harga_barang_dpp,#npwp_kertas,#jenispajak").on("input change", function () {
        hitung_kertas();
    });



});
document.addEventListener("DOMContentLoaded", function () {
    // Mendapatkan elemen select untuk jenis pajak dan npwp
    const selectJenisPajak = document.getElementById("jenispajak");
    const selectNpwp = document.getElementById("npwp_kertas");
    const tarifpphElement = document.getElementById("tarif_pph");

    // Definisikan kamus yang mengaitkan jenis pajak dengan tarif pph
    const tarifpphValues = {
        "pph22-kertas.php": { npwp1: "0.10%", npwp2: "0.20%" },
        "pph22-semen.php": { npwp1: "0.25%", npwp2: "0.50%" },
        "pph22-baja.php": { npwp1: "0.30%", npwp2: "0.60%" },
        "pph22-rokok.php": { npwp1: "0.15%", npwp2: "0.30%" },
        "pph22-otomotif.php": { npwp1: "0.45%", npwp2: "0.90%" },
        "pph22-minyak.php": { npwp1: "0.30%", npwp2: "0.60%" },
        "pph22-bumn.php": { npwp1: "1.5%", npwp2: "3.0%" },
        "pph22-kehutanan.php": { npwp1: "1.5%", npwp2: "3.0%" },
    };


    // Menangani peristiwa saat salah satu opsi dipilih
    selectJenisPajak.addEventListener("change", updateTarifpph);
    selectNpwp.addEventListener("change", updateTarifpph);

    function updateTarifpph() {
        const jenisPajakValue = selectJenisPajak.value;
        const npwpValue = selectNpwp.value;

        // Perbarui tarif pph berdasarkan jenis pajak dan NPWP
        if (tarifpphValues[jenisPajakValue]) {
            tarifpph = tarifpphValues[jenisPajakValue][`npwp${npwpValue}`];
        }

        // Perbarui tampilan tarif pph
        tarifpphElement.value = tarifpph;
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
    window.addEventListener('load', function () {
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


    statusNpwp.addEventListener('change', function () {
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
        var noApi = document.getElementById("noApi");


        var dataToSend = {
            nama: nama.value,
            noApi: noApi.value,

        };

        $.ajax({
            type: 'POST',
            url: 'cetak/cetak_pph22-impor.php', // Gantilah dengan URL atau skrip yang sesuai
            data: dataToSend,
            success: function (response) {
                // Data berhasil dikirim, tindakan setelah pengiriman
                nama.value = '';
                noApi.value = '';
                validateInputs()

            }
        });
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
    // Hapus karakter non-angka kecuali koma (,)
    var value = input.value.replace(/[^\d.]/g, '');
    // Mengonversi nilai ke angka desimal (dengan koma jika ada)
    var floatValue = parseFloat(value);
    // Memformat nilai kembali dengan pemisah ribuan koma (,)
    var formattedValue = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
        useGrouping: true
    }).format(floatValue);

    input.value = formattedValue;
}




// akhir pph impor


// awal pph pemerintah

// akhir pph pemerintah

// awal pph dpp only
function hitung_kertas() {
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