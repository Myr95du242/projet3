<?php

//Connexion à la base bdd
  //  require('model/model.php');

require('controllers/controller.php');

try 
{
	if (isset($_GET['action'])) 
	{
		switch ($_GET['action'])
		{
			case 'HomePage':
				HomePage();
				break;
				
			case 'getListPost':
				getListPost();
				break;

			case 'getPostComments':
				if (isset($_GET['id_article']) AND $_GET['id_article']>0) 
				{
					getPostComments();
				}
				else{
					throw new Exception('Aucun identifiant de cette publication envoyé');		
				}
				break;
			default:
				HomePage();			
				break;
		}
	}
	else
	{
		HomePage();
	}   
} catch (Exception $e) 
{
	echo 'Erreur : '.$e->getMessage();
}
    
?>

