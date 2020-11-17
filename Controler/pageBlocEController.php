<?php 
if(empty($_SESSION))
{
    session_start();
}
include_once("../../Model/script_bdd.php");

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


function liste_bloc_simple(){
    $liste_bloc = chercherBlocs()->fetchAll();
    for($i=0;$i<count($liste_bloc);$i++){
        //Si est déja assigné a l'étudiant on lui met un style plus clair
        if(estDansMenu($liste_bloc[$i]['idbloc'], $_SESSION["idEtudiant"])){
            echo "<form class=\"actif\" action=\"../../Controler/addBlocToMenu.php\" method=\"post\">";
        }
        //Sinon on met un style plus foncé
        else{
            echo "<form action=\"../../Controler/addBlocToMenu.php\" method=\"post\">";
        }
        
        echo "<input type=\"hidden\" value=\"".$liste_bloc[$i]['idbloc']."\" id=\"idbloc\" name=\"idbloc\">";
        if(estDansMenu($liste_bloc[$i]['idbloc'], $_SESSION["idEtudiant"])){
            echo "<input class=\"actif\" type=\"submit\" value=\"".$liste_bloc[$i]['nombloc']."\">";
        }
        else{
            echo "<input class=\"unactif\"  type=\"submit\" value=\"".$liste_bloc[$i]['nombloc']."\">";
        }
        echo "</form>";
    }
}



function estDansMenu($idbloc, $idEtudiant){
    $reponse = chercherBlocEtudiant($idEtudiant);
    while($donnees = $reponse->fetch()){
        if($donnees["idbloc"] == $idbloc){
            return true;
        }
    }
    return false;
}


?>