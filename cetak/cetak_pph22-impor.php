<?php


require('../assets/lib/fpdf186/fpdf.php');


// Mengambil nilai dari select dan input
$nama = $_POST['nama'];
$noApi = $_POST['noApi'];
$kurs = $_POST['kurs'];
$cost = $_POST['cost'];
$insurance = $_POST['insurance'];
$freight = $_POST['freight'];
$cifusd = $_POST['cifusd'];
$cifrp = $_POST['cifrp'];
$persenmasuk = $_POST['persenmasuk'];
$beamasuk = $_POST['beamasuk'];
$persentambah = $_POST['persentambah'];
$beatambah = $_POST['beatambah'];
$Nimpor = $_POST['Nimpor'];
$labelimpor = $_POST['labelimpor'];
$hasilakhir = $_POST['hasilakhir'];
$labelimpor1 = $_POST['labelimpor1'];
$hasilakhir1 = $_POST['hasilakhir1'];



// Membuat objek FPDF
$pdf = new FPDF();

$pdf->SetTitle('cetak-pph22-impor-' . $nama . '.pdf');

$pdf->AddPage();

// Menambahkan teks ke dokumen PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(200, 10, 'RINCIAN PERHITUNGAN PPH 22 ATAS BARANG IMPOR ', 0, 0, 'C');

$pdf->Cell(10, 10, '', 0, 1);
$pdf->SetFont('Arial', '', 10);


$pdf->Ln();
$pdf->Cell(15, 10, '', 0, 0,);
$pdf->Cell(15, 10, 'Nama', 0, 0, 'L10');
$pdf->Cell(5, 10, ':', '0');
$pdf->Cell(80, 10, $nama, '0');

$pdf->Cell(15, 10, 'No API', '0');
$pdf->Cell(5, 10, ':', '0');
$pdf->Cell(90, 10, $noApi, '0');


$pdf->Ln(13);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 10, 'Data Impor :', 1, 0, 'L', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)
$pdf->Ln();
$pdf->Cell(100, 10, 'Kurs Hari ini ', 'LR');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$kurs"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(100, 10, 'Harga Faktur / Cost ', 'LR');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$cost"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(100, 10, 'Biaya Asuransi / Insurance (%)', 'LR');
$pdf->Cell(90, 10, $insurance . '%', 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(100, 10, 'Biaya Angkut Freight (%)', 'LR');
$pdf->Cell(90, 10, $freight . '%', 'LR', 0, 'R');
$pdf->Ln();
$pdf->SetFillColor(105, 105, 105); // Warna  grey
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(100, 10, 'Total Cost, Insurance, dan Freight (US$) ', 'LTB', 0, '', true);
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$cifusd"), 'TBR', 0, 'R', true);

$pdf->Ln(15);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255); // warna teks putih


$pdf->Cell(50, 10, 'Keterangan ', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Besaran Biaya', 1, 0, 'C', true);
$pdf->Cell(90, 10, 'Nominal', 1, 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)
$pdf->Ln();
$pdf->Cell(50, 10, 'CIF dalam Rupiah ', 'LR');
$pdf->Cell(50, 10, '', 'LR', 0,);
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$cifrp"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(50, 10, 'Bea Masuk', 'LR');
$pdf->Cell(50, 10, $persenmasuk . '%', 'LR', '', 'R');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$beamasuk"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(50, 10, 'Bea Tambah', 'LR');
$pdf->Cell(50, 10, $persentambah . '%', 'LR', '', 'R');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$beatambah"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->SetFillColor(105, 105, 105); // Warna  grey
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(50, 10, 'Nilai Impor', '1', 0, '', true);
$pdf->Cell(50, 10, '', 'TB', 0, '',  true);
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$Nimpor"), 'TBR', 0, 'R', true);

$pdf->Ln(15);
$pdf->Cell(190, 10, 'Pajak Penghasilan 22 Atas Barang Impor :', '1', 0, 'C', true);
$pdf->Ln();
$pdf->Cell(50, 10, 'Keterangan ', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Besaran Biaya', 1, 0, 'C', true);
$pdf->Cell(90, 10, 'Nominal', 1, 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)
$pdf->Ln();
$pdf->Cell(50, 10, 'Jika Memiliki API ', 'LR');
$pdf->Cell(50, 10, $labelimpor, 'LR', 0, 'R');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$hasilakhir"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(50, 10, 'Jika Tidak Memiliki API ', 'LBR');
$pdf->Cell(50, 10, $labelimpor1, 'LBR', 0, 'R');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$hasilakhir1"), 'LBR', 0, 'R');

// Simpan dokumen PDF
$pdf->Output('I', 'cetak-pph22-impor-' . $nama . '.pdf');
