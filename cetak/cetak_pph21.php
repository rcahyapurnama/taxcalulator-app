<?php
ob_end_clean();

require('../assets/lib/fpdf186/fpdf.php');

// Mengambil nilai dari select dan input
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$npwp = $_POST['npwp'];
$no_npwp = $_POST['no_npwp'];
$status = $_POST['status'];
$ptkp = $_POST['ptkp'];
$gaji = $_POST['gaji'];
$tunjangan = $_POST['tunjangan'];
$bruto = $_POST['bruto'];
$jkk = $_POST['hasiljkk'];
$jkm = $_POST['hasiljkk'];
$bpjs = $_POST['hasilbpjs'];
$jabatan = $_POST['jabatan'];
$jht = $_POST['hasiljht'];
$jp = $_POST['hasiljp'];
$jumlah_pengurangan = $_POST['jumlah_pengurangan'];
$netto = $_POST['netto'];
$nettosetahun = $_POST['nettosetahun'];
$pkp = $_POST['pkp'];
$pphsetahun = $_POST['pphsetahun'];
$pphsebulan = $_POST['pphsebulan'];


// Membuat objek FPDF
$pdf = new FPDF();

$pdf->SetTitle('cetak-pph21-' . $nama . '.pdf');

$pdf->AddPage();

// Menambahkan teks ke dokumen PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(200, 10, 'RINCIAN PERHITUNGAN PPH 21 ', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 10, 'Data Personal :', 1, 0, 'L', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln(9);
$pdf->Cell(100, 10, 'Nama ', 'LR');
$pdf->Cell(90, 10, $nama, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 10, 'NIK ', 'LR');
$pdf->Cell(90, 10, $nik, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 10, 'Status NPWP ', 'LR');
$pdf->Cell(90, 10, $npwp, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 10, 'Nomor NPWP ', 'LR');
$pdf->Cell(90, 10, $no_npwp, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 10, 'Status Kawin/Tanggungan ', 'LR');
$pdf->Cell(90, 10, $status, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 10, 'Penghasilan Tidak Kena Pajak', 'LBR');
$pdf->Cell(90, 10, iconv('UTF-8', 'ISO-8859-9', "$ptkp"), 'LBR');

$pdf->Ln(13);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(95, 10, 'Data Penghasilan :', 1, 0, 'L', true);
$pdf->Cell(5);
$pdf->Cell(90, 10, 'Data pengurangan :', 1, 0, 'L', true);

$pdf->Ln(9);
$pdf->SetTextColor(0, 0, 0); // kembalikan Warna teks hitam (RGB)

$pdf->Cell(50, 10, 'Gaji Pokok', 'LR');
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$gaji"), 'LR');
$pdf->Cell(5);
$pdf->Cell(40, 10, 'Biaya Jabatan', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$jabatan"), 'LR');

$pdf->Ln(9);
$pdf->Cell(50, 10, 'Tunjangan Tetap', 'LR');
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$tunjangan"), 'LR');
$pdf->Cell(5);
$pdf->Cell(40, 10, 'Jumlah JHT', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$jht"), 'LR');
$pdf->Ln(9);
$pdf->Cell(50, 10, 'Jumlah JKK', 'LR');
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$jkk"), 'LR');
$pdf->Cell(5);
$pdf->Cell(40, 10, 'Jumlah JP', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$jp"), 'LR');
$pdf->Ln(9);
$pdf->Cell(50, 10, 'Jumlah JKM', 'LR');
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$gaji"), 'LR');
$pdf->Cell(5);
$pdf->Cell(40, 10, '', 'LR');
$pdf->Cell(50, 10, '', 'LR');
$pdf->Ln(9);
$pdf->Cell(50, 10, 'Jumlah BPJS', 'LR');
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$bpjs"), 'LR');
$pdf->Cell(5);
$pdf->Cell(40, 10, '', 'LR');
$pdf->Cell(50, 10, '', 'LR');

$pdf->Ln(9);
$pdf->SetFillColor(105, 105, 105); // Warna  grey
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(50, 10, 'Penghasilan Bruto', 1, 0, 'L', true);
$pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-9', "$bruto"), 1, 0, 'L', true);
$pdf->Cell(5);
$pdf->Cell(40, 10, 'Jumlah Pengurangan', 1, 0, 'L', true);
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$jumlah_pengurangan"), 1, 0, 'L', true);

$pdf->Ln(13);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(190, 10, 'Perhitungan PPH 21:', 1, 0, 'L', true);
$pdf->Ln(9);
$pdf->SetTextColor(0, 0, 0); // kembalikan Warna teks hitam 

$pdf->Cell(140, 10, 'Penghasilan Netto', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$netto"), 'LR');
$pdf->Ln(9);
$pdf->Cell(140, 10, 'Penghasilan Disetahunkan', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$nettosetahun"), 'LR');
$pdf->Ln(9);
$pdf->Cell(140, 10, 'Penghasilan Tidak Kena Pajak', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$ptkp"), 'LR');
$pdf->Ln(9);
$pdf->Cell(140, 10, 'Penghasilan Kena Pajak', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$pkp"), 'LR');
$pdf->Ln(9);
$pdf->Cell(140, 10, 'PPH 21 Terutang Setahun', 'LR');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$pphsetahun"), 'LR');
$pdf->Ln(9);
$pdf->Cell(140, 10, 'PPH 21 Atas Gaji Bulan Ini', 'LB');
$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-9', "$pphsebulan"), 'LBR');

$pdf->Ln(10);


$pdf->Cell(95, 10, 'Dibuat Oleh, ', 'LT', '0', 'C');
$pdf->Cell(95, 10, 'Diketahui Oleh, ', 'LTR', '0', 'C');
$pdf->Ln();
$pdf->Cell(95, 10, '', 'LR');
$pdf->Cell(95, 10, '', 'R');
$pdf->Ln();
$pdf->Cell(95, 10, '', 'LR');
$pdf->Cell(95, 10, '', 'R');
$pdf->Ln();
$pdf->Cell(95, 10, '', 'LR');
$pdf->Cell(95, 10, '', 'R');
$pdf->Ln();
$pdf->Cell(95, 10, "$nama", 'LBR', '0', 'C');
$pdf->Cell(95, 10, '', 'BR');

// Simpan dokumen PDF
$pdf->Output('I', 'cetak-pph21-' . $nama . '.pdf');
