<?php
include '../../Model/script_bdd.php';

function affiche_bloc(){
    $liste_promo = chercherPromo()->fetchAll();
    echo '<label for="fp">Filtre :</label>
    <select name="filtreP" id="fp" onchange="updated(this)">
    <option value="all">Général</option>';

    for($i=0;$i<count($liste_promo);$i++)
    {
        echo '<option value="'.$liste_promo[$i]["idpromo"].'">'.$liste_promo[$i]["nom"].'</option>';
    }

    echo '</select>';

echo '<h1>Classement</h1>';
echo '<h2>(Position - Nom - Pourcentage validé)</h2>';
    $liste_bloc = chercherBlocs()->fetchAll();
    for($i=0;$i<count($liste_bloc);$i++)
    {
        echo '<div class="ac-menu" id="'.$liste_bloc[$i]["idbloc"].'">';

        echo '<h2 id="'.$liste_bloc[$i]["idbloc"].'">'.$liste_bloc[$i]["nombloc"].'</h2>';
        echo '<div class="liste" id="'.$liste_bloc[$i]["idbloc"].'">';

        $tab = array();
        //recup tous les etu du bloc (nom prenom filiere %par raport au bloc)
        $liste_etu_bloc = chercherEtuBloc($liste_bloc[$i]['idbloc'])->fetchAll();
        if(count($liste_etu_bloc)>0){
            for($j=0;$j<count($liste_etu_bloc);$j++){
                $resultat = chercherClEtu($liste_etu_bloc[$j]["idetudiant"],$liste_bloc[$i]['idbloc'])->fetch();
                $pourcent = $resultat["COUNT(idetu)"]/$liste_etu_bloc[$j]["nombrecomp"]*100;
                $tab[$j+1] = array("nom" => $resultat["nom"],"prenom" => $resultat["prenom"],"pourcent" => intval($pourcent),"promo" => $resultat["idpromo"]);
            }
            
            
            usort($tab, function($a, $b) {
                return $a['pourcent'] <=> $b['pourcent'];
            });
    
            
            for($j=count($tab)-1;$j>=0;$j--){
                echo '<p id="'.$tab[$j]["promo"].'" class="afficher">'.(count($tab)-$j).' - '.$tab[$j]["nom"].' '.$tab[$j]["prenom"].' - '.$tab[$j]["pourcent"].'%</p>';
            }
        }else{
            echo '<p id="null" class="afficher">Il n\'y a pas d\'étudiant dans ce bloc</p>';
        }
        
        echo '</div>';

        echo "</div>";
    }




}



?>