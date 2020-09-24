<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Menu d'un étudiant</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/styleMenu.css">
    </head>

    <body>
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
                    if((indiceMenu+1)*8 < tabBlocs.length)
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
            
            </script>
        </div>

        <button id="prec" onClick="spinnerPrec()">Précedent</button>
        <button id="suiv" onClick="spinnerSuiv()">Suivant</button>

        <footer>
		<div class="menu-bar">
			<ul class="liste-menu">
				<li class="liste-li">
					<a href="#" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_podium.jpg" alt="icone classement"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="#" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_trophes.png" alt="icone trophés"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="#" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_accueil.png" alt="icone accueil"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="profil.php" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_profil.png" alt="icone profil"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="pageConfig.php" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_param.jpg" alt="icone réglage"></div>
					</a>
				</li>
			</ul>
		</div>
	</footer>
        



        <script type="text/javascript" src="../js/spinnerWheel.js"></script>
    </body>
</html>