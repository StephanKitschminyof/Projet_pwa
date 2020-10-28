<?php session_start();

include_once("../../Model/script_bdd.php");

function liste_bloc(){
    $idetu = $_GET['idetu'];

    $liste_bloc = chercherBlocEtu($idetu)->fetchAll();

    echo "<ul class='accordeon'>";
    for($i=0;$i<count($liste_bloc);$i++)
    {
        echo "<li class='ac-menu'>";

        echo "<label for=".$liste_bloc[$i]['nombloc'].">".$liste_bloc[$i]['nombloc']."</label>";
        echo "<input id=".$liste_bloc[$i]['nombloc']." type='checkbox' name='menu' />";

    
        
        $liste_competance = chercherCompetencesBlocEtu($liste_bloc[$i]['idbloc'],$idetu)->fetchAll();
        if(count($liste_competance)!=0){
            echo "<ul class='sous-menu'>";
            
            for($j=0;$j<count($liste_competance);$j++)
            {
                $notif = chercherCompetanceNotif($liste_competance[$j]['idcompetances'])->fetchAll();

                echo "<li class='sous-menu-li'>";
                
                
                if(count($notif) != 0){
                    echo "<label><a href='./pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=1'>".$liste_competance[$j]['nomcomp']."</a></label>";
                    echo "<div class='notifdiv'><button class='notif'></button></div>";
                }else{
                    echo "<label class='labeld'><a href='./pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=0'>".$liste_competance[$j]['nomcomp']."</a></label>";
                }

                echo "</li>";
            }

            echo "</ul>";
        }

        echo "</li>";
    }




    echo "</ul>";
}

?>