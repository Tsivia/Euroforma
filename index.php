<?php
/**
* Classe d'accès aux données
*
* PHP Version 7
*
* @category  Stages 2eme année
* @package   Euroforma
* @author    Tsivia Seneor
* @author    Beth Sefer
*/
require_once 'includes/fct.inc.php';// reference au dossier includes page de requete
require_once 'includes/class.pdoeuro.inc.php';

session_start(); // session=variable pouvant contenir plusieurs variables de types differents(variable super global)
$pdo = PdoEuro::getPdoEuro();//appel de la methode de la classe getpdogsb
$estConnecte = estConnecte();//appel de la methode de la classe fct.inc,verifie si un client est connecté ds la session et on rentre le return de la fonction
require 'vues/v_entete.php';//logo
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
}