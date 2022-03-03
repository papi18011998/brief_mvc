<?php

namespace Brief\utils;

class Helper
{
    private static  $pdo;
    public static  function get_connexion(){
        if (self::$pdo==null){
            try {
                self::$pdo = new \PDO('mysql:host=127.0.0.1;dbname=brief_mvc','papi','papi');
            }catch (\PDOException $exception){
                echo 'Erreur de connexion à la base de donnee'.$exception->getMessage();
            }
        }
        return self::$pdo;
    }


}