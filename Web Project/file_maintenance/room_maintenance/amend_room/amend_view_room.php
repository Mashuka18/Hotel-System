<!-- Name: Mariia Vanaga  -->
<!-- Student ID: C00313153 -->
<!-- Month: March 2026-->
<!-- Screen name: Hotel Operations - Amend/View Room -->
<!-- Purpose: Updates a room’s details in the database using form data and redirects to a success page if the update works.-->

<?php
// Include database connection file
// This connects to MySQL using $con
include '../../../db.inc.php';
/*SQL UPDATE Statement:
    Updates the selected room record in the Room table.
    The values are taken from the form using the POST method.
    The WHERE clause ensures only the selected RoomID is updated.*/
$sql = "UPDATE Room SET
            RoomPhoneExtension = '$_POST[RoomPhoneExtension]',
            RoomType = '$_POST[RoomType]',
            RoomCostPerNight = '$_POST[RoomCostPerNight]',
            RoomSpecialNotes = '$_POST[RoomSpecialNotes]'
        WHERE RoomID = '$_POST[RoomID]'";
/*Execute the SQL query.
    mysqli_query():
    - Sends the SQL statement to the database
    - Returns TRUE if successful
    - Returns FALSE if an error occurs*/
if (mysqli_query($con, $sql)) {
    // If update is successful, redirect user to success page
    header("Location: room_succes.php");
    // exit() ensures no further code runs after redirect
    exit;

} else {

    // If an error occurs, display error message
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
// Close database connection
mysqli_close($con);
?>
<!-- Button to return to dashboard if needed -->
<form action="../../../index.php" method="post">
    <input type="submit" value="Return to Dashboard">
</form>