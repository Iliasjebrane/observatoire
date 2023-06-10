<?php 
  require_once '../config/config.php';
  require_once '../config/functions.php'; 
  $config = Config::Connect(); 
  require_once '../classes/suggestions.php'; 
  echo Suggestions::addSuggestion();  
?>