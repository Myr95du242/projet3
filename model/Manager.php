<?php
namespace Myrna\projet3\blog\model;

class Manager
{
	// Connecting to the database
	protected function bddConnexion()
	{
		$bdd = new \PDO('mysql:host=localhost;dbname=blog_myrna;charset=utf8','root','');	        
        return $bdd;	    
	}
}

	
?>