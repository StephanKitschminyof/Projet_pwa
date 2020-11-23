<!DOCTYPE html>
<?php
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/pageStatControler.php");

include ("../../Controler/testConnectionEnseignant.php");
?>
<html>
<head>
	<meta charset="UTF-8">
    <title>Statistiques</title>
    <link rel="manifest" href="../../manifest.json">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/styleStat.css" />
    <script src="../js/jquery.js"></script>
</head>
<body>

    <?php
        stats();
    ?>

    <?php
        include("./bottom_menu_enseignant.php");
    ?>

</body>
</html>