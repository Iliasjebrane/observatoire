<?php

namespace App\Models;


class Operation extends Model
{
  protected static $tableName = 'operations';

  public function createOperation($action, $table_name, $row_id)
  {
    $user = auth()->user();
    Operation::insert([
      'user_id' => $user['id'],
      'user_nom_complet' => $user['nom_fr'] . ' ' . $user['prenom_fr'],
      'table_name' => $table_name,
      'row_id' => $row_id,
      'action' => $action,
    ]);
  }

  public function getOperations(string $table_name, $row_id)
  {
    return $this->select(
      condition: "table_name=:table_name and row_id=:row_id",
      conditionParams: ['table_name' => $table_name, 'row_id' => $row_id]
    );
  }
}