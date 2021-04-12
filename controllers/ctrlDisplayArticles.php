<?php

class ctrlDisplayArticles{

	public function displayArticle()
	{
		if (!$_SESSION['password']) 
		{
			header('Location:index.php?action=homeView');
		}
		$displayArticles=new \Myrna\projet3\Blog\model\PostManager();
		$req_article= $displayArticles->getArticle();
		require('view/backend/displayArticles.php');
	}
}