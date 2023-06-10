<?php

namespace App\Middlewares;

use App\Interfaces\MiddlewareInterface;


abstract class BaseMiddleware
{

    abstract function handle(): void;

}