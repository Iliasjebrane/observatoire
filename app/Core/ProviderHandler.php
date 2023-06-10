<?php


namespace App\Core;
use App\Utils\Config;

class ProviderHandler{
    public static function run(){
        $providers = Config::get('app')['providers'];
        foreach ($providers as $provider) {
            $provider = new $provider();
            $provider->boot();
        }
    }
}