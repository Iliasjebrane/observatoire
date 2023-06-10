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
        <span class=" mt-3 mb-0">ajouter partner</span>
    </div>
    <hr>

    <form action="<?= route("admin/partners/{$partner['id']}") ?>" enctype="multipart/form-data" method="post"
        class="d-flex flex-column gap-3  p-1">

        <input type="hidden" name="_method" value="put">

        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">intitule</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="text" required name="intitule" value="<?= old("intitule") ?? $partner["intitule"] ?>"
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
                <label class="">adresse</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="text" required name="adresse" value="<?= old("adresse") ?? $partner["adresse"] ?>"
                    id="adresse" class="form-control ">
                <?php if (error('adresse')): ?>
                    <div class="text error">
                        <?= error("adresse") ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row p-error ">
            <div class="col-md-5">
                <label class="">telephone</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="text" required name="tele" value="<?= old("tele") ?? $partner["tele"] ?>" id="tele"
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
                <label class="">image</label>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <input type="file" name="image" id="image" class="form-control ">
                <?php if (error('image')): ?>
                    <div class="text error">
                        <?= error("image") ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-end gap-1">
            <a class='btn btn-primary  text-center' href="<?= route('admin/partners') ?>">annuler</a>
            <input type="submit" value="ajouter" class="btn btn-success   text-center ">

        </div>
    </form>
</div>