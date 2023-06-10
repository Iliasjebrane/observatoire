<?php 

  $cond = true;

  if($cond == false){ 
    header('Location: index.php');
  }
  else{
 
    $suggestionsMRE = Suggestions::getallSuggestionsMRE();?>

    <main id="main"  style="margin: 0px !important; padding: 0px !important;">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs"  id="edit_axe" style="margin-top: 80px !important;  ">
          <div class="container"  >

            <div class="d-flex justify-content-between align-items-center" dir="rtl" id="add">
               
              <ol>
                <li><a href="index.php">الرئيسية </a></li>
                <li>&nbsp; &nbsp;   لائحة  الاقتراحات   </li> 
              </ol>

            </div>

          </div>
        </section><!-- Breadcrumbs --> 

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">

            <div class="row">
              <div class="col col-lg-12" name="messagebox" id="messagebox"></div>
            </div>
 
            <div class="row gy-4"> 
              
              <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                <div class="card rounded-0">
                  <div class="card-header py-3">
                    <h2 class="fs-6 fw-bold m-0 title-secondaire-detail no-padding">
                      <i class="bi bi-list"></i>
                      لائحة  الاقتراحات
                    </h2>
                  </div>
                  <br>
                  
                  <table  class="table table-striped table-bordered" id="example" style="text-align: right;" > 

                    <thead> 
                        <tr class="" style="background-color: #273B7A; font-size: 14px;"> 
                            <th class="" style="color: #fff; text-align: center; width: 5%;">
                                الرقم
                            </th>
                            <th style="color: #fff; text-align: center; width: 5%;">
                                المقترح
                            </th>
                            <th style="color: #fff; text-align: center; width: 10%;">
                                الاسم الكامل
                            </th>
                            <th style="color: #fff; text-align: center; width: 10%;">
                                البريد الإلكتروني
                            </th>
                            <th style="color: #fff; text-align: center; width: 10%;" class="hidden">
                                الهاتف
                            </th> 
                            <th style="color: #fff; text-align: center; width: 50%;">
                                الاقتراحات
                            </th> 
                             <th style="color: #fff; text-align: center; width: 5%;">
                                #
                            </th>
                        </tr>
                    </thead>

                    <tbody> <?php 

                      foreach($suggestionsMRE as $ligne){
                        if($ligne->proposeur=='personne'){ 
                          $proposeur = "شخص ذاتي";
                        } 
                        else{  
                          $proposeur = $ligne->intitule;
                          if ($proposeur=='') {
                            $proposeur = "هيئة أو جمعية";
                          }
                        }?>  
                      
                        <tr align="right" style="font-size: 13px;">
                                           
                          <td class="" align="center"><?php echo $ligne->id; ?></td> 
                          <td ><?php echo $proposeur; ?></td>  
                          <td ><?php echo $ligne->nom_ar.' '.$ligne->prenom_ar; ?></td>  
                          <td style="text-align: left !important;"><?php echo $ligne->email; ?></td> 
                          <td class="text-center hidden"><?php echo $ligne->telephone; ?></td> 
                          <td class="text-justify"><?php echo nl2br($ligne->description); ?></td> 
                          <td class="text-center"> <a href="uploads/<?php echo $ligne->piece_jointe; ?>" target="_blank"><i class="bi bi-folder-symlink" style="font-size: 20px;"></i></a></td>  

                        </tr> <?php

                      } ?>

                    </tbody>

                </table>
                </div>
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
                <p>18 15 37 37 05 (+212)</p>
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
        function vider(){
          document.getElementById('title_ar').focus();
          window.location='#add';
        }
      </script> 

    </main><!-- End #main --> <?php   
 
  }

?>