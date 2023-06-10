<?php

namespace App\Observers;

abstract class BaseObserver
{
    abstract public function update($table_name, $action, $row_id): void;
}