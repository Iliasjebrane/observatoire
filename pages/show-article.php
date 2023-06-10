<?php
// $article =

//     [
//         "is_active" => 0,
//         "src" => "/img/banniere/banniere-3.jpg",
//         "titre_fr" => "sfghjhgfds",
//         "titre_ar" => 'sdfg3',
//         "description_ar" => "farasou 3ali yanamou fil istabli baynama lbohali yazdaridou fil halowa xa xa xa lalala
//       xa la la la xa laaaa xa lla la la ",
//         "id" => 3
//     ];

$id = request()->get('id');
if (!$id) {
    getPage('404');
    return;
}

use App\Models\Article;



$articleModel = new Article;

$article = $articleModel->selectFirst(condition: 'id = :id', conditionParams: ['id' => $id]);

if (!$article) {

    getPage('404');
    return;

}

?>

<section id="introduction" class="introduction mt-3">
    <div class="container">

        <div class="section-title mt-3">
            <span class="title-principal  ">
                <?= ($article["title_ar"]) ?>
            </span><br><br>
            <div class="row d-flex justify-content-between ">
                <div class="col-md-6  ">

                    <img src="<?= storage($article["image"]) ?>" alt="" style=" max-height:100% ;max-width:100%;">



                </div>
                <div class=" col-md-4 icon-box border-box ">
                    <div class="icon"><i class="bi bi-geo-fill"></i></div>
                    <h4 class="title"> الوصف</h4>
                    <p class="description">
                        <?= ($article["description_ar"]) ?>
                    </p>
                </div>



            </div>
        </div>
    </div>

</section>