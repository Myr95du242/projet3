<?php
namespace myrna\blog\controllers;
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
class ctrlHomeView
{
  public function homeView() 
	{
		$instanceFile= new \myrna\blog\model\PostManager();
	$req= $instanceFile->checkFile();
	$data=$req->fetch();
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
			!empty($_POST['firstname']) AND !empty($_POST['message']) )  
		{
			$err_login='Ok !'; 
			header('Location:index.php?action=contactView&err_login='.$err_login);
			$name=htmlspecialchars(trim($_POST['name']));
			$firstname=htmlspecialchars(trim($_POST['firstname']));			
			$email_adress=htmlspecialchars(trim($_POST['email_adress']));
			$message=htmlspecialchars(trim($_POST['message'])); 			
			$str_name=strlen($name);		 
			if ($str_name<=100)
			{ 
				$err_login='Ok pour la longueur du name !';
				header('Location:index.php?action=contactView&err_login='.$err_login);
				if (filter_var($email_adress,FILTER_VALIDATE_EMAIL)) 
					{
						$err_login='le mail est correct !';
						header('Location:index.php?action=contactView&err_login='.$err_login);					
							$sql_insert='INSERT INTO contact_user(name,firstname,email_adress,message)VALUES(?,?,?,?)';
							$insert=$result->prepare($sql_insert);
							/////
							$insert->execute(array($name,$firstname, $email_adress, $message));
							$data=$insert->fetch();
							$this->Temporaire_Aiguillage($name,$firstname,
								$email_adress,$message);									
					}
					else
					{
						$err_login='Mail invalide !';
						header('Location:index.php?action=contactView&err_login='.$err_login);
					}
			}
			else
			{
				$err_login='Le name est trop lent !';
				header('Location:index.php?action=contactView&err_login='.$err_login); 
			}
		}
		else
		{	
			$err_login='Veuillez remplir tous les champs !';
			header('Location:index.php?action=contactView&err_login='.$err_login); 
		} 
	}
	protected function Temporaire_Aiguillage($name, $firstname, $email_adress,$message)
 	{	
	$msg='<div style="width:80%;margin:auto; padding:5%;">
				<table style="background:#f7d669; text-align:center; width:100%;">
					<tr style="background:#88f894">
						<td><label> Message du visiteur via le blog MyLEOx <br/></label></td>
					</tr>					
					<tr>
						<td><br/>Vous venez de recevoir un message de:&nbsp;<br/><b>'.ucfirst($name).'&nbsp;&nbsp;'.ucfirst($firstname). '</b><br/></td>
					</tr>
					<tr>
						<td><br/>Joignez votre correspondant à partir de :&nbsp;<br/><b>'.$email_adress. '</b><br/></td>
					</tr>
					<tr>
						<td>
							Voici son message complet!
						</td>
					</tr>
					<tr>
						<td><b> Message: &nbsp;&nbsp;'.$message.'</b><br/><br/></td></tr></table></div>';		
							var_dump($msg); 
	$msg = "<html><head></head><body> ".$msg." </body></html>";				

	$TO ="mnzabi.lan@gmail.com";
	$from = "From" ."contactUser@blog.com". "\r\n";
	$subject = "Contact via le blog's Myrna";
	$headers = "From: contactUser@blog.com". "\r\n";
	$headers .= "Reply-To: contactUser@blog.com"."\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";						
	//mail($TO, $subject, $msg, $headers);	La fonction mail ne fonctionne qu'en ligne				
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

}