<?php

/**
 * Classe gérant les messages du spport
 */
class Support {

   private int $_id;
   private string $_nom;
   private string $_email;
   private string $_sub;
   private string $_message;


	public function __construct(array $tab) {
	   if (!empty($tab)) {
		  $this->hydrate($tab);
       }
	}
	
	/**
	 * Hydration de l'objet en lui fournissant les données correspondant 
	 * à ses attributs
     */	 
	private function hydrate(array $tab) {
		
		foreach ($tab as $key => $value) {

        $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
       }
	}

	public function getId() {
	    return $this->_id;
	}

	public function setId($suId) {
	     $this->_id = $suId;
	}

	public function getNom() {
	    return $this->_nom;
	}

	public function setNom($suNom) {
	     $this->_nom = $suNom;
	}

	public function getEmail() {
	    return $this->_email;
	}

	public function setEmail($suEmail) {
	     $this->_email = $suEmail;
	}

	public function getSub() {
	    return $this->_sub;
	}

	public function setSub($suMsg) {
	     $this->_sub = $suMsg;
	}

	public function getMessage() {
	    return $this->_message;
	}

	public function setMessage($suMsg) {
	     $this->_message = $suMsg;
	}
	
}   
?>