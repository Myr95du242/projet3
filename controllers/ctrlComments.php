<?php
namespace myrna\blog\controllers;

class ctrlComments
{	
	//Get comment
	 public function getPostComments()
	{
		$instance_post=new \myrna\blog\model\PostManager();
		$instance_comment=new \myrna\blog\model\CommentManager();		
		if(isset($_GET['id_article']) AND !empty($_GET['id_article']) )
		$post=$instance_post->getPost($_GET['id_article']);
		$comment= $instance_comment->getComments($_GET['id_article']);		
		require('view/frontend/postView.php');
	}

	//add Comment 
	public function addComments($id_post,$author,$comment)
		{
			$instance_comment=new \myrna\blog\model\CommentManager();
			$comments=$instance_comment->addComment($id_post,$author,$comment);
			if($comments === false)
			{
				throw new \Exception('Impossible d\'ajouter le commentaire !');		
			}
			else
			{
				header('Location: index.php?action=getPostComments&id_article=' . $id_post);	
			}
		}

	//Display User's comments
	public function displayCommentUser()
	{
		if (!$_SESSION['password']) 
		{
			header('Location:index.php?action=homeView');
		}
		if (!empty($_POST['author']) AND !empty($_POST['comments'])) 
		{
			$author_enterer= htmlspecialchars($_POST['author']);
	        $comment_enterer= nl2br(htmlspecialchars($_POST['comments']));
	        $data_enterer= array('Auteur' =>$author_enterer , 
	        						'Commentaire'=> $comment_enterer);
	        require('view/usersView.php');
	    }
		 require('view/backend/usersView.php'); 
	}

	public function deleteComment()
	{
		$instance_Comment=new \myrna\blog\model\CommentManager();
		if(isset($_GET['supprimer']) AND !empty($_GET['supprimer']))
		{
			$idComment=intval($_GET['supprimer']);
			$comment= $instance_Comment->verificationComment();
			$comment->execute(array($idComment)); 
			if ($comment->rowCount()>0) 
			{
				$req= $instance_Comment->deleteComments($idComment);
				$req->execute(array($idComment));
				header('Location:index.php?action=displayCommentUser');
			}
			else
			{
				throw new \Exception('Id pas enregistré!');
			}	
		}
		else
		{
			throw new \Exception('Id introuvable !'); 
		}
	}

	//Comments  Frontend

	public function getCommentUser()
	{
		$check=new \myrna\blog\model\CommentManager();
		if(isset($_GET['id_article']) AND !empty($_GET['id_article']))
		{			
			$idComment=intval($_GET['id_article']);

			$comment= $check->CheckComment();
			$comment->execute(array($idComment)); 
			if ($comment->rowCount()) 
			{
				$data= $comment->fetch();
				$author=$data['author'];
				$commentaire=str_replace('<br/>', '', $data['comments']);
				require_once('view/frontend/postView1.php');
			}
			else
			{
				throw new \Exception('Commentaire existe pas dans la bdd'); 
			}
		}
		else
		{
			throw new \Exception('id_commentaire introuvable !');
		}
	}
	
	public function updateComments()
	{
		$instance_post=new \myrna\blog\model\PostManager();
		$checkComments=new \myrna\blog\model\CommentManager();
		if(isset($_GET['id_article']) AND !empty($_GET['id_article']))
		{			
			$idComment=intval($_GET['id_article']);
			$req_comment= $checkComments->CheckComment();
			$req_comment->execute(array($idComment)); 			
			if ($req_comment->rowCount()) 
			{				
				if (!empty($_POST['author']) AND !empty($_POST['comments']) )		
				{	
					$post=$instance_post->getPost($_GET['id_article']);
					$respComments=$checkComments->getComments($_GET['id_article']);
					$auteur_saisi= htmlspecialchars($_POST['author']);
					$commentaire_saisi= nl2br(htmlspecialchars($_POST['comments']));
					$comment= $checkComments->updateComment($auteur_saisi,$commentaire_saisi,$idComment); 
					if ($comment === false) 
					{
				        throw new \Exception('Impossible de modifier le commentaire !');
				    }
				    else {
				       header('Location:index.php?action=getListPost');
				   }
				}
				else
				{
					throw new \Exception ('les champs !');
				}			
			}
			else
			{
				throw new \Exception( 'id existe pas');
			}					 
		}
		else
		{
			throw new \Exception('Id introuvable !');
		}	
	}
}