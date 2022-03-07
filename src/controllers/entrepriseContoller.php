<?php
session_start();
use Brief\models\Repondant;
use Brief\models\Entreprise;
require '../models/Entreprise.php';
$entreprise = new Entreprise();
$_SESSION['all']=$entreprise->all_entreprises();
//$repodant = new Repondant();

header('location:../entreprises/liste');