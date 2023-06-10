<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="<?= assets("/vendor/diag/diag-2/d3.v4.min.js") ?>"></script>
  <script src="<?= assets("/vendor/diag/diag-2/billboard.min.js") ?>"></script>
  <link rel="stylesheet" href="<?= assets("/vendor/diag/diag-2/billboard.min.css") ?>" />
  <link rel="stylesheet" href="<?= assets("/vendor/bootstrap/css/bootstrap.min.css") ?>" />
  <script src="<?= assets("/vendor/diag/diag-1/jquery.min.js") ?>"></script>
  <script src="<?= assets("/vendor/bootstrap/js/bootstrap.min.js") ?>"></script>
  <script src="<?= assets("/vendor/diag/diag-2/Chart.min.js") ?>"> </script>
  <link rel="stylesheet" href="<?= assets("/vendor/bootstrap-icons/bootstrap-icons.css") ?>" />
  <link rel="stylesheet" href="<?= assets("/font-awesome/css/all.min.css") ?>" />
  <link rel="stylesheet" href="<?= assets("/css/sidebar.css") ?>" />
  <link rel="stylesheet" href="<?= assets("/css/index.css") ?>" />
  <link rel="stylesheet" href="<?= assets("/css/admin/style.css") ?>" />
  <!-- datatables -->
  <link rel="stylesheet" href="<?= assets('datatables-glila/datatables.bootstrap.css') ?>">


  <script src="<?= assets('datatables-glila/datatables.jquery.js') ?>"></script>

  <script src="<?= assets('datatables-glila/datatables.bootstrap.js') ?>"></script>



  <style>
    #admin-sidebar {
      transition: left .3s;
    }

    @media (max-width:768px) {
      .admin-sidebar {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 300px;
        z-index: 1;
        bottom: 0px;
        height: 100vh;
        overflow-y: auto;
      }

      .hide-sidebar {
        left: -300px;
      }
    }
  </style>

</head>

<body>
  <div class="container-fluid bg-light bg-gradient m-0 mx-auto p-0 vh-100" style='max-width:2000px;'>
    <div class="row m-0 vh-100">
      <!-- d-none d-md-block -->
      <div class=" col-xxl-2 col-md-3 v-100 p-0  admin-sidebar hide-sidebar" style="background-color:#6B8E23"
        id="admin-sidebar">
        <?php include_once "sidebar.php" ?>
      </div>
      <div class="col-xxl-10 col-md-9 d-flex flex-column gap-2" id="admin-page-content">
        <div class='py-1 border-2 border-bottom'>
          <!-- start nav component -->
          <div class="d-flex justify-content-end">
            <button class="btn btn-secondary btn-sm bg-gradient me-auto d-block d-md-none " onclick="toggleSideBar()">
              <i class="bi bi-list"></i>
            </button>
            <form action="<?= route('admin/logout') ?>" method="post">
              <button class="btn btn-danger btn-sm bg-gradient opacity-25">
                deconexion <i class="bi bi-box-arrow-left"></i>
              </button>
            </form>
          </div>
          <!-- end nav component -->
        </div>
        <?php if (message('action_success')): ?>
          <div class="alert alert-success text-center my-1 ">
            <?= message('action_success')?>
            <i role="button" onclick="this.parentElement.remove();" class="fa-solid fa-xmark float-end"></i>
          </div>
        <?php endif; ?>
        <div>#page_content</div>
      </div>
    </div>
  </div>
</body>


</html>
<script>
  const contentPageClass = ["col-xxl-10", "col-md-9"];


  const sideBarClass = ["col-xxl-2", "col-md-3"];



  const sideBar = document.getElementById("admin-sidebar");
  const pageContent = document.getElementById("admin-page-contents");

  window.onresize = function () {
    const width = window.innerWidth;
    if (width >= 768) {
      // > md
      sideBar.classList.remove()
    } else {
      // <md
    }

  }
  function toggleSideBar() {

    const width = window.innerWidth;
    if (width >= 768) {
      // > md

    } else {
      // <md
      if (sideBar.classList.contains('hide-sidebar')) {
        sideBar.classList.remove('hide-sidebar');
      } else {
        sideBar.classList.add('hide-sidebar');
      }
    }
  }
  window.onresize();
</script>