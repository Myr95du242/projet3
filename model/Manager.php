<?php
namespace myrna\blog\model;

class Manager
{

	//private static $bdd;
	// Connecting to the database
	protected function bddConnexion()
	{
		$bdd = new \PDO('mysql:host=localhost;dbname=blog_myrna;charset=utf8','root','');	        
        return $bdd;	    
	}
}

	
?>