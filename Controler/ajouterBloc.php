<?php
include("../Model/script_bdd.php");

//Dans le cas ou l'on recoit bien les données
if(isset($_FILES['ajouter']) AND !empty($_FILES['ajouter']['name'])) {

     //On va vérifier qu'on a bien du json en donnée
    $extensionsValides = array('json');
    $extensionFichier = strtolower(substr(strrchr($_FILES['ajouter']['name'], '.'), 1));
     if(in_array($extensionFichier, $extensionsValides)) {
          //Traitement donnée pour ajouter un nouveau bloc
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