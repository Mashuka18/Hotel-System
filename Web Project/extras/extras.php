<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Add Guest Extra --> 
<!-- Purpose: This form is used to add extra charges to a guest’s stay.-->
<?php
// Include database connection file
include '../db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hotel Operations - Add Guest Extra</title>
<!-- Link CSS for page layout -->
<link rel="stylesheet" href="layout.css">
<!-- Main global styling -->
<link rel="stylesheet" href="../index.css">

<script>
// Show staff details when a staff member is selected
function showStaffDetails() {
    var sel = document.getElementById("StaffID"); // get staff dropdown
	//sel now represents the selected staff dropdown
    if(sel.value == "") { // if no staff selected
        document.getElementById("StaffName").value = ""; // clear name
        document.getElementById("StaffJobTitle").value = ""; // clear job title
        document.getElementById("StaffPhone").value = ""; // clear phone
        return; // exit function
    }
    // Split the selected value (StaffID|FirstName|Surname|JobTitle|Phone)
    var parts = sel.value.split("|");
	//Sets the StaffName input field to the full name by combining first name and surname.
    document.getElementById("StaffName").value = parts[1] + " " + parts[2]; // display full name
    document.getElementById("StaffJobTitle").value = parts[3]; // display job title
    document.getElementById("StaffPhone").value = parts[4]; // display phone number
}

// This function runs when the user selects an area
//It updates the Extras dropdown with options related to that area.
function changeExtras() {
	//Gets the selected area from the dropdown with ID ExtraArea
    var area = document.getElementById("ExtraArea").value; // get area
	//Finds the dropdown where the extra options should appear (ExtraDescription) and stores it in extra.
    var extra = document.getElementById("ExtraDescription"); // get extra dropdown
	// Clears any previous options from the extras dropdown, so it can be repopulated.
    extra.innerHTML = ""; // clear previous options

    // Populate options based on area
	// Depending on the selected area, the extra dropdown is filled with different options.
    if(area == "Bar"){
        extra.innerHTML = "<option>Beer</option><option>Wine</option><option>Cocktail</option><option>Spirits</option>";
    } else if(area == "Restaurant"){
        extra.innerHTML = "<option>Breakfast</option><option>Lunch</option><option>Dinner</option><option>Cabaret</option>";
    } else if(area == "Room Service"){
        extra.innerHTML = "<option>Sandwich</option><option>Drinks</option><option>Dessert</option><option>Late Meal</option>";
    } else if(area == "Leisure Centre"){
        extra.innerHTML = "<option>Gym</option><option>Swimming</option><option>Massage</option><option>Sauna</option>";
    }
}

// Confirm before submitting the form
function confirmCheck() {
    return confirm("Add this extra?"); // show browser confirmation dialog
}
</script>
</head>

<body>

<!-- Include sidebar page -->
  <?php include('../sidebar.php'); ?>

<!-- Main Content -->
<div class="content">
    <div class="form-card">

        <h1>Add Guest Extra</h1>
        <p>Select the guest stay and extra details below.</p>
		
<!-- Form to insert extra into database -->
        <form action="insert_extra.php" method="POST" onsubmit="return confirmCheck();">

            <!-- Staff Dropdown -->
            <label>Select Staff:</label>
            <select name="StaffID" id="StaffID" onchange="showStaffDetails()" required>
                <option value="">-- Select Staff --</option>
                <?php
                // Query staff who are not deleted
				/*This PHP block fetches staff data from the database.
				StaffDeletedFlag=0 ensures that only active staff (not deleted) are shown.
				mysqli_query($con, $staffQuery) runs the SQL query using the database connection $con.
				$staffResult contains all the rows returned by the query.*/
				
                $staffQuery = "SELECT StaffID, StaffFirstName, StaffSurname, StaffJobTitle, StaffPhoneNumber
                               FROM Staff WHERE StaffDeletedFlag=0";
                $staffResult = mysqli_query($con, $staffQuery);
				//mysqli_fetch_assoc($staffResult) fetches one row at a time from the query result as an associative array
                while($row = mysqli_fetch_assoc($staffResult)){
                    // Combine info into one value
                    $value = $row['StaffID'] . "|" . $row['StaffFirstName'] . "|" . $row['StaffSurname'] . "|" . $row['StaffJobTitle'] . "|" . $row['StaffPhoneNumber'];
                    // Display staff full name in dropdown
                    echo "<option value='$value'>{$row['StaffFirstName']} {$row['StaffSurname']}</option>";
                }
                ?>
            </select>

            <!-- Staff Details -->
            <label>Staff Name:</label>
            <input type="text" id="StaffName" readonly>

            <label>Job Title:</label>
            <input type="text" id="StaffJobTitle" readonly>

            <label>Phone:</label>
            <input type="text" id="StaffPhone" readonly>

            <!-- GuestStay Dropdown -->
            <!-- Guest stay selection -->
            <label>Select Guest / Room:</label>
            <select name="GuestStayID" id="GuestStayID" required>
                <option value="">-- Select Guest Stay --</option>
                <?php
                // Query all currently checked-in guests
				// JOIN Guest g ON gs.GuestID = g.GuestID → fetch guest first and last names from the Guest table.
				// WHERE gs.CheckOutDate IS NULL → only active stays (guests who haven’t checked out yet).
                $stayQuery = "
                    SELECT gs.GuestStayID, gs.RoomID, g.GuestFirstName, g.GuestSurname
                    FROM GuestStay gs
                    JOIN Guest g ON gs.GuestID = g.GuestID
                    WHERE gs.CheckOutDate IS NULL
                ";
				/*Executes the SQL query using the database connection $con.
				$stays now contains all rows of currently checked-in guests.*/
				
                $stays = mysqli_query($con, $stayQuery);
				
				/*Loops through each row returned by the query.
				mysqli_fetch_assoc($stays) = returns one row at a time as an associative array.
				The loop continues until all rows are processed.*/
                while($row = mysqli_fetch_assoc($stays)){
                    // Display as "Room 101 - John Doe"
                    $display = "Room ".$row['RoomID']." - ".$row['GuestFirstName']." ".$row['GuestSurname'];
                    echo "<option value='{$row['GuestStayID']}'>{$display}</option>";
                }
                ?>
            </select>

            <!-- Area Dropdown -->
			<!--onchange="changeExtras()" → runs a function when user selects something
                id="ExtraArea" → used by JavaScript to access this dropdown-->
            <label>Select Area:</label>
            <select name="ExtraArea" id="ExtraArea" onchange="changeExtras()" required>
                <option value="">-- Select Area --</option>
                <option>Bar</option>
                <option>Restaurant</option>
                <option>Room Service</option>
                <option>Leisure Centre</option>
            </select>

            <!-- Extra Dropdown -->
            <label>Select Extra:</label>
            <select name="ExtraDescription" id="ExtraDescription" required></select>

            <!-- Cost 
                min="0" → cannot enter negative values
                step="0.01" → allows decimals (e.g. 10.50)-->
            <label>Cost:</label>
            <input type="number" name="ExtraCost" min="0" step="0.01" title="Cost should only be numbers."
             placeholder="Enter Price"required>

            <!-- Quantity 
                 value="1" → default value is 1
                 min="1" → cannot go below 1-->
            <label>Quantity:</label>
            <input type="number" name="ExtraQuantity" value="1" min="1" title="Quantity should only be numbers."
             placeholder="Enter Quantity"required>

            <!-- Buttons -->
            <div class="button-row">
                <input type="reset" value="Clear">
                <input type="submit" value="OK">
            </div>

        </form>
    </div>
</div>

<?php mysqli_close($con); ?>

</body>
</html>