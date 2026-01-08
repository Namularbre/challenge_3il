<?php

require_once(__DIR__ . "/../metier/DBConnector.php");
/**
 * Gestionnaire de la classe Produit
 */
class ProduitDao {
	
	/** Instance de PDO pour se connecter à la BD */
	private PDO $_db;
	
	/**
	 * Connexion à la BDD
	 */
	public function __construct() {
        $this->_db = DBConnector::getInstance();
    }
     
	/**
	 * Récupération d'un produit en précisant son titre 
	 * @return $produit le produit choisie
	 */
    public function get(string $titre) {
        $rqt= $this->_db->prepare("SELECT id, titre, description, img
		                           FROM produits
								   WHERE titre= ?");	
		$rqt->bindParam(1, $titre);	
		$rqt->execute();

		if ($donnees = $rqt->fetch()) {  
		    return new Produit($donnees);
		}	
    }
	
	/**
	 * Récupération d'un produit en précisant son id
	 */
    public function getById(int $id) {
        $rqt= $this->_db->prepare("SELECT id, titre, description, img
		                           FROM produits
								   WHERE id= ?");	
		$rqt->bindParam(1, $id);	
		$rqt->execute();

		if ($donnees = $rqt->fetch()) {  
		    return new Produit($donnees);
		}	
    }
    
	
   /** 
    * Récupération de tous les produits de la bdd
    */
    public function getList(): array {
        $produits = [];
        $rqt = $this->_db->prepare('SELECT id, titre, description, img
		                           FROM produits
								   ORDER BY titre');
        $rqt->execute();

        while ($donnees = $rqt->fetch()) {
            array_push($produits, new Produit($donnees));
        }
        return $produits;
    }
	
	
 
   /**
	* Ajout d'un nouveau produit
	* @param $produit Produit le produit à ajouter
	*/
    public function add(Produit $produit) {
        $rqt = $this->_db->prepare('INSERT INTO produits(titre, description, img)
							         VALUES(?,?,?)');

		$rqt->bindValue(1, $produit->getTitre());
		$rqt->bindValue(2, $produit->getDescription());
		$rqt->bindValue(3, $produit->getImg());
		return $rqt->execute();
    }

    /**
	 * Suppression d'un produit 
	 * @param $produit Produit le produit à supprimer
	 */
    public function delete(Produit $produit) {
           $rqt = $this->_db->prepare('DELETE FROM produits WHERE titre = ?'); 
		   $rqt->bindValue(1, $produit->getTitre());
		   
		   return $rqt->execute(); 
    }
	
	/**
	 * Mise à jour des informations concernant un produit
	 */
	public function update(Produit $produit) {
        $rqt = $this->_db->prepare('UPDATE produits 
	                          SET titre = ?, description = ?, img = ?
                    	      WHERE id = ?');

		$rqt->bindValue(1, $produit->getTitre());
		$rqt->bindValue(2, $produit->getDescription());
		$rqt->bindValue(3, $produit->getImg());
		$rqt->bindValue(4, $produit->getId());


		return $rqt->execute();
    }
  
     public function setDb(PDO $db) {
        $this->_db = $db;
    }
	
}
