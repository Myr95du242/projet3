<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlSignUp
{	
	function connectRegisterView(){
	require('view/frontend/signUp.php');
	//var_dump($_SERVER);
	}
	// Vérification inscription 
	function checkingRegister()
	{
		$instance_register= new \Myrna\projet3\Blog\model\CommentManager();
		$instance_registers= $instance_register->checkConnect();

		if( !empty($_POST['pseudo']) AND !empty($_POST['email']) AND
			!empty($_POST['password']) AND !empty($_POST['passwordC']) )  
		{
			$err_login='Ok !'; 
			header('Location:index.php?action=connectRegisterView&err_login='.$err_login); 

			$pseudo=htmlspecialchars(trim($_POST['pseudo']));
			$email=htmlspecialchars(trim($_POST['email']));
			$password=htmlspecialchars(trim($_POST['password']));
			$passwordC=htmlspecialchars(trim($_POST['passwordC'])); 

				// Interroge la bdd 
			$check= $instance_registers->prepare('SELECT pseudo, email, password FROM members WHERE pseudo= ? ');
			$check->execute(array($pseudo));
			$data = $check->fetch();
			$is_pseudo_exist = $check->rowCount();	

			if ($is_pseudo_exist == 0)
			{ 
				$err_login='Vous êtes en bonne voie d\'inscription. Continuez !';
				header('Location:index.php?action=connectRegisterView&err_login='.$err_login);	 

				if (strlen($pseudo)<=100)
				{
					$err_login=' pseudo normal !';
					header('Location:index.php?action=connectRegisterView&err_login='.$err_login);

					if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
					{
						$err_login='le mail est correct !';
						header('Location:index.php?action=connectRegisterView&err_login='.$err_login);

						if ($password == $passwordC)
						{
							$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
							$ip=$_SERVER['REMOTE_ADDR']; // type string
							$sql_insert='INSERT INTO members(pseudo,email,password,ip)VALUES(:pseudo,:email,:password,:ip)';
							$insert=$instance_registers->prepare($sql_insert);
							$insert->execute(array(
													'pseudo' => $pseudo, 
													'email' => $email, 
													'password' => $password, 
													'ip' => $ip
													)
											);	
							$err_login='Bienvenue, vous êtes inscrit !';
							header('Location:index.php?action=connectRegisterView&err_login='.$err_login);
						}
						else
						{
							$err_login='Mot de passe incorrect !';
							header('Location:index.php?action=connectRegisterView&err_login='.$err_login);
						} 
					}
					else
					{
						$err_login='Mail invalide !';
						header('Location:index.php?action=connectRegisterView&err_login='.$err_login);
					}
				}
				else
				{
					$err_login='Pseudo trop lent !';
					header('Location:index.php?action=connectRegisterView&err_login='.$err_login);
				} 
			}
			else
			{
				$err_login='Ce pseudo existe déjà !';
				header('Location:index.php?action=connectRegisterView&err_login='.$err_login); 
			}
		}
		else
		{		
			$err_login='Veuillez remplir tous les champs !';
			header('Location:index.php?action=connectRegisterView&err_login='.$err_login); 
		} 
	}
}