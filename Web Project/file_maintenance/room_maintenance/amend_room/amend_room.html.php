<!-- Name: Mariia Vanaga  --> 
<!-- Student ID: C00313153 --> 
<!-- Month: March 2026--> 
<!-- Screen name: Hotel Operations - Amend/View Room -->
<!-- Purpose: Allows users to view a room’s details and switch to edit mode to amend and save updates after confirmation.--> 
<!DOCTYPE html> 
<!-- Declares that this is an HTML5 document --> 

<html lang="en"> 
<!-- Root HTML element; lang="en" sets the language to English --> 

<head> 
<meta charset="UTF-8"> 
<!-- Defines the character encoding as UTF-8 for special characters --> 

 

<!-- Page title displayed in browser tab --> 
<title>Hotel Operations - Amend/View Room</title> 

<!-- Link to global stylesheet for the entire site --> 
<link rel="stylesheet" href="../../../index.css"> 

<!-- Link to page-specific styling for amend room forms --> 
<link rel="stylesheet" href="../../add_amend_delete.css"> 

</head> 
<body> 

<!-- Main body of the webpage containing visible content --> 

<!-- Include sidebar page --> 
  <?php include('../../../sidebar.php'); ?> 

<!-- Main Content Area --> 
<main class="content"> 

<script> 

// FUNCTION: Populate Form 
// This function fills the input fields when a room is selected from the dropdown 

function populate() { 
    var sel = document.getElementById("listbox"); 

    // Get the dropdown list element by its ID 
    var result = sel.options[sel.selectedIndex].value; 

    // Get the value of the selected option 

    // If no room is selected (empty value), exit the function 
    if(result === "") return; 

    // Split the string value by "|" into an array of room details 
    var room = result.split('|'); 

    // Assign each array element to its corresponding input field 
    document.getElementById("RoomID").value = room[0]; // Room ID (primary key) 
    document.getElementById("RoomPhoneExtension").value = room[1]; // Phone extension 
    document.getElementById("RoomType").value = room[2]; // Room type 
    document.getElementById("RoomCurrentStatus").value = room[3]; // Current status 
    document.getElementById("RoomCostPerNight").value = room[4]; // Cost per night 
    document.getElementById("RoomSpecialNotes").value = room[5]; // Special notes 
    document.getElementById("RoomLastUpdate").value = room[6]; // Last update date 

} 
 

// FUNCTION: Toggle View / Amend Mode 
// Enables or disables fields for editing 

function toggleLock() { 
    var isLocked = document.getElementById("RoomPhoneExtension").disabled; 
    // Check whether fields are currently disabled 

    // Toggle fields to enable or disable 
  // Set the field’s disabled property to the opposite of its current state. 
    document.getElementById("RoomPhoneExtension").disabled = !isLocked; 
    document.getElementById("RoomType").disabled = !isLocked; 
    document.getElementById("RoomCostPerNight").disabled = !isLocked; 
    document.getElementById("RoomSpecialNotes").disabled = !isLocked; 


    // RoomCurrentStatus should remain disabled at all times 
    document.getElementById("RoomCurrentStatus").disabled = true; 

    // Change the text on the "Amend/View" button based on the current state of the form: 
    // - If the form was locked (isLocked = true), the button now switches to "View Details". 
    // - If the form was unlocked (isLocked = false), the button now switches to "Amend Details". 
    document.getElementById("amendViewButton").value = 
        isLocked ? "View Details" : "Amend Details"; 

} 

// FUNCTION: Confirm Before Saving 
// Pops up a confirmation dialog before submitting the form 

function confirmCheck() { 
    var response = confirm("Are you sure you want to save these changes?"); 
    
	// Shows a browser confirmation dialog; returns true if user clicks OK 
    if (response) { 
        // Enable all disabled input fields because disabled fields are not submitted 
        document.getElementById("RoomPhoneExtension").disabled = false; 
        document.getElementById("RoomType").disabled = false; 
        document.getElementById("RoomCurrentStatus").disabled = false; 
        document.getElementById("RoomCostPerNight").disabled = false; 
        document.getElementById("RoomSpecialNotes").disabled = false; 
        return true; // Allow form submission 
    } 
    return false; // Prevent form submission if user cancels 
} 
</script> 

<!-- Form submits room details to amend_view_room.php using POST --> 
<form action="amend_view_room.php" method="POST" onsubmit="return confirmCheck();"> 

<h1>Amend / View Room</h1> 
<h4>Select a room from the list, then click Amend Details to edit.</h4> 

<!-- Dropdown list of rooms populated by PHP include --> 
<?php include 'listbox.php'; ?>  

<!-- Optional display area for extra info (not used currently) --> 
<p id="display" class="text-details"></p> 

<!-- Room ID (Primary Key) --> 
<div class="inputbox"> 
  <label for="RoomID">Room ID (Read Only)</label> 
  <input type="text" name="RoomID" id="RoomID" readonly placeholder="Room ID"> 
</div> 

<!-- Room Phone Extension --> 
<div class="inputbox"> 
  <label for="RoomPhoneExtension">Phone Extension</label> 
  <input type="text" name="RoomPhoneExtension" id="RoomPhoneExtension" disabled  
         pattern="[0-9\s]+" title="Phone extension should only be numbers." 
         placeholder="Enter Room Phone Extension"> 
</div> 

<!-- Room Type --> 
<div class="inputbox"> 
<label for="RoomType">Room Type</label> 
<input type="text" name="RoomType" id="RoomType" disabled> 
</div> 

 

<!-- Room Current Status --> 
<div class="inputbox"> 
<label for="RoomCurrentStatus">Room Current Status</label> 
<input type="text" name="RoomCurrentStatus" id="RoomCurrentStatus" disabled> 
</div> 

 

<!-- Room Cost Per Night --> 
<div class="inputbox"> 

<label for="RoomCostPerNight">Room Cost Per Night</label> 

<input type="number" name="RoomCostPerNight" id="RoomCostPerNight" disabled 
       min="0" step="0.01" required 
       title="Cost must be a positive number" 
       placeholder="Enter Room Cost Per Night"> 
</div> 

<!-- Room Special Notes --> 
<div class="inputbox"> 
<label for="RoomSpecialNotes">Room Special Notes</label> 
<input type="text" name="RoomSpecialNotes" id="RoomSpecialNotes" placeholder="Enter special notes" disabled> 
</div> 

<!-- Room Last Update Date --> 
<div class="inputbox"> 
<label for="RoomLastUpdate">Date of Last Update</label> 
<input type="text" name="RoomLastUpdate" id="RoomLastUpdate" readonly placeholder="Last Update Date"> 
</div> 

<!-- Button Section --> 
<div class="myButton"> 

<!-- Submit button for saving changes --> 
<input type="submit" value="Save Changes"> 

<!-- Button to toggle between view and amend mode --> 
<input type="button" value="Amend Details" 
       id="amendViewButton" onclick="toggleLock()"> 

</div> 
</form> 
</main> 
</body>  
</html> 