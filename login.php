<?php
require_once 'includes/config/main_config.php';
require_once 'includes/fonctions/utilisateurs.php';
session_start();	

	$infosUser = getInfosUser($_POST['login']);
	
	if ($infosUser != false)
	{
		// Test login et mdp
		$mdp = sha1($_POST['mdp'].SALT);

		if($mdp === $infosUser['utilisateur_mdp'])
		{
			
			$_SESSION['user']['login'] = 'toto';
			$_SESSION['user']['mdp'] = 'plop';
			$_SESSION['user']['type'] = 'admin';
			
			echo '<span class="alert_success">Connexion réussie</span>';
		}
		else 
		{
			echo '<span class="alert_error">Mot de passe ou nom d\'utilisateur incorrect</span>';
		}
	}	
	else 
	{
		echo '<span class="alert_error">Nom d\'utilisateur incorrect</span>';
	}
	

?>