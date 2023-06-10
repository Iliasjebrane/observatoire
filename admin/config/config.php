<?php
/*
* class config
*/
class Config{
    // attributs
    private static $_host = "localhost";
    private static $_dbname = 'ck_obs_urbain';
    private static $_login = "root";
    private static $_pass = "";
    private static $_cnx;

    public static function Connect(){
        try{
            Config::$_cnx = new PDO('mysql:host='.Config::$_host.';dbname='.Config::$_dbname.';charset=utf8',Config::$_login,Config::$_pass);
            Config::$_cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
            die("<div class='alert alert-danger' style='direction:ltr'><span style='font-weight:bold'>Erreur :</span>".$e->getMessage()."</div>");
        }
        return Config::$_cnx;
    }
    
    public static function selectData($query,array $params = NULL){
        $cmd = Config::Connect()->prepare($query);

        if(empty($params)) $cmd->execute();
        else $cmd->execute($params);

        $cmd->setFetchMode(PDO::FETCH_OBJ);
        if($cmd->rowCount() > 0){
            return $cmd->fetch();
        }
        else return NULL;
    }

    public static function selectMultiData($query,array $params = NULL){
        $cmd = Config::Connect()->prepare($query);

        if(empty($params)) $cmd->execute();
        else $cmd->execute($params);

        $cmd->setFetchMode(PDO::FETCH_OBJ);
        return $cmd;
    }

    public static function executeData($query,array $params = NULL){
        $cmd = Config::Connect()->prepare($query);
        if(empty($params)) $cmd->execute();
        else $cmd->execute($params);
        $cmd->setFetchMode(PDO::FETCH_OBJ);
        return $cmd->rowCount();
    }

    public static function insertData($query,array $params = NULL){
        $cmd = Config::Connect()->prepare($query);

        if(empty($params)) $cmd->execute();
        else $executed = $cmd->execute($params);

        $cmd->setFetchMode(PDO::FETCH_OBJ);

        if($executed){
            return Config::$_cnx->lastInsertId();
        }
        else return 0;
    }

}

?>