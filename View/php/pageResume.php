<!DOCTYPE html>
<?php
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEtudiant.php");

    include ("../../Controler/pageResumeControler.php");
    include ("../../Controler/profilControler.php");
    $blocs = recupinfo();
    $prom = recuppromo();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo "Résumé " . " " . $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/styleResume.css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
</head>
<body>
    <!-- HEADER : sticky, affiche le nom et la section de l'étudiant !! A CORRIGER !!-->
	<header>
        <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
        <p id="profil-header-right"><?php echo nomPromo(); ?></p>
    </header>
    <!-- CORPS : Accordion Bootstrap ; id en fonction de l'id du bloc-->
    <!-- DOC : https://getbootstrap.com/docs/4.0/components/collapse/ -->
    <?php
        createaccordion($blocs);
    ?>

    <?php
        include("./bottom_menu.php");
    ?>
</body>
<script>
        var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
        //Changement couleur pour les paragraphes
        var p1 = document.getElementById("profil-header-left");
        var p2 = document.getElementById("profil-header-right");
        p1.style.color = color;
        p2.style.color = color;
    </script>
</html>