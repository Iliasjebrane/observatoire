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
<div id="form-container"
        class="container d-flex-column justify-content-center  align-items-end my-3 shadow-lg p-3  bg-white rounded ">
        <?php if (session()->has('form_error')): ?>
                <div class="alert alert-danger">
                        <?= htmlspecialchars(session()->pull('form_error')) ?>
                </div>
        <?php endif; ?>
        <div class=" d-flex justify-content-center w-100">
                <span class=" mt-3 mb-0">ajouter utilisateur</span>
        </div>
        <hr>

        <form action="<?= route('admin/users') ?>" method="post" class="d-flex flex-column gap-3  p-1">


                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">nom fr</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="nom_fr" required name="nom_fr" value="<?= old("nom_fr") ?>" id="nom_fr"
                                        class="form-control ">
                                <?php if (error('nom_fr')): ?>


                                        <div class="text error">
                                                <?= error("nom_fr") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">nom ar</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="nom_ar" required  name="nom_ar" value="<?= old("nom_ar") ?>" id="nom_ar"
                                        class="form-control ">
                                <?php if (error('nom_ar')): ?>


                                        <div class="text error">
                                                <?= error("nom_ar") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">prenom fr</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="prenom_fr" required name="prenom_fr" value="<?= old("prenom_fr") ?>"
                                        id="prenom_fr" class="form-control ">
                                <?php if (error('prenom_fr')): ?>


                                        <div class="text error">
                                                <?= error("prenom_fr") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">prenom ar</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="prenom_ar" required  name="prenom_ar" value="<?= old("prenom_ar") ?>"
                                        id="prenom_ar" class="form-control ">
                                <?php if (error('prenom_ar')): ?>


                                        <div class="text error">
                                                <?= error("prenom_ar") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">login</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="username" required name="username" value="<?= old("username") ?>"
                                        id="username" class="form-control ">
                                <?php if (error('username')): ?>


                                        <div class="text error">
                                                <?= error("username") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">tele</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="tele" required name="tele" value="<?= old("tele") ?>" id="tele"
                                        class="form-control ">
                                <?php if (error('tele')): ?>


                                        <div class="text error">
                                                <?= error("tele") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">email</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="email" required name="email" value="<?= old("email") ?>" id="email"
                                        class="form-control ">
                                <?php if (error('email')): ?>


                                        <div class="text error">
                                                <?= error("email") ?>
                                        </div>

                                <?php endif; ?>

                        </div>

                </div>


                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">role</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <select name="role" class="form-control" required>
                                        <option value="">--select</option>
                                        <?php foreach ($roles as $role): ?>
                                                <option value="<?= $role['id'] ?>" <?= ($role['id'] == old('role')) ? 'selected' : "" ?>><?= $role['name_fr'] ?></option>
                                        <?php endforeach; ?>
                                </select>
                                <?php if (error('role')): ?>


                                        <div class="text error">
                                                <?= error("role") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>

                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">mot de pass</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="password" required name="password" value="<?= old("password") ?>"
                                        id="password" class="form-control ">
                                <?php if (error('password')): ?>


                                        <div class="text error">
                                                <?= error("password") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end gap-1">
                        <a class='btn btn-primary  text-center' href="<?= route('admin/users') ?>">annuler</a>
                        <input type="submit" value="ajouter" class="btn btn-success   text-center ">

                </div>
        </form>
</div>