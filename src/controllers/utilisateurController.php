<?php
session_start();
require '../models/Utilisateur.php';
use Brief\models\Utilisateur;
function getConnexion(){
    echo"Je me pointe";
}
if (isset($_GET['get_connexion'])) {
    if (isset($_POST['submit'])) {
        $erreur = [];
        if (strlen(trim($_POST['login'])) > 15 || strlen(trim($_POST['login'])) <= 3) {
            $erreur['login'] = "Le login doit etre 4 et 15";
        }
        if (strlen(trim($_POST['password'])) > 15 || strlen(trim($_POST['password'])) <= 3) {
            $erreur['password'] = "Le mot de passe doit etre 4 et 15";
        }
        if (!empty($erreur)) {
            $_SESSION['erreur'] = $erreur;
            header('location:../connexion');
        }
        else {
//              papi thiare
                $location ='';
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $user = new Utilisateur();
                $credential = $user->login($login, sha1($password));
                if ($credential){
                    $location ='';
                }else{
                    echo "flop";
                }
//                header('location:');
       }
    }
}