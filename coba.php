<?php
$pageTitle = "PPH 21";
include("navbar.php") ?>
<div class="container">
    <div class="row text-center p-4 mt-5">
        <div class="col judul">
            <h3>Kalkulator Pajak Penghasilan Pasal 21</h3>
        </div>
    </div>

    <!-- akhir judul -->

    <!-- awal card -->

    <div class="row row-cols-1 row-cols-lg-2 g-3 p-2">
        <div class="col">
            <div class="card shadow">
                <h5 class="card-header text-bg-primary ">A. Personal</h5>
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-6 col-form-label">PPH 21 Terutang Dalam Setahun</label>
                            <div class="col-lg-5 ms-auto">
                                <div class="input-group">
                                    <a tabindex="0" class="input-group-text icon-link-hover  border border-secondary-subtle text-bg-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" id="infopph" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0)"><i class="bi bi-question-lg"></i></a>
                                    <input type="text" class=" form-control  border border-secondary-subtle shadow" id="pphsetahun" name="pphsetahun" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>

                    <!-- Modal Info perhitungan PPH 21 -->
                    <div class="modal fade" id="staticBackdrop2" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi.</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Langkah perhitungan mencari nilai PPH 21.
                                    <div class="table-responsive mt-4">
                                        <table class="table table-hover table-striped " id="pphTable">
                                            <thead>

                                                <tr class=" ">
                                                    <th class="text-center">Langkah</th>
                                                    <th class="">Nilai Turunan</th>
                                                    <th class="">Hasil Turunan</th>
                                                    <th class="">Tarif</th>
                                                    <th class="text-center">Denda</th>
                                                    <th class="">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Placeholder row for new entries -->
                                                <tr id="newRowTemplate" style="display: none;">
                                                    <td class="langkah"></td>
                                                    <td class="nilaiTurunan"></td>
                                                    <td class="hasilTurunan"></td>
                                                    <td class="tarif"></td>
                                                    <td class="tarifdenda"></td>
                                                    <td class="hasil"></td>

                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr id="baristotal" class="">
                                                    <td colspan="4" id="pkpError" class="form-text text-danger"></td>
                                                    <td class="text-end fs-5 ">Total</td>
                                                    <td class="total fs-5 table-active">,-</td>

                                            </tfoot>
                                        </table>
                                        <small id="pkpError" class="form-text text-danger"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>