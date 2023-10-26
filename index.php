<?php
$pageTitle = "Welcome";
include("navbar.php") ?>

<div class="container">
    <div class="row text-center p-4 mt-5">
        <div class="col judul">

        </div>
    </div>

    <!-- akhir judul -->

    <!-- awal card -->
    <div class="mb-3" style="max-width: 1500px;">
        <div class="row g-0">
            <div class="col-md-7">
                <img src="assets/img/welcome.png" class="responsif">
            </div>
            <div class="col-md-5 g-4">
                <div class="card-body fonttext">

                    <h5 class="card-text">Kalkulator Pajak Penghasilan</h5>
                    <h1 class="card-title">TAX-CAL</h1>
                    <p></p>
                    <p class="card-text">Selamat datang di aplikasi perihitungan pajak penghasilan TAX-CAL Silahkan memilih jenis perhitungan pajak didalam menu yang tersedia untuk memulai </p>
                    <a href="pph21.php" class="btn btn-primary">Mulai Hitung PPH 21 <i class="bi bi-arrow-right-circle"></i> </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include("footer.php") ?>