<?php
//require_once('controllers/ctrlAccueil.php');

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class ctrlHomeView
{
	  public function __construct() {
   /* $this->Accueil = new Accueil();*/
  }

  public function homeView() 
	{
		require('view/frontend/homeView.php');
	}
}