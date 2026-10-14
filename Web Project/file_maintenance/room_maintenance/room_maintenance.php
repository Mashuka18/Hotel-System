<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Room Maintenance Menu --> 
<!-- Purpose: Displays the Room Maintenance menu, allowing users to add, delete, or amend room details.-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Room Maintenance Menu</title>
  <!-- Link to the external CSS file for styling -->
  <link rel="stylesheet" href="../../index.css"> <!-- Path to the main stylesheet -->
</head>
<body>

<!-- Include sidebar page -->
  <?php include('../../sidebar.php'); ?>

<!-- Main content area -->
<main class="content">
  <header class="topbar">
    <h1>Room Maintenance Menu</h1> <!-- Page title -->
  </header>

  <!-- Menu options for managing room information -->
  <section class="menu-options">
    <a href="add_room/add_room.html.php" class="option">Add a Room</a> <!-- Path to Add Room -->
    <a href="delete_room/delete_room.html.php" class="option">Delete a Room</a> <!-- Path to Delete Room -->
    <a href="amend_room/amend_room.html.php" class="option">Amend/View a Room</a> <!-- Path to Amend/View Room -->
  </section>
</main>

</body>
</html>
