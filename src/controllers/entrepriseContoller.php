<?php
session_start();
//require '../../vendor/autoload.php';
use Brief\models\Repondant;
use Brief\models\Entreprise;
use Brief\models\Fonction;
use Brief\models\Regime;
use Brief\models\Domaine;
use Brief\models\Quartier;
use Brief\models\Dispositif;
require '../models/Repondant.php';
require '../models/Dispositif.php';
require '../models/Quartier.php';
require '../models/Domaine.php';
require '../models/Fonction.php';
require '../models/Regime.php';
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
    get_dropdowns_data();
    header('location:../entreprises/ajout');
}
if (isset($_GET['update'])){
    $_SESSION['id'] =$_GET['update'];
    get_dropdowns_data();
    load_old_data();
}
//if (isset($_POST['update_organisation'])){
//    Modification de l'entreprise
    $entreprise = new Entreprise();
    $entreprise->setIdEntreprise(6);
    $entreprise->setNomEntreprise('nom_entrepris');
    $entreprise->setCoordonnees('coordonnees');
    $entreprise->setNinea('ninea_updated');
    $entreprise->setRccm('rccm_updated');
    $entreprise->setDateCreattion('1998-01-18');
    $entreprise->setPageWeb('page_web');
    $entreprise->setNombreEmploye(410);
    $entreprise->setOrganigramme(1);
    $entreprise->setCotisationsSociales(1);
    $entreprise->setContrat('prestations');
    $entreprise->setIdDomaine(4);
    $entreprise->setIdDispositif(2);
    $entreprise->setIdRegime(1);
    $entreprise->setIdQuartier(2);
    var_dump($entreprise->update_entreprise($entreprise));

//    Modifiaction du repondant
//    $repondant = new Repondant();
//    $repondant->setPrenomRepondant($_POST['prenom_repondant']);
//    $repondant->setNomRepondant($_POST['nom_repondant']);
//    $repondant->setTelephoneRepondant($_POST['telephone_repondant']);
//    $repondant->setCourriel($_POST['courriel']);
//    $repondant->setIdFonction($_POST['id_fonction']);
//    $repondant->setIdRepondant($entreprise->get_entreprise($entreprise->getIdEntreprise())['id_repondant']);
//    $repondant->update_repondant($repondant);
//    $_SESSION['all']=$entreprise->all_entreprises();
//    header('location:../entreprises/liste');
//}
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
//        Creation du repondant
        $repondant = new Repondant();
        $repondant->setPrenomRepondant($_POST['prenom_repondant']);
        $repondant->setNomRepondant($_POST['nom_repondant']);
        $repondant->setTelephoneRepondant($_POST['telephone_repondant']);
        $repondant->setCourriel($_POST['courriel']);
        $repondant->setIdFonction($_POST['id_fonction']);
        $repondant->add_repondant($repondant);
//        Creation de l'entreprise
        $entreprise = new Entreprise();
        $entreprise->setNomEntreprise($_POST['nom_entreprise']);
        $entreprise->setCoordonnees($_POST['coordonnees']);
        $entreprise->setNinea($_POST['ninea']);
        $entreprise->setRccm($_POST['rccm']);
        $entreprise->setDateCreattion($_POST['date_creation']);
        $entreprise->setPageWeb($_POST['page_web']);
        $entreprise->setNombreEmploye($_POST['nombre_emloye']);
        $entreprise->setOrganigramme($_POST['organigramme']);
        $entreprise->setCotisationsSociales(0);
        $entreprise->setContrat($_POST['contrat']);
        $entreprise->setIdRepondant($repondant->get_last_repondant()['id_repondant']);
        $entreprise->setIdDomaine($_POST['id_domaine']);
        $entreprise->setIdDispositif($_POST['id_dispositif']);
        $entreprise->setIdRegime($_POST['id_regime']);
        $entreprise->setIdQuartier($_POST['id_quartier']);
        $entreprise->setIdUtilisateur($_SESSION['user_connected']['id']);
        $entreprise->add_entreprise($entreprise);
        $_SESSION['all'] = $entreprise->all_entreprises();
        header('location:liste');
}

/**
 * Cette fonction retourne les donnees relatives aux selects pour l'ajout d'organisations
 * @return void
 */
function get_dropdowns_data(){
    $fonction = new Fonction();
    $regime = new Regime();
    $domaine = new Domaine();
    $quartier = new Quartier();
    $dispositif = new Dispositif();
    $_SESSION['dispositifs'] = $dispositif->all_dispositifs();
    $_SESSION['quartiers'] = $quartier->all_quartier();
    $_SESSION['domaines'] = $domaine->all_domaines();
    $_SESSION['regimes'] = $regime->all_regimes();
    $_SESSION['fonctions'] = $fonction->all_fonctions();
}
function load_old_data(){
    $entreprise = new Entreprise();
    $repondant  = new Repondant();
    $_SESSION['update_data']=$entreprise->get_entreprise($_GET['update']);
    $_SESSION['update_data_repodant'] = $repondant->find($_SESSION['update_data']['id_repondant']);
    header('location:../update_form');
}
