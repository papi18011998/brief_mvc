<?php
session_start();
require '../utils/Helper.php';
use  Brief\utils\Helper;

if (isset($_POST['submit'])){
        $erreur = [];
        if (strlen(trim($_POST['login'])) > 15 ||strlen(trim($_POST['login'])) <= 3 ){
            $erreur['login']="Le login doit etre 4 et 15";
        }
        if (strlen(trim($_POST['password'])) > 15 ||strlen(trim($_POST['password'])) <= 3 ){
            $erreur['password']="Le login doit etre 4 et 15";
        }
        if(!empty($erreur)){
            $_SESSION['erreur'] = $erreur;
        }else{
//            papi thiare
            $login = htmlspecialchars($_POST['login']);
            $password = sha1(htmlspecialchars($_POST['password']));
            $statement = 'SELECT * FROM `utilisateurs` WHERE `login`=? AND password = ?';
            $requete = Helper::get_connexion()->prepare($statement);
            $requete->execute([$login,$password]);
            header('location:liste');
        }


}
