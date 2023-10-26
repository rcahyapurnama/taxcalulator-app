
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



  let currentFormat = 'persen'; // Menyimpan status pilihan saat ini

  function changeDropdownText(text, elementSelector) {
    document.querySelector(elementSelector).innerHTML = text;
  }

  // Function to reset input
  function resetInput(inputId) {
    document.querySelector(inputId).value = '';
  }

  // Function to format input as IDR currency
  function formatInputAsRp(input) {
    let value = input.value.replace(/[^\d.]/g, ''); // Hapus semua karakter non-angka dan titik
    value = value.replace(/\D/g, ''); // Hapus semua karakter non-angka dan titik
    const formattedValue = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }).format(value).replace(/,/g, '.');
    input.value = formattedValue;
  }



  // Event listener untuk "(%)" pada Biaya Asuransi / Insurance
  document.querySelector('#persen').addEventListener('click', function () {
    changeDropdownText('JKK (%)', '#pilihjkk');
    changeDropdownText('JKM (%)', '#pilihjkm');
    changeDropdownText('BPJSKES (%)', '#pilihbpjskes');
    changeDropdownText('JHT (%)', '#pilihjht');
    changeDropdownText('JP (%)', '#pilihjp');

    resetInput('#persenjkk');
    resetInput('#hasiljkk');
    resetInput('#persenjkm');
    resetInput('#hasiljkm');
    resetInput('#persenbpjs');
    resetInput('#hasilbpjs');
    resetInput('#persenjht');
    resetInput('#hasiljht');
    resetInput('#persenjp');
    resetInput('#hasiljp');
    currentFormat = 'persen'; // Mengubah status pilihan saat ini
  });

  // Event listener untuk "US$" pada Biaya Asuransi / Insurance
  document.querySelector('#rupiah').addEventListener('click', function () {
    changeDropdownText('JKK (Rp)', '#pilihjkk');
    changeDropdownText('JKM (Rp)', '#pilihjkm');
    changeDropdownText('BPJSKES (Rp)', '#pilihbpjskes');
    changeDropdownText('JHT (Rp)', '#pilihjht');
    changeDropdownText('JP (Rp)', '#pilihjp');

    resetInput('#persenjkk');
    resetInput('#hasiljkk');
    resetInput('#persenjkm');
    resetInput('#hasiljkm');
    resetInput('#persenbpjs');
    resetInput('#hasilbpjs');
    resetInput('#persenjht');
    resetInput('#hasiljht');
    resetInput('#persenjp');
    resetInput('#hasiljp');

    currentFormat = 'rupiah'; // Mengubah status pilihan saat ini

  });

  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenjkk').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatInputAsRp(this);
    }
    hitungBPJS();
  });
  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenjkm').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatInputAsRp(this);
    }
  });
  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenbpjs').addEventListener('input', function () {
    if (currentFormat === 'rupiah') {
      formatInputAsRp(this);
    }
  });
  document.querySelector('#persenjht').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatInputAsRp(this);
    }
    hitungpengurangan();
  });
  document.querySelector('#persenjp').addEventListener('input', function () {
    if (currentFormat === 'rupiah') {
      formatInputAsRp(this);
    }

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
// Variabel selectedOptionId di luar event listener
var selectedOptionId = "persen"; // Atur opsi awal


// Fungsi hitungBPJS dengan parameter selectedOptionId
function hitungBPJS() {
  var gajiCrc = document.getElementById('gaji').value;
  var gaji = gajiCrc.split(".").join("").split("Rp").join("");
  var jkkCrc = document.getElementById('persenjkk').value;
  var jkmCrc = document.getElementById('persenjkm').value;
  var bpjsCrc = document.getElementById('persenbpjs').value;
  var jkk;
  var jkm;
  var bpjs;

  // Periksa apakah jkkCrc berisi "Rp"
  if (jkkCrc.includes("Rp") || jkmCrc.includes("Rp") || bpjsCrc.includes("Rp")) {
    jkk = jkkCrc.split(".").join("").split("Rp").join(""); // Hapus "Rp" jika ada
    jkm = jkmCrc.split(".").join("").split("Rp").join(""); // Hapus "Rp" jika ada
    bpjs = bpjsCrc.split(".").join("").split("Rp").join(""); // Hapus "Rp" jika ada
  } else {
    var jkkpersen = parseFloat(jkkCrc.replace(/[^\d.]/g, ''));
    var jkmpersen = parseFloat(jkmCrc.replace(/[^\d.]/g, ''));
    var bpjspersen = parseFloat(bpjsCrc.replace(/[^\d.]/g, ''));


    // Hitung persentase jika jkk adalah dalam persen
    jkk = (gaji * jkkpersen) / 100;
    jkm = (gaji * jkmpersen) / 100;
    // Hitung persentase BPJS Kesehatan dengan batas maksimum gaji 12 juta
    var gajiMaksimal = 12000000;
    var maxbpjs = Math.min(gaji, gajiMaksimal);
    var bpjs = maxbpjs * bpjspersen / 100;

  }
  $("#hasiljkk").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(jkk));

  $("#hasiljkm").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(jkm));

  $("#hasilbpjs").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(bpjs));

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
  var jhtCrc = document.getElementById('persenjht').value;
  var jpCrc = document.getElementById('persenjp').value;
  var jht;
  var jp;


  // Periksa apakah jkkCrc berisi "Rp"
  if (jhtCrc.includes("Rp") || jpCrc.includes("Rp")) {
    jht = jhtCrc.split(".").join("").split("Rp").join(""); // Hapus "Rp" jika ada
    jp = jpCrc.split(".").join("").split("Rp").join(""); // Hapus "Rp" jika ada

  } else {
    var jhtpersen = parseFloat(jhtCrc.replace(/[^\d.]/g, ''));
    var jppersen = parseFloat(jpCrc.replace(/[^\d.]/g, ''));

    var jht = (gaji * jhtpersen) / 100;

    var gajiMaksimal = 9559600;
    var maxjp = Math.min(gaji, gajiMaksimal);
    var jp = (maxjp * jppersen) / 100;



  }
  var jabatan = bruto * 0.05;


  // Jika biaya jabatan lebih dari 500 ribu, set nilai biaya jabatan menjadi 500 ribu
  if (jabatan > 500000) {
    jabatan = 500000;
  }

  jumlah_pengurangan = jabatan + jht + jp;

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
  }).format(jht));
  $("#hasiljp").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(jp));
  $("#jumlah_pengurangan").val(new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(jumlah_pengurangan));

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
  if (isNaN(pkp)) {
    pkp = "";
  } else {
    $("#pkp").val(new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(pkp));
  }


}

