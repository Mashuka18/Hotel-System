<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Delete Room -->
<!-- Purpose: Deletes a room safely by checking if it exists and is not occupied, then marks it as deleted in the database.-->
<?php
// Include database connection
include "../../../db.inc.php";

// Only proceed if RoomID is submitted via POST
if(isset($_POST['RoomID'])) {

    // Sanitize RoomID to prevent SQL injection
    $roomID = mysqli_real_escape_string($con, $_POST['RoomID']);

    // Check if the room exists and get its current status
    $check = "SELECT RoomCurrentStatus FROM Room WHERE RoomID = '$roomID' AND RoomDeletedFlag = 0";
    $result = mysqli_query($con, $check);

    // If no room found, show message and exit
    if(mysqli_num_rows($result) == 0){
        echo "<h2>Room does not exist or has already been deleted.</h2>";
        exit;
    }

    // Fetch the room data
    $row = mysqli_fetch_assoc($result);

    // Prevent deletion if room is occupied
    if($row['RoomCurrentStatus'] === "Occupied"){
        echo "<h2>Cannot delete this room because it is currently occupied.</h2>";
        exit;
    }

    // delete: set RoomDeletedFlag to 1
    $sql = "UPDATE Room SET RoomDeletedFlag = 1 WHERE RoomID = '$roomID'";

    // Execute deletion query
    if(mysqli_query($con, $sql)){
        header("Location: delete_succes.php"); // Redirect on success
        exit;
    } else {
        // Show error if query fails
        echo "<h2>Something went wrong while deleting the room.</h2>";
        echo "<p>Please try again later or contact the system administrator.</p>";
    }
}

// Close database connection
mysqli_close($con);
?>

<!-- Button to return to Dashboard -->
<br>
<form action="../../../index.php">
    <input type="submit" value="Return to Dashboard">
</form>