<?php
use App\Models\Partner;

$partnerModel = new Partner();

$partners = $partnerModel->select(condition: " is_deleted = false") ?? [];

?>

<style>
  /* Google Fonts - Poppins */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  .slide-container {
    max-width: 1120px;
    width: 100%;
    padding: 40px 0;
  }

  .slide-content {
    margin: 0 40px;
    overflow: hidden;
    border-radius: 25px;
  }

  .card {
    border-radius: 25px;
    background-color: #FFF;
  }

  .image-content,
  .card-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 14px;
  }

  .image-content {
    position: relative;
    row-gap: 5px;
    padding: 25px 0;
  }

  .overlay {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: green;
    border-radius: 25px 25px 0 25px;
  }


  .overlay::after {
    border-radius: 0 25px 0 0;
    background-color: green;
  }

  .card-image {
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 50%;
    background: #FFF;
    padding: 3px;
  }

  .card-image .card-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #4070F4;
  }

  .name {
    font-size: 18px;
    font-weight: 500;
    color: #333;
  }

  .description {
    font-size: 14px;
    color: #707070;
    text-align: center;
  }

  .button {
    border: none;
    font-size: 16px;
    color: #FFF;
    padding: 8px 16px;
    background-color: green;
    border-radius: 6px;
    margin: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .button:hover {
    background: green;
  }

  .swiper-navBtn {
    color: green;
    transition: color 0.3s ease;
  }

  .swiper-navBtn:hover {
    color: green;
  }

  .swiper-navBtn::before,
  .swiper-navBtn::after {
    font-size: 35px;
  }


  .swiper-pagination-bullet {
    background-color: green;
    opacity: 1;
  }

  .swiper-pagination-bullet-active {
    background-color: green;
  }

  @media screen and (max-width: 768px) {
    .slide-content {
      margin: 0 10px;
    }

    .swiper-navBtn {
      display: none;
    }
  }
</style>
<?php include_once 'inc/top_section.php'; ?>

<?php



use App\Models\Article;
use App\Models\Population;

$popuModel = new Population();

$articleModel = new Article();

$articles = $articleModel->select(orderBy: 'id desc') ?? [];

?>

<main id="main" style="margin: 0px !important;">

  <!-- ======= body Section ======= -->
  <section id="introduction" class="introduction">
    <div class="container">

      <div class="section-title">
        <span class="title-principal">مقدمة</span><br><br>
        <p class="text-justify" style="line-height: 30px;">
          أحدث المرصد الحضري لمدينة القنيطرة لجمع وتحليل البيانات والإحصاءات والمعلومات في مجال التنمية الحضرية المختلفة
          وتحويلها إلى مؤشرات يمكن تقيمها ومتابعتها ومعالجتها وتشغيلها لتتماشى مع متطلبات القياس والمقارنة والنشر و
          الحفظ قصد توفير رصد دائم لسير عملية التنمية الحضرية في جميع جوانبها الاقتصادية والاجتماعية والبيئية والعمرانية
          ، بهدف العمل على تحسين ظروف الحياة سكان مدينة القنيطرة والمساهمة في وضع السياسات ورسم الخطط التي تحقق أهداف
          التنمية الحضرية الشاملة والمستدامة.
        </p>
      </div>

      <div class="row">

        <div class="col-lg-4 col-md-6 icon-box border-box">
          <div class="icon"><i class="bi bi-geo-fill"></i></div>
          <h4 class="title"><a href="#">مدينة القنيطرة </a></h4>
          <p class="description">
            غني عن البيان القول بأن مدينة القنيطرة تعتبر من كبريات المدن المغربية وأهمها على الإطــلاق في الشمال الغربي
            للمملكــة .
          </p>

          <p class="description">
            هذه المدينة التي تقع على الضفة الجنوبية لنهر سبو على بعد 12 كلم من المصب بالمحيط الأطلسي عند مصطاف المهدية،
            وفي ملتقى الطرق التجارية الرئيسية والهامة الرابطة بين مدن شرق وشمال المملكة ووسطها (فاس، مكناس، تطوان، طنجة،
            الرباط والدار البيضاء) تعتبر في نشأتها حديثة العهد جدا، شأنها في ذلك شأن العاصمة الاقتصادية وخلافا للمدن
            الأخرى على سبيل المقارنة.
          </p>

          <p class="description">
            فتاريخ مدينة القنيطرة، في خد ذاتها لا يتعدى 120 سنة، وإن كانت مرتبطة ارتباطا وثيقا بقصبة المهدية التي يرجع
            تاريخ بنائها إلى القرن السادس قبل الميلاد على يد "حانون القرطاجي" الذي أقامها فوق هضبة صخرية عند مصب نهر سبو
            على أنقاض مدينة " تيماتريا".
          </p>

          <p class="description">
            كما كانت تسمى " حلق المعمورة " و " حلق سبو " وعرفت الاحتلالين البرتغالي سنة 1515 والإسباني سنة 1614 ، وتمكن
            السلطان العلوي المجاهد المولى إسماعيل من تحرير القلعة سنة 1681
          </p>

          <p class="description">
            وعند اجتياح الاستعمار الفرنسي و دخول الحماية سنة 1912 قرر المقيم العام الجنرال ليوطي بناء الميناء قرب القصبة
            التي أقيمت سنة 1895 لإقامة حامية عسكرية وبالقرب من القنطرة التي أقامها القائد المخزني علي أوعدي منذ أواخر
            القرن 17 والتي دمرتها السلطات الاستعمارية سنة 1928
          </p>

          <p class="description">
            ويعتبر صدور قرار الإقامة العامة في فاتح يناير 1913، والذي تم بموجبه فتح ميناء القنيطرة النهري للملاحة
            التجارية منعطفا حاسما في تقوية وتعاظم دور مدينة القنيطرة واتساع نفوذها ومجال إشعاعها .
            . وقد كان دور هذا الميناء مقتصرا على النشاط العسكري حيث كان يتم به إنزال القوات الاستعمارية والعتاد العسكري
            حيث كان يتم به إنزال القوات الاستعمارية والعتاد العسكري والمؤونة والمواد المختلفة وإرسالها إلى داخل البلاد
            في اتجاه فاس والمناطق المجاورة مرورا بالطرق المخزنية التقليدية وذلك من أجل إخماد الانتفاضات الشعبية الرافضة
            للاحتلال.
          </p>

          <p class="description">
            وقد كان لإشعاع الميناء انعكاسات إيجابية في جلب الاستثمارات خاصة في الميدان الصناعي كالصناعات الغذائية
            والكيماوية والمعدنية وفي ميدان البناء أيضا، وساهم في هذه الطفرة والنمو الصناعي المتميز انخفاض الضرائب وضعف
            الأجور والتكاليف العائلية .
          </p>
        </div>

        <div class="col-lg-4 col-md-6 icon-box">
          <!-- ======= Our Portfolio Section ======= -->
          <section id="portfolio" class="portfolio">
            <div class="container">

              <div class="section-title invisible hidden">
                <h2></h2>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">الكل</li>
                    <li data-filter=".filter-card">التخطيط </li>
                    <li data-filter=".filter-app">العمران</li>
                  </ul>
                </div>
              </div>

              <div class="row portfolio-container">

                <div class="col-lg-12 col-md-12 portfolio-item filter-app">

                  <div class="portfolio-wrap">
                    <img src="<?= assets("img/portfolio/portfolio-1.jpg") ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h3><a href="<?= assets("img/portfolio/portfolio-1.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""></a></h3>
                      <div>
                        <a href="<?= assets("img/portfolio/portfolio-1.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""><i class="bi bi-plus"></i></a>
                        <a href="#" title="Details"><i class="bi bi-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="<?= assets("img/portfolio/portfolio-3.jpg") ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h3><a href="<?= assets("img/portfolio/portfolio-3.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""></a></h3>
                      <div>
                        <a href="<?= assets("img/portfolio/portfolio-3.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""><i class="bi bi-plus"></i></a>
                        <a href="#" title="Details"><i class="bi bi-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    <img src="<?= assets("img/portfolio/portfolio-4.jpg") ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h3><a href="<?= assets("img/portfolio/portfolio-4.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""></a></h3>
                      <div>
                        <a href="<?= assets("img/portfolio/portfolio-4.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""><i class="bi bi-plus"></i></a>
                        <a href="#" title="Details"><i class="bi bi-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    <img src="<?= assets("img/portfolio/portfolio-2.jpg") ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h3><a href="<?= assets("img/portfolio/portfolio-2.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""></a></h3>
                      <div>
                        <a href="<?= assets("img/portfolio/portfolio-2.jpg") ?>" data-galleryery="portfolioGallery"
                          class="portfolio-lightbox" title=""><i class="bi bi-plus"></i></a>
                        <a href="#" title="Details"><i class="bi bi-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </section><!-- End Our Portfolio Section -->
        </div>

        <div class="col-lg-4 col-md-6 icon-box border-box" id="indications">
          <div class="article">
            <h3 class="title-secondaire-detail">
              <bi class="bi-caret-left-fill" style="font-size: 15px;"></bi>
              أخبار المرصد
            </h3>
            <!-- ======= Hero Section ======= -->
            <section id="portfolio-details" class="portfolio-details  " style="padding: 0px !important;">
              <!-- start -->
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <?php $count = 0;
                  foreach ($articles as $article):
                    $count++ ?>

                    <div class="carousel-item  <?= ($count == 1) ? "active" : ""; ?>">
                      <div>
                        <div
                          style="width: 100%;height: 20vh; background-image: url('<?= storage($article['image']) ?>'); background-size: cover;"
                          id="img">
                          <p class="text-light ">
                            <?= $article['title_ar'] ?>
                          </p>
                        </div>
                        <a href="?page=show-article&id=<?= $article['id'] ?>"
                          class="d-flex h-100   justify-content-center text-dark">

                          المزيد...

                        </a>

                      </div>


                    </div>
                  <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <!-- end -->


            </section>
          </div>


          <div class="icon"><i class="bi bi-graph-up"></i></div>
          <h4 class="title"><a href="#">الموشرات</a></h4>


          <link rel="<?= assets("vendor/bootstrap/css/bootstrap.min.css") ?>" type="text/css" />
          <script src="<?= assets("vendor/diag/diag-1/jquery.min.js") ?>"></script>
          <script src="<?= assets("vendor/diag/diag-1/modernizr.min.js") ?>" type="text/javascript"></script>
          <script src="<?= assets("vendor/diag/diag-1/bootstrap.min.js") ?>"></script>
          <script src="<?= assets("vendor/diag/diag-1/Chart.min.js") ?>"></script>

          <script src="<?= assets("vendor/diag/diag-2/d3.v4.min.js") ?>"></script>
          <script src="<?= assets("vendor/diag/diag-2/billboard.min.js") ?>"></script>
          <link rel="stylesheet" href="<?= assets("vendor/diag/diag-2/billboard.min.css") ?>" />
          <link rel="<?= assets("vendor/diag/diag-2/bootstrap.min.css") ?>" type="text/css" />
          <script src="<?= assets("vendor/diag/diag-1/jquery.min.js") ?>"></script>
          <script src="<?= assets("vendor/diag/diag-2/bootstrap.min.js") ?>"></script>



          <br>

          <div class="container mt-4">
            <span class="title-secondaire">عدد السكان</span>
            <div>
              <canvas id="myChart"></canvas>
            </div>
          </div>

          <?php

          $p_data = $popuModel->getPopulationLast6Month();
          ?>
          <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
              type: "line",
              data: {
                labels: <?= json_encode($p_data['months']) ?>,
                datasets: [
                  {
                    label: "الرجال",
                    data: <?= json_encode($p_data['H']) ?>,
                    backgroundColor: "rgba(153,205,1,0.6)",
                  },
                  {
                    label: "النساء",
                    data: <?= json_encode($p_data['F']) ?>,
                    backgroundColor: "rgba(155,153,10,0.6)",
                  },
                ],
              },
            });
          </script>



          <br><br>

          <div class="col-xs-12 text-center">
            <span class="title-secondaire ">الكثافة السكانية</span>
          </div>
          <div id="donut-chart"></div>
          <!-- <canvas id="canvas-donut-chart" style="background-color: ;" height="250px"></canvas> -->

          <?php
          $katafa = $popuModel->getPopulationLast12Month();
          ?>
          <script>
            var chart = bb.generate({
              data: {
                columns: [
                  ["الساكنية", <?= $katafa['S'] ?>],
                  ["معمورة", <?= $katafa['M'] ?>],
                ],
                type: "donut",
                onclick: function (d, i) {
                  console.log("onclick", d, i);
                },
                onover: function (d, i) {
                  console.log("onover", d, i);
                },
                onout: function (d, i) {
                  console.log("onout", d, i);
                },
              },
              donut: {
                title: "",
              },
              bindto: "#donut-chart",
            });

            new Chart(document.getElementById("canvas-donut-chart"), {
              type: "doughnut",
              data: {
                labels: [
                  'الساكنية',
                  'معمورة'
                ],
                datasets: [{
                  // label: 'My First Dataset',
                  data: [<?= $katafa['S'] ?>, <?= $katafa['M'] ?>],
                  backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                  ],
                  // hoverOffset: 4
                }]
              }
            });

          </script>

          <br><br>

          <div class="col-xs-12 text-center" id="rapports">
            <span class="title-secondaire ">التقارير </span> <br><br>
            <div class="col-lg-12">

              <div id="E-service" class="btn-hover">

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2022 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2021 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2020 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2019 </h6>
                  </div>
                </a>

              </div>

              <div id="suite-Eservice" class="collapse btn-hover pb-2" data-bs-parent=".liste-collapse">

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2018 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2017 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2016 </h6>
                  </div>
                </a>

                <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة القنيطرة 2015 </h6>
                  </div>
                </a>

              </div>

              <div class="faq aos-init aos-animate" data-aos="" id="offre" style="padding: 10px 15px 5px; margin:0px">

                <ul class="faq-list liste-1" style="padding: 0px; margin:0px">

                  <li class="br-offre" style="padding:  0px 0px 5px; margin:0px; border: 0px">
                    <div data-bs-toggle="collapse" class="collapsed question" href="#suite-Eservice"
                      style="padding: 0px; margin:0px; ">
                      <i class="icon-show">&nbsp;&nbsp;<span class="Arabic-Naskh small-text">المزيد...</span></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                    </div>
                  </li>

                </ul>

              </div>

            </div>
          </div>

        </div>

      </div>

    </div>
  </section><!-- End body Section -->
  <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
  <section class="contact section-bg">

    <div class="d-flex justify-content-center">

      <!-- Created By CodingNepal - www.codingnepalweb.com -->


      <!-- Coding by CodingLab | www.codinglabweb.com -->

      <!--<title>Responsive Card Slider</title>-->

      <!-- Swiper CSS -->


      <!-- CSS -->



      <div class="slide-container swiper " style="position:relative;">
        <div class="slide-content">
          <div class="card-wrapper swiper-wrapper">
            <?php foreach ($partners as $partner) { ?>
              <div class="card swiper-slide">
                <div class="image-content">
                  <span class="overlay"></span>

                  <div class="card-image">
                    <img src="<?= storage($partner['image']) ?>" alt="" class="card-img">
                  </div>
                </div>

                <div class="card-content">
                  <!-- <h2 class="name"></h2> -->
                  <p class="description">
                    <?= $partner['intitule'] ?>
                  </p>

                  <button class="button">View More</button>
                </div>
              </div>
            <?php } ?>

          </div>

          <div class="swiper-button-next text-success "></div>
          <div class="swiper-button-prev text-success"></div>
          <div class="swiper-pagination "></div>
        </div>
      </div>
    </div>





    <!-- Swiper JS -->
    <!--Uncomment this line-->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <!--Uncomment this line-->
    <!--<script src="js/script.js"></script>-->


    </div>
  </section>


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <span class="title-principal"> للتواصل معنا </span>
      </div>


      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box bg-white">
            <i class="bi bi-geo-alt" style="font-size:30px"></i>
            <h3 class="Arabic-NotoKufi big-text"> العنوان </h3>
            <p> القصر البلدي، الساحة الإدارية. القنيطرة - المغرب 14000</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box bg-white">
            <i class="bi bi-envelope"></i>
            <h3 class="Arabic-NotoKufi big-text"> البريد الإلكتروني </h3>
            <p>communekenitra@gmail.com</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box bg-white">
            <i class="bi bi-telephone-plus"></i>
            <h3 class="Arabic-NotoKufi big-text"> الـهــاتف </h3>
            <p>(+212) 05 37 37 15 18</p>
          </div>
        </div>

      </div>

      <div class="row pt-2 bg-nbr-vis" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">
          <!-- ======= Map Section ======= -->
          <section class="map">
            <iframe class="mb-4 mb-lg-0 bx-shadow "
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7842.877360534015!2d-6.588648440012647!3d34.26069470513984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda759e1219cf411%3A0xa0306bc581f60c07!2sMunicipalit%C3%A9%20de%20Kenitra%2C%20K%C3%A9nitra!5e0!3m2!1sfr!2sma!4v1618488992795!5m2!1sfr!2sma"
              frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </section><!-- End Map Section -->
        </div>

        <div class="col-lg-6 Arabic-NotoKufi">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-lg-6 col-xs-12">
                <input type="text" name="name" class="form-control" id="name" placeholder="الاســم الكامل " required>
              </div>
              <div class="form-group col-lg-6 col-xs-12">
                <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني "
                  required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع " required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder=" الرسالة..." required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">تحميل </div>
              <div class="error-message"> لــم تتم عملية الإرسال </div>
              <div class="sent-message"> تمت عملية الإرسال بنجاح </div>
            </div>
            <div class="text-center">
              <button type="submit" class="no-border-radius">
                إرسال <i class="bi bi-cursor-fill pl-10"></i>
              </button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
</main><!-- End #main -->
<script>

  var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      520: {
        slidesPerView: 2,
      },
      950: {
        slidesPerView: 3,
      },
    },
  });

</script>