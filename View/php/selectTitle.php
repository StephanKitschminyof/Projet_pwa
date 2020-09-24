<?php session_start(); 
include ("../../Controler/profilControler.php");?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page titre</title>
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        
    </head>
    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <?php include("colorPaletteSelector.php");?>

    <script>
		var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
		setColorSelectTitle(color);
	</script>
    </body>
</html>