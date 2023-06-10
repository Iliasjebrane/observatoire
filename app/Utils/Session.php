<?php

namespace App\Utils;

class Session
{
  private $sessionKey;
  public function __construct(string $session)
  {
    $this->sessionKey = $session;
  }
  public function put(string $key, mixed $data)
  {
    $session = $this->getSession();
    $session[$key] = $data;
    $this->setSession($session);
  }

  public function get(string $key, mixed $default = null)
  {
    return isset($this->getSession()[$key]) ? $this->getSession()[$key] : $default;
  }

  public function forget(string $key)
  {
    $session = $this->getSession();
    if (isset($session[$key]))
      unset($session[$key]);
    $this->setSession($session);
  }


  public function pull($key)
  {
    $data = $this->get($key);
    $this->forget($key);
    return $data;
  }

  public function has($key)
  {
    return isset($this->getSession()[$key]);
  }

  private function setSession($data)
  {
    $_SESSION[$this->sessionKey] = serialize($data);
  }
  private function getSession()
  {
    return isset($_SESSION[$this->sessionKey]) ? unserialize($_SESSION[$this->sessionKey]) : null;
  }
}