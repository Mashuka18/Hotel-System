<!-- Name: Mariia Vanaga  --> 
<!-- Student ID: C00313153 --> 
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Delete Room --> 
<!-- Purpose: Allows users to select a room, view its details, and safely delete it with confirmation and validation checks.--> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <!-- Character encoding --> 
    <meta charset="UTF-8"> 
 
    <!-- Page title displayed in browser tab --> 
    <title>Hotel Operations - Delete Room</title> 

    <!-- Global system styling --> 
    <link rel="stylesheet" href="../../../index.css"> 

    <!-- Styling specific to delete room form --> 
    <link rel="stylesheet" href="../../add_amend_delete.css"> 

</head> 
<body> 
<!-- Include sidebar page --> 

  <?php include('../../../sidebar.php'); ?> 

    <!-- Main content area --> 
    <main class="content"> 
        <script> 
            /* FUNCTION: populate() 
              This function is triggered when a room is selected 
               from the listbox. 
               It: 
               1. Retrieves the selected option value 
               2. Splits the combined string using "|" 
               3. Assigns each value to the correct input field 
            */ 
            function populate() { 
        //Gets the dropdown element with the ID listbox from the HTML 
        //sets set variable  
                var sel = document.getElementById("listbox"); 
        /*sel.options gives all <option> elements in the dropdown. 
        sel.selectedIndex gives the index of the currently selected option. 
        .value gets the value of that option, which in your code is a string combining all room data, separated by "|". 
        This string is stored in the variable result.*/ 
                var result = sel.options[sel.selectedIndex].value; 

                // If no room selected, stop function 
                if (result === "") return; 

                // Split values into an array 
                var room = result.split('|'); 

                // Populate read-only fields 
        /*Each line takes a specific piece of the array (room[1], room[2]) and fills the corresponding form field. 
        This means when a room is selected, the user immediately sees all its details in the form.*/ 
                document.getElementById("RoomID").value = room[0]; 
                document.getElementById("RoomPhoneExtension").value = room[1]; 
                document.getElementById("RoomType").value = room[2]; 
                document.getElementById("RoomCurrentStatus").value = room[3]; 
                document.getElementById("RoomCostPerNight").value = room[4]; 
                document.getElementById("RoomSpecialNotes").value = room[5]; 

            } 

            /* FUNCTION: confirmDelete() 
               Displays a confirmation message before deleting. 
               If user clicks OK → form submits. 
               If user clicks Cancel → submission stops.*/ 
            function confirmDelete() { 

        //Gets the value of the RoomCurrentStatus field. 
                var roomStatus = document.getElementById("RoomCurrentStatus").value; 
                if (roomStatus === "Occupied") { 
                    alert("Cannot delete this room because it is currently occupied."); 
                    return false; 
                } 
                return confirm("Are you sure you want to delete this room?"); 

            } 
        </script> 

        <!-- Form submits selected RoomID to delete_room.php 

             POST method is used because data is being modified. --> 

        <form action="delete_room.php" method="POST" onsubmit="return confirmDelete();"> 

            <h1>Delete Room</h1> 

            <h4>Select a room from the list to delete it from the system.</h4> 

            <!-- Include dynamic dropdown list of active rooms --> 

            <?php include 'listbox.php'; ?> 

            <!-- Room ID (Primary Key) - Read Only --> 

            <div class="inputbox"> 

                <label for="RoomID">Room ID</label> 
                <input type="text" name="RoomID" id="RoomID" readonly> 

            </div> 

            <!-- Display-only fields (cannot be edited) --> 

            <div class="inputbox"> 

                <label>Phone Extension</label> 
                <input type="text" id="RoomPhoneExtension" readonly> 

            </div> 

            <div class="inputbox"> 

                <label>Room Type</label> 
                <input type="text" id="RoomType" readonly> 

            </div> 

            <div class="inputbox"> 

                <label>Current Status</label> 
                <input type="text" id="RoomCurrentStatus" readonly> 

            </div> 

            <div class="inputbox"> 

                <label>Cost Per Night</label> 
                <input type="text" id="RoomCostPerNight" readonly> 

            </div> 

            <div class="inputbox"> 

                <label>Special Notes</label> 
                <input type="text" id="RoomSpecialNotes" readonly> 

            </div> 

            <!-- Delete button --> 

            <div class="myButton"> 
                <input type="submit" value="Delete Room"> 

            </div> 
        </form> 
    </main> 
</body> 
</html> 