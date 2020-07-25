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
	
	require_once"db-connect.php";

	if($_POST)
	{
		$ani_name = $_POST["ani_name"];
		$ani_art = $_POST["ani_art"];
		$ani_age = $_POST["ani_age"];
		$ani_description = $_POST["ani_description"];
		$ani_type = $_POST["ani_type"];
		$ani_hobbies = $_POST["ani_hobbies"];
		$ani_zip_code = $_POST["ani_zip_code"];
		$ani_address = $_POST["ani_address"];
		$ani_city = $_POST["ani_city"];
		$ani_img = $_POST["ani_image"];

		$sql ="INSERT INTO `animals`(`ani_name`, `ani_art`, `ani_age`, `ani_description`, `ani_type`, `ani_hobbies`, `ani_zip_code`, `ani_address`, `ani_city`, `ani_image`) VALUES ('$ani_name','$ani_art',$ani_age,'$ani_description','$ani_type','$ani_hobbies',$ani_zip_code,'$ani_address','$ani_city','ani_img')";

		if(mysqli_query($conn,$sql))
		{
			echo "<h3 style='color:green'>Successfully created !</h3>";
			header("refresh:3 ; URL=../home_admin.php");
			
		}
		else
		{
			echo "E R R O R";
		}
	}
	$conn->close();



 ?>