<?php
session_start();
use Brief\models\Repondant;
use Brief\models\Entreprise;
require '../models/Entreprise.php';

/*00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
                                                                         CONFIGURATION DES ROUTES ET REDIRECTIONS
00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000*/
if (isset($_GET['liste'])){
    get_all();
}
if (isset($_POST['add_organisation'])) {
    add_organisations();
}
if (isset($_GET['form'])){

}
/*00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
                                                                         FONCTIONS DE TRAITEMENTS DES ENTREPRISES
00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000*/
/**
 * Cette fonction permet de renvoyer l'ensemble des entreprises
 * @return void
 */
function get_all(){
    $entreprise = new Entreprise();
    $_SESSION['all']=$entreprise->all_entreprises();
    header('location:../entreprises/liste');
}
/**
 * Cette fonction permet de creer une entreprise
 * @return void
 */
function add_organisations(){
    $entreprise = new Entreprise();
    $entreprise->setNomEntreprise('papi');
    $entreprise->setCoordonnees('coordonnees');
    $entreprise->setNinea('ninea');
    $entreprise->setRccm('rccm');
    $entreprise->setDateCreattion('2020-02-12');
    $entreprise->setPageWeb('hhtps://papi.sn');
    $entreprise->setNombreEmploye(24);
    $entreprise->setOrganigramme(0);
    $entreprise->setCotisationsSociales(0);
    $entreprise->setContrat('CDI');
    $entreprise->setIdRepondant(1);
    $entreprise->setIdDomaine(1);
    $entreprise->setIdDispositif(1);
    $entreprise->setIdRegime(1);
    $entreprise->setIdQuartier(1);
    $entreprise->setIdUtilisateur(1);
    $entreprise->add_entreprise($entreprise);
    var_dump($entreprise->add_entreprise($entreprise));
}