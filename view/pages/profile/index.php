<?php
$user = auth()->user();



?>

<style>
        .p-error:has(.error) input {
                border: solid rgba(245, 107, 107, 0.922);

        }

        .p-error:has(.error) {
                color: rgba(245, 107, 107, 0.922);
        }

        /* form container */
        #form-container {
                max-width: 700px;
        }
</style>

<div class="container-fluid p-0 ">


        <div class="row p-0 m-0">
                <div class="col-md-12 m-0 p-1 mb-2">
                        <div class="col-md-12 d-flex flex-column align-items-center">
                                <i class="bi bi-person-circle" style='font-size:20px;'></i>
                                <h5>profile</h5>
                        </div>
                </div>
                <div class="col-md-7 m-0 p-1 mb-2">
                        <div class="shadow-lg  justify-content-start bg-white rounded p-3">
                                <div class="about_me">
                                        <div class=" d-flex justify-content-center w-100"><span> Info</span></div>
                                        <hr>
                                </div>
                                <div class="info">
                                        <div class="d-flex gap-2">
                                                <label>user name:</label>
                                                <p>
                                                        <?= $user["username"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>nom fr:</label>
                                                <p>
                                                        <?= $user["nom_fr"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>nom ar:</label>
                                                <p>
                                                        <?= $user["nom_ar"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>prenom fr:</label>
                                                <p>
                                                        <?= $user["prenom_fr"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>prenom ar:</label>
                                                <p>
                                                        <?= $user["prenom_ar"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>email:</label>
                                                <p>
                                                        <?= $user["email"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>tele:</label>
                                                <p>
                                                        <?= $user["tele"] ?? '_' ?>
                                                </p>
                                        </div>
                                        <div class="d-flex gap-2">
                                                <label>role:</label>
                                                <p>
                                                        <?= $user["role"]["name_fr"] ?? '_' ?>
                                                </p>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-md-5 m-0 p-1">
                        <div id="form-container"
                                class="justify-content-center p-3 align-items-end shadow-lg  bg-white rounded">

                                <form action="<?= route("admin/profile/change-password") ?>" method="post"
                                        class="d-flex flex-column">
                                        <input type="hidden" name="_method" value="put">
                                        <div class=" d-flex justify-content-center w-100">
                                                <span class="  mb-0">modifier profile</span>
                                        </div>
                                        <hr>
                                        <div class="row p-error mb-2">
                                                <div class="col-md-5">
                                                        <label>ancien mot de pass</label>
                                                </div>
                                                <div class="col-md-7 d-flex flex-column">
                                                        <input type="password" required name="old_pass" id="old_pass"
                                                                class="form-control ">
                                                        <?php if (error('old_pass')): ?>
                                                                <div class="text error">
                                                                        <?= error("old_pass") ?>
                                                                </div>
                                                        <?php endif; ?>

                                                </div>
                                        </div>
                                        <div class="row p-error ">
                                                <div class="col-md-5">
                                                        <label class="">nouveaux mot de pass </label>
                                                </div>
                                                <div class="col-md-7 d-flex flex-column">
                                                        <input type="password" required name="new_pass" id="new_pass"
                                                                class="form-control ">
                                                        <?php if (error('new_pass')): ?>
                                                                <div class="text error">
                                                                        <?= error("new_pass") ?>
                                                                </div>
                                                        <?php endif; ?>
                                                </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-end pb-3">
                                                <input type="submit" value="modifier"
                                                        class="btn btn-success   text-center  ">
                                        </div>
                                </form>
                        </div>
                </div>



        </div>
</div>