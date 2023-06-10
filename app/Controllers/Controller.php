<?php

namespace App\Controllers;

use App\Middlewares\BaseMiddleware;

abstract class Controller
{

    private array $middlewares = [];


    protected function registerMiddleware(BaseMiddleware $middleware, string|array $actions = "*"): void
    {
        if (!is_array($actions))
            $actions = [$actions];
        $this->middlewares[] = ['actions' => $actions, 'middleware' => $middleware];
    }
    public function getMiddlewares(string $action): array
    {
        $middlewares = array_filter($this->middlewares, function ($item) use ($action) {
            return in_array($action, [...$item['actions']]) || in_array("*", [...$item['actions']]);
        }) ?? [];
        return !empty($middlewares) ? array_column($middlewares, 'middleware') : [];
    }

}