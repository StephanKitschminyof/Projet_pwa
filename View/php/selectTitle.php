<?php session_start(); 
include ("../../Controler/profilControler.php");

$tab_titres = listeTitres($_SESSION["idEtudiant"]);
$tab_titresLock = listeTitresLock($_SESSION["idEtudiant"]);
?>

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

       <div id="listeTitresDispo">
            <?php
                while($donnees = $tab_titres->fetch())
                {
                    echo "<form action=\"../../Controler/saveTitre.php\" method=\"post\">";
                        echo "<input name=\"idtitre\" type=\"hidden\" value=\"".$donnees["idtitre"]."\">";
                        echo "<input type=\"submit\" value=\"".$donnees["nomtitre"]."\" >"; 
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