<?php
class Page {
	// Pages autorisées
	static private $pages = array ("accueil","espace_membre","formations","tarifs","contact","forum");
	
	// Page d'accueil
	const DEFAULT_PAGE = "index";
	static public function includePage($page_name) {
		if (!in_array($page_name, self::$pages)) {
			return false;
		}
		else {
			return true;
		}
	}
}
?>