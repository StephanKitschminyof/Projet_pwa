<?php session_start();
include("../../Model/script_bdd.php");

function liste_bloc(){
    $liste_bloc = chercherBlocs()->fetchAll();
    for($i=0;$i<count($liste_bloc);$i++)
    {
        echo "<div class='ac-menu' id='".$liste_bloc[$i]['nombloc']."'>";

        echo "<h2>".$liste_bloc[$i]['nombloc']."</h2>";

    
        
        $liste_competance = chercherCompetencesBloc($liste_bloc[$i]['idbloc'])->fetchAll();
        if(count($liste_competance)!=0){
            echo "<div class='liste' id='".$liste_bloc[$i]['nombloc']."'>";
            
            for($j=0;$j<count($liste_competance);$j++)
            {
                $notif = chercherCompetanceNotif($liste_competance[$j]['idcompetances'])->fetchAll();

                
                
                if(count($notif) != 0){
                    echo "<div class='afficher'><a href='./pageCompE.php?comp=".$liste_competance[$j]['idcompetances']."'>".$liste_competance[$j]['nomcomp']."</a>";
                    echo "<button class='notif'></button></div>";
                }else{
                    echo "<div class='afficher'><a href='./pageCompE.php?comp=".$liste_competance[$j]['idcompetances']."'>".$liste_competance[$j]['nomcomp']."</a></div>";
                }

            }

            echo "</div>";
        }

        echo "</div>";
    }


    echo '<div class="aj"><form method="post" action="modifierBloc.php"><input type="submit" class="ajout" value="+" name="ajout" /></form></div>';
}







?>