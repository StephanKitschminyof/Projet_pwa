<?php 
if(empty($_SESSION))
{
    session_start();
}
include("../../Model/script_bdd.php");

function liste_bloc(){
    $liste_bloc = chercherBlocs()->fetchAll();

    echo '<div class="div">';
    echo '<form method="post" action="../../Controler/ajouterBloc.php" enctype="multipart/form-data">
    <h1 for="ajouter">Ajout d\'un bloc (fichier.json)</h2>
    <input type=file id="ajouter" name="ajouter" />
    <input type="submit" name="envoyer" value="Ajouter le bloc"> 
    </form>';
    echo '</div>';

    echo '<br><h1>Liste des blocs</h1>';

    for($i=0;$i<count($liste_bloc);$i++){
        echo '<div class="div">';

        echo ' <form method="post" action="../../Controler/modifierBloc.php?idbloc='.$liste_bloc[$i]['idbloc'].'">
        <h2>'.$liste_bloc[$i]['nombloc'].'</h2>
        <input type="submit" name="supprimer" value="Supprimer" />
        <input type="submit" name="modifier" value="Modifier" />
        </form>';
        echo '</div>';
    }

   


    
    
}

?>