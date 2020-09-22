<?php session_start(); 
include ("../../Controler/profilControler.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profil Etudiant</title>
        <link rel="stylesheet" href="View/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        
    </head>
    <body>
        <header>
            <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
            <p id="profil-header-right"><?php echo nomPromo(); ?></p>
        </header>

        <div>
            <div id="profil-content-centre">
                <?php 
                $impProfilLink = "../img/profil/". $_SESSION['prenom'] . "-" . $_SESSION["nom"] . ".jpg";
                echo ("<img src=".$impProfilLink." alt=\"image profil\">");?>
                <p>NIV : <?php echo niv();?></p>
                <p><?php echo xp();?> Xp</p>
            </div>
            <div id="titre-container">
                <p id="titre"><?php echo titre($_SESSION["idEtudiant"])?></p>
            </div>
        </div>



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
					<a href="menu.php" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_accueil.png" alt="icone accueil"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="#" class="liste-a">
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

    </body>
</html>