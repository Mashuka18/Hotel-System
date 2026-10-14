<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Stock Maintenance Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Stock Maintenance Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for managing stock items -->
  <section class="menu-options">
    <a href="add_stock.html" class="option">Add a Stock Item</a> <!-- Path to Add Stock -->
    <a href="delete_stock.html" class="option">Delete a Stock Item</a> <!-- Path to Delete Stock -->
    <a href="amend_stock.html" class="option">Amend/View a Stock Item</a> <!-- Path to Amend/View Stock -->
  </section>
</main>

</body>
</html>
