<?php

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];

if(isset($_FILES['profil']) AND !empty($_FILES['profil']['name'])) {
    $extensionsValides = array('jpg');
    $extensionFichier = strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
       if(in_array($extensionFichier, $extensionsValides)) {
            $chemin = "../View/img/profil/" . $prenom . "-" . $nom . ".".$extensionFichier;
            $resultat = move_uploaded_file($_FILES['profil']['tmp_name'], $chemin);
            
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