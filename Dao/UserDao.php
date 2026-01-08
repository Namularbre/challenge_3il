<?php

require_once ('../metier/DBConnector.php');

/**
 * Gestionnaire de la classe user
 */
class UserDao {
	
	/** Instance de PDO pour se connecter à la BD */
	private PDO $_db;
	
	/**
	 * Connexion à la BDD
	 */
	public function __construct() {
        $this->_db = DBConnector::getInstance();
    }
     
	/**
	 * Recherche d'un utilisateur en ce basant sur le couple ident/mdp
	 */
    public function userExist(int $userId, string $userPwd): bool {

		$req = "SELECT userId FROM users WHERE userId = '$userId' and userPwd = '$userPwd'";
		$stmt = $this->_db->query($req);

		if ($donnees = $stmt->fetch()) {  
		    return true;
		}else{
			return false;
		}
    }
	
	/**
	 * Recherche de l'existance d'un id
	 */
    public function idExist(int $userId): bool {
		$req = "SELECT userId FROM users WHERE userId = '$userId'";
		$stmt = $this->_db->query($req);

		if ($donnees = $stmt->fetch()) {  
		    return true;
		}else{
			return false;
		}   
    }
    
	
   /** 
    * Récupération de tous les users de la BDD
    */
    public function getList(): array {
       $users = [];
        $rqt = $this->_db->prepare('SELECT *
		                           FROM users');
        $rqt->execute();
	
        while ($donnees = $rqt->fetch()) {
            array_push($users, new user($donnees));
        }
        return $users;
    }
	
     
	/**
	 * Ajout d'un nouvel utilisateur à la BDD
	 */
   public function add($user) {
  
		$rqt = $this->_db->prepare('INSERT INTO users(id, password)
									VALUES(?,?)');
		$rqt->bindValue(1, $user->getUserId());
		$rqt->bindValue(2, $user->getUserPwd());

    	$rqt->execute();
	}
  
    /**
	 * Modifieur sur l'instance pdo de connexion 
	 */
     public function setDb(PDO $db) {
        $this->_db = $db;
    }
	
}
