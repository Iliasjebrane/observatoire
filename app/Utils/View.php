<?php

namespace App\Utils;

class View
{
  private static function getPage($page, $data = null)
  {
    ob_start();
    if ($data)
      extract($data);
    include_once "view/pages/$page.php";
    $page = ob_get_clean();
    return $page;
  }
  private static function getLayout($layout)
  {
    $path = rootDir("view/layouts/$layout.php");
    if (!is_file($path)) {
      throw new \Exception("the layout '$layout' is not found");
    }
    ob_start();
    include_once $path;
    $layout = ob_get_clean();
    return $layout;
  }
  public static function make($layout = null, $page = null, $data = null)
  {

    $view = null;

    if ($page)
      $view = self::getPage($page, $data);

    if ($view && $layout) {
      $layout = self::getLayout($layout);
      $view = str_replace('#page_content', $view, $layout);
    }

    return $view;

  }
}