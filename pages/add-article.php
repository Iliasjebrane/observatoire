<?php
  
  
  $test_admin = true;

  if($test_admin==false){ 

    header('Location: index.php');

  }
  else{?>

    <main id="main"  style="margin: 0px !important; padding: 0px !important;">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs"  id="add_article" style="margin-top: 80px !important;  ">
          <div class="container"  >

            <div class="d-flex justify-content-between align-items-center" dir="rtl" id="link-article">
               
              <ol>
                <li><a href="index.php">الرئيسية </a></li>
                <li>&nbsp; &nbsp; إضافة مقال </li> 
              </ol>

            </div>

          </div>
        </section><!-- Breadcrumbs -->


                <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">

            <div class="row gy-4"> 
              
              <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                <div class="card rounded-0">
                  <div class="card-header py-3">
                    <h2 class="fs-6 fw-bold m-0 title-secondaire-detail">
                      <i class="bi bi-pencil"></i>
                      إضافة مقال
                    </h2>
                  </div>
                  <form role="form" action="" method="POST" id="addArticle_form">
                    
                    <div class="card-body rounded-0">
                      <div class="row">
                        <!-- title_ar -->
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="title_ar" class="col-md-3 col-form-label">عنوان المقال <code>(*) </code>:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="title_ar" id="title_ar" required autofocus>
                              <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                            </div>
                          </div>
                        </div><!-- col-md-12 -->

                        <!-- content_ar -->
                        <div class="col-md-12 mt-4">
                          <div class="form-group row">
                            <label for="content_ar" class="col-md-3 col-form-label">   المقال <code>(*) </code>:</label>
                            <div class="col-md-9"> 
                              <textarea class="form-control form-control-sm rounded-0" rows="10" name="content_ar" id="content_ar" required></textarea>
                              <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                            </div>
                          </div>
                        </div><!-- col-md-12 -->  

                      </div>  
                    </div>
                    <div class="card-footer bg-white">
                      <button type="submit" class="btn btn-success btn-sm me-1 mb-2" name="add_article_btn" form="addArticle_form">
                        حفظ المقال
                        <i class="bi bi-calendar-plus"></i> 
                      </button>
                      <button type="reset" class="btn btn-danger btn-sm me-1 mb-2" onclick="vider();">
                           إلغاء
                        <i class="bi bi-x-circle"></i> 
                      </button>  
                      <button type="button" class="btn btn-dark btn-sm me-1 mb-2" onclick="window.location='index.php';">
                        رجوع
                        <i class="bi bi-reply-fill"></i> 
                      </button>  
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col col-lg-12" name="messagebox" id="messagebox"></div>
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
        function vider(){
          document.getElementById('title_ar').focus();
          window.location='#link-article';
        }
      </script>
 
    </main><!-- End #main --> <?php  
  }

?>