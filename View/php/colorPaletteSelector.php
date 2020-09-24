<div id=paletteColor>
    <?php 
        //Création de la matrice représentant la palette de couleur 
        $matriceColor = array();
        $matriceColor[0] = array("#8F8F8F","#F6BCBC","#BCF6C2","#BCF6EB","#D0BCF6");
        $matriceColor[1] = array("#DE5C5C","#DADE5C","#92DE5C","#92DE5C","#8F36CF");
        $matriceColor[2] = array("#EB6500","#EBD900","#89EB00","#00EBE7","#D200EB");
        $matriceColor[3] = array("#FFFFFF","#0004FF","#FF00BC","#EFFF00","#18FF00");
    ?>
    <table>
        <?php
        //Affichage de la palette de couleur 
        /*
            for($i=0; $i<count($matriceColor); $i++){
                echo "<tr>";
                for($j=0; $j<count($matriceColor[$i]); $j++){
                    echo "<td>";
                    echo "<button style=\"background-color:".$matriceColor[$i][$j]."\" onClick=\"choixColor(".$matriceColor[$i][$j].")\"></button>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        */

        for($i=0; $i<count($matriceColor); $i++){
            echo "<tr>";
            for($j=0; $j<count($matriceColor[$i]); $j++){
                echo "<td>";
                    echo "<form action=\"../../Controler/saveTitle.php\" method=\"post\">";
                        echo "<input id=\"color\" name=\"color\" type=\"hidden\" value=\"".$matriceColor[$i][$j]."\">"  ;
                        echo "<input style=\"background-color:".$matriceColor[$i][$j]."\" type=\"submit\" value=\"\">";
                     echo "</form>" ;
                echo "</td>";
            }
            echo "</tr>";
        }
        ?> 
    </table>
</div>


<script type="text/javascript" src="../js/colorSelector.js"></script>