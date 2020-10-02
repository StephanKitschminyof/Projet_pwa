<?php
session_start();
include ("../../Model/script_bdd.php");

    function recupinfo(){
        $blocs = chercherBlocEtudiant($_SESSION['idEtudiant'])->fetchAll();
        return $blocs;
    }

    function createaccordion($blocs){
        // Zone de l'accordion
        echo "<div class=\"wrap_body\">";
        echo "<div id=\"accordion\">";
        // Pour chaque bloc : 1 heading+id lié à une div .collapse+id
        foreach ( $blocs as &$value1) {
            // Heading : image + nom + pourcentage
            echo "<div id=\"heading".$value1['idbloc']."\"><a data-toggle=\"collapse\" data-target=\"#collapse".$value1['idbloc']."\" aria-expanded=\"true\" aria-controls=\"collapse".$value1['idbloc']."\"><div class=\"bloc_resume\"><div class=\"bloc_img\"><img src=\"../img/bloc/".$value1['nombloc']."-logo.png\"></div><p class=\"bloc_nom\">".$value1['nombloc']."</p><p class=\"bloc_completion\">";
            // Pour le pourcentage
            $listeCompetences = chercherCompetencesBloc($value1['idbloc'])->fetchAll();
            $listeCompetenceEtu = chercherCompetencesBlocEtu($value1['idbloc'],$_SESSION['idEtudiant'])->fetchAll();
            $pourcentageBloc = count($listeCompetenceEtu)/count($listeCompetences)*100;
            // ------------------
            echo "".$pourcentageBloc." %";
            echo "</p></div></a></div><div id=\"collapse".$value1['idbloc']."\" class=\"collapse\" aria-labelledby=\"heading".$value1['idbloc']."\" data-parent=\"#accordion\">";
            // Recherche de toutes les compétences d'un étudiant dans le bloc
            $competence = chercherCompetencesBlocEtu($value1['idbloc'],$_SESSION['idEtudiant'])->fetchAll();
            // Pour chaque compétence du bloc : création d'une div de compétence dans le .collapse
            foreach ($competence as &$value2) {
                echo "<div class=\"bloc_resume_competence debloque\"><p class=\"nom_competence\">".$value2['nomcomp']."</p><p class=\"date_acqu\">";
                if($value2['valide'] == 1 && $value2['date']=="NULL")
                {
                    echo "—"; // Si la compétence n'est pas encore validée
                }
                else
                {
                    echo "".$value2['date'].""; // Si la compétence est validée
                }
                echo "</p></div>";
            }
            echo "</div>";    
        }
        echo "</div>";
        echo "</div>";
    }

?>

