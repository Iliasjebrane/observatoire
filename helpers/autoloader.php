<?php


function my_autoload($class_name)
{
  $class_name = preg_replace('/A/', 'a', $class_name, 1) . '.php';
  if (!file_exists($class_name)) {
    echo "Internal Server Error: class not found: " . $class_name;
    return;
  }
  require_once $class_name;
}

spl_autoload_register('my_autoload');

require_once 'functions.php';