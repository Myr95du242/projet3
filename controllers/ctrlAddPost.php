<?php

class ctrlAddPost{

	public function addPost($title,$content,$chapo,$author){

		$addpost=new \Myrna\projet3\Blog\model\PostManager();

		$posts=$addpost->addPost($title,$content,$chapo,$author);
		if($posts === false)
		{
			//die('Impossible d\'ajouter le commentaire !');
			throw new Exception('Impossible d\'ajouter l\'article'); 	
		/*	$msg= 'ne rettrouve pas les données';
			header('Location:index.php?action=addPostView&message=' . $msg);*/
		}
		else
		{
			header('Location:index.php?action=displayArticle');
			/*$msg= 'Votre article est bien enregistré!';
			header('Location:index.php?action=addPostView&message=' . $msg); */	
		}
	}
}