<?php

class ctrldeletePost{

	public function deletePost(){
		$deleteArticle=new \Myrna\projet3\Blog\model\PostManager();

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
}