<?php

namespace Brief\utils;

class Helper
{
    private static  $pdo;
    private static $hostname ='127.0.0.1';
    private static $dbname = 'brief_mvc';
    private static $usernane = 'papi';
    private static $password = 'papi';
    public static  function get_connexion(){
        if (self::$pdo==null){
            try {
                self::$pdo = new \PDO('mysql:host='.self::$hostname.';dbname='.self::$dbname,self::$usernane,self::$password);
            }catch (\PDOException $exception){
                echo 'Erreur de connexion à la base de donnee'.$exception->getMessage();
            }
        }
        return self::$pdo;
    }


}