<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>
<title>TEST GREEN IT</title>

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>	

	<!--*************** NAV ***************-->
	<?php
		require_once("view/nav.php");
	?>

	<section>
	<?php 
		include "view/slider.php";
	?>
	</section>
	<main>
	<?php
	    include "controleur/initIndex.php";
	?>
	</main>

	<!--*************** PIED DE PAGE ***************-->
	<?php
		require_once("view/footer.php");
	?>

	<!--*************** SCRIPT ***************-->
	<script type="text/javascript" src="scripts/slider.js"></script>

</body>

</html>