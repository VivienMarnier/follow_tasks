<?php
	//index : charge l'autoloader
	require_once('modeles/Autoloader.php');
	
	//appel à la fonction register de l'autoload
	Autoloader::register();
	
	error_reporting(E_ALL);
	
	//création d'un nouvel objet router 
	$router = new Router();
	
	//appel de la fonction dispatch de notre router
	$router->dispatch();
?>

