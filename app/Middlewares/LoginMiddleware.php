<?php
namespace App\Middlewares;

class LoginMiddleware extends BaseMiddleware
{

    public function handle(): void
    {
        if (!auth()->check()) {
            redirect('/admin/login');
        }
    }

}