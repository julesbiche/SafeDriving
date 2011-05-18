<?php

/*
function addUser($utilisateurLogin, $utilisateurMdp, $utilisateurType, $utilisateurJeton, $utilisateurInscriptionDate, $utilisateurNom, $utilisateurPrenom, $utilisateurCivilite, $utilisateurVille, $utilisateurCp, $utilisateurAdresse, $utilisateurEtat){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");
		
		$req = $bdd->prepare('INSERT INTO formations(formation_titre) VALUES(:formation_titre)');
		$req->execute(array(
		'formation_titre' => $formationTitre
		));
				
	}
	catch(Exception $e)
	{
		if(!PROD)
		{
			echo $e->getMessage();
		}
	}
}
*/
function getInfosUser($utilisateurLogin){
	try 
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");
		
		$req = $bdd->prepare('SELECT utilisateur_mdp, utilisateur_type FROM sd_utilisateurs WHERE utilisateur_login = ?');
		$req->execute(array($utilisateurLogin));
		if($req->rowCount() != 0)
		{
			$donnees = $req->fetch();
			return $donnees;
		}
		else 
		{
			return false;
		}
				
		$req->closeCursor();
	}
	catch(Exception $e)
	{
		if(!PROD)
		{
			echo $e->getMessage();
		}
	}
	
	
}

?>