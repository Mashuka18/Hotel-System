<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Staff Maintenance Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Staff Maintenance Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for managing staff information -->
  <section class="menu-options">
    <a href="add_staff.html" class="option">Add a Staff Member</a> <!-- Path to Add Staff -->
    <a href="delete_staff.html" class="option">Delete a Staff Member</a> <!-- Path to Delete Staff -->
    <a href="amend_staff.html" class="option">Amend/View a Staff Member</a> <!-- Path to Amend/View Staff -->
    <a href="../file_maintenance.html">Back to File Maintenance</a> <!-- Back to File Maintenance -->
  </section>
</main>

</body>
</html>
