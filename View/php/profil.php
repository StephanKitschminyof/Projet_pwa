<?php session_start(); 
include ("../../Controler/profilControler.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profil Etudiant</title>	
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
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
                <div id="Color"></div>
				<a id="linkTitle" href="selectTitle.php"><p id="titre"><?php echo titre();?></p></a>
            </div>
        </div>




        <?php include("./bottom_menu.php");?>


		<script type="text/javascript" src="../js/colorSelector.js"></script>
		<script>
			var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
			setColorProfil(color);

            //Evenement sur la div color pour en faire un bouton qui ouvre la page qui permet de changer ca couleur
            document.getElementById("Color").addEventListener('click', function(event){
                //Ouvrir la nouvelle page
                document.location.href="selectColor.php";

            })
		</script>	
    </body>
</html>