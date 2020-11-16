<?php
if(empty($_SESSION))
{
    session_start();
}

include_once("../../Model/script_bdd.php");

function liste_bloc(){
    $idetu = $_GET['idetu'];

    $liste_bloc = chercherBlocEtu($idetu)->fetchAll();

    
    for($i=0;$i<count($liste_bloc);$i++)
    {
        echo '<div class="ac-menu" id="'.$liste_bloc[$i]["idbloc"].'">';

        echo "<h2>".$liste_bloc[$i]['nombloc']."</h2>";
        //echo "<input id=".$liste_bloc[$i]['nombloc']." type='checkbox' name='menu' />";

    
        
        $liste_competance = chercherCompetencesBlocEtu($liste_bloc[$i]['idbloc'],$idetu)->fetchAll();
        if(count($liste_competance)!=0){
            
            echo '<div class="liste" id="'.$liste_bloc[$i]["idbloc"].'">';
            for($j=0;$j<count($liste_competance);$j++)
            {
                $notif = chercherCompetanceNotif($liste_competance[$j]['idcompetances'])->fetchAll();

                
                
                
                if(count($notif) != 0){
                    echo "<div class='afficher'><a href='./pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=1'>".$liste_competance[$j]['nomcomp']."</a>";
                    echo "<button class='notif'></button></div>";
                }else{
                    echo "<div class='afficher'><a href='./pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=0'>".$liste_competance[$j]['nomcomp']."</a></div>";
                }

                
            }
            echo '</div>';
        }

        echo "</div>";
    }




}

?>