<?php 

	ob_start();
	session_start();

 ?>






<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">   
	<style type="text/css">

	#LGB
	{
		position: center;
	}
	
	</style>	
</head>
<body>

	<hr>

	<h1 style="text-align: center;">Search-Engine for friends</h1>
            
	<hr>

	<div class="Container">
		<div class="row">

			<div class='card col-4 '>
				<img class="card-img-top" src="images/start_small1.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Small Animals</h4>
					<a href="home_user_small_ani.php" class='btn btn-primary'>see more</a>
				</div>
			</div>

			<div class='card col-4 '>
				<img class="card-img-top" src="images/start_lar.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Large Animals</h4>
					<a href="home_user_large_ani.php" class='btn btn-primary'>see more</a>
				</div>
			</div>

			<div class='card col-4 '>
				<img class="card-img-top" src="images/start_sen.jpg" alt="">
				<div class="card-body">
					<h4 class="card-title">Senior Animals</h4>
					<a href="home_user_senior_ani.php" class='btn btn-primary'>see more</a>
				</div>
			</div>

			<hr>
			<div id="LGB">
			<a class="btn btn-secondary" href="user_all_ani_lis.php">Show all friends</a>
			<a class="btn btn-secondary" href="logout.php?logout">Logout</a>
			</div>

			
		</div>
	</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
<?php ob_end_flush(); ?>