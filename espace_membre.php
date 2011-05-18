<?php
	$tpl = new Hyla_Tpl('templates');
	$tpl->importFile('espace_membre.tpl');
	
	if(isset($_SESSION['user']['login']))
	{
		switch ($_SESSION['user']['type'])
		{
			case 'admin':
			$tpl->setVar('login', $_SESSION['user']['login']);
			$tpl->render('administrateur');
			break;
			case 'formateur':
			$tpl->render('formateur');
			break;
			case 'utilisateur':
			$tpl->render('utilisateur');
			break;
		}
	}
	else 
	{    
		$tpl->render('visiteur');
	}
	echo $tpl->render();
?>