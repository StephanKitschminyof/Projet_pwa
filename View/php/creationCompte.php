<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page de connexion</title>
        <link rel="stylesheet" type="text/css" href="../css/styleCreationCompte.css">
        <link rel = "manifest" href = "../../manifest.json">

    
    </head>
    <body>
        <h1>Création d'un compte :</h1>

        <form action="../../Controler/creeCompte.php" method="post">
            <div class="champ1">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" id="identifiant" required>
            </div>
            <div class="champ1">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
            </div>
            
            <div class="champ2">
                <input type="radio" id="etudiant" name="fonction" value="etudiant" checked/>
                <label for="etudiant">Etudiant</label>
                
                <input type="radio" id="enseignant" name="fonction" value="enseignant"/>
                <label for="enseignant">Enseignant</label>
            </div>

            <div class="champ1">
                <input type="submit" value="Valider">
            </div>
        </form>
    </body>
</html>