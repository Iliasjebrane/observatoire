<?php


include_once rootDir('admin/config/config.php');
include_once rootDir('admin/config/functions.php');
$config = Config::Connect();
require_once rootDir('admin/classes/articles.php');
require_once rootDir('admin/classes/axes.php');
require_once rootDir('admin/classes/suggestions.php');




if (stristr($_SERVER['REQUEST_URI'], 'page') == TRUE) {
  $str_cover = 'cover';
  $link_idx = 'index.php';
} else {
  $str_cover = NULL;
  $link_idx = '#team';
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>المرصد الحضري لمدينة القنيطرة</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=assets("img/favicon.ico")?>" rel="icon">
  <link href="<?=assets("img/apple-touch-icon.png")?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=assets("vendor/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">
  <link href="<?=assets("vendor/bootstrap-icons/bootstrap-icons.css")?>" rel="stylesheet">
  <link href="<?=assets("vendor/glightbox/css/glightbox.min.css")?>" rel="stylesheet">
  <link href="<?=assets("vendor/swiper/swiper-bundle.min.css")?>" rel="stylesheet">

  <link href="<?=assets("datatables/datatables.min.css")?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=assets("css/style.css")?>" rel="stylesheet">
  <link href="<?=assets("css/style-min.css")?>" rel="stylesheet">


  <style type="text/css">


  </style>

</head>

<?php include_once 'inc/navbar.php'; ?>