<?php
/**
 * 
 * Ajouter une formation
 * @param char $formationTitre titre de la formation
 */
function addFormation($formationTitre){
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
		if(!PROD){
			echo $e;
		}
	}
}
?>