<?php 

	ob_start();
	session_start();
	require_once 'actions/db-connect.php';

	if(isset($_SESSION['user'])!="")
	{
		header("Location: home_user.php");
		exit;
	}

	$error = false;
	#btn-login = button name
	if(isset($_POST['btn-login']))
	{
		#email = input name
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		#pass = input name
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		if(empty($email))
		{
			$error = true;
			$emailError = "Please enter your email address !";
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$error = true;
			$emailError = "Please enter a valid email address !";
		}

		if(empty($pass))
		{
			$error = true;
			$passError = "Please enter your password !";
		}

		#Error == 0 -> continue with login
		if(!$error)
		{
			$password = hash( 'sha256' , $pass);

			$sql = "SELECT * FROM users WHERE user_email='$email'";
			$res = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
			$count = mysqli_num_rows($res);

			if($count == 1 && $row['user_pass']==$password)
			{
				if($row['user_status'] == 'admin')
				{
					$_SESSION['admin'] = $row['user_id'];
					header("Location: home_admin.php");
				}
				else
				{
					$_SESSION['user'] = $row['user_id'];
					header("Location: home_user.php");
				}
			}
			else
			{
				$errMSG = "Incorrect Credentials, please try again . . .";
			}
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>LOGIN</title>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
 </head>
 <body>

 	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" accept-charset="utf-8">
		
		<h3>Login</h3>
		<hr>
		
		<?php 
			if(isset($errMSG))
			{
				echo $errMSG;
		?>
		<?php
			}
		 ?>

		 <input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo $email; ?>" maxlength="40">
		 <span class="text-danger"><?php echo $emailError; ?></span>

		 <input type="password" name="pass" class="form-control" placeholder="Your password" maxlength="21">
		 <span class="text-danger"><?php echo $passError; ?></span>

		 <hr>

		 <button class="btn btn-primary" type="submit" name="btn-login">Login</button>

		 <hr>

		 <a class="btn btn-secondary" href="register.php">Follow me to register</a>








 	</form>
 




 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 </body>
 </html>
 <?php ob_end_flush() ?>