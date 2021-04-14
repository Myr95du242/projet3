<?php
namespace myrna\blog\controllers;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class ctrlHomeView
{
	

  public function homeView() 
	{
		require('view/frontend/homeView.php');
	}
}