

<?php
    echo '<footer>
		<div class="menu-bar">
			<ul class="liste-menu">
			<li class="liste-li">
				<a href="pageStat.php" class="liste-a">
					<div class="icone-menu"><img src="../img/menu/stats.svg" alt="icone classement"></div>
				</a>
			</li>
			<li class="liste-li">
				<a href="pageClassement.php" class="liste-a">
					<div class="icone-menu"><img src="../img/menu/rank.svg" alt="icone trophés"></div>
				</a>
			</li>
			<li class="liste-li">
				<a href="pageAccueilE.php" class="liste-a">
					<div class="icone-menu"><img src="../img/menu/home.svg" alt="icone accueil"></div>
				</a>
			</li>
			<li class="liste-li">
				<a href="modifierBloc.php" class="liste-a">
					<div class="icone-menu"><img src="../img/menu/add.svg" alt="icone profil"></div>
				</a>
			</li>
			<li class="liste-li">
				<form name="deco" method="post" action="../../Controler/redirectionEnseignant.php">
					<input type="hidden" name="deconnexion" value="deconnexion"/>
				</form>
				<a href="#" class="liste-a" onclick=\'document.forms["deco"].submit()\'>
					<div class="icone-menu"><img src="../img/menu/deco.svg" alt="icone deconnexion"></div>
				</a>
			</li>
		</ul>
		</div>
    </footer>';
?>
