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
    <div class="mb-3" style="max-width: 3000px;">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="assets/img/Tax-amico-(1).png" class="img-fluid rounded-start responsif">
            </div>
            <div class="col-md-7 g-4 ">
                <div class="card-body fonttext  ">

                    <h5 class="card-text ">Kalkulator Pajak Penghasilan</h5>
                    <h1 class="card-title text-primary  ">TAX-CAL</h1>
                    <p></p>
                    <p class="card-text">Selamat datang di aplikasi perihitungan pajak penghasilan TAX-CAL silahkan memilih jenis perhitungan pajak didalam menu yang tersedia untuk memulai. </p>
                    <a href="pph21.php" class="btn btn-primary">Mulai Hitung PPH 21 <i class="bi bi-arrow-right-circle"></i> </a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="d-flex justify-content-center">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<?php include("footer.php") ?>