<!DOCTYPE html> 
<?php
include ("../../Controler/pageCompetenceControler.php");

$tab_info = recupinfo();

if ($_POST) {
    if (isset($_POST['connue'])) {

		if($tab_info['dejaConnue']){
            updateConnue($tab_info['infocomp']['idcompetances'],$tab_info['idetu'],$tab_info['nombloc']);
        }else{
			insertConnue($tab_info['infocomp']['idcompetances'],$tab_info['idetu'],$tab_info['nombloc']);
        }
    } elseif (isset($_POST['valide'])) {

        if($tab_info['dejaConnue']){
            updateValide($tab_info['infocomp']['idcompetances'],$tab_info['idetu'],$tab_info['nombloc']);
        }else{
            insertValide($tab_info['infocomp']['idcompetances'],$tab_info['idetu'],$tab_info['nombloc']);
        }

    }
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo "Competances :" . $tab_info['infocomp']['nomcomp']; ?> </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>

	<header>
		<ul class="liste-bloc">
			<li class="liste-li-b">
				<div class="icone-bloc"><img src="../img/menu/icone_java.png" alt="icone du bloc"></div>
			</li>
			<?php
				echo "<li class=\"liste-li-b\"><h1 class='titre'>" . $tab_info['infoBloc']['nombloc'] . "</h1></li>";
			?>
			
		</ul>
	</header>


    <?php
        echo "<div><h1 class=\"titre-comp\">" . $tab_info['infocomp']['nomcomp'] . "</h1></div>";

        echo "<div class=\"description\">" . $tab_info['infocomp']['description'] . "</div>";
    
	echo '<form method="post">';
	if($tab_info['dejaConnue']){
		$comp = chercherCompetenceEtu($tab_info['infocomp']['idcompetances'],$tab_info['idetu'])->fetch();
		if($comp['valide']){
			echo '<input class="val" type="submit" name="valide" value="Je sais faire">';
		}else{
			echo '<input class="nonval" type="submit" name="valide" value="Je sais faire">';
		}
		if($comp['connue']){
			echo '<input class="val" type="submit" name="connue" value="Je connais">';
		}else{
			echo '<input class="nonval" type="submit" name="connue" value="Je connais">';
		}
	}else{
		echo '<input class="nonval" type="submit" name="valide" value="Je sais faire">';
		echo '<input class=nonval type="submit" name="connue" value="Je connais">';
	}
        	
    echo '</form>';
    ?>


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
					<a href="#" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_profil.png" alt="icone profil"></div>
					</a>
				</li>
				<li class="liste-li">
					<a href="#" class="liste-a">
						<div class="icone-menu"><img src="../img/menu/icone_param.jpg" alt="icone réglage"></div>
					</a>
				</li>
			</ul>
		</div>
	</footer>



</body>
</html>