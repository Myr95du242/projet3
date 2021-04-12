<?php
class ctrlupdateArticlePost{

	public function updateArticlePost()
	{
	$check=new \Myrna\projet3\Blog\model\PostManager();

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