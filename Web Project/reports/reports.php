<!-- Name: Illia Karban, Mariia Vanaga, Maryna Sobol --> 
<!-- Student ID: C00315274, C00313153, C00312784 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: Reports --> 
<!-- Purpose: Reports menu page for accessing reports management functions --> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Reports</h1> <!-- Page title -->
  </header>

  <!-- Menu options for different maintenance categories -->
  <section class="menu-options">
    <a href="guest_stays/guest_stays_report.php">Guest Stays Report</a> <!-- Path to Guest Stays Report -->
    <a href="stock_report/stock_report.php">Stock Report</a> <!-- Path to Stock Report -->
    <a href="orders_report/orders_report.php">Orders Report</a> <!-- Path to Orders Report -->
  </section>
</main>

</body>
</html>
