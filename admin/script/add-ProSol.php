<?php 
  require_once '../config/config.php';
  require_once '../config/functions.php'; //include_once
  $config = Config::Connect(); 
  require_once '../classes/axes.php'; 
  echo Axes::addProSol();  
?>