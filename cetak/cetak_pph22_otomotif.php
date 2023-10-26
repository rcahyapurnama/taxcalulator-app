<?php


require('../assets/lib/fpdf186/fpdf.php');


// Mengambil nilai dari select dan input
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$npwp = $_POST['npwp_kertas'];
// Buat daftar pemetaan
$npwpMapping = [
    '1' => 'NPWP',
    '2' => 'Non-NPWP'
];
// Gunakan nilai numerik sebagai kunci untuk mendapatkan teks yang sesuai
$npwpText = isset($npwpMapping[$npwp]) ? $npwpMapping[$npwp] : 'Tidak Diketahui';

$no_npwp = $_POST['no_npwp'];
$harga_barang_dpp = $_POST['harga_barang_dpp'];
$dpp = $_POST['dpp'];;
$tarif_pph = $_POST['tarif_pph'];
$nilaipph = $_POST['nilaipph'];



// Membuat objek FPDF
$pdf = new FPDF();

$pdf->SetTitle('cetak pph22 atas penjualan otomotif dalam negeri.pdf');

$pdf->AddPage();

// 
// Menambahkan teks ke dokumen PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(10, 10, '', 0, 1);
$pdf->Cell(190, 0, 'RINCIAN PERHITUNGAN PAJAK PENGHASILAN PASAL 22 ', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(190, 10,  'ATAS PENJUALAN OTOMOTIF DALAM NEGERI', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Arial', '', 9);
$pdf->SetFillColor(105, 105, 105); // Warna dim grey
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 10, 'Data Personal :', 1, 0, 'L', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln(10);
$pdf->Cell(100, 9, 'Nama ', 'LR');
$pdf->Cell(90, 9, $nama, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 9, 'NIK ', 'LR');
$pdf->Cell(90, 9, $nik, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 9, 'Status NPWP ', 'LR');
$pdf->Cell(90, 9, $npwpText, 'LR');
$pdf->Ln(9);
$pdf->Cell(100, 9, 'Nomor NPWP ', 'LBR');
$pdf->Cell(90, 9, $no_npwp, 'LBR');

$pdf->Ln(12);
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 10, 'Data Pajak Penghasilan pasal 22', 'LTR', 0, 'L', true);

$pdf->Ln();
$pdf->Cell(70, 9, 'Keterangan ', 'LTB', 0, 'C', true);
$pdf->Cell(30, 9, 'Besaran Biaya', 'LTBR', 0, 'C', true);
$pdf->Cell(90, 9, 'Nominal', 'LTBR', 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln();
$pdf->Cell(70, 9, 'Dasar Pengenaan Pajak (DPP)', 'LR');
$pdf->Cell(30, 9, '', '');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $dpp), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(70, 9, 'Tarif Pajak Penghasilan pasal 22  ', 'LR');
$pdf->Cell(30, 9, $tarif_pph, 0, 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', ""), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(70, 9, 'Nilai Pajak Penghasilan pasal 22 ', 'LBR');
$pdf->Cell(30, 9, '', 'B');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $nilaipph), 'LBR', 0, 'R');


// Simpan dokumen PDF
$pdf->Output('cetak pph22 atas penjualan otomotif dalam negeri.pdf', 'I');
