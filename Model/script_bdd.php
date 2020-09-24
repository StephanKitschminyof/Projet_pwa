<?php
//ATTENTION ce fichier est le Model dans MVC et pas le controller il permet d'accéder a la bdd mais il ne traite pas les informations de la bdd !

//Connection a la bdd (sous wamp) TODO A modifier
try{
	$bdd = new PDO('mysql:host=localhost; dbname=applimobile; charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

/*
* PARTIE RECHERCHE (SELECT)
*/

//Récupérer l'id d'un compte et s'il est enseignant ou non
function chercherCompte($login, $password)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM compte WHERE login = \'' . $login . '\' AND password = \'' . $password . '\'');
	return $reponse;
}

//Rechercher un bloc
function chercherBloc($nombloc)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM bloc WHERE nombloc = \'' . $nombloc . '\'');
	return $reponse;
}

//Rechercher une promo par nom
function chercherPromoParNom($nom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM promo WHERE nom = \'' . $nom . '\'');
	return $reponse;
}

//Rechercher une promo par id
function chercherPromoParId($idpromo)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM promo WHERE idpromo = \'' . $idpromo . '\'');
	return $reponse;
}

//Recherche étudiant par idCompte
function chercherEtudiantParIdcompte($idCompte)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM etudiant WHERE compte = \'' .$idCompte.'\'');
	return $reponse;
}

//Rechercher un étudiant par son nom et prenom
function chercherEtudiantParNomEtPrenom($nom, $prenom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM etudiant WHERE nom = \'' . $nom . '\' AND prenom = \'' .$prenom. '\'');
	return $reponse;
}

//Rechercher un étudiant par son nom uniquement
function chercherEtudiantParNom($nom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM etudiant WHERE nom = \'' . $nom . '\'');
	return $reponse;
}

//Rechercher un étudiant par son prénom uniquement
function chercherEtudiantParPrenom($prenom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM etudiant WHERE prenom = \'' . $prenom . '\'');
	return $reponse;
}

//Rechercher un étudiant par son id uniquement
function chercherEtudiantParId($idetu)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM etudiant WHERE idetudiant = \'' . $idetu . '\'');
	return $reponse;
}

//Recherche enseignat par idCompte
function chercherEnseignantParIdcompte($idCompte)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM enseignant WHERE compte = \'' .$idCompte.'\'');
	return $reponse;
}

//Rechercher un enseignant par son nom et prenom
function chercherEnseignantParNomEtPrenom($nom, $prenom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM enseignant WHERE nom = \'' . $nom . '\' AND prenom = \'' .$prenom. '\'');
	return $reponse;
}

//Rechercher un enseignant par son nom uniquement
function chercherEnseignantParNom($nom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM enseignant WHERE nom = \'' . $nom . '\'');
	return $reponse;
}

//Rechercher un étudiant par son prénom uniquement
function chercherEnseignantParPrenom($prenom)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM enseignant WHERE prenom = \'' . $prenom . '\'');
	return $reponse;
}

//Chercher les blocs d'un étudiant TODO
function chercherBlocEtudiant($idEtudiant)
{
	global $bdd;
	$reponse = $bdd->query('SELECT bloc.idbloc, bloc.nombloc FROM etudiantbloc INNER JOIN etudiant ON etudiantbloc.idEtudiant = etudiant.idetudiant INNER JOIN bloc ON etudiantbloc.idBloc = bloc.idbloc WHERE etudiant.idetudiant = 1');
	return $reponse;
}


//Chercher les compétences d'un bloc d'un étudiant TODO



//Chercher competences d'un bloc
function chercherCompetencesBloc($idbloc)
{
	global $bdd;
	$reponse = $bdd->query('SELECT * FROM competances WHERE idbloc = \'' . $idbloc . '\'');
	return $reponse;
}

//Chercher les compétences d'un bloc d'un étudiant
 
