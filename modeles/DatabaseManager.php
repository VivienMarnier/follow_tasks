<?php
class DatabaseManager
{
	protected $db;
	
	public function __construct()
	{
		$this->db = $bdd = new PDO('mysql:host=localhost;dbname=followtasks;charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
}
?>