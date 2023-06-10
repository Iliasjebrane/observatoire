
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
        <span class=" mt-3 mb-0">modifier rappor</span>
    </div>
    <hr>

    <form enctype="multipart/form-data" action="<?= route('admin/rapports/' . $rapport["id"]) ?>"  method="post" class="d-flex flex-column gap-3  p-1">
        <input type="hidden" name="_method" value="put">
        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">intitule</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="intitule" required name="intitule" value="<?= $rapport['intitule'] ?? old("intitule") ?>"
                    id="intitule" class="form-control ">
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
                <input type="annee" required name="annee" value="<?= $rapport['annee'] ?? old("annee") ?>" id="annee"
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
                <input type="file" name="piece_jointe"
                    value="" id="piece_jointe"
                    class="form-control ">
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
                <textarea name="description" class="form-conrol" rows="5">
    <?= $rapport['description'] ?? old("description") ?></textarea>
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
            <input type="submit" value="modifier" class="btn btn-success   text-center ">
        </div>
    </form>
    <!-- <hr>
        <div>
                <a style="text-decoration: none;" class="d-flex justify-content-center pb-2">click her for any help
                        ?</a>
        </div> -->

</div>