function hitungpph21() {
  var PKPInputCrc = document.getElementById('pkp').value;
  var PKPInput = PKPInputCrc.split(".").join("").split("Rp").join("");
  var NPWPInput = document.getElementById('npwp').value;
  var pphterutang = 0;

  if (PKPInput == 0) {
    pphterutang = 0;
  } else {
    if (NPWPInput === 'NPWP') {
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
    } else if (NPWPInput === 'Non-NPWP') {
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


  // Cek jika PPH adalah NaN, maka kosongkan nilai

}

function pphbulanini() {
  var nettoCrc = document.getElementById('netto').value;
  var netto = nettoCrc.split(".").join("").split("Rp").join("");
  var pphCrc = document.getElementById('pphsetahun').value;
  var pph = pphCrc.split(".").join("").split("Rp").join("");



  hitungpphbulanan = (pph / 12);
  hasilnetto = netto;
  hasilpphsebulan = hitungpphbulanan;
  hasilakhir = hasilnetto - hasilpphsebulan;

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


function resetInput() {

  document.getElementById("status").value = "TK/0";
  initializeStatus();
  document.getElementById("gaji").value = "";
  document.getElementById("tunjangan").value = "";
  document.getElementById("jumlahjkkjkm").value = "";
  document.getElementById("jumlahbpjskes").value = "";
  document.getElementById("bruto").value = "";
  document.getElementById("hasiljkk").value = "";
  document.getElementById("hasiljkm").value = "";
  document.getElementById("hasilbpjs").value = "";
  document.getElementById("jabatan").value = "";
  document.getElementById("hasiljht").value = "";
  document.getElementById("hasiljp").value = "";
  document.getElementById("netto").value = "";
  document.getElementById("nettosetahun").value = "";
  document.getElementById("pkp").value = "";
  document.getElementById("pphsetahun").value = "";
  document.getElementById("pphsebulan").value = "";
  document.getElementById("gajibersih").value = "";
  document.getElementById("pph21sebulan1").value = "";
  document.getElementById("hasil_akhir").value = "";
}

function submitAndClear() {
  var nama = document.getElementById("nama");
  var nik = document.getElementById("nik");
  var noNpwp = document.getElementById("no_npwp");
  var status = document.getElementById("npwp");


  var dataToSend = {
    nama: nama.value,
    nik: nik.value,
    noNpwp: noNpwp.value
  };

  $.ajax({
    type: 'POST',
    url: 'cetak/cetak_pph21.php', // Gantilah dengan URL atau skrip yang sesuai
    data: dataToSend,
    success: function (response) {
      // Data berhasil dikirim, tindakan setelah pengiriman
      nama.value = '';
      nik.value = '';


      validateInputs();


    }
  });
}


