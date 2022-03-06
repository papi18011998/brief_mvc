<?php
session_start();
use Brief\models\Entreprise;
require '../models/Entreprise.php';
$entreprise = new Entreprise();
$_SESSION['all']=$entreprise->all_entreprises();
header('location:../entreprises/liste');