function chercherCompetencesBlocEtu($idbloc,$idetu)
{
	global $bdd;
	$comp = $bdd->query('SELECT idcompetance FROM competanceetu WHERE idetu = \'' . $idetu . '\'');
	$compstr = "(";
	while($d = $comp->fetch()){
		$compstr = $compstr . $d['idcompetance'] . ",";
	}
	$compstr = substr($compstr,0,-1) . ")";			
				
	$resultat = $bdd->query('SELECT * FROM competances WHERE idcompetances IN ' . $compstr . ' AND idbloc = \'' . $idbloc . '\'');
				
	return $resultat;
}

//Chercher les competances de l'etudiant
function chercherCompetenceEtu($idcomp,$idetu)
{
	global $bdd;
	$resultat = $bdd->query('SELECT * FROM competanceetu WHERE idetu = \'' . $idetu . '\' AND idcompetance =\'' . $idcomp . '\'');
	
	return $resultat;
}

//chercher une compétance
function chercherCompetence($idcomp)
{
	global $bdd;
	$resultat = $bdd->query('SELECT * FROM competances WHERE idcompetances = \'' . $idcomp . '\'');
	
	return $resultat;
}

//chercher tous les blocs
function chercherBlocs()
{
	global $bdd;
	$resultat = $bdd->query('SELECT * FROM bloc');
	
	return $resultat;
}

//chercher les competances qui doivent êtres validé
function chercherCompetanceNotif($idcomp)
{
	global $bdd;

	$resultat = $bdd->query('SELECT * FROM competanceetu WHERE idcompetance=\''.$idcomp.'\' AND date=\'NULL\' AND valide=1');
	
	return $resultat;
}

//chercher etudiants qui doivent valider la competence idcomp
function chercherEtudiantParCompetence($idcomp)
{
	global $bdd;

	$res = $bdd->query('SELECT * FROM competanceetu WHERE idcompetance=\''.$idcomp.'\' AND date=\'NULL\' AND valide=1');
	
	$r = $bdd->query('SELECT * FROM competanceetu WHERE idcompetance=\''.$idcomp.'\' AND date=\'NULL\' AND valide=1')->fetch();
	$compstr = "(";
	if($r == false){
		$compstr = $compstr .  "'null',";

	}
	while($d = $res->fetch()){
		$compstr = $compstr . $d['idetu'] . ",";
	}
	$compstr = substr($compstr,0,-1) . ")";			
				
	$resultat = $bdd->query('SELECT * FROM etudiant WHERE idetudiant IN ' . $compstr);
				
	return $resultat;
}

function chercherEtudiantComp($idcomp){
	global $bdd;

	$res = $bdd->query('SELECT idetu FROM competanceetu WHERE idcompetance=\''.$idcomp.'\' AND (valide=0 OR date!=\'NULL\')' );
	
	$compstr = "(";
	$r = $bdd->query('SELECT idetu FROM competanceetu WHERE idcompetance=\''.$idcomp.'\' AND (valide=0 OR date!=\'NULL\')' )->fetch();
	$compstr = "(";
	if($r == false){
		$compstr = $compstr .  "'null',";

	}
	while($d = $res->fetch()){
		$compstr = $compstr . $d['idetu'] . ",";
	}
	$compstr = substr($compstr,0,-1) . ")";	

	
	
	$resultat = $bdd->query('SELECT * FROM etudiant WHERE idetudiant IN ' . $compstr);
	
	return $resultat;
}

/*
* PARTIE AJOUTER (INSERT)
*/

//Ajouter un etudiant
function ajouterEtudiant($nom, $prenom, $exp, $idpromo, $compte)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, exp, idpromo, compte) VALUES(:nom, :prenom, :exp, :idpromo, :compte)');
	$req->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'exp' => $exp,
		'idpromo' => $idpromo,
		'compte' => $compte
	));
}
//Ajouter un enseignant
function ajouterEnseignant($nom, $prenom, $compte)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO enseignant(nom, prenom, compte) VALUES(:nom, :prenom, :compte)');
	$req->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'compte' => $compte
	));
}

//Ajouter un compte
function ajouterCompte($login, $password, $estenseignant)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO compte(login, password, estenseignant) VALUES(:login, :password, :estenseignant)');
	$req->execute(array(
		'login' => $login,
		'password' => $password,
		'estenseignant' => $estenseignant
	));
}

