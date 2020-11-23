<?php
session_start();

include_once("../../Model/script_bdd.php");

function stats(){
    $liste_bloc = chercherBlocs()->fetchAll();

    echo "<div class='ul'><h1>Statistiques</h1>";
    
    for($i=0;$i<count($liste_bloc);$i++)
    {


        $listeCompetences = chercherCompetencesBloc($liste_bloc[$i]['idbloc'])->fetchAll();
        $etu_bloc = chercherEtuBloc($liste_bloc[$i]['idbloc'])->fetchAll();

        
       for($j=0;$j<count($etu_bloc);$j++){
            $pourcentageBloc = 0;
            $listeCompetenceEtu = chercherCompetencesBlocEtu($liste_bloc[$i]['idbloc'],$etu_bloc[$j]['idetudiant'])->fetchAll();
            if(count($listeCompetenceEtu) != 0 && count($listeCompetences) != 0){
                $pourcentageBloc = $pourcentageBloc + (count($listeCompetenceEtu)/count($listeCompetences)*100);//création du pourcentage de competances finis dans le bloc
            }
            
            
        }
        if(count($etu_bloc) != 0){
            $pourcentageBloc = $pourcentageBloc/count($etu_bloc);
        }else{
            $pourcentageBloc = 0;
        }
          


        echo '<div class="ligne">';
        echo '<img src="../img/bloc/'.$liste_bloc[$i]['nombloc'].'-logo.png" alt="logo-bloc" /><h2>'.$liste_bloc[$i]['nombloc'].'<br> Moyenne de validation : '.round($pourcentageBloc).'%<br>Nombre d\'élèves inscrits : '.count($etu_bloc).'</h2>';
        echo "</div>";
    }

    
}

?>

