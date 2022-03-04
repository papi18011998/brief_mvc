<?php
if (!isset($_SESSION['utilisateur'])){
    header('location:accueil');
}