<?php 
require_once('includes/class/hyla_tpl.class.php');
require_once('includes/class/valid_include.class.php');

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Safe Driving</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" media="screen" type="text/css" title="Safe Driving" href="includes/css/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="Safe Driving" href="includes/css/reset.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="Safe Driving" href="includes/css/jquery-ui-1.8.13.custom.css" />
	
	<!-- Javascript includes -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="includes/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="includes/js/jquery-ui-1.8.13.custom.min.js"></script>
	
</head>

<body>
	<div id="panneau">
		<div id="panneau-title">							
			<?php 
				if(isset($_GET['page'])){
					// TODO : truc moins crade
					if($_GET['page'] == "espace_membre")
						echo "Espace <br/> Membre";
					else	
						echo ucwords($_GET['page']);
				}
				else {
					echo 'Accueil';
				}
			?>
		</div>
	</div>
	<div id="header"></div>
	<div id="global">
		<div id="box">
			<div class="content-box">
				<div id="slogan"></div>
				<div id="menucontainer">
					<div id="menunav">
						<ul>
							<?php 
								if(isset($_GET['page'])){
									$page = $_GET['page'];
								} else {
									$page = 'accueil';
								}
							?>
							<li><a href="index.php?page=accueil" title="Accueil" <?php if( $page == 'accueil')echo 'class="current"'?>><span>Accueil</span></a></li>
							<li><a href="index.php?page=espace_membre" title="Espace membre" <?php if( $page == 'espace_membre')echo 'class="current"'?>><span>Espace membre</span></a></li>
							<li><a href="index.php?page=formations" title="Formations" <?php if( $page == 'formations')echo 'class="current"'?>><span>Formations</span></a></li>
							<li><a href="index.php?page=tarifs" title="Tarifs" <?php if( $page == 'tarifs')echo 'class="current"'?>><span>Tarifs</span></a></li>
							<li><a href="index.php?page=forum" title="Forum" <?php if( $page == 'forum')echo 'class="current"'?>><span>Forum</span></a></li>
							<li><a href="index.php?page=contact" title="Contact" <?php if( $page == 'contact')echo 'class="current"'?>><span>Contact</span></a></li>
						</ul>
					</div>
				</div>
				<div id="contenu">
					<?php 
					// On verifie si il y a une inclusion de page à faire
					if(isset($_GET['page']) and $_GET['page'] != null ) {
						if(Page::includePage($_GET['page']))
							include ($_SERVER['DOCUMENT_ROOT'] . "/Safedriving/" . $_GET['page'].'.php');
						else 
							echo('<div id="error">Désolé mais cette page n\'existe pas. Peux être devriez vous revenir à <a href="index.php">l\'accueil</a>...</div>');
					} 
					// Si pas d'inclusion on redirige vers l'index
					else {
							include ($_SERVER['DOCUMENT_ROOT'] . "/Safedriving/accueil.php");
					}
					?>
				</div>
				
			</div>
			<div class="bottom-box">
			</div>
		</div>
	</div>
</body>
</html>
