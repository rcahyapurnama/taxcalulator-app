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