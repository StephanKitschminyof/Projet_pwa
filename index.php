<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page de connexion</title>
        <link rel="stylesheet" href="View/css/bootstrap.min.css">
        <link rel="stylesheet" href="View/css/styleConnexion.css">
        
    </head>
    <body>
        <h1>NOM DE L'APP</h1>
        <form action="Controler/connexion.php" method="post">
            <div class="champ">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" id="identifiant" required>
            </div>
            <div class="champ">
                <label for="mdp">Mot de passe</label>
                <input type="text" name="mdp" id="mdp" required>
            </div>
            <div class="champ">
                <input type="submit" value="Valider">
            </div>
        </form>
    </body>
</html>