<!-- Name:  Illia Karban, Mariia Vanaga Student, Maryna Sobol --> 
<!-- Student ID:  C00315274, C00313153, C00312784 --> 
<!-- Month: February 2026 --> 
<!-- Screen name: Main Dashboard --> 
<!-- Purpose: Main dashboard page for displaying hotel menus --> 
<?php
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location:login_screen.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta charset to define the character encoding -->
  <meta charset="UTF-8">
  <!-- Title of the page as shown in the browser tab -->
  <title>Hotel Operations</title>
  <!-- Link to external CSS file for styling -->
  <link rel="stylesheet" href="index.css">
</head>
<body>

<!-- Include sidebar page -->
  <?php include('sidebar.php'); ?>

<!-- Main content area, where the primary content of the page will be displayed -->
<main class="content">
  <!-- Placeholder heading indicating the main content will be added soon -->
  <h1>WELCOME TO HOTEL MANAGEMENT SYSTEM!!!</h1>
</main>

</body>
</html>