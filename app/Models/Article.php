<?php

namespace App\Models;

use App\Observers\OperationsObserver;


class Article extends Model
{


  public function __construct()
  {
    $this->observer(new OperationsObserver);
  }

  protected static $tableName = 'articles';

}