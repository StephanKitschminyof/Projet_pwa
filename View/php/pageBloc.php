<!DOCTYPE html> 
<?php
session_start();
//Redirection vers la page de connexion si pas de compte connecté
include ("../../Controler/testConnectionEtudiant.php");

include ("../../Controler/pageBlocControler.php");
include ("../../Controler/profilControler.php");

$tab_donnees = recupinfo();?>

<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo "Bloc : " . $tab_donnees["nombloc"]; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" type="text/css" href="../css/styleBloc.css" />
	<link rel = "manifest" href = "../manifest.json">
</head>
<body>
	<header>
        <p id="profil-header-left"><?php echo substr($_SESSION['prenom'], 0, 1) . "." . $_SESSION['nom']; ?></p>
        <p id="profil-header-right"><?php echo nomPromo(); ?></p>
    </header>

	<div id="entete">
		<ul class="liste-bloc">
			<li class="liste-li-b">
				<div class="icone-bloc"><img src="<?php echo '../img/bloc/'. $tab_donnees["nombloc"] .'-logo.png'; ?>" alt="icone du bloc"></div>
			</li>
			<div id="nom-pourcent">
				<?php	
					echo "<li class=\"liste-li-b2\"><h1 class='titre'>" . $tab_donnees["infoBloc"]['nombloc'] . "</h1></li>";
					echo "<li class=\"liste-li-b2\"><h1 class='pourcent'>" . $tab_donnees["pourcentageBloc"] . "%</h1></li>";

				?>
			</div>
			
			
		</ul>
	</div>


	<?php
	echo "<ul class=\"liste-comp\">";
	$palier = 0;
	/*
	while ($donnees = $listeCompetences->fetch())
	*/
	$p = $tab_donnees["nbpaliers"];
	if($p==0){
		$p = 1;
	}
	//var_dump($p);
	for($i=0;$i<$p*4;$i++)
	{
		if(in_array($tab_donnees["listeCompetences"][$i],$tab_donnees["listeCompetencesEtu"]))
		{
			
			$comp = chercherCompetenceEtu($tab_donnees["listeCompetences"][$i]['idcompetances'],$tab_donnees["idetu"])->fetch();
			if($comp['valide'] == "NULL" || $comp['valide'] == 0){
				//si non validé
				echo "<li onclick=\"location.href='pageCompetence.php?idcomp=". $comp['idcompetance'] ."&nombloc=". $tab_donnees["nombloc"] ."'\" class=\"liste-comp-li\">" . intdiv($palier,4) . "<br>" . $tab_donnees["listeCompetences"][$i]['nomcomp'] . "<br>" . $tab_donnees["listeCompetences"][$i]['expraporte'] . " XP</li>";
			}
			elseif($comp['valide'] == 1 && $comp['date']=="NULL")
			{
				//si en attente
				echo "<li onclick=\"location.href='pageCompetence.php?idcomp=". $comp['idcompetance'] ."&nombloc=". $tab_donnees["nombloc"] ."'\" class=\"liste-comp-li-att\">" . intdiv($palier,4) . "<br>" . $tab_donnees["listeCompetences"][$i]['nomcomp'] . "<br>" . $tab_donnees["listeCompetences"][$i]['expraporte'] . " XP</li>";
			
			}
			else
			{
				//si validé
				echo "<li onclick=\"location.href='pageCompetence.php?idcomp=". $comp['idcompetance'] ."&nombloc=". $tab_donnees["nombloc"] ."'\" class=\"liste-comp-li-val\">" . intdiv($palier,4) . "<br>" . $tab_donnees["listeCompetences"][$i]['nomcomp'] . "<br>" . $tab_donnees["listeCompetences"][$i]['expraporte'] . " XP</li>";
			}
		}
		else
		{
			//si non validé
			echo "<li onclick=\"location.href='pageCompetence.php?idcomp=". $tab_donnees["listeCompetences"][$i]['idcompetances'] ."&nombloc=". $tab_donnees["nombloc"] ."'\" class=\"liste-comp-li\">" . intdiv($palier,4) . "<br>" . $tab_donnees["listeCompetences"][$i]['nomcomp'] . "<br>" . $tab_donnees["listeCompetences"][$i]['expraporte'] . " XP</li>";
		}
		$palier++;
	}
	echo "</ul>"
    ?>
	

	<?php include("./bottom_menu.php");?>
	</body>
	<script>
        var color = <?php echo json_encode($_SESSION["couleurProfil"]);?>;
        //Changement couleur pour les paragraphes
        var Para = document.getElementsByTagName("p");
        for (var i= 0; i < Para.length; i++)
        {
        Para[i].style.color = color;
        }
    </script>
</html>