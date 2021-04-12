<?php

class ctrlupdateArticle{

	public function updateArticle(){
		$check=new \Myrna\projet3\Blog\model\PostManager();

		if(isset($_GET['id']) AND !empty($_GET['id']))
		{		
			$idPost=intval($_GET['id']);
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
					/*echo 'ok';
					var_dump($article);*/
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
}