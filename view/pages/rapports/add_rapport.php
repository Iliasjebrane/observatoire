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
                <span class=" mt-3 mb-0">ajouter rapport</span>
        </div>
        <hr>

        <form action="<?= route('admin/rapports') ?>" enctype="multipart/form-data" method="post" class="d-flex flex-column gap-3  p-1">


                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">intitule</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="text" required name="intitule" value="<?= old("intitule") ?>" id="intitule"
                                        class="form-control ">
                                <?php if (error('intitule')): ?>


                                        <div class="text error">
                                                <?= error("intitule") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">annee</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="number" required name="annee" value="<?= old("annee") ?>" id="annee"
                                        class="form-control ">
                                <?php if (error('annee')): ?>


                                        <div class="text error">
                                                <?= error("annee") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">piece jointe</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="file" required name="piece_jointe"
                                        id="piece_jointe" class="form-control ">
                                <?php if (error('piece_jointe')): ?>


                                        <div class="text error">
                                                <?= error("piece_jointe") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">description</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">

                                    <textarea name="description"  rows="5" class="form-control"><?= old("description") ?> </textarea>
                                
                                    <?php if (error('description')): ?>


                                        <div class="text error">
                                                <?= error("description") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
               

                <hr>
                <div class="d-flex justify-content-end gap-1">
                        <a class='btn btn-primary  text-center' href="<?= route('admin/rapports') ?>">annuler</a>
                        <input type="submit" value="ajouter" class="btn btn-success   text-center ">

                </div>
        </form>
</div>