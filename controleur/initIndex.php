<?php
    require_once ('./Dao/HomeDao.php');

    $dao = new HomeDao();
    $resultats = $dao->getHome();

    foreach ($resultats as $resultat) {
        $description = "<ul class='main-list'>";
        if($resultat->getTitre() !='') {
            $description .= "<li class='main-item'><p class='titre'>".$resultat->getTitre()."</p></li>";
        }
        if($resultat->getDescription()!='' && $resultat->getImg() !=''){
            $description .= "<li class ='main-item'><ul class ='sub-list'>";

            $description .= "<li class='sub-item'><p class='texte'>".$resultat->getDescription()."</p></li>";

            $description .= "<li class='sub-item'><img class='image' src='images/".$resultat->getImg()."'></li>";

            $description .= "</ul></li>";

        }else{
            if($resultat->getDescription() !=''){
                $description .= "<li class='main-item'><p class='texte'>".$resultat->getDescription()."</p></li>";
            }
            if($resultat->getImg()!=''){
                $description .= "<li class='main-item'><img class='image' src='images/".$resultat->getImg()."'></li>";
            }
        }
        $description .="</ul>";
        echo $description;
    }

?>