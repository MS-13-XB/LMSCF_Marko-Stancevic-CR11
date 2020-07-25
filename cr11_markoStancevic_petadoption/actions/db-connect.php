<?php 

	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	define('dbHOST','localhost');
	define('dbUSER','root');
	define('dbPASS','');
	define('dbNAME','cr11_markostancevic_petadoption');

	$conn = mysqli_connect(dbHOST, dbUSER, dbPASS, dbNAME);

	if(!$conn)
	{
		die("Connection failed: " . mysqli_error());
	}


 ?>