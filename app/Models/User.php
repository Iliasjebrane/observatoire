<?php

namespace App\Models;

use App\Observers\OperationsObserver;
use PDO;

class User extends Model
{
  protected static $tableName = 'users';

  public function __construct()
  {
    $this->observer(new OperationsObserver);
  }
  public function login(string $username, string $password): ?array
  {
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $user = $this->selectFirst(null, "email = :email", ["email" => $username]);
    } else {
      $user = $this->selectFirst(null, "username = :username", ["username" => $username]);
    }

    if (!$user)
      throw new \Exception('username or email n\'existe pas');
    if ($user['is_active'] == false) {
      throw new \Exception('Votre compte n\'est  pas actif');
    }
    // verify password 
    $verified = password_verify($password, $user['password']);
    if (!$verified)
      throw new \Exception('le mot de passe est incorrect');

    // select the role of this user
    $role = new Role();
    $role = $role->selectFirst(null, 'id=:id', ['id' => $user['role_id']]);
    $user['role'] = $role;

    return $user;
  }

  public function getUserById($id)
  {

    $user = $this->selectFirst(condition: "id = :id", conditionParams: ['id' => $id]);

    if (!$user)
      return null;

    $role = new Role();
    $role = $role->selectFirst(condition: "id = :id", conditionParams: ['id' => $user['role_id']]);

    $user['role'] = $role;

    return $user;

  }

  public function getUsers()
  {
    $usersTable = self::table();

    $rolesTable = Role::table();

    return $this->getDB()->select("
      select u.* , r.name_fr as role 
      from $usersTable u 
      inner Join $rolesTable r 
      on u.role_id = r.id 
      where u.id != 1 and u.is_deleted = false
      order by u.id DESC
    ");
  }

  public function setIsActive($id, $isActive)
  {
    return $this->getDB()->update('update users set is_active = :is_active where id = :id', ['id' => $id, "is_active" => $isActive]);
  }
}