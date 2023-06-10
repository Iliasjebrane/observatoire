<?php
$types = [
    'H' => "Homme",
    'F' => "Femme",
    'M' => "Maamoura",
    'S' => "Saknia",
]
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
<div id="form-container"
    class="container d-flex-column justify-content-center  align-items-end my-3 shadow-lg p-3  bg-white rounded ">
    <div class=" d-flex justify-content-center w-100">
        <span class=" mt-3 mb-0">ajouter population</span>
    </div>
    <hr>

    <form enctype="multipart/form-data" action="<?= route('admin/populations') ?>" method="post"
        class="d-flex flex-column gap-3  p-1">



        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">type</label>
            </div>
            <div class="col-md-7 d-flex  gap-2 ">
                <select name="type" class="form-control" required>
                    <?php foreach ($types as $key => $value): ?>
                        
                        <option value="<?= $key ?>" <?= (old('type') == $key || $key=="H")? "selected" :"" ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (error('type')): ?>


                    <div class="text error">
                        <?= error("type") ?>
                    </div>

                <?php endif; ?>

            </div>
        </div>
        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">number</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="number" name="number" value="<?= old("number") ?>" id="number" class="form-control ">
                <?php if (error('number')): ?>


                    <div class="text error">
                        <?= error("number") ?>
                    </div>

                <?php endif; ?>

            </div>
        </div>

        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">date</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="date" required name="date" value="<?= old("date") ?>" id="date" class="form-control ">
                <?php if (error('date')): ?>


                    <div class="text error">
                        <?= error("date") ?>
                    </div>

                <?php endif; ?>

            </div>
        </div>


        <hr>
        <div class="d-flex justify-content-end gap-1">
            <a class='btn btn-primary  text-center' href="<?= route('admin/populations') ?>">annuler</a>
            <input type="submit" value="ajouter" class="btn btn-success   text-center ">

        </div>
    </form>
</div>