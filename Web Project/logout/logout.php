<!-- Name: Illia Karban, Mariia Vanaga, Maryna Sobol --> 
<!-- Student ID: C00315274, C00313153, C00312784 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: Logout --> 
<!-- Purpose: Logout from hotel management system. --> 
<?php
session_start(); 
// Starts the session so we can access and delete session data

session_destroy();          
// Deletes all session data (logs the user out completely)

header("Location: ../login_screen.php"); 
// Redirects the user back to the login page

exit; 
// Stops the script immediately after redirect
?>