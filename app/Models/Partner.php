<?php

namespace App\Models;

use App\Observers\OperationsObserver;


class Partner extends Model
{


  public function __construct()
  {
    $this->observer(new OperationsObserver);
  }

  protected static $tableName = 'partenaires';

}