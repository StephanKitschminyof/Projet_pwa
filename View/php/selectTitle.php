<?php session_start(); 
include ("../../Controler/profilControler.php");

//récupérations des titres a afficher
$tab_titres = listeTitres($_SESSION["idEtudiant"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page titre</title>
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css" />
        
    </head>
    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <h1 id="choix">Choisissez votre titre :</h1>
        <div id="listeTitresDispo">
            <?php
                for($i = 0; $i < count($tab_titres); $i++)
                {
                    echo "<form action=\"../../Controler/saveTitre.php\" method=\"post\">";
                        echo "<input name=\"nomtitre\" type=\"hidden\" value=\"".$tab_titres[$i]."\">";
                        echo "<input type=\"submit\" value=\"".$tab_titres[$i]."\" >"; 
                    echo "</form>";
                }
            ?>
       </div>

        <?php include("./bottom_menu.php");?>

    <script type="text/javascript" src="../js/colorSelector.js"></script>
    <script>
		var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
		setColorSelectTitle(color);
	</script>
    </body>
</html>