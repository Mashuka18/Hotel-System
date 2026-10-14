<!-- Name: Illia Karban, Mariia Vanaga, Maryna Sobol --> 
<!-- Student ID: C00315274, C00313153, C00312784 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: Checkin/Checkout Menu --> 
<!-- Purpose: Check-in and Check-out menu page for accessing guest arrival and departure functions --> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Check-in / Check-out Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../index.css"> 
</head>
<body>
	
<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Check-in / Check-out Menu</h1>
  </header>

  <!-- Menu options section -->
  <section class="menu-options">
    <a href="checkin.php" class="option">Check-in</a>  
    <a href="checkout.php" class="option">Check-out</a> 
  </section>
</main>

</body>
</html>
