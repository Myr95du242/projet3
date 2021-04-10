<?php
namespace Myrna\projet3\blog\model;

require_once('Manager.php');

class PostManager extends Manager
{
	function getPosts()
	{
	    $bdd=$this->bddConnexion();
	    $sql='SELECT id_post,title,DATE_FORMAT(date_post,\'%d/%m/%Y à %Hh%imin%ss\' )
			 AS date_post_fr,chapo,content,author FROM post ORDER BY date_post DESC LIMIT 0,5';
	    $request=$bdd->query($sql);
		return $request;
	}

	// récupération d'un post
	function getPost($postId)
	{   
	    $bdd=$this->bddConnexion();
	    $sql_post='SELECT id_post,title,DATE_FORMAT(date_post,\'%d/%m/%Y à %Hh%imin%ss\' )
			 AS date_post_fr,chapo,content,author FROM post WHERE id_post=?
			 ORDER BY date_post DESC';
	    $req=$bdd->prepare($sql_post);
	    $req->execute(array($postId));
	    $post=$req->fetch();
		return $post;
	}


}
	
?>