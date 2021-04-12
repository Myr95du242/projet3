<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlSignIn
{	
	function connectView(){
		require('view/frontend/signIn.php');
	}

	function checkingConnect()
	{
		$checking=new \Myrna\projet3\Blog\model\CommentManager();
		$req = $checking->checkConnect();

		if (!empty($_POST['pseudo']) AND !empty($_POST['password']) )
		{
			$message='Ok !'; 
			header('Location:index.php?action=connectView&message='.$message);	

			$pseudo=htmlspecialchars($_POST['pseudo']);
			$password=htmlspecialchars(trim($_POST['password']));

			$check= $req->prepare('SELECT pseudo, password FROM members WHERE pseudo=?');
			$check ->execute( array($pseudo) );
			$data = $check->fetch();

			$pseudo_admin_defaut= "admin";
	        $mdp_admin_defaut= "admin1234";
			if ($pseudo==$pseudo_admin_defaut AND $password==$mdp_admin_defaut) 
			{
				$_SESSION['password']= $pseudo_admin_defaut;
				$message='Bienvenue Mme l\'administrateuse';
				$_SESSION['id']= $data['id_member'];
				$_SESSION['admin']= $pseudo_admin_defaut;
					header('Location:index.php?action=connectView&message='.$message);
			}
			else
			{
				$mdp_hash= $data['password'];
				$is_pseudo_exist=$check->rowcount(); 

				if ($is_pseudo_exist) 
				{
					$message='Votre pseudo existe !';
					header('Location:index.php?action=connectView&message='.$message);

					$isMdpCorrect=password_verify($password, $mdp_hash);	
					if ($isMdpCorrect)
					{
						$_SESSION['id']= $data['id_member'];
						$_SESSION['pseudo']= $pseudo;
						header('Location:index.php?action=homePage');			
					}
					else
					{
						$message='Mot de passe incorrect !';
						header('Location:index.php?action=connectView&message='.$message);
					}
				}else{
					$message='Vous n\'êtes pas enregistré. Veuillez-vous inscrire !';
					header('Location:index.php?action=connectView&message='.$message); 
				}			
			}		
		}
		else
		{
			$message='Tous les champs doivent être entrés !';
			header('Location:index.php?action=connectView&message='.$message); 
		} 
	}
}