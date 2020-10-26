<?php
include("../Model/script_bdd.php");

$idbloc = $_GET['idbloc'];
$bloc = chercherBlocId($idbloc)->fetch();
$liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    

if(isset($_POST['supprimer']) and !empty($_POST['supprimer'])){
    supprimerBloc($idbloc);
    header("Location: ../View/php/pageBlocE.php");
}else if(isset($_POST['modifier']) and !empty($_POST['modifier'])){
    $bloc = chercherBlocId($idbloc)->fetch();
    $liste_comp = chercherCompetencesBloc($idbloc)->fetchAll();
    echo"<h1>".$bloc['nombloc']."</h1>";
    echo '
    <form method="post" action="?idbloc='.$idbloc.'" id="f">
        <label for="titreb">Modifier le titre du bloc</label>
        <input type="text" id="titreb" name="modifTitreB" value="'.$bloc['nombloc'].'" />

        <h1>Modification des Compétances :<h1>
        <ul>';

        for($i=0;$i<count($liste_comp);$i++){
            
            echo '<li><label>'.$liste_comp[$i]['nomcomp'].'</label>';
            echo '<input type="submit" name="supprComp" value="Supprimer" />';
            echo '<ul><li><label>Titre :</label>';
            echo '<input type="text" name="titre'.$liste_comp[$i]['idcompetances'].'" value="'.$liste_comp[$i]['nomcomp'].'" />';
            echo '</li><li><label>Description :</label>';
            //echo '<input type="text" name="descr'.$liste_comp[$i]['idcompetances'].'" value="'.$liste_comp[$i]['description'].'" />';
            echo '<textarea rows="10" cols="30" form="f">'.$liste_comp[$i]['description'].'</textarea>';
            echo '</li></ul></li>';
        }

    echo    
        '</ul>
        <input type="submit" name="valider" value="Valider" />
    </form>
    ';
}
else{
    //gestion erreur
}
 ?>