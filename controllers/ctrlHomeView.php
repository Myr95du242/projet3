<?php
namespace myrna\blog\controllers;
<<<<<<< HEAD
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
class ctrlHomeView
{
=======

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class ctrlHomeView
{
	

>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
  public function homeView() 
	{
		require('view/frontend/homeView.php');
	}
  ///Form contact
 public function contactView()
	{	
		require('view/frontend/contact.php');	
	}
 ///Check View Contact 
 public function checkContact()
	{
		$instance= new \myrna\blog\model\CommentManager();
		$result= $instance ->checkConnect();
		
		if( !empty($_POST['name']) AND !empty($_POST['email_adress']) AND
			!empty($_POST['phone_number']) AND !empty($_POST['message']) )  
		{
			$err_login='Ok !'; 
			header('Location:index.php?action=contactView&err_login='.$err_login);

			$name=htmlspecialchars(trim($_POST['name']));
			$email_adress=htmlspecialchars(trim($_POST['email_adress']));
			$phone_number=htmlspecialchars(trim($_POST['phone_number']));
			$message=htmlspecialchars(trim($_POST['message'])); 			
			$str_pseudo=strlen($pseudo);		 
			if ($str_pseudo<=100)
			{ 
				$err_login='Ok pour la longueur du pseudo !';
				header('Location:index.php?action=contactView&err_login='.$err_login);
				if (filter_var($email_adress,FILTER_VALIDATE_EMAIL)) 
					{
						$err_login='le mail est correct !';
						header('Location:index.php?action=contactView&err_login='.$err_login);					
							$sql_insert='INSERT INTO contact_user(name,email_adress,phone_number,message)VALUES(?,?,?,?)';
							$insert=$result->prepare($sql_insert);
							$insert->execute(array($name, $email_adress, $phone_number, $message));				
							$err_login='Afficher le message !';
							header('Location:index.php?action=contactView&err_login='.$err_login);			
					}
					else
					{
						$err_login='Mail invalide !';
						header('Location:index.php?action=contactView&err_login='.$err_login);
					}
			}
			else
			{
				$err_login='Le pseudo est trop lent !';
				header('Location:index.php?action=contactView&err_login='.$err_login); 
			}
		}
		else
		{	
			$err_login='Veuillez remplir tous les champs !';
			header('Location:index.php?action=contactView&err_login='.$err_login); 
		} 
	}

 //Add docs
 public function fileUsefuls()
 {
	$instanceFile= new \myrna\blog\model\PostManager();
	if (!empty($_FILES)) 
	{
		if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0) 
		{
			$file_name=$_FILES['fichier']['name'];
			$file_type=$_FILES['fichier']['type'];
			$file_tmp=$_FILES['fichier']['tmp_name'];
			$file_error=$_FILES['fichier']['error'];
			$file_size=$_FILES['fichier']['size'];
			$file_dest = 'public/'.$file_name;
			$file_extension = strrchr($file_name, ".");
			$extensions_autorisees= array('.pdf','.PDF');
			if ($file_size <= 1000000)
			{
				if (in_array($file_extension, $extensions_autorisees) )
				{
					if (move_uploaded_file($file_tmp, $file_dest )) 
					{
						$data=$instanceFile->fileUseful($file_name,$file_dest);
						echo 'Ficher envoyé avec succès';
					}
				}
				else{
					echo 'Seuls les fichiers PDF sont autorisées';
				}
			}else{
				echo 'la taille du fichier est trop grande';
			}			
		}else
		{
			echo 'fichier introuvable';
		}		
	}
 }

 //Downloads get file
 public function getCvDownload()
 {	
	$instanceFile= new \myrna\blog\model\PostManager();
	$req= $instanceFile->checkFile();
	$data=$req->fetch();
	//var_dump($data);
	//header('Location:index.php?action=homeView');
	require('view/frontend/homeView.php');
 } 
}