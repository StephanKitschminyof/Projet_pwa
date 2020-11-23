<?php

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];

if(isset($_FILES['profil']) AND !empty($_FILES['profil']['name'])) {
    //test pour trouver si le fichier upload a bien une extension d'image
    $extensionsValides = array('jpg','png','jpeg');
    $extensionFichier = strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
       if(in_array($extensionFichier, $extensionsValides)) {
            $chemin = "../View/img/profil/" . $prenom . "-" . $nom . ".jpg";
            $image = imagecreatefromstring(file_get_contents($_FILES['profil']['tmp_name']));
            //$resultat = move_uploaded_file($_FILES['profil']['tmp_name'], $chemin);
            $resultat = imagejpeg($image,$chemin);
            if($resultat) {
                header('Location: ../View/php/pageConfig.php');
            } else {
                echo "Erreur sauvegarde";
            }
       } else {
            echo "Erreur extension";
       }
 }
 ?>