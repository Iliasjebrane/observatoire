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
                <span class=" mt-3 mb-0">modifier articles</span>
        </div>
        <hr>

        <form enctype="multipart/form-data" action="<?= route('admin/articles/' . $article["id"]) ?>" method="post"
                class="d-flex flex-column gap-3  p-1">
                <input type="hidden" name="_method" value="put">
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">title fr</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="title_fr" name="title_fr"
                                        value="<?= $article['title_fr'] ?? old("title_fr") ?>" id="title_fr"
                                        class="form-control ">
                                <?php if (error('title_fr')): ?>


                                        <div class="text error">
                                                <?= error("title_fr") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">title ar</label>
                        </div>

                        <div class="col-md-7 d-flex flex-column">
                                <input type="title_ar" required name="title_ar"
                                        value="<?= $article['title_ar'] ?? old("title_ar") ?>" id="title_ar"
                                        class="form-control ">
                                <?php if (error('title_ar')): ?>


                                        <div class="text error">
                                                <?= error("title_ar") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>


                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">description fr</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <textarea name="description_fr" class="form-conrol" rows="5">
              <?= $article['description_fr'] ?? old("description_fr") ?></textarea>
                                <?php if (error('description')): ?>


                                        <div class="text error">
                                                <?= error("description_fr") ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">description ar</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <textarea name="description_ar" class="form-conrol" rows="5">
              <?= $article['description_ar'] ?? old("description_ar") ?></textarea>
                                <?php if (error('description_ar')): ?>


                                        <div class="text error">
                                                <?= error("description_ar") ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                </div>
                <div class="row p-error ">
                        <div class="col-md-5">
                                <label class="">image</label>
                        </div>
                        <div class="col-md-7 d-flex flex-column">
                                <input type="file" name="image" value="<?= $article['image'] ?? old("image") ?>"
                                        id="image" class="form-control ">
                                <?php if (error('image')): ?>


                                        <div class="text error">
                                                <?= error("image") ?>
                                        </div>

                                <?php endif; ?>

                        </div>
                </div>


                <hr>
                <div class="d-flex justify-content-end gap-1">
                        <a class='btn btn-primary  text-center' href="<?= route('admin/articles') ?>">annuler</a>
                        <input type="submit" value="modifier" class="btn btn-success   text-center ">
                </div>
        </form>
        <!-- <hr>
        <div>
                <a style="text-decoration: none;" class="d-flex justify-content-center pb-2">click her for any help
                        ?</a>
        </div> -->

</div>