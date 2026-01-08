<?php

require_once ('./metier/DBConnector.php');
require_once ('./metier/Home.php');

class HomeDao {
    private PDO $_db;

    public function __construct() {
        $this->_db = DBConnector::getInstance();
    }

    /**
     * @return Home[]
     */
    public function getHome(): array {
        $homes = [];

        $requete = $this->_db->prepare('SELECT home.titre, home.description, home.img FROM home');

        $requete->execute();

        while ($donnee = $requete->fetch()) {
            array_push($homes, new Home($donnee));
        }

        return $homes;
    }
}