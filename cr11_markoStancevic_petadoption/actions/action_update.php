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

	require_once 'db-connect.php';

	if($_POST)
	{
		$id= $_POST["hidden_id"];

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

		$sql = "UPDATE `animals` SET `ani_name`='$ani_name',`ani_art`='$ani_art',`ani_age`=$ani_age,`ani_description`='$ani_description',`ani_type`='$ani_type',`ani_hobbies`='$ani_hobbies',`ani_zip_code`=$ani_zip_code,`ani_address`='$ani_address',`ani_city`='$ani_city',`ani_image`='$ani_img' WHERE `ani_id` = $id";

		$result = mysqli_query($conn, $sql);
		if($result)
		{
			echo "<h3 style='color:green;'>Successfully Uploaded !</h3> ";
			header("refresh:3; URL=../home_admin.php");
			#header("refresh:3; URL=http://localhost/CodeReview10-MS/index.php")
		}
		else
		{
			echo "ERROR";
		}
		

	}
	$conn->close();


 ?>