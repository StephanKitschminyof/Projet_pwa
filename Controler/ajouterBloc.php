<?php
include("../Model/script_bdd.php");

if(isset($_FILES['ajouter']) AND !empty($_FILES['ajouter']['name'])) {

    $extensionsValides = array('json');
    $extensionFichier = strtolower(substr(strrchr($_FILES['ajouter']['name'], '.'), 1));
     if(in_array($extensionFichier, $extensionsValides)) {
          $data = file_get_contents($_FILES['ajouter']['tmp_name']);
          $fichier = json_decode($data); 
          $nombloc = $fichier->nombloc;
          $comp = $fichier->competences;
          $idbloc = ajouterBloc($nombloc);
            
          for($i=0; $i<count($comp);$i++){
               ajouterCompetance($comp[$i]->nom,$comp[$i]->description,$comp[$i]->xp,$idbloc);
            }
          header("Location: ../View/php/pageBlocE.php");
       } else {
            echo "Erreur extension";
       }
 }
 ?>