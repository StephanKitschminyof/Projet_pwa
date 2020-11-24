<?php
if(empty($_SESSION))
{
    session_start();
}

include_once("../../Model/script_bdd.php");

function liste_bloc(){
    $idetu = $_GET['idetu'];

    $liste_bloc = chercherBlocEtu($idetu)->fetchAll();
    $etu = chercherEtudiantParId($idetu)->fetch();
    
    echo "<div class='ul'><div class='dtitre'><p>Élève : ".$etu['nom']." ".$etu['prenom']."<br><br>Liste des blocs</p></div>";
    
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
                $notif = chercherCompetanceNotif($liste_competance[$j]['idcompetances'],$idetu)->fetchAll();

                
                $url = "pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=1";
                $urln = "pageEtuE.php?idetu=".$idetu."&idcomp=".$liste_competance[$j]['idcompetances']."&valide=0";
                $back = "&page=pageEleveBloc.php?idetu=".$idetu."_idpromo=".$_GET['idpromo']."_nompromo=".$_GET['nompromo']."'>".$liste_competance[$j]['nomcomp'];
                if(count($notif) != 0){
                    echo "<div class='afficher' id='notif'><a href='./".$url.$back."</a></div>";
                }else{
                    echo "<div class='afficher'><a href='./".$urln.$back."</a></div>";
                }

                
            }
            echo '</div>';
            echo "</div>";
        }

        echo "</div>";
    }




}

?>