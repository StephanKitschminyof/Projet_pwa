<!DOCTYPE html> 
<?php
include ("../../Controler/pageConfigControler.php");

$tab_info = recupinfo();

if ($_POST) {
    if (isset($_POST['mdpa']) && isset($_POST['nmdp']) && isset($_POST['cmdp'])){
        $mdp = chercherMdp($_SESSION['idEtudiant'])->fetch();
        if($mdp['password'] == $_POST['mdpa']){
            if($_POST['nmdp'] == $_POST['cmdp']){
                updateMdp($mdp['idcompte'], $_POST['nmdp']);
                
            }else{
                //gestion des erreurs -> nvx mot de passe =/= confirmation 
            }
        }else{
            //gestion des erreurs -> ancien mot de passe =/= mdp base
		}
    }
}



?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo "Configuration"; ?> </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/styleConfig.css" />
	<link rel = "manifest" href = "../manifest.json">
</head>
<body>
	<?php 
		if(isset($_POST['deconnexion'])){
			header("Location: ../../index.php");
		}
	?>
	<header>
        <?php
        echo "
        <div class=\"gauche\">
            <h1>" . $tab_info['infoEtu']['nom'] . " " . $tab_info['infoEtu']['prenom'] . "</h1>
        </div>";
        
        echo "
        <div class=\"droite\">
            <h1>" . $tab_info['promo'] . "</h1>
        </div>";
		?>
	</header>

    <div>
        <form method="POST" action="<?php echo "../../Controler/changementImageProfil.php?nom=".$tab_info['infoEtu']['nom']."&prenom=".$tab_info['infoEtu']['prenom'];?>" enctype="multipart/form-data">
            <label class="label-file" for="photo-profil"><?php echo '<img class="img-profil" src="../img/profil/'.$tab_info['infoEtu']['prenom']."-".$tab_info['infoEtu']['nom'].'.jpg" alt="photo de profil" />'; ?></label>
            <input type="file" name="profil" id="photo-profil" class="photo-profil">
            <input type="submit" name="envoyer" value="Envoyer le fichier">
        </form>
    </div>
    <div><form method="post"><input type="submit" value="Déconnexion" name="deconnexion" /></form></div>

    <?php
       
    ?>
    <div  class="form">
    <form method="post">
        <label for="mdpa">Mot de passe actuel</label>
        <input class="champ" type="text" id="mdpa" name="mdpa" />

        <label for="nmdp">Nouveau mot de passe</label>
        <input class="champ" type="text" id="nmdp" name="nmdp"/>

        <label for="cmdp">Confirmation du nouveau mot de passe</label>
        <input class="champ" type="text" id="cmdp" name="cmdp"/>

        <input type="submit" name="valider" value="Valider" />

    </form>
    </div>


	<?php include("./bottom_menu.php");?>



</body>
</html>