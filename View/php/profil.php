<?php session_start(); 
include ("../../Controler/profilControler.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profil Etudiant</title>	
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css" />
        <link rel = "manifest" href = "../manifest.json">
    </head>
    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <div>
            <div id="profil-content-centre">
                <?php 
                $impProfilLink = "../img/profil/". $_SESSION['prenom'] . "-" . $_SESSION["nom"] . ".jpg";
                echo ("<a href='pageConfig.php'><img id=\"imgProfil\" src=".$impProfilLink." alt=\"image profil\"></a>");?>
                <p>NIV : <?php echo niv();?></p>
                <p><?php echo xp();?> Xp</p>
            </div>
            <div id="titre-container">
				<a href="selectTitle.php"><p id="titre"><?php echo titre($_SESSION["idEtudiant"])?></p></a>
            </div>
        </div>




        <?php include("./bottom_menu.php");?>


		<script type="text/javascript" src="../js/colorSelector.js"></script>
		<script>
			var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
			setColorProfil(color);
		</script>	
    </body>
</html>