<?php
include("../Model/script_bdd.php");
$nombloc = (chercherBlocId($_GET['idbloc'])->fetch())['nombloc'];
if($nombloc != $_POST['ntitre']){
    updateTitreBloc($_GET['idbloc'],$_POST['ntitre']);
}
if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
    //test pour trouver si le fichier upload a bien une extension d'image
    $extensionsValides = array('jpg','png','jpeg');
    $extensionFichier = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
       if(in_array($extensionFichier, $extensionsValides)) {
            $chemin = "../View/img/bloc/" . $nombloc . "-logo.png";
            $image = imagecreatefromstring(file_get_contents($_FILES['photo']['tmp_name']));
            //$resultat = move_uploaded_file($_FILES['profil']['tmp_name'], $chemin);
            $resultat = imagepng($image,$chemin);
            if($resultat) {
                header('Location: ../View/php/pageModifBloc.php?idbloc='.$_GET['idbloc']);
            } else {
                echo "Erreur sauvegarde";
            }
       } else {
            echo "Erreur extension";
       }
 }else{
    
    header('Location: ../View/php/pageModifBloc.php?idbloc='.$_GET['idbloc']);   
 }
 ?>