<?php
namespace Myrna\projet3\blog\model;

require_once('Manager.php');

class CommentManager extends Manager
{	
	// retrieving comments to the post
	function getComments($postId)
	{   
	    $bdd=$this->bddConnexion();
	    $sql_comment='SELECT id_comment,id_post,author,comments,DATE_FORMAT(date_comment,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_comment_fr FROM comment WHERE id_post=? ORDER BY date_comment DESC LIMIT 0,5';
	    $req=$bdd->prepare($sql_comment);
	    $req->execute(array($postId));
		return $req;
	} 

	public function addComment($id_post,$author,$comments)
    {
        $bdd=$this->bddConnexion();
        //request
        $data= $bdd->prepare('INSERT INTO comment(id_post,author,comments,date_comment)VALUES(?,?,?,NOW() ) ');

       $resultat=$data->execute(array($id_post,$author,$comments) );
        return $resultat;
    }

}
	
?>