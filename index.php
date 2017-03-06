<?php
	require_once('modeles/Autoloader.php');
	Autoloader::register();
	
	error_reporting(E_ALL);
	
	$router = new Router();
	$router->dispatch();
?>

