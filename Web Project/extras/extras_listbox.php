<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Add Guest Extra --> 
<!-- Purpose: Lets the user choose an active guest stay and pass their details to the form.-->

<!-- Dropdown list for selecting a guest stay -->
<select id="listbox" onchange="populate()"> 
    <!-- Default option shown when nothing is selected -->
    <option value="">Select Guest Stay</option>

    <?php
    // Include database connection
    include 'db.inc.php';

    // Query all currently checked-in guests (no checkout date yet)
	/*Runs an SQL query to get all active guest stays.
	GuestStay gs = main table of guest stays.
	JOIN Guest g ON gs.GuestID = g.GuestID = join with Guest table to get guest names.
	WHERE gs.CheckOutDate IS NULL = only includes guests who are currently checked in.*/
    $result = mysqli_query($conn,
    "SELECT gs.GuestStayID, gs.RoomID, g.GuestFirstName, g.GuestSurname
     FROM GuestStay gs
     JOIN Guest g ON gs.GuestID = g.GuestID
     WHERE gs.CheckOutDate IS NULL");

    // Loop through each row of the query result
    while($row = mysqli_fetch_assoc($result)){

        // Combine multiple fields into a single value for JavaScript parsing
        // Format: GuestStayID|RoomID|FirstName LastName
        $value = $row['GuestStayID']."|".
                 $row['RoomID']."|".
                 $row['GuestFirstName']." ".$row['GuestSurname'];

        // Output <option> element for the dropdown
        // Displayed text: "GuestStay [ID] - Room [RoomID]"
        echo "<option value='$value'>
        GuestStay {$row['GuestStayID']} - Room {$row['RoomID']}
        </option>";
    }
    ?>
</select>