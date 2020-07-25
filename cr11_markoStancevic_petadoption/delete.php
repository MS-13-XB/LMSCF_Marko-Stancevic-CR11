<?php 

	ob_start();
	session_start();

	if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) 
	{
	 header("Location: startSite.html");
	 exit;
	}

	if (isset($_SESSION["user"]))
	{
	  header("Location: home_user.php");
	  exit;
	}

	require_once "actions/db-connect.php";

	if($_GET["id"])
	{
		$id = $_GET["id"];

		$sql = "DELETE FROM animals WHERE ani_id = $id";

		if(mysqli_query($conn, $sql))
		{
			echo "<h3 style='color:green;'> Successfully deleted ! </h3>";
			header("refresh:3 ; URL=home_admin.php");

		}
		else
		{
			echo "ERROR";
		}
	}

	$conn->close();
	ob_end_flush();
 ?>