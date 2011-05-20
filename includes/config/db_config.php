<?php
	/********************************************************************/
	/** Connexion à la base de donnée **/
	/********************************************************************/

	header('Content-Type: text/html; charset=utf-8');
	
	// Format de date en français
	setlocale(LC_TIME, "fr_FR", "fr_FR@euro", "fr", "FR", "fra_fra", "fra");
	
	/* Informations de connexion à la DB */
	// /!\ Changer localhost par l'addresse de la db si pas en local
	$connectionString = "mysql:host=localhost;";
	$connectionString .= "dbname=safedriving";
	$connectionUser = "root";
	$connectionPassword = "";

	try
	{
		$c = new PDO($connectionString, $connectionUser, $connectionPassword);
	}
	catch(Exception $e)
	{
		echo "ERROR :".$e->getMessage();
	}
	$sql_utf8 = 'SET NAMES UTF8';
	$select_utf8 = $c->prepare($sql_utf8);
	$select_utf8->execute();
	
	/**************************/
	/* Exemple d'utilisation  */
	/**************************/
	/*
	// Inclure ce fichier dans la page concernée
	include 'includes/config/main_config.php';	
				
	// Exemple de SELECT =>
	 *************************************************************************
	$sql = 'SELECT...';
	$select = $c->prepare($sql);
	$select->execute();
	
	// Pour récup un seul résultat (première ligne)
	$datas = $select->fetch(PDO::FETCH_OBJ);
	... $datas->NOM_DE_LA_COLONE ....
	
	// Pour boucler si plusieurs résultats 
	while($datas = $select->fetch(PDO::FETCH_OBJ))
	{	
		... $datas->NOM_DE_LA_COLONE ....
	}
	 
	// Exemple de INSERT =>
	 *************************************************************************
	$auteur = ....;
	$titre = .....;
	$contenu = ....;
	// Respectez l'ordre des colonnes le premier "" est l'id donc on ne met rien dedans
	$sql = 'INSERT INTO ... VALUES("", :auteur, :titre, :contenu)';
	$select = $c->prepare($sql);
	$select->execute(array(':auteur' => $auteur, ':titre' => $titre, ':contenu' => $contenu));
	
	
	// Exemple de UPDATE/DELETE =>
	 *************************************************************************
	$user_to_delete = .....;
	$sql = 'DELETE FROM .. WHERE user_id = :user_to_delete';
	$select = $c->prepare($sql);
	$select->execute(array(':user_to_delete' => $user_to_delete));
	*/ 
?>