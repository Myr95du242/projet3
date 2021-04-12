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

///Ajout article, suppression et modification
	//Add post
	public function addPost($title,$content,$chapo,$author)
    {   
      $bdd=$this->bddConnexion();     
      $insertPost= $bdd->prepare('INSERT INTO post(title,date_post,chapo,content,author)VALUES(?,NOW(),?,?,?)');
      $data= $insertPost->execute(array($title,$content,$chapo,$author) );
      return $data;
    }
    //Display all Articles
    public function getArticle()
    {
      $bdd=$this->bddConnexion();
      $req=$bdd->query('SELECT id_post,title, DATE_FORMAT(date_post,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_post_fr, chapo, content,author FROM post WHERE id_post ORDER BY date_post DESC');
      return $req;
    }

    //Checking posts
    function checkArticle()
    {
      $bdd=$this->bddConnexion(); 
      $reqArticle='SELECT * FROM post WHERE id_post=?';
      $req=$bdd->prepare($reqArticle);
      return $req;
    }
    //Supprimer article
    function deleteArticle($idPost)
    {
      $bdd=$this->bddConnexion(); 
      $req=$bdd->prepare('DELETE FROM post WHERE id_post =?');
      return $req;
    }

    //Update article
    function updateArticles($title_entered,$content_entered,$chapo_entered,$author_entered,$idPost)
    {
      $bdd=$this->bddConnexion(); 
      $updateArticle=$bdd->prepare('UPDATE post SET title=?, content=?, chapo=?, author=? WHERE id_post=?');
      $data=$updateArticle->execute(array($title_entered,$content_entered,$chapo_entered,$author_entered,$idPost) );
      return $data;  
    }  

}

	
?>