
$(document).ready(function () {
  initializeStatus();
  var popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  var popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
  $(".mataUang").on("input", function () {
    formatMataUang(this);
    initializeStatus()

  });
  $("#persenjkk, #persenjkm, #persenbpjs").on("input", function () {
    hitungBPJS();
    hitungJumlahjkkjkm();
    jumlahbruto();

  });
  // $("#persenjkm").on("input", function () {
  //   hitungBPJS();
  //   if (!this.value) {
  //     $("#hasiljkm").val('');
  //   }
  //   hitungJumlahjkkjkm();

  // });
  // $("#persenbpjs").on("input", function () {
  //   hitungBPJS();
  //   if (!this.value) {
  //     $("#hasilbpjs").val('');
  //   }
  //   hitungJumlahjkkjkm();

  // });
  $("#hasiljkk, #hasiljkm").on("input", function () {
    hitungJumlahjkkjkm();
    jumlahbruto();
  });
  $("#gaji,#persenjkk, #persenjkm, #persenbpjs,#persenjht,#persenjp").on("input", function () {
    hitungBPJS();
    hitungJumlahjkkjkm();
    jumlahbruto();
    hitungpengurangan()
    hitungnetto()
    nettosetahun()
    hitungPKP()
    hitungpph21()
    pphbulanini()

  });
  $("#tunjangan").on("input", function () {
    jumlahbruto();
    hitungpengurangan()
    hitungnetto()
    nettosetahun()
    hitungPKP()
    hitungpph21()
    pphbulanini()

    if (!this.value) {
      jumlahbruto();

    }
  });
  $("#npwp, #status, #ptkp").on("input", function () {
    initializeStatus()
    hitungPKP()
    hitungpph21()
    pphbulanini()
  });

  document.addEventListener('DOMContentLoaded', function () {
    initializeStatus();

  });


});
// Fungsi inisialisasi status dan PTKP saat halaman dimuat
function initializeStatus() {
  var status = "TK/0"; // Set nilai status ke "tk/0" secara default
  calculatePTKP(status); // Hitung dan tampilkan nilai PTKP
}

function calculatePTKP(status) {
  // Mendapatkan nilai status dari text field
  var status = document.getElementById("status").value;

  // Menentukan nilai PTKP berdasarkan status
  var ptkpValue;
  if (status === "TK/0") {
    ptkpValue = 54000000;
  } else if (status === "TK/1") {
    ptkpValue = 58500000;
  } else if (status === "TK/2") {
    ptkpValue = 63000000;
  } else if (status === "TK/3") {
    ptkpValue = 67500000;
  } else if (status === "K/0") {
    ptkpValue = 58500000;
  } else if (status === "K/1") {
    ptkpValue = 63000000;
  } else if (status === "K/2") {
    ptkpValue = 67500000;
  } else if (status === "K/3") {
    ptkpValue = 72000000;
  }

  // Memformat nilai PTKP menjadi format mata uang
  var formattedPTKP = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(ptkpValue);

  // Menampilkan nilai PTKP di input element
  document.getElementById("ptkp").value = formattedPTKP;
}



// ... Sisa kode JavaScript Anda ...


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

function hitungBPJS() {
  var gajiCrc = document.getElementById('gaji').value;
  var gaji = gajiCrc.split(".").join("").split("Rp").join("");
  var jkk = Number($("#persenjkk").val().replace(/[^\d.]/g, ''));
  var jkm = Number($("#persenjkm").val().replace(/[^\d.]/g, ''));
  var bpjs = Number($("#persenbpjs").val().replace(/[^\d.]/g, ''));

  if (gaji) {
    var persentase = gaji * jkk / 100;
    var persentasejkm = gaji * jkm / 100;

    // Hitung persentase BPJS Kesehatan dengan batas maksimum gaji 12 juta
    var gajiMaksimal = 12000000;
    var maxbpjs = Math.min(gaji, gajiMaksimal);
    var persentaseBPJSKes = maxbpjs * bpjs / 100;

    // Tampilkan hasil perhitungan persentase
    $("#hasiljkk").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(persentase));

    $("#hasiljkm").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(persentasejkm));

    $("#hasilbpjs").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(persentaseBPJSKes));
  }
}

