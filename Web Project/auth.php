<!-- Name:  Illia Karban, Mariia Vanaga Student, Maryna Sobol --> 
<!-- Student ID:  C00315274, C00313153, C00312784 --> 
<!-- Month: February 2026 --> 
<!-- Screen name: auth.php --> 
<!-- Purpose: Restrict access to authenticated users by checking the session and redirecting unauthenticated users to the login page. --> 
<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: /Student 4/draft/Web Project/login_screen.php'); 
    exit;
}
?>