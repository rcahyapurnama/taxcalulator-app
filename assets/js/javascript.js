
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
  $("#infonetto").on("click", function () {
    infoNetto();
  });
  $("#infopph").on("click", function () {
    infoPPH();
  });
  $("#pkp").on("input", function () {
    infoPPH();
  });
  $("#reset").on("click", function () {
    resetInput();
    updateTotalPPH();
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

let currentFormat = 'persen'; // Menyimpan status pilihan saat ini

function changeDropdownText(text, elementSelector) {
  document.querySelector(elementSelector).innerHTML = text;
}




// Event listener untuk "(%)" pada Biaya Asuransi / Insurance
$(document).on('click', '#persen', function () {
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
  document.querySelector('#persenjht').value = '1';
  document.querySelector('#hasiljht').value = '';
  document.querySelector('#persenjp').value = '2';
  document.querySelector('#hasiljp').value = '';


  currentFormat = 'persen'; // Mengubah status pilihan saat ini
});

// Merubah Label "Rp." pada Label JKK,JKM,BPJSKES,JHT, dan JP
$(document).on('click', '#rupiah', function () {
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


});

// Event listener untuk input  JKK,JKM,BPJSKES,JHT, dan JP
$(document).on('input', '#persenjkk', function () {

  if (currentFormat === 'rupiah') {
    formatMataUang(this);
  } else if (currentFormat === 'persen') {
    formatpersen(this);
  }
  hitungBPJS();

});
// Event listener untuk input pada Biaya Asuransi / Insurance
$(document).on('input', '#persenjkm', function () {

  if (currentFormat === 'rupiah') {
    formatMataUang(this);
  } else if (currentFormat === 'persen') {
    formatpersen(this);
  }

});
// Event listener untuk input pada Biaya Asuransi / Insurance
$(document).on('input', '#persenbpjs', function () {
  if (currentFormat === 'rupiah') {
    formatMataUang(this);
  } else if (currentFormat === 'persen') {
    formatpersen(this);
  }

});
$(document).on('input', '#persenjht', function () {

  if (currentFormat === 'rupiah') {
    formatMataUang(this);
  } else if (currentFormat === 'persen') {
    formatpersen(this);
  }
  hitungpengurangan();
});
$(document).on('input', '#persenjp', function () {
  if (currentFormat === 'rupiah') {
    formatMataUang(this);
  } else if (currentFormat === 'persen') {
    formatpersen(this);
  }


});


function infoNetto() {
  var tabel = document.getElementById("nettoTable").getElementsByTagName('tbody')[0];
  var RowTemplateNetto = document.getElementById("RowTemplateNetto");
  var bruto = document.getElementById("bruto").value;
  var jabatan = document.getElementById("jabatan").value;
  var hasiljht = document.getElementById("hasiljht").value;
  var hasiljp = document.getElementById("hasiljp").value;
  var netto = document.getElementById("netto").value;
  var nettoErrorElement = document.getElementById('nettoError');

  if (!(bruto) && !(jabatan) && !(hasiljht) && !(hasiljp)) {
    nettoErrorElement.textContent = "Penghasilan Bruto & Elemen Pengurangan tidak memiliki nilai atau kosong.";

  } else {
    nettoErrorElement.textContent = "";
  }
  // Hapus semua baris sebelum menambahkan yang baru
  while (tabel.rows.length > 0) {
    tabel.deleteRow(0);
  }

  // Clone template
  var newRow = RowTemplateNetto.cloneNode(true);

  // Setel nilai sel
  newRow.cells[0].textContent = bruto;
  newRow.cells[1].textContent = jabatan;
  newRow.cells[2].textContent = hasiljht;
  newRow.cells[3].textContent = hasiljp;
  newRow.cells[4].textContent = netto;

  // Tambahkan kelas 'new-row' agar bisa diidentifikasi
  tabel.appendChild(newRow);
}
// Fungsi untuk menambahkan baris ke tabel
function addRow(table, nomor, step, value, percentage, denda) {
  var NPWPInput = document.getElementById('npwp').value;
  var newRow = table.insertRow();
  newRow.insertCell(0).textContent = nomor;
  newRow.insertCell(1).textContent = step;
  newRow.insertCell(2).textContent = value;
  newRow.insertCell(3).textContent = percentage + ' %';
  newRow.insertCell(4).textContent = denda + ' %';
  if (NPWPInput === 'NPWP') {
    var hasil = parseFloat(value.split("Rp").join("").split(".").join("")) * parseFloat(percentage) / 100;
    newRow.insertCell(5).textContent = formatCurrency(hasil);
  } else if (NPWPInput === 'Non-NPWP') {
    var hasil = parseFloat(value.split("Rp").join("").split(".").join("")) * parseFloat(percentage) / 100 * parseFloat(denda) / 100;
    newRow.insertCell(5).textContent = formatCurrency(hasil);
  }
  // Setel properti CSS untuk memusatkan teks di dalam sel
  for (var i = 0; i <= 5; i++) {
    if (i === 0 || i === 3 || i === 4) {
      newRow.cells[i].style.textAlign = "center"; // Memusatkan secara horizontal
      newRow.cells[i].style.verticalAlign = "middle"; // Memusatkan secara vertikal

    }
  }
}

// Fungsi untuk memformat mata uang
function formatCurrency(amount) {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(amount);
}

// Fungsi untuk menambahkan baris pada tabel Info PPH21
function infoPPH() {
  var tabel = document.getElementById("pphTable").getElementsByTagName('tbody')[0];
  var PKPInputCrc = document.getElementById('pkp').value;
  var PKPInput = parseFloat(PKPInputCrc.split(".").join("").split("Rp").join(""));
  var pkpErrorElement = document.getElementById('pkpError');
  var NPWPInput = document.getElementById('npwp').value;

  if (isNaN(PKPInput)) {
    pkpErrorElement.textContent = "Penghasilan Kena Pajak tidak memiliki nilai atau kosong.";

  } else {
    pkpErrorElement.textContent = "";
  }

  while (tabel.rows.length > 0) {
    tabel.deleteRow(0);
  }
  if (NPWPInput === 'NPWP') {
    if (PKPInput < 60000000) {

      addRow(tabel, '1', PKPInputCrc, PKPInputCrc, '5', '0');

    } else if (PKPInput > 60000000 && PKPInput <= 250000000) {
      var turunan1 = 60000000
      var hitungturunan2 = PKPInput - turunan1
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '0');
      addRow(tabel, '2', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '0');

    } else if (PKPInput > 250000000 && PKPInput <= 500000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = PKPInput - turunan2
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '0');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '0',);
      addRow(tabel, '3', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '0');
    } else if (PKPInput > 500000000 && PKPInput <= 5000000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var turunan3 = 500000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = turunan3 - turunan2
      var hitungturunan4 = PKPInput - turunan3
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '0');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '0',);
      addRow(tabel, '3', `${formatCurrency(turunan3)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '0');
      addRow(tabel, '4', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan3)}`, `${formatCurrency(hitungturunan4)}`, '30', '0');
    } else if (PKPInput > 5000000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var turunan3 = 500000000
      var turunan4 = 5000000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = turunan3 - turunan2
      var hitungturunan4 = turunan4 - turunan3
      var hitungturunan5 = PKPInput - turunan4
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '0');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '0',);
      addRow(tabel, '3', `${formatCurrency(turunan3)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '0');
      addRow(tabel, '4', `${formatCurrency(turunan4)} - ${formatCurrency(turunan3)}`, `${formatCurrency(hitungturunan4)}`, '30', '0');
      addRow(tabel, '5', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan4)}`, `${formatCurrency(hitungturunan5)}`, '35', '0');
    }
  } else if (NPWPInput === 'Non-NPWP') {
    if (PKPInput < 60000000) {
      var turunan1 = Math.min(PKPInput,);
      addRow(tabel, '1', PKPInputCrc, PKPInputCrc, '5', '120');

    } else if (PKPInput > 60000000 && PKPInput <= 250000000) {
      var turunan1 = 60000000
      var hitungturunan2 = PKPInput - turunan1
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '120');
      addRow(tabel, '2', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '120');

    } else if (PKPInput > 250000000 && PKPInput <= 500000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = PKPInput - turunan2
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '120');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '120',);
      addRow(tabel, '3', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '120');
    } else if (PKPInput > 500000000 && PKPInput <= 5000000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var turunan3 = 500000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = turunan3 - turunan2
      var hitungturunan4 = PKPInput - turunan3
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '120');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '120',);
      addRow(tabel, '3', `${formatCurrency(turunan3)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '120');
      addRow(tabel, '4', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan3)}`, `${formatCurrency(hitungturunan4)}`, '30', '120');
    } else if (PKPInput > 5000000000) {
      var turunan1 = 60000000
      var turunan2 = 250000000
      var turunan3 = 500000000
      var turunan4 = 5000000000
      var hitungturunan2 = turunan2 - turunan1
      var hitungturunan3 = turunan3 - turunan2
      var hitungturunan4 = turunan4 - turunan3
      var hitungturunan5 = PKPInput - turunan4
      addRow(tabel, '1', formatCurrency(turunan1), formatCurrency(turunan1), '5', '120');
      addRow(tabel, '2', `${formatCurrency(turunan2)} - ${formatCurrency(turunan1)}`, `${formatCurrency(hitungturunan2)}`, '15', '120',);
      addRow(tabel, '3', `${formatCurrency(turunan3)} - ${formatCurrency(turunan2)}`, `${formatCurrency(hitungturunan3)}`, '25', '120');
      addRow(tabel, '4', `${formatCurrency(turunan4)} - ${formatCurrency(turunan3)}`, `${formatCurrency(hitungturunan4)}`, '30', '120');
      addRow(tabel, '5', `${formatCurrency(PKPInput)} - ${formatCurrency(turunan4)}`, `${formatCurrency(hitungturunan5)}`, '35', '120');
    }
  }

  updateTotalPPH();
}

