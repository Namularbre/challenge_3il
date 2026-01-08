<?php
// Controleur pour générer directement le HTML de la liste des produits
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/../metier/Produit.php");
require_once(__DIR__ . "/../Dao/ProduitDao.php");

$produitManager = new ProduitDao();
$produits = $produitManager->getList();

// Génération du HTML directement
$html = '';
if (!empty($produits)) {
    foreach ($produits as $produit) {
        $html .= "<ul class='main-list'>";
        $html .= "<li class='main-item'><p class='titre'>" . htmlspecialchars($produit->getTitre()) . "</p></li>";
        $html .= "<li class='main-item'><ul class='sub-list'>";
        $html .= "<li class='sub-item'><p class='texte'>" . htmlspecialchars($produit->getDescription()) . "</p></li>";
        $html .= "<li class='sub-item'><img class='image' src='images/" . htmlspecialchars($produit->getImg()) . "'></li>";
        $html .= "</ul></li></ul>";
    }
} else {
    $html .= "<p>Aucun produit disponible.</p>";
}

// On retourne le HTML pour que la vue puisse l'afficher
return $html;
