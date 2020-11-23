<?php 
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEnseignant.php");

    include("../../Controler/pageEtuEController.php");
    $info = recupinfo();

    $page = $_GET['page'];
    
    if(isset($_POST['valider']) and !empty($_POST['valider'])){
        $date = valideCompEtu($page);
        var_dump($date);

    
    }elseif(isset($_POST['retour']) and !empty($_POST['retour'])){

        //header("Location: ./pageCompE.php?comp=".$idcomp);
        //echo "history.go(-1)";

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blocs enseignant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleEtuE.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <?php
            echo "<div class='all'><div class='header'><h1>".$info['nom']." ".$info['prenom']."</h1></div>";
            
            echo "<div class='corp'><h1>".$info['titre']."</h1>";
            echo "<p>".$info['description']."</p></div>";
            
        
            
        echo '<div class="form"><form method="post">';
            
            echo '<input type="button" onClick="document.location.href=\'./'.$page.'\'" value="Retour" name="retour" />';

        if($info['valide'] == 1){//1 si le bouton valider doit apparaitre
            echo '<input class="valider" type="submit" value="Valider" name="valider" />';
        }
        
        echo '</form></div></div>';

        include("./bottom_menu_enseignant.php");
        ?>
    </body>
</html>