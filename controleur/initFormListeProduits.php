<?php
session_start();
require("../metier/Produit.php");
require("../Dao/ProduitDao.php");


// Création du manager permettant les actions en BDD
$produitManager = new ProduitDao();

$produits = $produitManager->getList();



for ($i = 0; $i < count($produits); $i++) {
	
	$produit = "<ul class='main-list'>";
	$produit .= "<li class='main-item'><p class='titre'>".$produits[$i]->getTitre()."</p></li>";
	$produit .= "<li class ='main-item'><ul class ='sub-list'>";
	$produit .= "<li class='sub-item'><p class='texte'>".$produits[$i]->getDescription()."</p></li>";
	$produit .= "<li class='sub-item'><img class='image' src='images/".$produits[$i]->getImg()."'></li>";		
	$produit .= "</ul></li></ul>";
	echo $produit;
}



?>