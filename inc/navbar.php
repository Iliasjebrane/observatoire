
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" dir="ltr">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">

        <h5 class="text-white d-flex">

          <a href="#" class="twitter text-white" target=""><i class="bi bi-twitter" title="twitter"></i></a>
          &nbsp;&nbsp;
          <a href="https://www.facebook.com/communedekenitra/" class="facebook text-white" target="_blank"><i
              class="bi bi-facebook" title="facebook"></i></a> &nbsp;&nbsp;
          <a href="#" class="google text-white" target=""><i class="bi bi-google" title="gmail"></i></a> &nbsp;&nbsp;
          <a href="https://www.youtube.com/user/KenitraCommune" class="youtube text-white" target="_blank"><i
              class="bi bi-youtube" title="youtube"></i></a>

        </h5>
      </div>

      <nav id="navbar" class="navbar Arabic-NotoKufi" style="direction: rtl;">
        <ul>
          <li><a class="nav-link scrollto active Arabic-NotoKufi" href="<?php echo $link_idx; ?>">الرئيسية</a></li>
          <li class="dropdown"><a href="#"><span>عن المرصد</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="index.php?page=articles&id=1">المرصد الحضري</a></li>
              <li><a href="#">الهيكل التنظيمي</a></li>
              <li><a href="#introduction">مدينة القنيطرة</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="index.php?page=articles">أخبار المرصد</a></li>
          <li><a class="nav-link scrollto" href="#">شركاء المرصد</a></li>
         
         
        
          <li><a class="nav-link scrollto" href="#contact">تواصل معنا</a></li>
          <li><a class="nav-link scrollto" href="<?= route('/admin/login') ?>">تسجيل الدخول</a></li>
          <li class="dropdown"><a href="#"><span>المزيد</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="nav-link scrollto" href="#indications">المؤشرات</a></li>
            <li><a class="nav-link scrollto" href="#rapports">التقارير</a></li>
            <li><a class="nav-link scrollto" href="index.php?page=add-suggestion"> نافذة تفاعلية </a></li>
             <li><a class="nav-link scrollto" href="index.php?page=articles">برنامج عمل الجماعة </a></li>
          </li>

</ul>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Call To Action Section ======= -->
  <?php

  $pages = array('content.php', 'lolo');
  //if(in_array($page, $pages)) 
  ?>
  <section id="team" class="team <?php echo $str_cover; ?>">
    <div class="container mt-4">
      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="<?= assets("img/kenitra.png") ?>">
        </div>

        <div class="col-lg-6 order-1 order-lg-2">
          <div class="searchbar" style="width: 50%;">
            <div class="input-group ">
              <input type="search" class="form-control rounded  form-control-sm" placeholder="البحث..."
                aria-label="Search" aria-describedby="search-addon" />
              <a href="#" class="btn btn-outline-success btn-sm"><i class="bi bi-search"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Call To Action Section -->