<?php

namespace App\Database;

use App\Utils\Config;


class DB
{
  /**
   * @var \PDO $pdo
   */
  private $pdo;


  private static $instance = null;
  public static function getInstance()
  {
    if (self::$instance == null) {
      self::$instance = new DB();
    }
    return self::$instance;
  }

  public static function instance()
  {
    if (self::$instance == null) {
      self::$instance = new self();
    }
    return self::$instance;
  }


  public function __construct()
  {
    $config = Config::get('database');
    $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'];
    $this->pdo = new \PDO($dsn, $config['user'], $config['password']);
  }

  public function select(string $query, ?array $params = null)
  {

    $stmt = $this->pdo->prepare($query);

    $stmt->execute($params);

    return $stmt->rowCount() ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : null;
  }
  public function insert(string $query, ?array $params = null): int|bool
  {
    $stmt = $this->pdo->prepare($query);

    $stmt->execute($params);

    return $stmt->rowCount() ? $this->pdo->lastInsertId() : false;
  }
  public function update(string $query, ?array $params = null): int|bool
  {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->rowCount() ?? false;
  }

  public function delete(string $query, ?array $params = null)
  {
    $stmt = $this->pdo->prepare($query);

    $stmt->execute($params);

    return $stmt->rowCount() ?? null;
  }

  public function beginTransaction()
  {
    $this->pdo->beginTransaction();
  }
  public function commit()
  {
    $this->pdo->commit();
  }
  public function rollBack()
  {
    $this->pdo->rollBack();
  }



}