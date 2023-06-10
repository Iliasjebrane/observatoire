<?php
namespace App\Middlewares;


use App\Interfaces\MiddlewareInterface;

class LogoutMiddleware extends BaseMiddleware
{

    public function handle():void
    {
        if (auth()->check()) {
            redirect('admin/dashboard');
        }
    }

}