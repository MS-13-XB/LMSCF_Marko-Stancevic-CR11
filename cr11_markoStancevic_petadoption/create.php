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


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="actions/action_create.php" method="post">
		<input type="text" name="ani_name" placeholder="Name"><br>
		<input type="text" name="ani_art" placeholder="Art"><br>
		<input type="text" name="ani_age" placeholder="Age"><br>
		<input type="text" name="ani_description" placeholder="Description"><br>
		<input type="text" name="ani_type" placeholder="small/large/senior"><br>
		<input type="text" name="ani_hobbies" placeholder="Hobbies"><br>
		<input type="text" name="ani_zip_code" placeholder="ZIP-Code"><br>
		<input type="text" name="ani_address" placeholder="Adress"><br>
		<input type="text" name="ani_city" placeholder="City"><br>
		<input type="text" name="ani_image" placeholder="Image(link)"><br>
		<input type="submit" name="Load" placeholder="Upload">
		
	
	</form>

</body>
</html>
<?php ob_end_flush(); ?>