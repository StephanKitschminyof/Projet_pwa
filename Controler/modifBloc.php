<?php
include("../../Model/script_bdd.php");



      
    
function page(){ 

    $idbloc = $_GET['idbloc'];
    $bloc = chercherBlocId($idbloc)->fetch();
    $liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();   
    $bloc = chercherBlocId($idbloc)->fetch();
    $liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    echo"<h1>".$bloc['nombloc']."</h1>";
    echo '<h1>Ajouter une Compétances :</h1>';
    echo '<form method="post" action="../../Controler/supprComp.php?idbloc='.$idbloc.'&idcomp=null" id="f">';
    echo '<ul><li><label class="t">Titre :</label>';
    echo '<input type="text" name="ntitre" />';
    echo '</li><li><label class="t">Description :</label>';
    echo '<textarea name="nta" rows="10" cols="30" ></textarea>';
    echo '</li>';
    echo '<li><label>Experience rapportée :</label><input type="number" min="0" name="exp"/></li>';
    echo '<li><input type="submit" name="ajouter" value="Ajouter la compétence" /></form></li></ul>';
   
    echo '<h1>Modification des Compétances :</h1>';
        echo '<ul>';

        for($i=0;$i<count($liste_comp);$i++){
            echo '<form method="post" action="../../Controler/supprComp.php?idbloc='.$idbloc.'&idcomp='.$liste_comp[$i]['idcompetances'].'" id="f">';
            echo '<li><label class="c">'.$liste_comp[$i]['nomcomp'].'</label>';
            echo '<input type="submit" name="supprComp" value="Supprimer" />';
            echo '<ul><li><label class="t">Titre :</label>';
            echo '<input type="text" name="titre" value="'.$liste_comp[$i]['nomcomp'].'" />';
            echo '</li><li><label class="t">Description :</label>';
            //echo '<input type="textarea" name="ta" value="'.$liste_comp[$i]['description'].'"';
            echo '<textarea name="ta" rows="10" cols="30" >'.$liste_comp[$i]['description'].'</textarea>';
            echo '</li></ul></li>';
            echo '<li><input type="submit" name="valider" value="Valider" /></form></li>';
        }

    echo    
        '</ul>';
    }

?>