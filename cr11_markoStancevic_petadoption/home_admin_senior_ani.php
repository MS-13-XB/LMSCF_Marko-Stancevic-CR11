<?php

#for each file in CRUD, add this part of code (from ob_start() until exit)
	ob_start();
	session_start();
	require_once 'actions/db-connect.php';
	// if session is not set this will redirect to login page /secure the url
	if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user']) ) {
	 header("Location: startSite.html");
	 exit;
	}
	if (isset($_SESSION["user"]))
	{
	  header("Location: home_user.php");
	  exit;
	}


	// select logged-in users details
	$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['admin']);
	$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
	<title>small Animals</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">   
</head>
<body>
	<hr>
	<h1 style="text-align: center;">Welcome to our senior Friends !</h1>
	<hr>

	<div class="container">
		<div class="row">

			<?php 

				

				$sql = "SELECT * FROM animals WHERE ani_type = 'senior'";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows == 0)
				{
					echo "NO VALUES IN THE DATABASE";
				}
				elseif($result->num_rows == 1)
				{
					$row = $result->fetch_assoc();

					echo "<div class='card col-4 '>
  					<img class='card-img-top' src='".$row["ani_image"]."' alt='Animal Image'>
  					<div class='card-body'>
    				<h5 class='card-title' style='text-align:center'>".$row["ani_name"]."</h5>
    				<p class='card-text'>Art: ".$row["ani_art"]."</p>
    				<p class='card-text'>Age: ".$row["ani_age"]."</p>
    				<p class='card-text'>Descr. : ".$row["ani_description"]."</p>
    				<p class='card-text'>Hobbies: ".$row["ani_hobbies"]."</p>
    				<p class='card-text'>ZIP-Code: ".$row["ani_zip_code"]."</p>
    				<p class='card-text'>Location: ".$row["ani_address"].",".$row["ani_city"]."</p>
    				<a href='update.php?id=".$row["ani_id"]."' class='btn btn-primary'>Update</a>
    				<a href='request.php?id=".$row["ani_id"]."' class='btn btn-primary'>Delete</a>
    				

  					</div>
					</div>";
				}
				else
				{
					$rows = $result->fetch_all(MYSQLI_ASSOC);
					foreach ($rows as $value)
					{

					echo "<div class='card col-4 '>
  					<img class='card-img-top' src='".$value["ani_image"]."' alt='Animal Image'>
  					<div class='card-body'>
    				<h5 class='card-title' style='text-align:center'>".$value["ani_name"]."</h5>
    				<p class='card-text'>Art: ".$value["ani_art"]."</p>
    				<p class='card-text'>Age: ".$value["ani_age"]."</p>
    				<p class='card-text'>Descr. : ".$value["ani_description"]."</p>
    				<p class='card-text'>Hobbies: ".$value["ani_hobbies"]."</p>
    				<p class='card-text'>ZIP-Code: ".$value["ani_zip_code"]."</p>
    				<p class='card-text'>Location: ".$value["ani_address"].",".$value["ani_city"]."</p>
    				<a href='update.php?id=".$value["ani_id"]."' class='btn btn-primary'>Update</a>
    				<a href='delete.php?id=".$value["ani_id"]."' class='btn btn-primary'>Delete</a>

  					</div>
					</div>";

					}
				}
				echo "</div>
				<hr>";

				echo " <div class'card-body'>
    			<a href='home_admin.php' class='btn btn-primary text-align : center'>Back</a>
  				</div>";

  				$conn->close();

			 ?>
			
		</div>

		
	</div>










	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>