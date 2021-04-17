<?php
namespace myrna\blog\model;
require_once('Manager.php');

class CommentManager extends Manager
{	
  
 /* public __construct()
  {

  } */
	// retrieving comments to the post
	public function getComments($postId)
	{   
	    $bdd=$this->bddConnexion();
	    $sql_comment='SELECT id_comment,id_post,author,comments,DATE_FORMAT(date_comment,\'%d/%m/%Y à %Hh%imin%ss\' ) AS date_comment_fr FROM comment WHERE id_post=? ORDER BY date_comment DESC LIMIT 0,5';
	    $req=$bdd->prepare($sql_comment);
	    $req->execute(array($postId));
		return $req;
	} 
//Add comments to the post
	public function addComment($id_post,$author,$comments)
    {
        $bdd=$this->bddConnexion();
        //request
        $data= $bdd->prepare('INSERT INTO comment(id_post,author,comments,date_comment)VALUES( ?,?,?,NOW() ) ');
        $resultat=$data->execute(array($id_post,$author,$comments) );
        return $resultat;
    }

//All Comments
    //Get comments $title_entered,$content_entered,$chapo_entered,$,$idPost
   public function getComment()
   {
      $bdd = $this->bddConnexion();
      $reqComment=$bdd->query('SELECT * FROM comment WHERE id_comment ORDER BY id_comment DESC');
      return $reqComment;
   } 
   // Check comment
    function CheckComment()
      {
        $bdd=$this->bddConnexion(); 
        $reqComment='SELECT * FROM comment WHERE id_comment=?';
        $req=$bdd->prepare($reqComment);
        return $req;
      }

    //Check Comments
 /* public function checkGetComment()
    {
      $bdd=$this->bddConnexion(); 
      $reqComment='SELECT * FROM comment WHERE id_comment=?';
      $req=$bdd->prepare($reqComment);
      return $req;
    } */

   //deleteComment coté admin
  public function deleteComments($idPost)
  {
     $bdd=$this->bddConnexion(); 
     $req=$bdd->prepare('DELETE FROM comment WHERE id_comment =?');
     return $req;
  }
    //Update comments
  function updateComment($author_entered,$comment_enterer,$idComment)//editer comment
  {
    $bdd=$this->bddConnexion(); 
    $updateComment=$bdd->prepare('UPDATE comment SET author=?, comments=? WHERE id_comment=?');
    $data=$updateComment->execute(array($author_entered,$comment_enterer,$idComment) );
    return $data;  
  }

    // Login and Logout
  public function checkConnect()
  {
     $bdd= $this->bddConnexion(); 
     return $bdd;
  }
<<<<<<< HEAD
  // Downloads CV
  public function  getCv()
  {
   /* $bdd=$this->bddConnexion();
    $request='SELECT * FROM file WHERE url_file=?';      
    $req=$bdd->prepare($request);
    $data=$req->execute(array($idUrl));
    return $data;*/
    $instance=$bdd->query('SELECT * FROM file'); 
    return $instance;
  }
   //Downloads docs
/*  public  function fileDownloads($idUrl)
  {
    $bdd=$this->bddConnexion();        
    $request='SELECT * FROM file WHERE url_file=?';       
    $req=$bdd->prepare($request);
    $data=$req->execute(array($idUrl));
       return $data;
  } */
=======
  
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
}
	
?>