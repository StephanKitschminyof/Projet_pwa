<?php
include("../../Model/script_bdd.php");

/**
 * affiche la page pour modifier un bloc
 */
function page(){ 

    $idbloc = $_GET['idbloc'];
    $bloc = chercherBlocId($idbloc)->fetch();
    $liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();   
    $bloc = chercherBlocId($idbloc)->fetch();
    $liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    
    echo "<h1>Bloc : ".$bloc['nombloc']."</h1>";
    echo '<br>';
    echo '<h1>Modification d\'un Bloc</h1>';

    echo '<div class="ajout">';
    echo '<form method="post" action="../../Controler/photoBloc.php?idbloc='.$idbloc.'" enctype="multipart/form-data">';
    echo '<div class="l"><label>Titre :</label>';
    echo '<input type="text" name="ntitre" value="'.$bloc["nombloc"].'"/>';
    echo '</div><div class="l"><label for="photo">Ajout d\'une photo de bloc</label>
            <input type=file id="photo" name="photo" />';
    echo '</div><div class="l" id="l"><input type="submit" name="ajouter" value="Modifier le bloc" /></form>';
    echo '</div></div>';



    echo '<h1>Ajouter une Compétances</h1>';
    
    echo '<div class="ajout">';
    echo '<form method="post" action="../../Controler/supprComp.php?idbloc='.$idbloc.'&idcomp=null" id="f">';
    echo '<div class="l"><label>Titre :</label>';
    echo '<input type="text" name="ntitre" />';
    echo '</div><div class="l"><label>Description :</label>';
    echo '<textarea name="nta" rows="10" cols="30" ></textarea>';
    echo '</div><div class="l"><label>Experience rapportée :</label>';
    echo '<input type="number" min="0" name="exp"/>';
    echo '</div><div class="l" id="l"><input type="submit" name="ajouter" value="Ajouter la compétence" /></form>';
    echo '</div></div>';


    

    
    echo '<h1>Modification d\'une Compétance</h1>';

        for($i=0;$i<count($liste_comp);$i++){
            echo '<div class="comp">';
            echo '<form method="post" action="../../Controler/supprComp.php?idbloc='.$idbloc.'&idcomp='.$liste_comp[$i]['idcompetances'].'" id="f">';
            echo '<div class="l" id="l"><h3>'.$liste_comp[$i]['nomcomp'].'</h3>';
            echo '<input type="submit" name="supprComp" value="Supprimer" />';
            echo '</div><div class="l"><label>Titre :</label>';
            echo '<input type="text" name="titre" value="'.$liste_comp[$i]['nomcomp'].'" />';
            echo '</div><div class="l"><label>Description :</label>';
            echo '<textarea name="ta" rows="10" cols="30" >'.$liste_comp[$i]['description'].'</textarea>';
            echo '</div><div class="l" id="l"><input type="submit" name="valider" value="Valider" /></form>';
            echo '</div></div>';
        }

    }

?>