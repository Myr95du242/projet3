<?php

class PostManager
{
	function getPosts()
	{
	    $bdd=$this->bddConnexion();
	    $sql='SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' )
			 AS date_article_fr,chapo,contenu,auteur FROM publication ORDER BY date_article DESC LIMIT 0,5';
	    $resultat=$bdd->query($sql);
		return $resultat;
	}

	// récupération d'un post
	function getPost($postId)
	{   
	    $bdd=$this->bddConnexion();
	    $sql_article='SELECT id_article,titre_article,DATE_FORMAT(date_article,\'%d/%m/%Y à %Hh%imin%ss\' )
			 AS date_article_fr,chapo,contenu,auteur FROM publication WHERE id_article=?
			 ORDER BY date_article DESC';
	    $req=$bdd->prepare($sql_article);
	    $req->execute(array($postId));
	    $post=$req->fetch();
		return $post;
	}

	// récupération des commentaires au post
	function getComments($postId)
	{   
	    $bdd=$this->bddConnexion();
	    $sql_comment='SELECT id_commentaires,id_publication,auteur,commentaire,DATE_FORMAT(date_commentaire,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_commentaire_fr FROM commentaires WHERE id_publication=? ORDER BY date_commentaire DESC LIMIT 0,5';
	    $req=$bdd->prepare($sql_comment);
	    $req->execute(array($postId));
		return $req;
	} 

	// function bdd
	public function bddConnexion()
	{
		try
	    {
	        $bdd = new PDO('mysql:host=localhost;dbname=blogsql;charset=utf8','root','', array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION) );
	        return $bdd;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}
}
	
?>