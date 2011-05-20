<?php

/*
 * Ajout d'une formation
 */
function addFormation($formationPlace, $formationType, $formationVille, $formationDate){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");

		
		$req = $bdd->prepare('INSERT INTO sd_formations(formation_place, formation_type, formation_ville, formation_date) VALUES(:formation_place, :formation_type, :formation_ville, :formation_date)');
		$req->execute(array(
		'formation_place' => $formationPlace,
		'formation_type' => $formationType,
		'formation_ville' => $formationVille,
		'formation_date' => $formationDate
		));
				
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


/*
 * Récuperer les infos d'une formation
 * Pas fini
 */
function getInfosFormation($filtre, $type, $ville){
	try 
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO(CONNECTION_STRING, LOGIN, MDP, $pdo_options);
		$bdd->exec("SET CHARACTER SET utf8");
		
		//Récupération des formations 
		switch ($filtre){
			case 'place' :
				$req = $bdd->query('SELECT formation_place, formation_type, formation_ville, formation_date FROM sd_formations WHERE formation_place < 0 AND NOW() < formation_date < DATE_ADD(NOW(), INTERVAL 10 DAYS)');
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
			break;
				
			case 'type' :
				
				break;
				
			case 'ville':
				break;
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