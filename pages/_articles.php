<?php 

  if(isset($_GET['id']) && !empty($_GET['id'])){ 

    $id_article = htmlentities(trim($_GET['id']));
    $article = Articles::getArticle($id_article);  

    
    if (!empty($article)) {
      $titre_article = nl2br($article->title_ar);
      $contenu =  nl2br($article->content_ar); 
    } 
    else{
      $contenu = '  ';
       $titre_article = NULL;
       echo '<meta http-equiv="refresh" content="0; url=index.php?page=404" />'; 
    }
  }
  else{
    $titre_article = 'محاور التنمية ';
    $contenu =  NULL;
    $axes = Axes::getallAxes(); 
  }
  ?>

    <main id="main"  style="margin: 0px !important; padding: 0px !important;"> 
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs"  style="margin-top: 80px !important;  ">
          <div class="container"  >

            <div class="d-flex justify-content-between align-items-center" dir="rtl"> 
              <ol>
                <li><a href="../index.php">الرئيسية </a></li>
                <li>&nbsp; &nbsp; <?php echo $titre_article;?> </li> 
              </ol>

            </div>

          </div>
        </section><!-- Breadcrumbs --> 

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">

            <div class="row gy-4">

              <div class="col-lg-8 col-md-12 icon-box border-box">  
                <h3 class="title-principal-detail text-center"><?php echo $titre_article;?></h3><br> 
                <p class="description-detail"><?php echo $contenu;?></p>  

                <?php
                  if ($contenu == NULL && !isset($_GET['id']) && empty($_GET['id'])) {?> 
                     
                    <div class="holderCircle">
                      <div class="round"></div>
                      <div class="dotCircle text-center">
                        <?php  
                          $style = '';
                          foreach($axes as $axe):
                            if($axe->id==1 || $axe->id==2){
                              $style ='width: 300% !important; height: 60% !important;';
                            }
                            elseif($axe->id==3){
                              $style ='width: 300% !important; height: 100% !important;';
                            }
                            else{
                              $style ='width: 380% !important; height: 60% !important;';
                            }
                            ?>
                            <span class="itemDot itemDot<?php echo $axe->id;?> <?php if($axe->id==1) echo 'active';?>" data-tab="<?php echo $axe->id;?>" onclick="window.location='index.php?page=add-content&id=<?php echo $axe->id;?>'">  
                              <span class="forActive" style="white-space: nowrap ; text-align: right !important;">
                                <br>
                                <div class="bg-white text-center" style="<?php echo $style;?> margin: 0px -40px 0px !important; border: 1px solid #363636;">
                                  <h2 class="title-secondaire-detail" style="font-size: 16px !important">
                                    <bi class="bi-caret-left-fill"></bi> <?php echo nl2br($axe->name_ar);?>
                                  </h2>
                                </div>
                              </span>
                              <img src="<?=assets("/img/circle/".$axe->img )?>" alt="" width="98%" onclick="" > 
                            </span> <?php 
                            $active = 'false';
                          endforeach; 
                          $active = 'true';
                        ?> 
                      </div> 
                      <div class="contentCircle">
                        <?php  
                          foreach($axes as $axe):?>
                            <div class="CirItem title-box <?php if($axe->id==1) echo 'active';?> CirItem<?php echo $axe->id;?>" onclick="window.location='index.php?page=add-content&id=<?php echo $axe->id;?>'">
                              <h2 class="title-secondaire-detail">
                                <a href="">
                                  <span><?php //echo nl2br($axe->name_ar);?></span>
                                </a>
                              </h2>
                              <p></p>
                             <!--  <i class="fa fa-line-chart"></i>  -->
                            </div> <?php 
                            $active = 'false';
                          endforeach; 
                          $active = 'true';
                        ?> 
                      </div>
                    </div> 
                    <div class="hidden-lg hidden-md hidden-sm" style="margin-bottom: 440px !important;"></div> <?php
                    
                  } 
                ?>

              </div> 

              <div class="col-lg-4"> 

                <div class="portfolio-info">
                  <h3 class="title-secondaire-detail">
                    <bi class="bi-caret-left-fill" style="font-size: 15px;"></bi>
                    أخبار المرصد 
                  </h3>
                  <!-- ======= Hero Section ======= -->
                  <section id="portfolio-details" class="portfolio-details" style="padding: 0px !important;">

                    <div class="portfolio-details-slider swiper-container">
                      <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                          <img src="<?=assets("/img/banniere/banniere-1.jpg")?>" alt="" style="width: 100%;height: 20vh;">
                        </div>

                        <div class="swiper-slide">
                          <img src="<?=assets("/img/banniere/banniere-2.jpg")?>" alt="" style="width: 100%;height: 20vh;">
                        </div>

                        <div class="swiper-slide">
                          <img src="<?=assets("/img/banniere/banniere-3.jpg")?>" alt="" style="width: 100%;height: 20vh;">
                        </div>

                      </div> 
                    </div> 

                  </section><!-- #hero -->
                </div>
                <div class="portfolio-info mt-3" id="indications">
                  <h3 class="title-secondaire-detail">
                    <bi class="bi-caret-left-fill" style="font-size: 15px;"></bi>
                    المؤشرات
                  </h3> 
                  
                    <link rel="<?=assets("/vendor/diag/diag-1/bootstrap.min.css")?>" type="text/css"/>
                    <script src="<?=assets("/vendor/diag/diag-1/jquery.min.js")?>"></script>
                    <script src="<?=assets("/vendor/diag/diag-1/modernizr.min.js")?>" type="text/javascript"></script>
                    <script src="<?=assets("/vendor/diag/diag-1/bootstrap.min.js")?>"></script> 
                    <script src="<?=assets("/vendor/diag/diag-1/Chart.min.js")?>"></script>
 
                    <div class="container mt-4">
                      <span class="title-bold">عدد السكان</span>
                      <div>
                        <canvas id="myChart"></canvas>
                      </div>
                    </div> 
                    
                    <script>
                      var ctx = document.getElementById("myChart").getContext("2d");
                      var myChart = new Chart(ctx, {
                        type: "line",
                        data: {
                          labels: [
                            "يناير",
                            "فبراير",
                            "مارس",
                            "أبريل",
                            "ملي",
                            "يوليو",
                            "يوليوز",
                          ],
                          datasets: [
                            {
                              label: "الرجال",
                              data: [2, 9, 3, 17, 6, 3, 7],
                              backgroundColor: "rgba(153,205,1,0.6)",
                            },
                            {
                              label: "النساء",
                              data: [2, 2, 5, 5, 2, 1, 10],
                              backgroundColor: "rgba(155,153,10,0.6)",
                            },
                          ],
                        },
                      });
                    </script> 
                  
                </div> 
                <div class="portfolio-info mt-3" id="rapports">
                  <h3 class="title-secondaire-detail">
                    <bi class="bi-caret-left-fill" style="font-size: 15px;"></bi>
                    التقارير
                  </h3> 

                  <div class="col-lg-12"> 

                    <div id="E-service" class="btn-hover"> 

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2022  </h6> 
                        </div> 
                      </a>

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2021 </h6> 
                        </div> 
                      </a>

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2020  </h6> 
                        </div> 
                      </a>

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2019  </h6> 
                        </div> 
                      </a>   

                    </div> 

                    <div id="suite-Eservice" class="collapse btn-hover pb-2" data-bs-parent=".liste-collapse"> 

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2018  </h6> 
                        </div> 
                      </a>

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2017  </h6> 
                        </div> 
                      </a> 

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2016  </h6> 
                        </div> 
                      </a>

                      <a href="#" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                          <h6 class="mb-1 Arabic-NotoKufi medium-text"> المرصد الحضري لمدينة  القنيطرة  2015  </h6> 
                        </div> 
                      </a> 

                    </div>

                    <div class="faq aos-init aos-animate" data-aos="" id="offre" style="padding: 10px 15px 5px; margin:0px">  
                           
                      <ul class="faq-list liste-1" style="padding: 0px; margin:0px"> 

                        <li class="br-offre" style="padding:  0px 0px 5px; margin:0px; border: 0px">  
                          <div data-bs-toggle="collapse" class="collapsed question" href="#suite-Eservice" style="padding: 0px; margin:0px; "> 
                            <i class="icon-show">&nbsp;&nbsp;<span class="Arabic-Naskh small-text">المزيد...</span></i>
                            <i class="bi bi-chevron-up icon-close"></i>
                          </div>
                        </li> 

                      </ul> 

                    </div>   
                   
                  </div>
                </div>  
                <!-- <br><br><br><br><br><br><br><br>  --> 
              </div>

            </div>

          </div>
        </section><!-- End Portfolio Details Section --> 

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up"> 

          <div class="section-title">
            <span class="title-principal"> للتواصل  معنا  </span> 
          </div>
          

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box bg-white">
                <i class="bi bi-geo-alt" style="font-size:30px"></i>
                <h3 class="Arabic-NotoKufi big-text"> العنوان </h3>
                <p> القصر البلدي، الساحة الإدارية. القنيطرة  - المغرب  14000</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box bg-white">
                <i class="bi bi-envelope"></i>
                <h3 class="Arabic-NotoKufi big-text"> البريد  الإلكتروني  </h3>
                <p>communekenitra@gmail.com</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="info-box bg-white">
                <i class="bi bi-telephone-plus"></i>
                <h3 class="Arabic-NotoKufi big-text"> الـهــاتف  </h3>
                <p>(+212) 05 37 37 15 18</p>
              </div>
            </div>

          </div>

          <div class="row pt-2 bg-nbr-vis" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6"> 
              <!-- ======= Map Section ======= -->
              <section class="map">
                <iframe class="mb-4 mb-lg-0 bx-shadow " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7842.877360534015!2d-6.588648440012647!3d34.26069470513984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda759e1219cf411%3A0xa0306bc581f60c07!2sMunicipalit%C3%A9%20de%20Kenitra%2C%20K%C3%A9nitra!5e0!3m2!1sfr!2sma!4v1618488992795!5m2!1sfr!2sma" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </section><!-- End Map Section -->  
            </div> 

            <div class="col-lg-6 Arabic-NotoKufi" >
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="form-group col-lg-6 col-xs-12">
                    <input type="text" name="name" class="form-control" id="name" placeholder="الاســم الكامل " required>
                  </div>
                  <div class="form-group col-lg-6 col-xs-12">
                    <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني " required>
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
                  <div class="error-message"> لــم تتم عملية الإرسال  </div>
                  <div class="sent-message"> تمت عملية الإرسال بنجاح  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="no-border-radius">
                     إرسال   <i class="bi bi-cursor-fill pl-10"></i>
                  </button>
                </div>
              </form>
            </div>

          </div>

        </div>
      </section><!-- End Contact Section --> 

      

      <script type="text/javascript"> 

        /* circle */

        let i=2; 

        $(document).ready(function(){
          
          var radius = 200;
          var fields = $('.itemDot');
          var container = $('.dotCircle');
          var width = container.width();
          radius = width/2.5;

           var height = container.height();
          var angle = 0, step = (2*Math.PI) / fields.length;
          fields.each(function() {
            var x = Math.round(width/2 + radius * Math.cos(angle) - $(this).width()/2);
            var y = Math.round(height/2 + radius * Math.sin(angle) - $(this).height()/2);
            if(window.console) {
              console.log($(this).text(), x, y);
            }
            
            $(this).css({
              left: x + 'px',
              top: y + 'px'
            });
            angle += step;
          });


          $('.itemDot').mousemove(function(){
            
            var dataTab= $(this).data("tab");
            $('.itemDot').removeClass('active');
            $(this).addClass('active');
            $('.CirItem').removeClass('active');
            $( '.CirItem'+ dataTab).addClass('active');
            i=dataTab;
            
            /*$('.dotCircle').css({
              "transform":"rotate("+(360-(i-1)*36)+"deg)",
              "transition":"2s"
            });
            $('.itemDot').css({
              "transform":"rotate("+((i-1)*36)+"deg)",
              "transition":"1s"
            });*/
            
            
          });

          setInterval(function(){
            var dataTab= $('.itemDot.active').data("tab");
            if(dataTab>4||i>4){
            dataTab=1;
            i=1;
            }
            $('.itemDot').removeClass('active');
            $('[data-tab="'+i+'"]').addClass('active');
            $('.CirItem').removeClass('active');
            $( '.CirItem'+i).addClass('active');
            i++;
            
            
            /*$('.dotCircle').css({
              "transform":"rotate("+(360-(i-2)*36)+"deg)",
              "transition":"2s"
            });
            $('.itemDot').css({
              "transform":"rotate("+((i-2)*36)+"deg)",
              "transition":"1s"
            });*/
            
            }, 5000);

        });

      </script>
       
 
    </main><!-- End #main --><?php  
   

?>