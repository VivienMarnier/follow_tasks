<?php
class ErreurControleur
{
	public function indexAction($erreur)
	{
		$vue = new Vue('erreur');
		$donnees = array('erreur'=>$erreur);
		$vue->generer($donnees);
	}
}
	
?>