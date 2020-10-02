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
	<link rel="stylesheet" type="text/css" href="../css/styleCompetence.css" />
	<link rel="stylesheet" type="text/css" href="../css/styleBottomMenu.css" />
	<link rel = "manifest" href = "../manifest.json">
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
	if($comp['date'] != "NULL"){
		echo '<h2>'.$comp['date'].'</h2>';
	}
        	
    echo '</form>';
    ?>


	<footer>
		<?php include("./bottom_menu.php")?>
	</footer>



</body>
</html>