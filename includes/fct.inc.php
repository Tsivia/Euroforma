<?php
/**
* classe fct
*
* PHP Version 7
*
* @category  Stages
* @package   Euroforma
* @author   Beth Sefer, Seneor Tsivia

*/

/**
 * Teste si un quelconque utilisateur est connecté
 *
 * @return vrai ou faux (isset)
 */
function estConnecte()
{
    return isset($_SESSION['idUtilisateur']);// est ce qu'il ya un id dans la super global session
}
/**
 * Ajoute le libellé d'une erreur au tableau des erreurs
 *
 * @param String $msg Libellé de l'erreur
 *
 * @return null
 */
function ajouterErreur($msg)
{
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}

/**
* Enregistre dans une variable session les infos d'un visiteur
*
* @param String $idVisiteur ID du visiteur
* @param String $nom        Nom du visiteur
* @param String $prenom     Prénom du visiteur
*
* @return null
*/
function connecter($nom)
{
  $_SESSION['nom'] = $nom;
}
