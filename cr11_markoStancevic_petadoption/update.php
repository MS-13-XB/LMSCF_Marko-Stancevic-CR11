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

		$sql = "SELECT * FROM animals WHERE ani_id = $id";
		$result = mysqli_query($conn, $sql);

		$row = $result->fetch_assoc();

	}
	$conn->close();
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Libary</title>
 </head>
 <body>
 
 	<form action="actions/action_update.php" method="post">
 		<input type="hidden" name="hidden_id" value="<?php echo $row['ani_id'] ?>"><br>
		<input type="text" name="ani_name" value="<?php echo $row['ani_name'] ?>"><br>
		<input type="text" name="ani_art" value="<?php echo $row['ani_art'] ?>"><br>
		<input type="text" name="ani_age" value="<?php echo $row['ani_age'] ?>"><br>
		<input type="text" name="ani_description" value="<?php echo $row['ani_description'] ?>"><br>
		<input type="text" name="ani_type" value="<?php echo $row['ani_type'] ?>"><br>
		<input type="text" name="ani_hobbies" value="<?php echo $row['ani_hobbies'] ?>"><br>
		<input type="text" name="ani_zip_code" value="<?php echo $row['ani_zip_code'] ?>"><br>
		<input type="text" name="ani_address" value="<?php echo $row['ani_address'] ?>"><br>
		<input type="text" name="ani_city" value="<?php echo $row['ani_city'] ?>"><br>
		<input type="text" name="ani_image" value="<?php echo $row['ani_image'] ?>"><br>
		<input type="submit" name="Load" value="Upload">

	</form>


 </body>
 </html>