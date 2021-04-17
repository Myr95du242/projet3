<?php
namespace myrna\blog\controllers;
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlListPost
{	
  public function getListPost() 
	{
		$instance_post=new \myrna\blog\model\PostManager();
		$resultat= $instance_post->getPosts();
		require('view/frontend/listPost.php');
	}
}