<?php
session_start();

require_once('controllers/ctrlHomeView.php');
require_once('controllers/ctrlListPost.php');
require_once('controllers/ctrlPostView.php');
require_once('controllers/ctrlSignIn.php');
require_once('controllers/ctrlSignUp.php');

class Switcher
{
	//initialisation variable
	private $ctrlHomeView;
	private $ctrlListPost;
	private $ctrlPostView;
	private $ctrlSignIn;
	private $ctrlSignUp;
	//Constructeur
	public function __construct()
	{
		$this-> ctrlHomeView = new ctrlHomeView();
		$this-> ctrlListPost= new ctrlListPost();
		$this-> ctrlPostView= new ctrlPostView();
		$this-> ctrlSignIn= new ctrlSignIn();
		$this-> ctrlSignUp= new ctrlSignUp();
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