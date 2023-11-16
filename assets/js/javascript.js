
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
  $("#infopph").on("click", function () {
    tambahBaris();
  });


  document.addEventListener('DOMContentLoaded', function () {
    initializeStatus();
    // Menambahkan event listener pada input PKP

    var pkpInput = document.getElementById('pkp');
    pkpInput.addEventListener('change', handleInputChanges);

    var pkpinfo = document.getElementById('infopph');
    pkpinfo.addEventListener('click', handleInputChanges);

  });

  function handleInputChanges() {
    tambahBaris();
  }

  let currentFormat = 'persen'; // Menyimpan status pilihan saat ini

  function changeDropdownText(text, elementSelector) {
    document.querySelector(elementSelector).innerHTML = text;
  }

  // Function to reset input
  function resetInput(inputId) {
    document.querySelector(inputId).value = '';
  }



  // Event listener untuk "(%)" pada Biaya Asuransi / Insurance
  document.querySelector('#persen').addEventListener('click', function () {
    changeDropdownText('JKK (%)', '#pilihjkk');
    changeDropdownText('JKM (%)', '#pilihjkm');
    changeDropdownText('BPJSKES (%)', '#pilihbpjskes');
    changeDropdownText('JHT (%)', '#pilihjht');
    changeDropdownText('JP (%)', '#pilihjp');


    document.querySelector('#persenjkk').value = '0.24';
    document.querySelector('#hasiljkk').value = '';
    document.querySelector('#persenjkm').value = '0.30';
    document.querySelector('#hasiljkm').value = '';
    document.querySelector('#persenbpjs').value = '4';
    document.querySelector('#hasilbpjs').value = '';
    document.querySelector('#persenjht').value = '2';
    document.querySelector('#hasiljht').value = '';
    document.querySelector('#persenjp').value = '1';
    document.querySelector('#hasiljp').value = '';
    currentFormat = 'persen'; // Mengubah status pilihan saat ini

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

  // Event listener untuk "US$" pada Biaya Asuransi / Insurance
  document.querySelector('#rupiah').addEventListener('click', function () {
    changeDropdownText('JKK (Rp)', '#pilihjkk');
    changeDropdownText('JKM (Rp)', '#pilihjkm');
    changeDropdownText('BPJSKES (Rp)', '#pilihbpjskes');
    changeDropdownText('JHT (Rp)', '#pilihjht');
    changeDropdownText('JP (Rp)', '#pilihjp');

    document.querySelector('#persenjkk').value = 'Rp 0';
    document.querySelector('#hasiljkk').value = '';
    document.querySelector('#persenjkm').value = 'Rp 0';
    document.querySelector('#hasiljkm').value = '';
    document.querySelector('#persenbpjs').value = 'Rp 0';
    document.querySelector('#hasilbpjs').value = '';
    document.querySelector('#persenjht').value = 'Rp 0';
    document.querySelector('#hasiljht').value = '';
    document.querySelector('#persenjp').value = 'Rp 0';
    document.querySelector('#hasiljp').value = '';


    currentFormat = 'rupiah'; // Mengubah status pilihan saat ini

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

  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenjkk').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatMataUang(this);
    }
    hitungBPJS();

  });
  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenjkm').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatMataUang(this);
    }
  });
  // Event listener untuk input pada Biaya Asuransi / Insurance
  document.querySelector('#persenbpjs').addEventListener('input', function () {
    if (currentFormat === 'rupiah') {
      formatMataUang(this);
    }
  });
  document.querySelector('#persenjht').addEventListener('input', function () {

    if (currentFormat === 'rupiah') {
      formatMataUang(this);
    }
    hitungpengurangan();
  });
  document.querySelector('#persenjp').addEventListener('input', function () {
    if (currentFormat === 'rupiah') {
      formatMataUang(this);
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

function tambahBaris() {
  var tabel = document.getElementById("pphTable").getElementsByTagName('tbody')[0];
  var newRowTemplate = document.getElementById("newRowTemplate");
  // Hapus semua baris sebelum menambahkan yang baru
  while (tabel.rows.length > 0) {
    tabel.deleteRow(0);
  }
  // Clone template
  var newRow = newRowTemplate.cloneNode(true);

  // Set nomor langkah
  var nomorLangkah = 1; // Setel ke 1, karena ini adalah baris pertama
  newRow.cells[0].textContent = nomorLangkah;
  newRow.style.display = "table-row";

  // Set nilai turunan berdasarkan PKPInput
  var PKPInputCrc = document.getElementById('pkp').value;
  var PKPInput = PKPInputCrc.split(".").join("").split("Rp").join("");

  if (parseFloat(PKPInput) <= 60000000) {
    // Format nilai turunan sebagai mata uang
    var formattedNilaiTurunan = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(parseFloat(PKPInput));

    var hasil = PKPInput * 0.05;
    var formathasil = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(parseFloat(hasil));

    // Set nilai turunan
    newRow.cells[1].textContent = formattedNilaiTurunan;
    newRow.cells[2].textContent = formattedNilaiTurunan;
    newRow.cells[3].textContent = '5 %';
    newRow.cells[4].textContent = formathasil;
    // Tambahkan kelas 'new-row' agar bisa diidentifikasi

    tabel.appendChild(newRow);
    updateTotal();


  } else if (parseFloat(PKPInput) > 60000000 && parseFloat(PKPInput) <= 250000000) {
    var turunan1 = 60000000;
    var formatTurunan1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan1);

    var hasil_1 = turunan1 * 0.05;
    var formathasil1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_1);
    // Set nilai turunan untuk baris pertama
    newRow.cells[1].textContent = formatTurunan1;
    newRow.cells[2].textContent = formatTurunan1;
    newRow.cells[3].textContent = '5 %';
    newRow.cells[4].textContent = formathasil1;


    var turunan2 = parseFloat(PKPInput) - turunan1;
    var formatTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan2);

    var hasil_2 = turunan2 * 0.15;
    var formathasil2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_2);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 60000000)
    var newRow2 = tabel.insertRow();
    var nomorLangkah2 = '2';
    newRow2.insertCell(0).textContent = nomorLangkah2;
    newRow2.insertCell(1).textContent = PKPInputCrc + " - " + formatTurunan1;
    newRow2.insertCell(2).textContent = formatTurunan2;
    newRow2.insertCell(3).textContent = '15 %';
    newRow2.insertCell(4).textContent = formathasil2;

    tabel.appendChild(newRow);
    tabel.appendChild(newRow2);
    updateTotal();
  } else if (parseFloat(PKPInput) > 250000000 && parseFloat(PKPInput) <= 500000000) {
    var turunan1 = 60000000;
    var formatTurunan1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan1);

    var hasil_1 = turunan1 * 0.05;
    var formathasil1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_1);
    // Set nilai turunan untuk baris pertama
    newRow.cells[1].textContent = formatTurunan1;
    newRow.cells[2].textContent = formatTurunan1;
    newRow.cells[3].textContent = '5 %';
    newRow.cells[4].textContent = formathasil1;


    var turunan2 = 250000000;
    var formatTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan2);

    var hitungturunan2 = turunan2 - turunan1;
    var formathitungTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan2);

    var hasil_2 = hitungturunan2 * 0.15;
    var formathasil2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_2);
    // Tambahkan baris baru untuk nilai turunan (250000000 - 60000000)
    var newRow2 = tabel.insertRow();
    var nomorLangkah2 = '2';
    newRow2.insertCell(0).textContent = nomorLangkah2;
    newRow2.insertCell(1).textContent = formatTurunan2 + " - " + formatTurunan1;
    newRow2.insertCell(2).textContent = formathitungTurunan2;
    newRow2.insertCell(3).textContent = '15 %';
    newRow2.insertCell(4).textContent = formathasil2;


    var turunan3 = PKPInput - 250000000;
    var formatTurunan3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan3);

    var hasil_3 = turunan3 * 0.25;
    var formathasil3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_3);

    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow3 = tabel.insertRow(1);
    var nomorLangkah3 = '3';
    newRow3.insertCell(0).textContent = nomorLangkah3;
    newRow3.insertCell(1).textContent = PKPInputCrc + " - " + formatTurunan2;
    newRow3.insertCell(2).textContent = formatTurunan3;
    newRow3.insertCell(3).textContent = '25 %';
    newRow3.insertCell(4).textContent = formathasil3;

    tabel.appendChild(newRow);
    tabel.appendChild(newRow2);
    tabel.appendChild(newRow3);
    updateTotal();
  } else if (parseFloat(PKPInput) > 500000000 && parseFloat(PKPInput) <= 5000000000) {
    var turunan1 = 60000000;
    var formatTurunan1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan1);

    var hasil_1 = turunan1 * 0.05;
    var formathasil1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_1);
    // Set nilai turunan untuk baris pertama
    newRow.cells[1].textContent = formatTurunan1;
    newRow.cells[2].textContent = formatTurunan1;
    newRow.cells[3].textContent = '5 %';
    newRow.cells[4].textContent = formathasil1;

    var turunan2 = 250000000;
    var formatTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan2);

    var hitungturunan2 = turunan2 - turunan1;
    var formathitungTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan2);

    var hasil_2 = hitungturunan2 * 0.15;
    var formathasil2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_2);

    // Tambahkan baris baru untuk nilai turunan (250000000 - 60000000)
    var newRow2 = tabel.insertRow();
    var nomorLangkah2 = '2';
    newRow2.insertCell(0).textContent = nomorLangkah2;
    newRow2.insertCell(1).textContent = formatTurunan2 + " - " + formatTurunan1;
    newRow2.insertCell(2).textContent = formathitungTurunan2;
    newRow2.insertCell(3).textContent = '15 %';
    newRow2.insertCell(4).textContent = formathasil2;


    var turunan3 = 500000000;
    var formatTurunan3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan3);

    var hitungturunan3 = turunan3 - turunan2;
    var formathitungTurunan3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan3);

    var hasil_3 = hitungturunan3 * 0.25;
    var formathasil3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_3);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow3 = tabel.insertRow(1);
    var nomorLangkah3 = '3';
    newRow3.insertCell(0).textContent = nomorLangkah3;
    newRow3.insertCell(1).textContent = formatTurunan3 + " - " + formatTurunan2;
    newRow3.insertCell(2).textContent = formathitungTurunan3;
    newRow3.insertCell(3).textContent = '25 %';
    newRow3.insertCell(4).textContent = formathasil3;


    var hitungturunan4 = PKPInput - turunan3;
    var formathitungTurunan4 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan4);

    var hasil_4 = hitungturunan4 * 0.30;
    var formathasil4 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_4);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow4 = tabel.insertRow(1);
    var nomorLangkah4 = '4';
    newRow4.insertCell(0).textContent = nomorLangkah4;
    newRow4.insertCell(1).textContent = PKPInputCrc + " - " + formatTurunan3;
    newRow4.insertCell(2).textContent = formathitungTurunan4;
    newRow4.insertCell(3).textContent = '30 %';
    newRow4.insertCell(4).textContent = formathasil4;

    tabel.appendChild(newRow);
    tabel.appendChild(newRow2);
    tabel.appendChild(newRow3);
    tabel.appendChild(newRow4);
    updateTotal();

  } else {
    var turunan1 = 60000000;
    var formatTurunan1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan1);

    var hasil_1 = turunan1 * 0.05;
    var formathasil1 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_1);
    // Set nilai turunan untuk baris pertama
    newRow.cells[1].textContent = formatTurunan1;
    newRow.cells[2].textContent = formatTurunan1;
    newRow.cells[3].textContent = '5 %';
    newRow.cells[4].textContent = formathasil1;

    var turunan2 = 250000000;
    var formatTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan2);

    var hitungturunan2 = turunan2 - turunan1;
    var formathitungTurunan2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan2);

    var hasil_2 = hitungturunan2 * 0.15;
    var formathasil2 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_2);

    // Tambahkan baris baru untuk nilai turunan (250000000 - 60000000)
    var newRow2 = tabel.insertRow();
    var nomorLangkah2 = '2';
    newRow2.insertCell(0).textContent = nomorLangkah2;
    newRow2.insertCell(1).textContent = formatTurunan2 + " - " + formatTurunan1;
    newRow2.insertCell(2).textContent = formathitungTurunan2;
    newRow2.insertCell(3).textContent = '15 %';
    newRow2.insertCell(4).textContent = formathasil2;


    var turunan3 = 500000000;
    var formatTurunan3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan3);

    var hitungturunan3 = turunan3 - turunan2;
    var formathitungTurunan3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan3);

    var hasil_3 = hitungturunan3 * 0.25;
    var formathasil3 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_3);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow3 = tabel.insertRow(1);
    var nomorLangkah3 = '3';
    newRow3.insertCell(0).textContent = nomorLangkah3;
    newRow3.insertCell(1).textContent = formatTurunan3 + " - " + formatTurunan2;
    newRow3.insertCell(2).textContent = formathitungTurunan3;
    newRow3.insertCell(3).textContent = '25 %';
    newRow3.insertCell(4).textContent = formathasil3;

    var turunan4 = 5000000000;
    var formatTurunan4 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(turunan4);

    var hitungturunan4 = turunan4 - turunan3;
    var formathitungTurunan4 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan4);

    var hasil_4 = hitungturunan4 * 0.30;
    var formathasil4 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_4);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow4 = tabel.insertRow(1);
    var nomorLangkah4 = '4';
    newRow4.insertCell(0).textContent = nomorLangkah4;
    newRow4.insertCell(1).textContent = formatTurunan4 + " - " + formatTurunan3;
    newRow4.insertCell(2).textContent = formathitungTurunan4;
    newRow4.insertCell(3).textContent = '30 %';
    newRow4.insertCell(4).textContent = formathasil4;

    var hitungturunan5 = PKPInput - turunan4;
    var formathitungTurunan5 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hitungturunan5);

    var hasil_5 = hitungturunan5 * 0.35;
    var formathasil5 = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(hasil_5);


    // Tambahkan baris baru untuk nilai turunan (PKPInput - 250000000)
    var newRow5 = tabel.insertRow(1);
    var nomorLangkah5 = '5';
    newRow5.insertCell(0).textContent = nomorLangkah5;
    newRow5.insertCell(1).textContent = PKPInputCrc + " - " + formatTurunan4;
    newRow5.insertCell(2).textContent = formathitungTurunan5;
    newRow5.insertCell(3).textContent = '35 %';
    newRow5.insertCell(4).textContent = formathasil5;

    tabel.appendChild(newRow);
    tabel.appendChild(newRow2);
    tabel.appendChild(newRow3);
    tabel.appendChild(newRow4);
    tabel.appendChild(newRow5);
    updateTotal();
  }

  // Setel properti CSS untuk memusatkan teks di dalam sel
  newRow.cells[0].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow.cells[0].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow.cells[3].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow.cells[3].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow2.cells[0].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow2.cells[0].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow2.cells[3].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow2.cells[3].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow3.cells[0].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow3.cells[0].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow3.cells[3].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow3.cells[3].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow4.cells[0].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow4.cells[0].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow4.cells[3].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow4.cells[3].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow5.cells[0].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow5.cells[0].style.verticalAlign = "middle"; // Memusatkan secara vertikal

  newRow5.cells[3].style.textAlign = "center"; // Memusatkan secara horizontal
  newRow5.cells[3].style.verticalAlign = "middle"; // Memusatkan secara vertikal


}




// Fungsi untuk menghitung total dan memperbarui tfoot
function updateTotal() {
  var tbody = document.getElementById("pphTable").getElementsByTagName('tbody')[0];
  var totalCell = document.getElementById("baristotal").querySelector('.total');


  var total = 0;

  // Iterasi melalui kolom hasil dalam tbody
  for (var i = 0; i < tbody.rows.length; i++) {
    var hasilText = tbody.rows[i].cells[4].textContent;
    var hasilValue = parseFloat(hasilText.replace(/[^\d-]/g, ''));

    // Pastikan hasilValue adalah angka yang valid
    if (!isNaN(hasilValue)) {
      total += hasilValue;
    }

    // Format total sebagai mata uang
    var formattedTotal = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(parseFloat(total));

    // Set nilai total pada tfoot
    totalCell.textContent = formattedTotal;
  }
}



