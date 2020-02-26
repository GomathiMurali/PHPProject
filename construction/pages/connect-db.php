<?php
	
	
		$server = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'malarschooldata';
 
 error_reporting(0);
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) or die ("Could not connect to database ... \n" . mysql_error ());

	$con=mysqli_connect($server,$user,$pass,$db);

	if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>