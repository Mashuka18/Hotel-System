<!-- Name:  Illia Karban, Mariia Vanaga Student, Maryna Sobol --> 
<!-- Student ID:  C00315274, C00313153, C00312784 --> 
<!-- Month: February 2026 --> 
<!-- Screen name: db.inc.php --> 
<!-- Purpose: db connection --> 
<?php

//variables
$hostname = "localhost:3306"; //name of host or ip address
$username = "dinein_DB"; // My SQL username 
$password = 'Chef$Special;2026@DBsql';   // My SQL password
	
	
$dbname = "dinein_"; //database Name 


$con = mysqli_connect($hostname, $username, $password, $dbname); //Opens a new connection to a 	MySQL server


//if !$con show a display message with error
if (!$con){
    die("Failed to connect to MySQL:" . mysqli_connect_error());
}


?>

