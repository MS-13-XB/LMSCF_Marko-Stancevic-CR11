<?php 

	session_start();
	if(!isset($_SESSION['user']))
	{
		header("Location: index_login.php");
	}
	elseif(isset($_SESSON['user'])!="")
	{
		header("Location: home_user.php");
	}


	if(isset($_GET['logout']))
	{
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: startSite.html");
		exit;
	}
 ?>