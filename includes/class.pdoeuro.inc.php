<?php
/**
* classe pdo
*
* PHP Version 7
*
* @category  Stages
* @package   Euroforma
* @author   Beth Sefer, Seneor Tsivia

*/

class PdoEuro
{// declaration de variables: connecter la bdd au projet
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=euroforma';
    private static $monPdo;
    private static $monPdoEuro = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() 
    {
        PdoEuro::$monPdo = new PDO(
            PdoEuro::$serveur . ';' . PdoEuro::$bdd,
            PdoEuro::$user,
            PdoEuro::$mdp
        );
        PdoEuro::$monPdo->query('SET CHARACTER SET utf8');
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence sur un
     * objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.
     */
    public function __destruct()
    {
        PdoEuro::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
     *
     * @return l'unique objet de la classe PdoGsb
     */
    public static function getPdoEuro() 
    {
        if (PdoEuro::$monPdoEuro == null) {
            PdoEuro::$monPdoEuro = new PdoEuro();
        }
        return PdoEuro::$monPdoEuro;
    }
      /**
    * Retourne les informations d'un utilisateur
    *
    * @param String $login Login du utilisateur
    * @param String $mdp   Mot de passe du utilisateur
    *
    * @return le nom sous la forme d'un tableau associatif
    */
   public function getInfosUtilisateur($login, $mdp)
   {
       $requetePrepare = PdoGsb::$monPdo->prepare(
           'SELECT utilisateur.nom AS nom '
           . 'FROM utilisateur '
           . 'WHERE utilisateur.login = :unLogin AND utilisateur.mdp = :unMdp'
       );
       $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
       $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
       $requetePrepare->execute();
       return $requetePrepare->fetch();
   }
}

