<!-- Name: Illia Karban, Mariia Vanaga, Maryna Sobol --> 
<!-- Student ID: C00315274, C00313153, C00312784 --> 
<!-- Date: February 2026 --> 
<!-- Screen name: Stock Control Menu --> 
<!-- Purpose: Stock Control menu page for accessing stock management functions --> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Control Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Stock Control Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for stock control actions -->
  <section class="menu-options">
    <a href="remove_stock/remove_stock.php" class="option">Remove Stock</a> <!-- Path to Remove Stock -->
    <a href="place_orders/place_orders.php" class="option">Place Orders</a> <!-- Path to Place Orders -->
    <a href="receive_goods/receive_goods.php" class="option">Receive Goods</a> <!-- Path to Receive Goods -->
  </section>
</main>

</body>
</html>