function hitungJumlahjkkjkm() {

  var hasiljkkCrc = document.getElementById('hasiljkk').value;
  var hasiljkk = hasiljkkCrc.split(".").join("").split("Rp").join("");
  var hasiljkmCrc = document.getElementById('hasiljkm').value;
  var hasiljkm = hasiljkmCrc.split(".").join("").split("Rp").join("");
  var hasilbpjsCrc = document.getElementById('hasilbpjs').value;
  var hasilbpjs = hasilbpjsCrc.split(".").join("").split("Rp").join("");

  if (hasiljkk && hasiljkm && hasilbpjs) {
    var hitungjkkjkm = (parseFloat(hasiljkk) + parseFloat(hasiljkm))
    var jumlahBPJS = parseFloat(hasilbpjs);


    // Tampilkan hasil penjumlahan JKM dan BPJS Kesehatan
    $("#jumlahjkkjkm").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungjkkjkm));

    $("#jumlahbpjskes").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(jumlahBPJS));
  }
}

function jumlahbruto() {
  var gajiCrc = document.getElementById('gaji').value;
  var gaji = gajiCrc.split(".").join("").split("Rp").join("");
  var tunjanganCrc = document.getElementById('tunjangan').value;
  var tunjangan = tunjanganCrc.split(".").join("").split("Rp").join("");
  var jumlahjkkCrc = document.getElementById('jumlahjkkjkm').value;
  var jumlahjkk = jumlahjkkCrc.split(".").join("").split("Rp").join("");
  var jumlahbpjsCrc = document.getElementById('jumlahbpjskes').value;
  var jumlahbpjs = jumlahbpjsCrc.split(".").join("").split("Rp").join("");

  var hitungbruto = (parseFloat(gaji || 0) + parseFloat(tunjangan || 0) + parseFloat(jumlahjkk || 0) + parseFloat(jumlahbpjs || 0));


  $("#bruto").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hitungbruto));
}


function hitungpengurangan() {
  var gajiCrc = document.getElementById('gaji').value;
  var gaji = gajiCrc.split(".").join("").split("Rp").join("");
  var brutoCrc = document.getElementById('bruto').value;
  var bruto = brutoCrc.split(".").join("").split("Rp").join("");
  var jht = Number($("#persenjht").val().replace(/[^\d.]/g, ''));   // Hapus semua karakter non-angka dan titik
  var jp = Number($("#persenjp").val().replace(/[^\d.]/g, ''));   // Hapus semua karakter non-angka dan titik


  var jabatan = bruto * 0.05;
  var biayajht = gaji * jht / 100;


  var gajiMaksimal = 9559600;
  var maxjp = Math.min(gaji, gajiMaksimal);
  var biayajp = (maxjp * jp / 100);


  // Jika biaya jabatan lebih dari 500 ribu, set nilai biaya jabatan menjadi 500 ribu
  if (jabatan > 500000) {
    jabatan = 500000;
  }
  $("#jabatan").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(jabatan));
  $("#hasiljht").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(biayajht));
  $("#hasiljp").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(biayajp));
}

function hitungnetto() {
  var brutoCrc = document.getElementById('bruto').value;
  var bruto = brutoCrc.split(".").join("").split("Rp").join("");
  var jabatanCrc = document.getElementById('jabatan').value;
  var jabatan = jabatanCrc.split(".").join("").split("Rp").join("");
  var jhtCrc = document.getElementById('hasiljht').value;
  var jht = jhtCrc.split(".").join("").split("Rp").join("");
  var jpCrc = document.getElementById('hasiljp').value;
  var jp = jpCrc.split(".").join("").split("Rp").join("");


  var hitungnetto = (bruto - jabatan - jht - jp);


  $("#netto").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hitungnetto));


}
function nettosetahun() {
  var nettoCrc = document.getElementById('netto').value;
  var netto = nettoCrc.split(".").join("").split("Rp").join("");

  var nettosetahun = netto * 12;

  $("#nettosetahun").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(nettosetahun));
}
function hitungPKP() {
  var nettosetahunCrc = document.getElementById('nettosetahun').value;
  var nettosetahun = nettosetahunCrc.split(".").join("").split("Rp").join("");
  var ptkpCrc = document.getElementById('ptkp').value;
  var ptkp = ptkpCrc.split(".").join("").split("Rp").join("");


  if (parseFloat(nettosetahun) < parseFloat(ptkp)) {
    pkp = 0;
  } else {
    var pkp = parseFloat(nettosetahun) - parseFloat(ptkp);

  }

  $("#pkp").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(pkp));



}