// Fungsi untuk menghitung total dan memperbarui tfoot
function updateTotalPPH() {
  var tbody = document.getElementById("pphTable").getElementsByTagName('tbody')[0];
  var totalCell = document.getElementById("baristotal").querySelector('.total');
  var PKPInputCrc = document.getElementById('pkp').value;
  var PKPInput = parseFloat(PKPInputCrc.split(".").join("").split("Rp").join(""));

  var total = 0;

  // Iterasi melalui kolom hasil dalam tbody
  for (var i = 0; i < tbody.rows.length; i++) {
    var hasilText = tbody.rows[i].cells[5].textContent;
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
    if (isNaN(PKPInput)) {
      totalCell.textContent = ',-';
    } else {
      totalCell.textContent = formattedTotal + ',-';
    }
  }
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


function formatpersen(input) {
  var value = input.value.replace(/[^\d.]/g, ''); // Hapus semua karakter non-angka dan titik
  input.value = value;
}

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
  var jabatan = document.getElementById('jabatan').value;
  var jhtCrc = document.getElementById('persenjht').value;
  var jpCrc = document.getElementById('persenjp').value;

  var jht
  var jp



  if (jhtCrc.includes("Rp") || jpCrc.includes("Rp")) {
    var jht = parseFloat(jhtCrc.split('Rp').join('').split(".").join(""));
    var jp = parseFloat(jpCrc.split('Rp').join('').split(".").join(""));

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

  var jumlah_pengurangan = jabatan + jht + jp;




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


  var hitungnetto = bruto - jabatan - jht - jp;


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
    // ROUNDDOWN implementation using Math.floor
    pkp = Math.floor(pkp / 1000) * 1000; // Round down to three decimal places

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
  document.getElementById("persenjkk").value = "";
  document.getElementById("persenjkm").value = "";
  document.getElementById("persenbpjs").value = "";
  document.getElementById("hasiljkk").value = "";
  document.getElementById("hasiljkm").value = "";
  document.getElementById("hasilbpjs").value = "";
  document.getElementById("jabatan").value = "";
  document.getElementById("persenjht").value = "";
  document.getElementById("persenjp").value = "";
  document.getElementById("hasiljht").value = "";
  document.getElementById("hasiljp").value = "";
  document.getElementById("jumlah_pengurangan").value = "";
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




