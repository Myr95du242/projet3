<?php

require('controllers/frontend.php');
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

			case 'addComments':
				if (isset($_GET['id_article']) AND $_GET['id_article'] >0) 
				{
					if (!empty($_POST['author']) AND !empty($_POST['comments'] ) )
					{
						addComments($_GET['id_article'],$_POST['author'],$_POST['comments']);
					}
					else
					{
						//echo 'Erreur: tous les champs ne sont pas remplis !';
						throw new Exception('Tous les champs ne sont pas remplis !');
					}					
				}
				else{
					//echo 'Erreur: aucun identifiant de publication envoyé';
						throw new Exception('Aucun identifiant de publication envoyé !');					
				}
				break;

			case 'connectView':
				connectView();
				break;

			case 'checkingConnect':
				checkingConnect();
				break;

			case 'connectRegisterView':
				connectRegisterView();
				break;

			case 'checkingRegister':
				checkingRegister();
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

