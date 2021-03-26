<?php
require('model/model.php');

function HomePage()
{
	require('view/HomePage.php');
}

function getListPost()
{
	$instance_publication=new PostManager();
	$resultat= $instance_publication->getPosts();
	require('view/listPost.php');
}

function getPostComments()
{
	$instance_post=new PostManager();

	$post=$instance_post->getPost($_GET['id_article']);
	$comment= $instance_post->getComments($_GET['id_article']);
	require('view/postView.php');
}


?>