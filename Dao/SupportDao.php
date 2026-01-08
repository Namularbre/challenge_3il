<?php

require_once ('../metier/DBConnector.php');

/**
 * Gestionnaire de la classe Support
 */
class SupportDao {
	
	/** Instance de PDO pour se connecter à la BD */
	private PDO $_db;
	
	/**
	 * Connexion à la BDD
	 */
	public function __construct() {
        $this->_db = DBConnector::getInstance();
    }
     
	/**
	 * Récupération d'un message en fonction de son id

	 */
    public function get(int $id) {
		$tab = array(); 
        $rqt= $this->_db->prepare("SELECT id, nom, email, sub, message
		                           FROM Support
								   WHERE id= ?");
		$rqt->bindParam(1, $id);
		$rqt->execute();

		if ($donnees = $rqt->fetch()) {  
		    return new Support($donnees);
		}	
    }
    
	
   /** 
    * Récupération de tous les messages de la bdd
    */
    public function getList() {
        $supports = [];
        $rqt = $this->_db->prepare('SELECT id, nom, email, sub, message
		                            FROM Support');
        $rqt->execute();

        while ($donnees = $rqt->fetch()) {
            array_push($supports, new Support($donnees));
        }
        return $supports;
    }
	
	
     
   /**
	* Ajout d'un nouveau message
	*/
    public function add(Support $support) {
        $rqt = $this->_db->prepare('INSERT INTO Support(id, nom, email, sub, message)
							         VALUES(?,?,?,?)');

		$rqt->bindValue(1, $support->getNom());
		$rqt->bindValue(2, $support->getEmail());
		$rqt->bindValue(3, $support->getSub());
		$rqt->bindValue(4, $support->getMessage());

		return $rqt->execute();
    }

    /**
	 * Suppression d'un message
	 */
    public function delete(Support $support) {
           $rqt = $this->_db->prepare('DELETE FROM Support WHERE id = ?');
		   $rqt->bindValue(1, $support->getId());
		   
		   return $rqt->execute(); 
    }
	
	/**
	 * Mise à jour d'un message 
	 */
	public function update(Support $support) {
        $rqt = $this->_db->prepare('UPDATE Support 
	                          SET nom = ?, email = ?,sub = ?, message = ?
                    	      WHERE id = ?');

		$rqt->bindValue(1, $support->getNom());
		$rqt->bindValue(2, $support->getEmail());
		$rqt->bindValue(3, $support->getSub());
		$rqt->bindValue(4, $support->getMessage());
		$rqt->bindValue(5, $support->getId());

		return $rqt->execute();
    }
	
}
