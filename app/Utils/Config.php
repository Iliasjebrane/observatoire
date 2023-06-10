<?php



namespace App\Utils;

class Config
{
    public static function get($configFileName)
    {
        return require rootDir("config/$configFileName.php");
    }
}