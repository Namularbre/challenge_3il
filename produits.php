<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head>
	<title>TRUC</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
		
	<!--*************** NAV ***************-->
	<?php
		require_once("view/nav.php");
	?>

    <?php
    $listeProduits = require_once("controleur/initFormListeProduits.php");
    ?>
	<main id="container">
        <?= $listeProduits ?>
	</main>

	<!--*************** PIED DE PAGE ***************-->
	<?php
		require_once("view/footer.php");
	?>

	<!--*************** SCRIPT ***************-->
</body>

</html>