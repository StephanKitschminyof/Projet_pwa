<?php 
    include("../../Controler/pageEtuEController.php");
    $info = recupinfo();
    
    if(isset($_POST['valider']) and !empty($_POST['valider'])){
        $date = valideCompEtu();
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
        <link rel="stylesheet" type="text/css" href="../css/styleEtuE.css">
        <link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css">
    </head>

    <body>
        <?php
            echo "<header><h1>".$info['nom']." ".$info['prenom']."</h1></header>";
            
            echo "<h1>".$info['titre']."</h1>";
            echo "<p>".$info['description']."</p>";
            include("./bottom_menu.php");
        
            //echo '<button onclick="window.history.back()">Retour</button>';
        echo '<form method="post">';
            
            echo '<input type="button" onClick="window.history.back()" value="Retour" name="retour" />';

        if($info['valide'] == 1){//1 si le bouton valider doit apparaitre
            echo '<input class="valider" type="submit" value="Valider" name="valider" />';
        }
        
        echo '</form>';
        ?>
    </body>
</html>