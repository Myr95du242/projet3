<?php
namespace myrna\blog\controllers;
//require_once('librairies/autoload.php');
//appel controleur
require_once('controllers/ctrlHomeView.php');
require_once('controllers/ctrlListPost.php');
<<<<<<< HEAD
require_once('controllers/ctrlPostView.php');
=======
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
require_once('controllers/ctrlAdminView.php');
//Log In Up and Out
require_once('controllers/ctrlLog.php');
//Articles
require_once('controllers/ctrlArticles.php');
//Commentaires
require_once('controllers/ctrlComments.php');

class Switcher
{
	
	//initialisation variable
	private $ctrlHomeView;
	private $ctrlListPost;
<<<<<<< HEAD
	private $ctrlPostView;	
=======
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
	private $ctrlAdminView;	
	private $ctrlLog;
	private $ctrlArticles;
	private $ctrlComments;	

	//Constructeur
	public function __construct()
	{
		$this-> ctrlHomeView = new \myrna\blog\controllers\ctrlHomeView();
<<<<<<< HEAD
		$this-> ctrlListPost= new \myrna\blog\controllers\ctrlListPost();
		$this-> ctrlPostView= new \myrna\blog\controllers\ctrlPostView();				
=======
		$this-> ctrlListPost= new \myrna\blog\controllers\ctrlListPost();			
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
		$this-> ctrlAdminView= new \myrna\blog\controllers\ctrlAdminView();
		$this-> ctrlLog= new \myrna\blog\controllers\ctrlLog();
		$this-> ctrlArticles= new \myrna\blog\controllers\ctrlArticles();
		$this-> ctrlComments= new \myrna\blog\controllers\ctrlComments();		
	}
	
	public function switchRequete()
	{		
		try 
		{
			if (isset($_GET['action'])) 
			{
				switch ($_GET['action'])
				{
					case 'homeView':
						$this-> ctrlHomeView->homeView();
						break;
					case 'contactView': // View Contact
						$this-> ctrlHomeView->contactView();
						break;
					case 'checkContact': // Check View Contact
						$this-> ctrlHomeView->checkContact();
						break;
					case 'fileUsefuls': // add Cv in the bdd
						$this-> ctrlHomeView->fileUsefuls();
						break;
					case 'getCvDownload': // downloads CV
						$this-> ctrlHomeView->getCvDownload();
						break;

<<<<<<< HEAD
					case 'getListPost': //Liste des posts 
						$this-> ctrlListPost->getListPost();
						break;

=======
>>>>>>> 115d28f39f4e95dce5f4f2415a764b9c31cf7bbf
						//LogIn/LogUp/LogOut					
					case 'connectView': //LogIn
						$this-> ctrlLog->connectView();
						break;						
					case 'checkingConnect': //LogIn
						$this-> ctrlLog->checkingConnect();
						break;

					case 'connectRegisterView': //LogUp
						$this-> ctrlLog->connectRegisterView();
						break;
					case 'checkingRegister': //LogUp
						$this-> ctrlLog->checkingRegister();
						break;

					case 'logOut': //AdminView
						$this-> ctrlLog->logOut();
						break;
					
					//Administrateur
					case 'adminView': //AdminView
						$this-> ctrlAdminView->adminView();
						break;

					//Articles					
					case 'addPostView': //View add post
					$this-> ctrlArticles->addPostView();
						break;

					case 'addPost': //traitement articles 
						//();
						if(isset($_POST['valider']) )
						{
							if(!empty($_POST['title']) AND !empty($_POST['chapo']) 
								AND !empty($_POST['content']) AND !empty($_POST['author']) )
							{
								$this-> ctrlArticles->addPost($_POST['title'],$_POST['chapo'],$_POST['content'],$_POST['author'] );
							}
							else{
								echo 'Recherche encore !';
							}
						}	
						break;

					//Articles
					case 'displayArticle': //View all Articles
					$this-> ctrlArticles->displayArticle();
						break;
					case 'deletePost': //Delete post
					$this-> ctrlArticles->deletePost();
						break;	
					case 'updateArticle': //Update post
					$this-> ctrlArticles->updateArticle();
						break;
					case 'updateArticlePost': //Form Update post
					$this-> ctrlArticles->updateArticlePost();
						break;

					//Comments
					case 'getPostComments': //Post and comments
						$this-> ctrlComments->getPostComments();
						break;
					case 'addComments': //Post and comments
						if (isset($_GET['id_article']) AND $_GET['id_article'] >0) 
						{
							if(!empty($_POST['author']) AND !empty($_POST['comments']) )
							{
								$this-> ctrlComments->addComments($_GET['id_article'],$_POST['author'],$_POST['comments']);
							}
							else
							{
								throw new Exception('Tous les champs ne sont pas remplis !');
							}							
						}
						else{
							throw new Exception('Aucun identifiant de publication envoyé !');			
						}
						break; 

					case 'displayCommentUser': //display Comment
					$this-> ctrlComments->displayCommentUser();
						break;
					case 'deleteComment': //Delete comment
					$this-> ctrlComments->deleteComment();
						break;	
					case 'getCommentUser': //affiche comment
					$this-> ctrlComments->getCommentUser();
						break; 
					case 'updateComments': //Update comment
					$this-> ctrlComments->updateComments();
						break; 


					default:
						$this->ctrlHomeView->homeView();	
						break;
				}
			}
			else
			{
				$this->ctrlHomeView->homeView();
			}   
		} catch (Exception $e) 
		{
			echo 'Erreur : '.$e->getMessage();
		}
	}

}