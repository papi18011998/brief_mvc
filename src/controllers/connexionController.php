<?php
session_start();
require '../utils/Helper.php';
require '../models/Utilisateur.php';
use  Brief\utils\Helper;
use Brief\models\Utilisateur;
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
            header('location:connexion');
        }else{
//            papi thiare
            $login = htmlspecialchars($_POST['login']);
            $password = sha1(htmlspecialchars($_POST['password']));
            $statement = 'SELECT * FROM `utilisateurs` WHERE `login`=? AND password = ?';
            $requete = Helper::get_connexion()->prepare($statement);
            $requete->execute([$login,$password]);
            if ($requete->rowCount()==0){
                $erreur['credentials'] = "Login ou mot de passe incorrect !!!";
                $_SESSION['erreur'] = $erreur;
                header('location:connexion');
            }

            $utilisateur = new Utilisateur();
            $utilisateur->setIdUtilisateur($requete->fetch()['id']);
            $utilisateur->setNomUtilisateur($requete->fetch()['nom_utilisateur']);
            $utilisateur->setPrenomUtilisateur($requete->fetch()['prenom_utlisateur']);
            $utilisateur->setTelephone($requete->fetch()['telephone']);

            $_SESSION['utlisateur']=[
                'id'=> $utilisateur->getIdUtilisateur(),
                'nom'=>$utilisateur->getNomUtilisateur(),
                'prenom'=>$utilisateur->getPrenomUtilisateur(),
                'telephone'=>$utilisateur->getTelephone()
            ];
//            header('location:liste');

        }


}
