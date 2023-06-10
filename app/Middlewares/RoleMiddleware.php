<?php
namespace App\Middlewares;


class RoleMiddleware extends BaseMiddleware
{

    private $roles = [];

    public function __construct(array $roles)
    {
        $this->roles = $roles;
    }
    public function handle(): void
    {

        if (!in_array(auth()->user()['role']['code'], $this->roles)) {
            // echo auth()->user()['role']['code'];
            http_response_code(401);
            echo "you dont have permission to access this resource";
            exit();
        }

    }

}