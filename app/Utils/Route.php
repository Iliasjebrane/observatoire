<?php

namespace App\Utils;

class Route
{

  private const POST = 'post';
  private const GET = 'get';
  private const DELETE = 'delete';
  private const PUT = 'put';


  private static array $routes = [];

  private array $route;

  public function __construct()
  {
    // dd(static::$routes);
    $routes = self::$routes[request()->method()]; // all registred routes
    $uri = request()->route(); // request route

    foreach ($routes as $route) {
      $routePattern = preg_replace("/{\w*}/", "\w*", $route['name']);
      $routePattern = preg_replace("/\//", "\/", $routePattern);
      if (preg_match("/^$routePattern$/", $uri)) {
        
        $this->route = $route;
        return;
      }
    }
    die(View::make(null, 'error/404'));
  }
  private static function addRoute($method, string $route, array|callable $handler)
  {
    $route = preg_replace("/(^\/|\/$)/", "", $route, 2);
    self::$routes[$method][] = ['name' => $route, 'handler' => $handler];
  }
  public static function get($route, $handler)
  {
    self::addRoute(self::GET, $route, $handler);
  }
  public static function post($route, $handler)
  {
    self::addRoute(self::POST, $route, $handler);
  }
  public static function put($route, $handler)
  {
    self::addRoute(self::PUT, $route, $handler);
  }
  public static function delete($route, $handler)
  {
    self::addRoute(self::DELETE, $route, $handler);
  }


  public function runAction()
  {
    $handler = $this->route['handler'];

    if (is_array($handler)) {
      $handler = [new $handler[0](), $handler[1]];

      // execute the middlewares
      $middlewares = $handler[0]->getMiddlewares($handler[1]);

      /**
       * @var \App\Middlewares\BaseMiddleware $middleware
       */
      foreach ($middlewares as $middleware) {
        $middleware->handle();
      }

    }



    $params = $this->extractParams($this->route['name'], request()->route());

    return call_user_func_array($handler, $params);
  }

  private function extractParams($route, $uri)
  {

    $params = [];
    preg_match_all("/{\w+}/", $route, $matches);

    $matches = $matches[0];

    if (!count($matches)) {
      return $params;
    }

    $route_arr = explode('/', $route);
    $uri_arr = explode('/', $uri);

    for ($i = 0; $i < count($route_arr); $i++) {
      if (in_array($route_arr[$i], $matches)) {
        $params[] = $uri_arr[$i];
      }
    }

    return $params;
  }


}