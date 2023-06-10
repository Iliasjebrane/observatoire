<?php

use App\Utils\Auth;
use App\Utils\Config;
use App\Utils\Message;
use App\Utils\OldFormData;
use App\Utils\Request;
use App\Utils\Session;
use App\Utils\View;
use App\Utils\ViewErrorManager;

function dd(mixed $data) // just for debuging
{
  if (is_array($data)) {
    echo json_encode($data);
  } else {
    var_dump($data);
  }
  exit();
}
function base_uri()
{
  return Config::get('router')['prefix'];
}
function assets(string $filename)
{
  $filename = preg_replace('/^\//', '', $filename);
  return base_uri() . "assets/$filename";
}
function storage(string $filename)
{
  $filename = preg_replace('/^\//', '', $filename);
  return base_uri() . "storage/$filename";
}

function rootDir($path = '')
{
  $path = preg_replace('/^\//', '', $path);
  return __DIR__ . "/../$path";
}

function session($session = "jsdfhkajsdf,jakajsd")
{
  return new Session($session);
}
function auth()
{
  return Auth::instance();
}


function route($route)
{
  $route = preg_replace('/(^\/|\/$)/', '', $route, 2);
  return base_uri() . $route;
}

function redirect(string $uri, bool $replace = false, int $code = 0)
{
  header('Location:' . route($uri), $replace, $code);
  exit();
}

function request()
{
  return Request::getInstance();
}

function old($key)
{
  return (new OldFormData)->old($key);
}

function error($key)
{
  return (new ViewErrorManager)->error($key);
}
function setErrors(array $errors)
{
  return (new ViewErrorManager)->setErrors($errors);
}

function message($key)
{
  return (new Message)->message($key);
}
function setMessage($key, $value)
{
  return (new Message)->setMessage($key, $value);
}


function view_404()
{
  die(View::make(null, 'error/404'));
}


function b_array_find($array, $callback)
{
  foreach ($array as $item) {
    if ($callback($item)) {
      return $item;
    }
  }
  return null;
}