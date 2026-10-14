<!-- Name: Mariia Vanaga  --> 
<!-- Student ID: C00313153 --> 
<!-- Month: March 2026--> 
<!-- Screen name: Hotel Operations - Amend/View Room -->
<!-- Purpose: Creates a dropdown list of active rooms from the database.--> 

<?php 
// Include the database connection file 
// This establishes connection using $con 

include "../../../db.inc.php"; 


/*SQL SELECT Statement 
Retrieves all active (not deleted) rooms from the Room table. 
Only rooms where RoomDeletedFlag = 0 are displayed in the dropdown list.*/ 

$sql = "SELECT  
            RoomID, 
            RoomPhoneExtension, 
            RoomType, 
            RoomCurrentStatus, 
            RoomCostPerNight, 
            RoomSpecialNotes, 
            DateOfLastUpdate, 
            RoomNumber 
        FROM Room 
        WHERE RoomDeletedFlag = 0"; 

 

/* Execute the query. 
If the query fails, stop execution and display the database error.*/ 

if (!$result = mysqli_query($con, $sql)) { 
    die('Error querying the database: ' . mysqli_error($con)); 

} 
 

/*Create the dropdown list (select element). 
- name='listbox' allows form submission 
- id='listbox' allows JavaScript access 
- onchange='populate()' calls JS function to fill form fields when a room is selected*/ 

echo "<br><select name='listbox' id='listbox' onchange='populate()'>"; 

// Default empty option 
echo "<option value=''>-- Select Room --</option>"; 

/*Loop through each row returned from database 
    and create an option in the dropdown.*/ 
while ($row = mysqli_fetch_array($result)) { 

/*Keep getting rows from the database one by one. For each row, do something (like build a dropdown option). 
Stop when there are no more rows left.*/ 

/*Combine all room details into one stringseparated by "|". 
This allows JavaScript to split the values and populate form fields.*/ 
    $allText = $row['RoomID'] . "|" . 
               $row['RoomPhoneExtension'] . "|" . 
               $row['RoomType'] . "|" . 
               $row['RoomCurrentStatus'] . "|" . 
               $row['RoomCostPerNight'] . "|" . 
               $row['RoomSpecialNotes'] . "|" . 
               $row['DateOfLastUpdate'] . "|" .  
               $row['RoomNumber']; 


    // Display text now shows Room Number and Room Type instead of phone extension 
    $display = $row['RoomNumber']; 

    // Output each option element 
    echo "<option value='$allText'>$display</option>"; 
} 

// Close the select dropdown 
echo "</select>"; 

// Close database connection 
mysqli_close($con); 

?> 