<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Add Room --> 
<!-- Purpose: Allows users to add a new room by entering its details, with validation and options to submit or reset the form.-->

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Define the character encoding for the webpage (UTF-8) -->
  <meta charset="UTF-8">
  
  <!-- Set the title of the page that will appear in the browser tab -->
  <title>Hotel Operations - Add Room</title>
  
  <!-- Link to the global CSS file that styles the layout and sidebar of the page -->
  <link rel="stylesheet" href="../../../index.css">
  
  <!-- Link to the specific CSS file for this page (Add, Amend, Delete Room Styling) -->
  <link rel="stylesheet" href="../../add_amend_delete.css">
</head>

<body>

<!-- Include sidebar page -->
  <?php include('../../../sidebar.php'); ?>

<!-- Main content area where the form for adding a room will be -->
<main class="content">

  <!-- Form to add room data to the system -->
  <form action="add_room.php" method="POST" id="MyForm" onsubmit="return validateForm();">
    <!-- Page heading for the Add Room form -->
    <h1>Add Room</h1>
	  
<!-- Room Number Input -->
    <div class="inputbox">
      <!-- Label for the room number input -->
      <label for="RoomNumber">Room Number</label>
      <!-- Input field for room number with validation -->
      <input type="text" name="RoomNumber" id="RoomNumber" required
             pattern="[0-9]+" title="Room number should only be numbers."
             placeholder="Enter Room Number">
    </div>
	  
    <!-- Room Phone Extension Input -->
    <div class="inputbox">
      <!-- Label for the phone extension input -->
      <label for="RoomPhoneExtension">Room Phone Extension</label>
      <!-- Input field for room phone extension with validation -->
      <input type="text" name="RoomPhoneExtension" id="RoomPhoneExtension" required
             pattern="[0-9\s]+" title="Phone extension should only be numbers."
             placeholder="Enter Room Phone Extension">
    </div>

    <!-- Room Type Dropdown Selection -->
    <div class="inputbox">
      <!-- Label for the room type dropdown -->
      <label for="RoomType">Room Type</label>
      <!-- Dropdown menu to select room type (Single, Double, Suite) -->
      <select name="RoomType" id="RoomType" required>
        <!-- Default option prompting user to select a room type -->
        <option value="">-- Select Type --</option>
        <option value="Single">Single</option>
        <option value="Double">Double</option>
        <option value="Suite">Suite</option>
      </select>
    </div>

    <!-- Cost per Night Input -->
    <div class="inputbox">
      <!-- Label for the cost input field -->
      <label for="RoomCostPerNight">Cost Per Night</label>
      <!-- Input field for the cost of the room per night -->
	  <!-- step="0.01" allows prices with two decimal places -->
      <input type="number" name="RoomCostPerNight" id="cost" step="0.01" required
             placeholder="Enter Cost Per Night" title="Cost per night should be a positive number.">
    </div>

    <!-- Special Notes Textarea -->
    <div class="inputbox">
      <!-- Label for the special notes input field -->
      <label for="RoomSpecialNotes">Special Notes</label>
      <!-- Textarea input for additional notes about the room -->
      <textarea name="RoomSpecialNotes" id="RoomSpecialNotes" placeholder="Enter any special notes"></textarea>
    </div>

    <!-- Form Buttons (Submit and Reset) -->
    <div class="buttons">
      <!-- Button to submit the form (Add Room) -->
      <button type="submit">Add Room</button>
      <!-- Button to reset the form (clear all input fields) -->
      <button type="reset">Reset</button>
    </div>
  </form>

</main>

<!-- External JavaScript file that contains form validation logic -->
<script src="../../add_amend_delete.js"></script>

</body>
</html>