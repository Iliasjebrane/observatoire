<?php

namespace App\Utils;

use App\Models\User;


class Auth
{

  private static $instance;
  public static function instance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  private $user;

  private $session;
  public function __construct()
  {
    $sessionKey = "auth_kjhsdfhasjdas_ohasdkgfg askjfhlksajdgfjags23098740981203-4-2';];w][er;w";

    $this->session = session($sessionKey);


    $user_id = $this->session->get("user_id", null);


    if (!$user_id) {
      $this->user = null;
      return;
    }

    $userModel = new User();

    $user = $userModel->getUserById($user_id);

    if ($user && !$user['is_active'])
      $user = null;

    $this->user = $user;
  }

  public function login(string|int $user_id)
  {
    $this->session->put('user_id', $user_id);
  }
  public function user()
  {
    return $this->user;
  }

  public function check()
  {
    return $this->user !== null;
  }

  public function logout()
  {
    /**
     * @var session Session
     */
    $this->session->forget('user_id');
  }
}