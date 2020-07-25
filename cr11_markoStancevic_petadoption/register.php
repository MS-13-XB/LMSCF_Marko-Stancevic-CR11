<?php 

	ob_start();
	session_start();
	

	if(isset($_SESSION['user'])!="")
	{
		header("Location: home_user.php");
	}
	include_once 'actions/db-connect.php';
	$error = false;
	#btn-register = name of the submit button
	if(isset($_POST['btn-register']))
	{
		#name = input name;
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

		#email = input name;
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		#pass = input name;
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		if(empty($name))
		{
			$error = true;
			$nameError = "Please enter your full name !";
		}
		elseif(strlen($name) < 3)
		{
			$error = true;
			$nameError = "Name must have at least 3 characters !";
		}
		elseif(!preg_match("/^[a-zA-Z ]+$/",$name))
		{
			$error = true;
			$nameError = "Name must contain alphabets and space !";
		}


		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$error = true;
			$emailError = "Please enter a valid email address !";
		}
		else
		{
			$query = "SELECT user_email FROM users WHERE user_email='$email'";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);

			if($count != 0)
			{
				$error = true;
				$emailError = "Provided e-mail is already in use !";
			}
		}

		if(empty($pass))
		{
			$error = true;
			$passError = "Please enter your password !";
		}
		elseif(strlen($pass) < 7)
		{
			$error = true;
			$passError = "Password must have atleast 7 characters";
		}

		$password = hash('sha256', $pass);

		if(!$error)
		{
			$query ="INSERT INTO `users`(`user_name`, `user_email`, `user_pass`) VALUES ('$name','$email','$password')";
			$res = mysqli_query($conn, $query);
			#echo $query;
			if($res)
			{
				$errTyp = "Success";
				$errMSG = "Successfully registrated, you may login now !";
				unset($name);
				unset($email);
				unset($pass);
				header("Refresh:3 ; URL=index_login.php");
			}
			else
			{
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later . . .";
			}
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Registration</title>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
 </head>
 <body>
 
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
		
		<h2>Register now</h2>
		<hr>

		<?php 
			if(isset($errMSG))
			{
		?>

		 <div class="alert alert-<?php echo $errTyp ?>">
		 	<?php 
		 		echo $errMSG;
		 	?>		 	
		 </div>

		 <?php 
		 	}
		 ?>

		 <input type="text" name="name" class="form-control" placeholder="Enter your name" maxlength="50" value="<?php echo $name ?>" />
		 <span class="text-danger"><?php echo $nameError; ?></span>

		 <input type="email" name="email" class="form-control" placeholder="Enter your email" maxlength="40" value="<?php echo $email ?>" />
		 <span class="text-danger"><?php echo $emailError; ?></span>

		 <input type="password" name="pass" class="form-control" placeholder="Enter your password" maxlength="15" />
		 <span class="text-danger"><?php echo $passError; ?></span>

		 <button type="submit" class="btn btn-block btn primary" name="btn-register">register now</button>
		 <hr>
		 <!-- <a class="btn btn-secondary" href="register.php">Follow me to register</a> -->

	</form>

	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 </body>
 </html>
 <?php  ob_end_flush(); ?>