function hitungpph21() {
  var PKPInputCrc = document.getElementById('pkp').value;
  var PKPInput = PKPInputCrc.split(".").join("").split("Rp").join("");
  var NPWPInput = document.getElementById('npwp').value;
  var pphterutang = 0;

  if (PKPInput == 0) {
    pphterutang = 0;
  } else {
    if (NPWPInput === "1") {
      if (PKPInput <= 60000000) {
        pphterutang = PKPInput * 0.05;
      } else if (PKPInput > 60000000 && PKPInput <= 250000000) {
        pphterutang = (60000000 * 0.05) + (PKPInput - 60000000) * 0.15;
      } else if (PKPInput > 250000000 && PKPInput <= 500000000) {
        pphterutang = (60000000 * 0.05) + (250000000 - 60000000) * 0.15 + (PKPInput - 250000000) * 0.25;
      } else if (PKPInput > 500000000 && PKPInput <= 5000000000) {
        pphterutang = (60000000 * 0.05) + (250000000 - 60000000) * 0.15 + (500000000 - 250000000) * 0.25 + (PKPInput - 500000000) * 0.30;
      } else {
        pphterutang = (60000000 * 0.05) + (250000000 - 60000000) * 0.15 + (500000000 - 250000000) * 0.25 + (5000000000 - 500000000) * 0.30 + (PKPInput - 5000000000) * 0.35;
      }
    } else {
      if (PKPInput <= 60000000) {
        pphterutang = PKPInput * 0.05 * 1.20;
      } else if (PKPInput > 60000000 && PKPInput <= 250000000) {
        pphterutang = (60000000 * 0.05 + (PKPInput - 60000000) * 0.15) * 1.20;
      } else if (PKPInput > 250000000 && PKPInput <= 500000000) {
        pphterutang = (60000000 * 0.05 + (250000000 - 60000000) * 0.15 + (PKPInput - 250000000) * 0.25) * 1.20;
      } else if (PKPInput > 500000000 && PKPInput <= 5000000000) {
        pphterutang = (60000000 * 0.05 + (250000000 - 60000000) * 0.15 + (500000000 - 250000000) * 0.25 + (PKPInput - 500000000) * 0.30) * 1.20;
      } else {
        pphterutang = (60000000 * 0.05 + (250000000 - 60000000) * 0.15 + (500000000 - 250000000) * 0.25 + (5000000000 - 500000000) * 0.30 + (PKPInput - 5000000000) * 0.35) * 1.20;
      }
    }
  }

  // Tampilkan hasil perhitungan PPH Terutang Setahun
  $("#pphsetahun").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(pphterutang));


}

function pphbulanini() {
  var nettoCrc = document.getElementById('netto').value;
  var netto = nettoCrc.split(".").join("").split("Rp").join("");
  var pphsebulanCrc = document.getElementById('pphsebulan').value;
  var pph = pphsebulanCrc.split(".").join("").split("Rp").join("");

  var pphCrc = document.getElementById('pphsetahun').value;
  var pph = pphCrc.split(".").join("").split("Rp").join("");


  var hitungpphbulanan = (pph / 12);
  var hasilnetto = netto;
  var hasilpphsebulan = hitungpphbulanan;
  var hasilakhir = hasilnetto - hasilpphsebulan;



  $("#pphsebulan").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hitungpphbulanan));

  $("#gajibersih").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hasilnetto));

  $("#pph21sebulan1").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hasilpphsebulan));

  $("#hasil_akhir").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(hasilakhir));

}

