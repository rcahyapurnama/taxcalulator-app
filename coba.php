<?php
require('assets/lib/fpdf186/fpdf.php');
// Sesuaikan path ke file FPDF dengan struktur direktori Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai POST dari input form
    $nama_file = $_POST['nama_file'];

    // Inisialisasi objek FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Isi konten PDF
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Ini adalah contoh PDF dengan nama: ' . $nama_file);

    // Gabungkan teks dengan nama file dan ekstensi
    $nama_file_dengan_ekstensi = 'Cetak-pph21-' . $nama_file . '.pdf';

    // Simpan dan tampilkan PDF
    $pdf->Output($nama_file_dengan_ekstensi, 'I');

    // Keluar dari script
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contoh Form PDF</title>
</head>

<body>
    <form method="post" action="">
        Nama File: <input type="text" name="nama_file" required>
        <input type="submit" value="Buat PDF">
    </form>
</body>

</html>