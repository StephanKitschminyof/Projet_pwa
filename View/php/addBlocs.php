<?php
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEtudiant.php");

include ("../../Controler/profilControler.php");
include ("../../Controler/pageBlocEController.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajout de bloc pour étudiant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/styleBloc.css">
    </head>
    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <div class="listeBlocs">
            <?php liste_bloc_simple(); ?>
        </div>


        <?php
            include("./bottom_menu.php");
        ?>
    </body>
    <script type="text/javascript" src="../js/colorSelector.js"></script>
	<script>
			var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
			setColorProfil(color);
	</script>	
</html>