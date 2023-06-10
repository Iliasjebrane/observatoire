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

            <div class="d-flex justify-content-between align-items-center" dir="rtl" id="link-proposition">
               
              <ol>
                <li><a href="index.php">الرئيسية </a></li>
                <li>&nbsp; &nbsp; نافذة تفاعلية </li> 
              </ol>

            </div>

          </div>
        </section><!-- Breadcrumbs -->


                <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
          <div class="container">

            <?php 

              if(isset($_POST['btn_ajouter']) ){

                $proposeur = $_POST['proposeur']; 
                $intitule = $_POST['intitule']; 
                $nom_ar = $_POST['nom_ar']; 
                $prenom_ar = $_POST['prenom_ar'];
                $telephone = $_POST['telephone']; 
                $email = $_POST['email']; 
                $description = $_POST['description']; 

                $erreurExtension = false; 
                $piece_jointe = NULL;
                $max_id = 1;

                $requete = Config::selectData("SELECT MAX(id) as max_id FROM `suggestion`", NULL);

                if(!empty($requete)) { $max_id = ($requete->max_id)+1;}


                // ********* Upload file : file ************* 
                if(!empty($_FILES["piece_jointe"]["name"])){  

                  $nomFichier='PJ_'.$max_id.'-'.rand(1,10000000);
                  
                  //nom temporaire sur le serveur:
                  $nomTemporaireFichier = $_FILES["piece_jointe"]["tmp_name"];
                  //type de de ficheir choisi:
                  $typeFichier   = $_FILES["piece_jointe"]["type"];
                  //poids en octets de l'image choisi:
                  $poidsFichier  = $_FILES["piece_jointe"]["size"];
                  //code de l'erreur si jamais il y en a une:
                  $codeErreur    = $_FILES["piece_jointe"]["error"];
                  //chemin de dossier des images:
                  $chemin_certificat= "uploads/";
              
                  // type du fichier
                  $extensions = array('.pdf', '.PDF', '.docx', '.DOCX', '.jpg', '.JPG', '.jpeg', '.JPEG', '.png', '.PNG', '.rar', '.RAR', '.zip', '.ZIP');
                  $extension = strrchr($_FILES['piece_jointe']['name'], '.');
                  // taille du fichier en octets
                  $taille = filesize($_FILES['piece_jointe']['tmp_name']);
              
                  if(!in_array($extension, $extensions)){ 
                    //throw new Exception("خطأ", 1);
                    $erreurExtension=true; 
                  }
                  else if (preg_match('/.pdf/',strtolower($nomFichier.$extension))==1 || preg_match('/.docx/',strtolower($nomFichier.$extension))==1 || preg_match('/.jpg/',strtolower($nomFichier.$extension))==1 || preg_match('/.jpeg/',strtolower($nomFichier.$extension))==1 || preg_match('/.png/',strtolower($nomFichier.$extension))==1 || preg_match('/.rar/',strtolower($nomFichier.$extension))==1 || preg_match('/.zip/',strtolower($nomFichier.$extension))==1){
                    if( copy($nomTemporaireFichier,$chemin_certificat.$nomFichier.$extension))
                      $piece_jointe=addslashes($nomFichier.$extension);
                  }
                  else{ //Format de fichier incorret 
                    //throw new Exception("خطأ", 1);
                    $erreurExtension=true;
                  }
                }

                if ($erreurExtension==false) {
                
                  $query = "INSERT INTO `suggestion`(`proposeur`, `intitule`, `nom_ar`, `prenom_ar`, `telephone`, `email`, `description`, `piece_jointe`) 
                  VALUES(:proposeur, :intitule, :nom_ar, :prenom_ar, :telephone, :email, :description, :piece_jointe)";

                  $params = array(
                    'proposeur'=>$proposeur, 
                    'intitule'=>$intitule, 
                    'nom_ar'=>$nom_ar, 
                    'prenom_ar'=>$prenom_ar, 
                    'telephone'=>$telephone, 
                    'email'=>$email, 
                    'description'=>$description, 
                    'piece_jointe'=>$piece_jointe
                  );

                  $last_id = Config::insertData($query, $params);

                  if($last_id > 0){ ?>
                    
                    <div class="alert alert-success rounded-0" role="alert">
                      <i class="fas fa-check-circle"></i> - عملية حفظ المعلومات تمت بنجاح  
                      <button type="button" class="close hidden" data-dismiss="alert" aria-label="Close" onclick="window.location='index.php?page=add-suggestion'">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php
                  }
                  else{?> 
                    <div class="alert alert-warning rounded-0" role="alert">
                      <i class="fas fa-check-circle"></i>   - لم تتم عملية حفظ المعلومات بنجاح 
                      <button type="button" class="close hidden" data-dismiss="alert" aria-label="Close" onclick="window.location='index.php?page=add-suggestion'">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> <?php
                  }
                }
                else{ ?> 
                  <div class="alert alert-danger rounded-0" role="alert">
                    <i class="fas fa-check-circle"></i>  - لم تتم عملية حفظ المعلومات بنجاح 
                    <button type="button" class="close hidden" data-dismiss="alert" aria-label="Close" onclick="window.location='index.php?page=add-suggestion'">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> <?php
                }

                echo '<META http-equiv="refresh" content="5; URL=index.php?page=add-suggestion">';

                
              }
            ?>

            <div class="row gy-4"> 
              
              <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
                <div class="card rounded-0">
                  <div class="card-header py-3 text-center">
                    <h2 class="fs-6 fw-bold m-0 title-secondaire-detail">
                      <i class="bi bi-stack hidden"></i>
                       نافذة لتلقي اقتراح مشاريع تنموية   <br>
                    </h2>
                  </div>
                  <form role="form" action="" method="POST" enctype="multipart/form-data" name="addSuggestion_frm" id="addSuggestion_frm"> 

                    <div class="card-body rounded-0">
                      <div class="row">
                        <!-- title_ar -->
                        <div class="col-md-12 text-center">
                           
                          <label for="title_ar" class=" col-form-label title-secondaire-detail"> 
                            ▌&nbsp;&nbsp;معا نصنع التنمية &nbsp;▌   
                          </label> 
                          <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-9 text-justify bd-callout bd-callout-warningt card h-100 border-start-lg border-start-success">
                               يتشرف رئيس جماعة القنيطرة، أن يدعوكم للمشاركة في إعداد برنامج عمل الجماعة 2022-2027 عن طريق إرسال مقترحات مشاريع تهم تنمية مدينة القنيطرة في مختلف المجالات والقطاعات، وذلك في إطار المقاربة التشاركية التي ينهجها مجلس جماعة القنيطرة، في تدبيره للشأن العام المحلي.
                            </div>
                            <div class="col-lg-2"></div>
                          </div>  
                          <br><br>
                        </div><!-- col-md-12 --> 


                        <div class="row">

                          <div class="col-lg-1"></div>

                          <div class="col-lg-10">

                            <!-- proposeur -->
                            <div class="col-md-12"> 
                              <div class="row"> 
                                  <div class="col-lg-3"></div> 
                                  <div class="col-lg-3"> 
                                    <input class="form-check-input" type="radio" name="proposeur" id="proposeur1" value="personne" onclick="changeproposeur();" checked>&nbsp;&nbsp;
                                    <label class="form-check-label" for="proposeur1">
                                    شخص ذاتي
                                    </label>
                                  </div> 
                                  <div class="col-lg-3">  
                                    <input class="form-check-input" type="radio" name="proposeur" id="proposeur2" value="association" onclick="changeproposeur();">&nbsp;&nbsp;
                                    <label class="form-check-label" for="proposeur2">
                                    هيئة أو جمعية
                                    </label> 
                                  </div> 
                                </div>
                            </div><!-- col-md-12 --> 

                            <script type="text/javascript">
                                function changeproposeur() { 

                                  if(document.querySelector('#proposeur2').checked==true){ 
                                    document.getElementById('v_intitule').classList.remove('hidden');
                                    document.getElementById('intitule').focus();

                                  }
                                  else{
                                    document.getElementById('v_intitule').classList.add('hidden');
                                    document.getElementById('nom_ar').focus();
                                  } 
                                } 
                            </script>

                            <!-- intitule -->
                            <div class="col-md-12 mt-4 hidden" name="v_intitule" id="v_intitule">
                              <div class="form-group row">
                                <label for="intitule" class="col-md-3 col-form-label"> اسم الهيئة أو الجمعية   :</label>
                                <div class="col-md-8"> 
                                  <input type="text" class="form-control form-control-sm rounded-0" name="intitule" id="intitule" >
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 --> 

                            <!-- nom_ar -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="nom_ar" class="col-md-3 col-form-label">   الاسم العائلـــــــي <code>(*) </code>:</label>
                                <div class="col-md-8"> 
                                  <input type="text" class="form-control form-control-sm rounded-0" name="nom_ar" id="nom_ar" required>
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 -->  

                            <!-- prenom_ar -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="prenom_ar" class="col-md-3 col-form-label">   الاسم الشخصــي <code>(*) </code>:</label>
                                <div class="col-md-8"> 
                                  <input type="text" class="form-control form-control-sm rounded-0" name="prenom_ar" required>
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 -->  

                            <!-- telephone -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="telephone" class="col-md-3 col-form-label">  الهاتـف   :</label>
                                <div class="col-md-8"> 
                                  <input type="text" class="form-control form-control-sm rounded-0" name="telephone">
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 --> 

                            <!-- email -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label">   البريد الالكتروني  <code>(*) </code>:</label>
                                <div class="col-md-8"> 
                                  <input type="email" class="form-control form-control-sm rounded-0" dir="ltr" name="email" required>
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 -->  

                            <!-- description -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label">   اقتراحات المشاريع بخصوص برنامج عمل القنيطرة  <code>(*) </code>:</label>
                                <div class="col-md-8"> 
                                  <textarea class="form-control form-control-sm rounded-0" rows="10" name="description" id="description" required></textarea>
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 --> 
                            
                            <!-- piece_jointe -->
                            <div class="col-md-12 mt-4">
                              <div class="form-group row">
                                <label for="piece_jointe" class="col-md-3 col-form-label"> الوثيقة المرفقة  <span style="font-size:12px">(*)</span>:</label>
                                <div class="col-md-8"> 
                                  <input class="form-control form-control-sm rounded-0" type="file" name="piece_jointe" id="piece_jointe">
                                  <p style="font-size: 12px;">* يمكنكم إرفاق أية وثيقة (صورة، ملف إلكتروني، وثيقة مرقمة، إلخ ) لا يتجاوز حجمها 20 ميغا بايت، ويمكن للوثيقة أن تكون على شكل صورة أو بصيغة Word أو بصيغة PDF، وعلى شكل  ZIPفي حالة تعدد الوثائق.</p>
                                  <div class="invalid-feedback"> <code>   المرجو ملء  الخانة    </code> </div>
                                </div>
                              </div>
                            </div><!-- col-md-12 -->  

                          </div>

                          <div class="col-lg-1"></div>

                        </div>

                      </div>  
                    </div>

                    

                    <div class="card-footer bg-white">
                      <button type="submit" class="btn btn-success btn-sm me-1 mb-2" name="btn_ajouter" id="btn_ajouter" form="addSuggestion_frm">
                        حفظ المعلومات
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
          window.location='#link-proposition';
        }
      </script>
 
    </main><!-- End #main --> <?php  
  }

?>