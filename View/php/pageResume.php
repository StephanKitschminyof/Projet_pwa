<!DOCTYPE html>
<?php
    include ("../../Controler/pageResumeControler.php");
    $blocs = recupinfo();
    $prom = recuppromo();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo "Résumé " . " " . $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/styleResume.css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
</head>
<body>
    <!-- HEADER : sticky, affiche le nom et la section de l'étudiant !! A CORRIGER !!-->
	<header>
        <div class="super_header">
            <div class="header_bloc or">
                <?php 
                    echo "<p class=\"nom_etu\">".$_SESSION['nom']." ".$_SESSION['prenom']."</p>";
                    echo "<p class=\"section\">".$prom['nom']."</p>";
                ?>
            </div>
        </div>
    </header>
    <!-- CORPS : Accordion Bootstrap ; id en fonction de l'id du bloc-->
    <!-- DOC : https://getbootstrap.com/docs/4.0/components/collapse/ -->
    <?php
        createaccordion($blocs);
    ?>
</body>
</html>