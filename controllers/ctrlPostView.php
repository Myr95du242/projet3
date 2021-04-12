<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlPostView
{	
 	function getPostComments()
	{
		$instance_post=new Myrna\projet3\Blog\model\PostManager();
		$instance_comment=new Myrna\projet3\Blog\model\CommentManager();
		
		if(isset($_GET['id_article']) AND !empty($_GET['id_article']) )

		$post=$instance_post->getPost($_GET['id_article']);

		$comment= $instance_comment->getComments($_GET['id_article']);
		
		require('view/frontend/postView.php');
	}
}