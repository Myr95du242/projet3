<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlListPost
{	
  public function getListPost() 
	{
		$instance_post=new \Myrna\projet3\Blog\model\PostManager();
		$resultat= $instance_post->getPosts();
		require('view/frontend/listPost.php');
	}
}