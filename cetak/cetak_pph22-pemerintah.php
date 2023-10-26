<?php


require('../assets/lib/fpdf186/fpdf.php');


// Mengambil nilai dari select dan input
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$npwp = $_POST['npwp'];
// Buat daftar pemetaan
$npwpMapping = [
    '1' => 'NPWP',
    '2' => 'Non-NPWP'
];
// Gunakan nilai numerik sebagai kunci untuk mendapatkan teks yang sesuai
$npwpText = isset($npwpMapping[$npwp]) ? $npwpMapping[$npwp] : 'Tidak Diketahui';

$no_npwp = $_POST['no_npwp'];
$harga_barang = $_POST['harga_barang'];
$harga_barang1 = $_POST['harga_barang1'];;
$persen_pph_hidden = $_POST['persen_pph_hidden'];
$persen_pph1 = $_POST['persen_pph1'];
$uang_diterima = $_POST['uang_diterima'];
$harga_barang2 = $_POST['harga_barang2'];
$ppn1 = $_POST['ppn1'];
$harga_barang_tidak_termasuk = $_POST['harga_barang_tidak_termasuk'];
$persen_pph2 = $_POST['persen_pph2'];
$uang_diterima2 = $_POST['uang_diterima2'];
$harga_barang3 = $_POST['harga_barang3'];
$ppn3 = $_POST['ppn3'];
$ppnbm = $_POST['ppnbm'];
$harga_barang_tidak_termasuk2 = $_POST['harga_barang_tidak_termasuk2'];
$persen_pph3 = $_POST['persen_pph3'];
$uang_diterima3 = $_POST['uang_diterima3'];




// Membuat objek FPDF
$pdf = new FPDF();

$pdf->SetTitle('cetak pph22 Atas penjualan barang kepada pemerintah.pdf');

$pdf->AddPage();

// 
// Menambahkan teks ke dokumen PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(10, 10, '', 0, 1);
$pdf->Cell(200, 0, 'RINCIAN PERHITUNGAN PAJAK PENGHASILAN PASAL 22 ', 0, 0, 'C');
$pdf->Ln(4);
$pdf->Cell(200, 10, ' ATAS PENJUALAN BARANG KEPADA PEMERINTAH ', 0, 0, 'C');

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

$pdf->Cell(190, 10, 'Jika Harga barang tidak termasuk PPn dan PPnBM', 'LTR', 0, 'L', true);

$pdf->Ln();
$pdf->Cell(70, 9, 'Keterangan ', 'LTB', 0, 'C', true);
$pdf->Cell(30, 9, 'Besaran Biaya', 'LTBR', 0, 'C', true);
$pdf->Cell(90, 9, 'Nominal', 'LTBR', 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln();
$pdf->Cell(70, 9, 'Harga Barang ', 'LR');
$pdf->Cell(30, 9, '', '');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $harga_barang1), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(70, 9, 'Tarif Pajak Penghasilan Pasal 22  ', 'LR');
$pdf->Cell(30, 9, $persen_pph_hidden, 0, 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', "$persen_pph1"), 'LR', 0, 'R');
$pdf->Ln();
$pdf->Cell(70, 9, 'Jumlah uang yang diterima ', 'LBR');
$pdf->Cell(30, 9, '', 'B');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $uang_diterima), 'LBR', 0, 'R');


$pdf->Ln(12);
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 9, 'Jika Harga barang termasuk PPN (11%) Bukan Barang Mewah', 1, 0, 'L', true);

$pdf->Ln(9);
$pdf->Cell(70, 9, 'Keterangan ', 'LTB', 0, 'C', true);
$pdf->Cell(30, 9, 'Besaran Biaya', 'LTBR', 0, 'C', true);
$pdf->Cell(90, 9, 'Nominal', 'LTBR', 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln(9);
$pdf->Cell(70, 9, 'Harga termasuk PPN (11%)  ', 'LR');
$pdf->Cell(30, 9, '', '');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $harga_barang2), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'PPN ', 'LR');
$pdf->Cell(30, 9, '11%', '', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $ppn1), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Harga barang tidak termasuk PPN ', 'LR');
$pdf->Cell(30, 9, '', '', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $harga_barang_tidak_termasuk), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Pajak Penghasilan Pasal 22 ', 'LR');
$pdf->Cell(30, 9, $persen_pph_hidden, '', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $persen_pph2), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Jumlah uang yang diterima', 'LBR');
$pdf->Cell(30, 9, '', 'B');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $uang_diterima2), 'LBR', 0, 'R');

$pdf->Ln(12);
$pdf->SetTextColor(255, 255, 255); // warna teks putih

$pdf->Cell(190, 10, 'Jika Harga barang termasuk PPN (11%) dan PPnBM (20%)', 1, 0, 'L', true);

$pdf->Ln(9);
$pdf->Cell(70, 9, 'Keterangan ', 'LTB', 0, 'C', true);
$pdf->Cell(30, 9, 'Besaran Biaya', 'LTBR', 0, 'C', true);
$pdf->Cell(90, 9, 'Nominal', 'LTBR', 0, 'C', true);
$pdf->SetTextColor(0, 0, 0); // Warna teks hitam (RGB)

$pdf->Ln(9);
$pdf->Cell(70, 9, 'Harga termasuk PPN (11%) dan PPnBM (20%) ', 'LR');
$pdf->Cell(30, 9, '', 'LR');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $harga_barang3), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'PPN ', 'LR');
$pdf->Cell(30, 9, '11%', 'LR', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $ppn3), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'PPnBM  ', 'LR');
$pdf->Cell(30, 9,  '20%', 'LR', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $ppnbm), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Harga barang tidak termasuk PPN dan PPnBM ', 'LR');
$pdf->Cell(30, 9, '', 'LR');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $harga_barang_tidak_termasuk2), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Pajak Penghasilan Pasal 22 ', 'LR');
$pdf->Cell(30, 9, $persen_pph_hidden, 'LR', 0, 'R');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $persen_pph3), 'LR', 0, 'R');
$pdf->Ln(9);
$pdf->Cell(70, 9, 'Jumlah uang yang diterima ', 'LBR');
$pdf->Cell(30, 9, '', 'B');
$pdf->Cell(90, 9, iconv('UTF-8', 'ISO-8859-9', $uang_diterima3), 'LBR', 0, 'R');

// Simpan dokumen PDF
$pdf->Output('cetak pph22 Atas penjualan barang kepada pemerintah.pdf', 'I');
