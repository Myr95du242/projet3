<?php
session_start();

//appel controleur
require_once('controllers/ctrlHomeView.php');
require_once('controllers/ctrlListPost.php');
require_once('controllers/ctrlPostView.php');
require_once('controllers/ctrlSignIn.php');
require_once('controllers/ctrlSignUp.php');
require_once('controllers/ctrlAdminView.php');
require_once('controllers/ctrlLogOut.php');
require_once('controllers/ctrlAddPost.php');
require_once('controllers/ctrlAddPostView.php');
require_once('controllers/ctrlDisplayArticles.php');
require_once('controllers/ctrldeletePost.php');
require_once('controllers/ctrlupdateArticle.php');
require_once('controllers/ctrlupdateArticlePost.php');

class Switcher
{
	//initialisation variable
	private $ctrlHomeView;
	private $ctrlListPost;
	private $ctrlPostView;
	private $ctrlSignIn;
	private $ctrlSignUp;
	private $ctrlAdminView;
	private $ctrlLogOut;
	private $ctrlAddPost;
	private $ctrlAddPostView;
	private $ctrlDisplayArticles;
	private $ctrldeletePost;
	private $ctrlupdateArticle;
	private $ctrlupdateArticlePost;

	//Constructeur
	public function __construct()
	{
		$this-> ctrlHomeView = new ctrlHomeView();
		$this-> ctrlListPost= new ctrlListPost();
		$this-> ctrlPostView= new ctrlPostView();
		$this-> ctrlSignIn= new ctrlSignIn();
		$this-> ctrlSignUp= new ctrlSignUp();		
		$this-> ctrlAdminView= new ctrlAdminView();
		$this-> ctrlLogOut= new ctrlLogOut();
		$this-> ctrlAddPost= new ctrlAddPost();
		$this-> ctrlAddPostView= new ctrlAddPostView();
		$this-> ctrlDisplayArticles= new ctrlDisplayArticles();
		$this-> ctrldeletePost= new ctrldeletePost();
		
		$this-> ctrlupdateArticle= new ctrlupdateArticle();
		$this-> ctrlupdateArticlePost= new ctrlupdateArticlePost();
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

					case 'getListPost': //Liste des posts
						$this-> ctrlListPost->getListPost();
						break;

					case 'getPostComments': //Post and comments
						$this-> ctrlPostView->getPostComments();
						break;

						//LogIn/LogUp
					
					case 'connectView': //LogIn
						$this-> ctrlSignIn->connectView();
						break;						
					case 'checkingConnect': //LogIn
						$this-> ctrlSignIn->checkingConnect();
						break;

					case 'connectRegisterView': //LogUp
						$this-> ctrlSignUp->connectRegisterView();
						break;
					case 'checkingRegister': //LogUp
						$this-> ctrlSignUp->checkingRegister();
						break;
					
					//Administrateur
					case 'adminView': //AdminView
						$this-> ctrlAdminView->adminView();
						break;

					//Articles					
					case 'addPostView': //View add post
					$this-> ctrlAddPostView->addPostView();
					break;
					case 'addPost': //traitement articles 
						//();
						if(isset($_POST['valider']) )
						{
							if(!empty($_POST['title']) AND !empty($_POST['chapo']) 
								AND !empty($_POST['content']) AND !empty($_POST['author']) )
							{
								$this-> ctrlAddPost->addPost($_POST['title'],$_POST['chapo'],$_POST['content'],$_POST['author'] );
							}
							else{
								echo 'Recherche encore !';
							}
						}	
						break;

					case 'displayArticle': //View all Articles
					$this-> ctrlDisplayArticles->displayArticle();
					break;
					case 'deletePost': //Delete post
					$this-> ctrldeletePost->deletePost();
					break;	
					case 'updateArticle': //Update post
					$this-> ctrlupdateArticle->updateArticle();
					break;
					case 'updateArticlePost': //Form Update post
					$this-> ctrlupdateArticlePost->updateArticlePost();
					break;


					//Deconnexion
					case 'logOut': //AdminView
						$this-> ctrlLogOut->logOut();
						break;

					default:
						$this-> ctrlHomeView->homeView();
						//echo 'je suis avec toi';			
						break;
				}
			}
			else
			{
				$this->ctrlHomeView->homeView();
				header('Location:index.php?action=homeView');
			}   
		} catch (Exception $e) 
		{
			echo 'Erreur : '.$e->getMessage();
		}

		//$this-> erreur($e->getMessage());
			/*private function erreur($msgErreur){

			} */
	}

}