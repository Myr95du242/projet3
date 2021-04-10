<?php
//require('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function HomePage()
{
	require('view/frontend/HomePage.php');
}

function getListPost()
{
	$instance_publication=new \Myrna\projet3\Blog\model\PostManager();
	$resultat= $instance_publication->getPosts();
	require('view/frontend/listPost.php');
}

function getPostComments()
{
	$instance_post=new Myrna\projet3\Blog\model\PostManager();
	$instance_comment=new Myrna\projet3\Blog\model\CommentManager();

if(isset($_GET['id_article']) AND !empty($_GET['id_article']) )

	$post=$instance_post->getPost($_GET['id_article']);

	$comment= $instance_comment->getComments($_GET['id_article']);
	
	require('view/frontend/postView.php');
}

//Add comment for user
function addComments($id_post,$author,$comments)
{
	$instance_comment=new Myrna\projet3\Blog\model\CommentManager();
	$comments=$instance_comment->addComment($id_post,$author,$comments);

	if($comments === false)
	{
		//die('Impossible d\'ajouter le commentaire !');
		throw new Exception('Impossible d\'ajouter le commentaire !');		
	}
	else
	{
		header('Location: index.php?action=getPostComments&id_article=' . $id_post);	
	}
}

?>