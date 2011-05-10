<?php 
// Inclusion de Twig
require_once('includes/lib/Twig/Autoloader.php');
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem('/Applications/MAMP/htdocs/safedriving/templates');
    $tpl = new Twig_Environment($loader, array(
      'cache' => 'includes/lib/twig/compilation_cache',
    ));

require_once('includes/class/valid_include.class.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Safe Driving</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" media="screen" type="text/css" title="Safe Driving" href="includes/css/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="Safe Driving" href="includes/css/reset.css" />
</head>

<body>
	<div id="header"></div>
	<div id="global">
		<div class="box">
			<div class="content-box">
				<div id="slogan"></div>
				<div id="menucontainer">
					<div id="menunav">
						<ul>
							<li><a href="index.html" title="Accueil"<?php if($_GET['page'] == 'index')echo 'class="current"'?>><span>Accueil</span></a></li>
							<li><a href="membres.html" title="Espace membre"<?php if($_GET['page'] == 'index')echo 'class="current"'?><span>Espace membre</span></a></li>
							<li><a href="index.php?page=formations" title="Formations"<?php if($_GET['page'] == 'formations')echo 'class="current"'?><span>Formations</span></a></li>
							<li><a href="index.php?page=tarifs" title="Tarifs"<?php if($_GET['page'] == 'tarifs')echo 'class="current"'?><span>Tarifs</span></a></li>
							<li><a href="forum.html" title="Forum"<?php if($_GET['page'] == 'index')echo 'class="current"'?><span>Forum</span></a></li>
							<li><a href="contact.html" title="Contact"<?php if($_GET['page'] == 'index')echo 'class="current"'?><span>Contact</span></a></li>
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
							include ($_SERVER['DOCUMENT_ROOT'] . "/Safedriving/" . 'accueil');

					}
					?>
				</div>
			</div>
			<div class="bottom-box"></div>
		</div>
		<div id="panneau"></div>
	</div>
</body>
</html>
