<?php

class Db { 
    public static function getConnection(){
        $params_path = ROOT.'/config/db_params.php';
        $params = include($params_path);
        
        
        $dsn = "mysql:host={$params['host']}; dbname = {$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $db->exec("set names utf8");
        
        return $db;
    }
}

