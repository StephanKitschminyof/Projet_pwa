<?php session_start();
include ("../../Controler/profilControler.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Menu d'un étudiant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleMenu.css">
        <link rel = "manifest" href = "../manifest.json">
    </head>

    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <form id= "searchbox" method= "get" action= "search" autocomplete= "off">
            <input name= "q" type= "text" size= "15" placeholder= "search…"  />
            <div id="conteneur-img-recherche"><img id="button-recherche" src="../img/search-button.png" alt="test"></div>
        </form>

        <div id="box">
            <div id="dot"></div>
            <?php
                include '../../Controler/bloc.php';
                //Récupération des blocs d'un étudiant
                $tabBlocs = blocsPourUnEtudiant($_SESSION['idEtudiant']);
                $nom = $_SESSION['nom'];
            ?>

            <a id="block-0-a" href=""><img class="block" id="block-0" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-1-a" href=""><img class="block" id="block-1" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-2-a" href=""><img class="block" id="block-2" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-3-a" href=""><img class="block" id="block-3" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-4-a" href=""><img class="block" id="block-4" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-5-a" href=""><img class="block" id="block-5" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-6-a" href=""><img class="block" id="block-6" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>
            <a id="block-7-a" href=""><img class="block" id="block-7" src="../img/bloc/NonDef-logo.png" alt="Logo d'un bloc"></a>

            <script>
                
                function spinner(){
                    //Objectif modifier les 8 div pour leur donner les bonnes infos
                    nbBlocs = 0;
                    
                    for(i=indiceMenu*8; i<indiceMenu*8+8 && i<tabBlocs.length; i++)
                    {
                        idCourant = "block-" + (i%8);
                        srcCourant = "../img/bloc/" + tabBlocs[i] +"-logo.png";

                        //Modification de l'image :
                        bloc = document.getElementById(idCourant);
                        bloc.src = srcCourant;
                        bloc.style.display = "block";

                        //Modification du lien
                        link = document.getElementById("block-" + (i%8) +"-a");
                        link.href= "../php/pageBloc.php?nomBloc=" + tabBlocs[i];

                        nbBlocs++;
                    }

                    //Afficher le bouton pour ajouter plus de blocs au menu de l'étudiant
                    if(nbBlocs < 8){
                        //Récupération du dernier bloc a afficher
                        idCourant = "block-" + nbBlocs;
                        srcCourant = "../img/logo/plus-logo.png";

                        //Modification de l'image :
                        bloc = document.getElementById(idCourant);
                        bloc.src = srcCourant;
                        bloc.style.display = "block";

                        //Modification du lien
                        link = document.getElementById("block-" + nbBlocs +"-a");
                        link.href= "../php/addBlocs.php";

                        nbBlocs++;
                    }

                    //Si moins de 8 blocs sont a afficher alors on cache les autres
                    while(nbBlocs < 8)
                    {
                        idCourant = "block-" + nbBlocs;
                        bloc = document.getElementById(idCourant);
                        bloc.src = "../img/bloc/NonDef-logo.png";
                        bloc.style.display = "none";
                        nbBlocs++;
                    }
                }

                //Permet d'afficher les 8 blocs suivant
                function spinnerSuiv(){
                    if((indiceMenu+1)*8-1 < tabBlocs.length)
                    {
                        indiceMenu = indiceMenu + 1;
                        spinner();
                    }                    
                }

                //Permet d'afficher les 8 blocs précédent 
                function spinnerPrec(){
                    if(indiceMenu > 0){
                        indiceMenu = indiceMenu - 1;
                        spinner();
                    }
                }

                //Affichage des blocs 8 par 8
                var tabBlocs = <?php echo json_encode($tabBlocs)?>;

                var indiceMenu = 0; //Donne le numéro de la page de bloc a afficher
                spinner();

                //Changement de l'image de profil 
                var nom = <?php echo json_encode($_SESSION['nom'])?>;
                var prenom = <?php echo json_encode($_SESSION['prenom'])?>;
                var imgProfil = "url(\"../img/profil/"+prenom+"-"+nom+".jpg\")";
                console.log(imgProfil);
                document.getElementById("dot").style.backgroundImage = imgProfil; //TODO voir comment gérer jpg / png / ... (pour montrer au prof osef non ?)

                // SWIPE
                var w = window.screen.width;

                var firstMove;
                var lastMove;

                document.querySelector('html').addEventListener('touchstart', function (ev){
                    firstMove = ev;
                });

                document.querySelector('html').addEventListener('touchmove', function(ev) {
                    lastMove = ev;
                });

                document.querySelector('html').addEventListener('touchend', function (ev){
                    var dif = firstMove.targetTouches[0].clientX - lastMove.targetTouches[0].clientX;
                    if( dif < 0 && Math.abs(dif)>(w/3)){
                        console.log("droite");
                        spinnerPrec();
                    }else if( dif > 0 && Math.abs(dif)>(w/3)){
                        console.log("gauche");
                        spinnerSuiv();
                    }
                });
            
            </script>
        </div>

        <?php
            include("./bottom_menu.php");
        ?>

        <script type="text/javascript" src="../js/spinnerWheel.js"></script>
    </body>
	<script>
        var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
        //Changement couleur pour les paragraphes
        var Para = document.getElementsByTagName("p");
        for (var i= 0; i < Para.length; i++)
        {
        Para[i].style.color = color;
        }
    </script>
</html>