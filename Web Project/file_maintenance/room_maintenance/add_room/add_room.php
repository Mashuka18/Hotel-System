<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Add Room --> 
<!-- Purpose: This script adds a new room to the database, checks for duplicate room numbers, sanitizes input, and inserts the data. It redirects to a success page if successful, or a warning page if the room number already exists.-->
<?php
// Include the database connection file which creates the $con connection
include '../../../db.inc.php';

// Run the following code only if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize all form inputs to help prevent SQL injection attacks
    // mysqli_real_escape_string() escapes special characters before inserting into SQL
    $phone_ext = mysqli_real_escape_string($con, $_POST['RoomPhoneExtension']);
    $room_type = mysqli_real_escape_string($con, $_POST['RoomType']);
    $number    = mysqli_real_escape_string($con, $_POST['RoomNumber']);
    $cost      = mysqli_real_escape_string($con, $_POST['RoomCostPerNight']);
    $notes     = mysqli_real_escape_string($con, $_POST['RoomSpecialNotes']);
    
    // Generate the current date and time for database records
    // Format used: Year-Month-Day Hour:Minute:Second
    $date = date("Y-m-d H:i:s");
    
    // Set the deleted flag to 0 because this is a newly created active room
    $deletedFlag = 0;

    // Check if a room with the same RoomNumber already exists
    // This prevents duplicate room numbers from being added
    $check = "SELECT * FROM Room WHERE RoomNumber = '$number'";

    // Execute the query and store the result
    $result = mysqli_query($con, $check);

    // If one or more rows are returned, the room number already exists
    if (mysqli_num_rows($result) > 0) {

        // Redirect the user to a warning page
        header("Location: room_exists.php");

        // Stop script execution
        exit;
    }

    // Set the default room status when a new room is created
    $status = "Free";

    // Store another timestamp for the DateOfLastUpdate field
    $date2 = date("Y-m-d H:i:s");

    // SQL INSERT statement to add the new room to the Room table
    // Each column corresponds to a field in the Room database table
    $sql = "INSERT INTO Room
    (RoomNumber, RoomType, RoomCurrentStatus, RoomCostPerNight, RoomSpecialNotes,
     RoomDateOfLastUpdate, RoomDeletedFlag, RoomPhoneExtension, DateOfLastUpdate)
    VALUES
    ('$number', '$room_type', '$status', '$cost', '$notes', '$date', '$deletedFlag',
     '$phone_ext', '$date2')";

    // Execute the INSERT query
    if (mysqli_query($con, $sql)) {

        // If the insert is successful, redirect to the success confirmation page
        header("Location: room_success.php");

        // Stop further script execution
        exit;

    } else {

        // If the query fails, display a generic error message
        // (Actual database errors are hidden for security reasons)
        echo "<h3>Something went wrong while adding the room.</h3>";
        echo "<p>Please try again later or contact the system administrator.</p>";
    }/*else { 
	echo "Database Error: " . mysqli_error($con);*/
}

// Close the database connection once all operations are complete
mysqli_close($con);
?>