//Ajouter une promo
function ajouterPromo($nom)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO promo(nom) VALUES(:nom)');
	$req->execute(array(
		'nom' => $nom,
	));
}

//Ajouter un badge
function ajouterBadge($nom, $description)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO badge(nom, description) VALUES(:nom, :description)');
	$req->execute(array(
		'nom' => $nom,
		'description' => $description
	));
}

//Ajouter un bloc
function ajouterBloc($nombloc)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO bloc(nombloc) VALUES(:nombloc)');
	$req->execute(array(
		'nombloc' => $nombloc
	));
}

//Ajouter une compétance a un bloc
function ajouterCompetance($nomcomp, $description, $expraporte, $idbloc)
{
	global $bdd;
	$req = $bdd->prepare('INSERT INTO competances(nomcomp, description, expraporte, idbloc) VALUES(:nomcomp, :description, :expraporte, :idbloc)');
	$req->execute(array(
		'nomcomp' => $nomcomp,
		'description' => $description,
		'expraporte' => $expraporte,
		'idbloc' => $idbloc
	));
}



//insertion de la competance dan la table competance etu avec connue=true
function insertConnue($idcomp, $idetu, $nombloc)
{
	global $bdd;

	$req = $bdd->prepare('INSERT INTO competanceetu(idcompetance, idetu, valide, connue, date) VALUES(:idcompetance, :idetu, :valide, :connue, :date)');
	$req->execute(array(
		'idcompetance' => $idcomp,
		'idetu' => $idetu,
		'valide' => 0,
		'connue' => 1,
		'date' => 'NULL'
	));
	header("Location: ./pageCompetence.php?idcomp=". $idcomp ."&nombloc=". $nombloc);

}

//insertion de la competance dans la table competance etu avec valide=true
function insertValide($idcomp, $idetu, $nombloc)
{
	global $bdd;


	$req = $bdd->prepare('INSERT INTO competanceetu(idcompetance, idetu, valide, connue, date) VALUES(:idcompetance, :idetu, :valide, :connue, :date)');
	$req->execute(array(
		'idcompetance' => $idcomp,
		'idetu' => $idetu,
		'valide' => 1,
		'connue' => 0,
		'date' => 'NULL'
	));
	header("Location: ./pageCompetence.php?idcomp=". $idcomp ."&nombloc=". $nombloc);

}



/*
* PARTIE Modifier (UPDATE)
*/

//màj de la competance dans la table competance etu avec connue=true
function updateConnue($idcomp, $idetu, $nombloc)
{
	global $bdd;

	$req = $bdd->prepare('UPDATE competanceetu SET connue=:connue WHERE idcompetance=:idcompetance AND idetu=:idetu');
	$req->execute(array(
		'idcompetance' => $idcomp,
		'idetu' => $idetu,
		'connue' => 1,
	));

	header("Location: ./pageCompetence.php?idcomp=". $idcomp ."&nombloc=". $nombloc);
}

//màj de la competance dans la table competance etu avec connue=true
function updateValide($idcomp, $idetu, $nombloc)
{
	global $bdd;

	$req = $bdd->prepare('UPDATE competanceetu SET valide=:valide WHERE idcompetance=:idcompetance AND idetu=:idetu');
	$req->execute(array(
		'idcompetance' => $idcomp,
		'idetu' => $idetu,
		'valide' => 1,
	));

	header("Location: ./pageCompetence.php?idcomp=". $idcomp ."&nombloc=". $nombloc);
}

//maj de la date de validation
function updateDateValide($date,$idcomp,$idetu){
	global $bdd;

	$req = $bdd->prepare('UPDATE competanceetu SET date=:date WHERE idcompetance=:idcomp AND idetu=:idetu');
	$req->execute(array(
		'date' => $date,
		'idcomp' => $idcomp,
		'idetu' => $idetu
	));

}

//maj de la date de validation
function updateXpEtu($idetu,$xp){
	global $bdd;

	$req = $bdd->prepare('UPDATE etudiant SET exp=:xp WHERE idetudiant=:idetu');
	$req->execute(array(
		'xp' => $xp,
		'idetu' => $idetu
	));

}

