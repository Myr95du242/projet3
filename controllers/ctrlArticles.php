<?php
<<<<<<< HEAD
=======
/**
Class for processing items.

*
Reading in the database, deleting and editing articles
*/
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
namespace myrna\blog\controllers;

class ctrlArticles{

<<<<<<< HEAD
	//Ajout article par l'admin
=======
	//Add posts 
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function addPost($title,$content,$chapo,$author){
		$addpost=new \myrna\blog\model\PostManager();
		$posts=$addpost->addPost($title,$content,$chapo,$author);
		if($posts === false)
		{
			throw new Exception('Impossible d\'ajouter l\'article'); 	
		}
		else
		{
			header('Location:index.php?action=displayArticle');	
		}
	}

<<<<<<< HEAD
	//Afficher la page article 
=======
	//display view for post add by admin 
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function addPostView()
	{
		require('view/backend/articlesView.php');
	}

<<<<<<< HEAD
	//Supprimer articles
=======
	//delete articles
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function deletePost(){
		$deleteArticle=new \myrna\blog\model\PostManager();

		if(isset($_GET['id']) AND !empty($_GET['id']))
		{
			$idPost=intval($_GET['id']);
			$req_article= $deleteArticle->checkArticle();
			$req_article->execute(array($idPost)); 
			if ($req_article->rowCount()>0) 
			{
				$req= $deleteArticle->deleteArticle($idPost);
				$req->execute(array($idPost));
				header('Location:index.php?action=displayArticle');
			}
			else
			{
				echo 'Id pas enregistré';
			}	
		}
		else
		{
			echo "Id introuvable !";
		}
	}

<<<<<<< HEAD
	//Affiche l'article backend
=======
	//View article Backend
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function displayArticle()
	{
		if (!$_SESSION['password']) 
		{
			header('Location:index.php?action=homeView');
		}
		$displayArticles=new \myrna\blog\model\PostManager();
		$req_article= $displayArticles->getArticle();
		require('view/backend/displayArticles.php');
	}

<<<<<<< HEAD
	//Modififier articles
=======
	//udpadet articles
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function updateArticle(){
		$check=new \myrna\blog\model\PostManager();
		if(isset($_GET['id']) AND !empty($_GET['id']))
		{		
<<<<<<< HEAD
			$idPost=intval($_GET['id']);
=======
			$idPost=intval($_GET['id']);// conversion to int
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
			$req_article= $check->checkArticle();
			$req_article->execute(array($idPost)); 
			if ($req_article->rowCount()) 
			{				
				if (!empty($_POST['title']) AND !empty($_POST['chapo']) 
					AND !empty($_POST['content']) AND !empty($_POST['author']) )		
				{	
					$title_entered= htmlspecialchars($_POST['title']);
					$content_entered= nl2br(htmlspecialchars($_POST['chapo']));
					$chapo_entered= nl2br(htmlspecialchars($_POST['content']) ) ;
					$author_entered= nl2br(htmlspecialchars($_POST['author']));
					$article= $check->updateArticles($title_entered,$content_entered,$chapo_entered,
						$author_entered,$idPost); 
					header('Location:index.php?action=displayArticle'); 
				}
				else
				{
					echo 'Entrez tous les champs du formulaire update !';
				}			
			}
			else
			{
				echo 'existe deja';// refaire en fonction du titre
			}					 
		}
		else
		{
			echo "Id article introuvable !";
		}	
	}

<<<<<<< HEAD
	//Récupération des données dans la page checkArticle
=======
	//Data recovery in the section check articles View
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	public function updateArticlePost()
	{
		$check=new \myrna\blog\model\PostManager();
		if(isset($_GET['id']) AND !empty($_GET['id']))
		{
			$idPost=intval($_GET['id']);
			$req_article= $check->checkArticle();
			$req_article->execute(array($idPost));
			if ($req_article->rowCount()) 
			{
				$data= $req_article->fetch();
				$title_data=$data['title'];
				$chapo=str_replace('<br/>', '', $data['chapo']);
				$content=str_replace('<br/>', '', $data['content']);
				$author=$data['author']; 
				require('view/backend/checkArticle.php');
			}
			else
			{
				echo 'id existe pas';
			}
		}
		else
		{
			echo "Id introuvable !";
		}
	}
	
}