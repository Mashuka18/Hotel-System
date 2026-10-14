<!-- Name: Illia Karban, Mariia Vanaga, Maryna Sobol --> 
<!-- Student ID: C00315274, C00313153, C00312784 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: File Maintenance Menu --> 
<!-- Purpose: File Maintenance menu page for accessing staff, stock, guest, and room management sections --> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>File Maintenance Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>File Maintenance Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for different maintenance categories -->
  <section class="menu-options">
    <a href="staff_maintenance/staff_maintenance.php">Staff Maintenance</a> <!-- Path to Staff Maintenance -->
    <a href="stock_maintenance/stock_maintenance.php">Stock Maintenance</a> <!-- Path to Stock Maintenance -->
    <a href="guest_maintenance/guest_maintenance.php">Guest Maintenance</a> <!-- Path to Guest Maintenance -->
    <a href="room_maintenance/room_maintenance.php">Room Maintenance</a> <!-- Path to Room Maintenance -->
  </section>
</main>

</body>
</html>
