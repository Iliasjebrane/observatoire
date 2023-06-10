<?php


namespace App\Core;

use App\Utils\Config;
use App\Utils\Route;

class App
{

    public function run()
    {
        try {
            ProviderHandler::run(); // run some code to help us before handle the request
            $route = new Route();
            $result = $route->runAction();
            if (is_array($result))
                $result = json_encode($result);
            echo $result;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

}