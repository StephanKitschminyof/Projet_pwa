<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEtudiant.php");
 
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

        <h1 id="choix">Changer votre couleur</h1>
        <div id=paletteColor>
            
            
            <?php 
                //Création de la matrice représentant la palette de couleur 
                $matriceColor = array();
                $matriceColor[0] = array("#8F8F8F","#F6BCBC","#BCF6C2","#BCF6EB","#D0BCF6");
                $matriceColor[1] = array("#DE5C5C","#DADE5C","#92DE5C","#92DE5C","#8F36CF");
                $matriceColor[2] = array("#EB6500","#EBD900","#89EB00","#00EBE7","#D200EB");
                $matriceColor[3] = array("#FFFFFF","#0004FF","#FF00BC","#EFFF00","#18FF00");
            ?>
            <table>
                <?php
                $lvl = niv(); 
                $numCase = 1; 

                
                for($i=0; $i<count($matriceColor); $i++){
                    echo "<tr>";
                    for($j=0; $j<count($matriceColor[$i]); $j++){
                        echo "<td>";
                            echo "<form action=\"../../Controler/saveColor.php\" method=\"post\">";
                                echo "<input id=\"color\" name=\"color\" type=\"hidden\" value=\"".$matriceColor[$i][$j]."\">";
                                if(($lvl/5 >= $numCase)){
                                    echo "<input style=\"background-color:".$matriceColor[$i][$j]."\" type=\"submit\" value=\"\" >"; 
                                }
                                else{
                                   //echo "<input type=\"submit\" value=\"\" disabled=\"disabled\">"; 
                                   echo "<input type=\"button\" onClick=\"Message(".($numCase*5).")\">";
                                }
                            echo "</form>" ;
                        echo "</td>";
                        $numCase++;
                    }
                    echo "</tr>";
                }
                ?> 
            </table>
        </div>


        <?php if($lvl>=100){ ?>
            <input type="color" id="colorPick" name="colorPick" value="#e66465">
        <?php } else{ ?>
            <input type="color" id="colorPick" name="colorPick" value="#e66465"  disabled="disabled">
        <?php } ?>

        <?php include("./bottom_menu.php");?>

    <script type="text/javascript" src="../js/colorSelector.js"></script>
    <script>
		var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
		setColorSelectColor(color);

        function Message(lvl){
            var msg = "Le niveau requis pour débloquer cette couleur est : " + lvl;
            alert(msg);
        }
	</script>
    </body>
</html>