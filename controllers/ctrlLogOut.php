<?php

class ctrlLogOut{

	public function logOut()
	{
		session_start();
		$_SESSION=array();
		session_destroy();

		header('Location:index.php?action=connectView');
	}
}