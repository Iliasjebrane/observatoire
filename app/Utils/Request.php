<?php

namespace App\Utils;

class Request
{
    private static $instance = null;
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private array $data;
    public function __construct()
    {
        $this->data = [];
        foreach ($_REQUEST as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            // convert empty string to null;
            $value = $value === "" ? null : $value;
            $this->data[$key] = $value;
        }
    }

    public function has($key)
    {
        return isset($this->data[$key]);
    }
    public function get(string $key)
    {
        $value = isset($this->data[$key]) ? $this->data[$key] : null;
        return $value;
    }
    public function only(array $keys)
    {
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->get($key);
        }
        return $data;
    }
    public function all()
    {
        return $this->data;
    }

    public function route()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $base_uri = preg_quote(base_uri(), '/');
        $route = preg_replace("/(^$base_uri|\/$|\/?\?.*)/", '', $request_uri, 2);
        return $route;
    }
    public function method()
    {
        return strtolower($_POST['_method'] ?? $_SERVER['REQUEST_METHOD']);
    }


    public function fileExists($name)
    {
        return isset($_FILES[$name]) && $_FILES[$name]['size'] > 0;
    }
    public function file($name)
    {
        if (!$this->fileExists($name))
            throw new \Exception("file '$name' does not exist in the request");

        return $_FILES[$name];
    }
}