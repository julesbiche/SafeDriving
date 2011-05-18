<?php
require_once '../config/main_config.php';
//plop
// Biere

function addUser($utilisateurLogin, $utilisateurMdp, $utilisateurType, $utilisateurJeton, $utilisateurNom, $utilisateurPrenom, $utilisateurCivilite, $utilisateurVille, $utilisateurCp, $utilisateurAdresse, $utilisateurEtat){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");
		$mdp = sha1($utilisateurMdp.SALT);
		
		$req = $bdd->prepare('INSERT INTO sd_utilisateurs(utilisateur_login, utilisateur_mdp, utilisateur_type, utilisateur_jeton, utilisateur_nom, utilisateur_prenom, utilisateur_civilite, utilisateur_ville, utilisateur_cp, utilisateur_adresse, utilisateur_etat) VALUES(:utilisateur_login, :utilisateur_mdp, :utilisateur_type, :utilisateur_jeton, :utilisateur_nom, :utilisateur_prenom, :utilisateur_civilite, :utilisateur_ville, :utilisateur_cp, :utilisateur_adresse, :utilisateur_etat)');
		$req->execute(array(
		'utilisateur_login' => $utilisateurLogin,
		'utilisateur_mdp' => $utilisateurMdp,
		'utilisateur_type' => $utilisateurType,
		'utilisateur_jeton' => $utilisateurJeton,
		'utilisateur_nom' => $utilisateurNom,
		'utilisateur_prenom' => $utilisateurPrenom,
		'utilisateur_civilite' => $utilisateurCivilite,
		'utilisateur_ville' => $utilisateurVille,
		'utilisateur_cp' => $utilisateurCp,
		'utilisateur_adresse' => $utilisateurAdresse,
		'utilisateur_etat' => $utilisateurEtat
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

function updateUser($utilisateurLogin, $utilisateurMdp, $utilisateurType, $utilisateurJeton, $utilisateurNom, $utilisateurPrenom, $utilisateurCivilite, $utilisateurVille, $utilisateurCp, $utilisateurAdresse, $utilisateurEtat){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");
		$mdp = sha1($utilisateurMdp.SALT);
		
		$req = $bdd->prepare(
			'UPDATE sd_utilisateurs SET 
				utilisateur_mdp = :nvMdp, 
				utilisateur_type = :nvType, 
				utilisateur_jeton = :nvJeton,
				utilisateur_nom = :nvNom, 
				utilisateur_prenom = :nvPrenom, 
				utilisateur_civilite = :nvCivilite, 
				utilisateur_ville = :nvVille, 
				utilisateur_cp = :nvCp, 
				utilisateur_adresse = :nvAdresse, 
				utilisateur_etat = :nvEtat
			WHERE utilisateur_login = :login
			');
		
		$req->execute(array(
		'login' => $utilisateurLogin,
		'nvMdp' => $utilisateurMdp,
		'nvType' => $utilisateurType,
		'nvJeton' => $utilisateurJeton,
		'nvNom' => $utilisateurNom,
		'nvPrenom' => $utilisateurPrenom,
		'nvCivilite' => $utilisateurCivilite,
		'nvVille' => $utilisateurVille,
		'nvCp' => $utilisateurCp,
		'nvAdresse' => $utilisateurAdresse,
		'nvEtat' => $utilisateurEtat
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

?>