<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Guest Maintenance Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Guest Maintenance Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for managing guest information -->
  <section class="menu-options">
    <a href="add_guest/add_guest.html" class="option">Add a Guest</a> <!-- Path to Add Guest -->
    <a href="delete_guest/delete_guest.html" class="option">Delete a Guest</a> <!-- Path to Delete Guest -->
    <a href="amend_guest/amend_guest.html" class="option">Amend/View a Guest</a> <!-- Path to Amend/View Guest -->
  </section>
</main>

</body>
</html>
